Vue.component('error-msg', {
    props: ['msg'],
    template: '<p class="os-error-input">{{ msg }}</p>'
})

var at = new Vue({
    el: '#kategori-content',
    data: {
        categoryList: getCategory,
        slugDesc: 'Slug adalah versi ramah-URL untuk nama, biasanya hanya mengandung huruf, angka dan strip',
        showCategoryEdit: false,
        editCategory: [],
        errorMsg: {
            nama: '',
            slug: '',
            deskripsi: ''
        }
    },
    methods: {
        slugGenerator: function(key) {
            var slugInput = '';
            if(key === 'slug') {
                slugInput = $("#slug-kategori").val();
            } else {
                slugInput = $("#nama-kategori").val()
            }
            slugInput = slugInput.replace(/\W+/g, "-").toLowerCase();

            if(this.editCategory.length === 0) {
                $("#slug-kategori").val(slugInput);
            } else {
                this.editCategory[0].slug = slugInput;
            }
        },
        addCategory: function() {
            var input = $("#form-kategori").serialize();
            this.sendCategory(input, 'insert');
        },
        updateCategory: function(id) {
            data = $("#edit-kategori").serialize();
            this.sendCategory(data, 'update', id);
        },
        deleteCategory: function(id) {
            $.ajax({
                url: baseUrl + 'attribute/delete_category/' + id,
                type: 'POST',
                success: function() {
                    at.fetchCategory();
                }
            })
        },
        coba: function() {
            alert('bangke!!!');
        },
        categoryToEdit: function(id) {
            $.ajax({
                url: baseUrl + 'attribute/edit_category/' + id,
                type: 'GET',
                dataType: 'json',
                data: 'id=' + id,
                // beforeSend: function() {
                //     $(".load-content").show();
                // },
                success: function(data) {
                    at.editCategory.splice(0, 1);
                    at.showCategoryEdit = true;
                    at.editCategory.push({
                        id: data[0].id_kategori,
                        nama: data[0].nama_kategori,
                        slug: data[0].slug_kategori,
                        deskripsi: data[0].deskripsi_kategori
                    });
                }
            })
        },
        sendCategory: function(input, event, key) {
            $.ajax({
                url: baseUrl + 'attribute/category_validation/' + event + '/' + key,
                type: 'POST',
                dataType: 'json',
                data: input,
                success: function(msg) {
                    if(msg !== 'success') {
                        at.errorMsg.nama = msg.namaKategori;
                        at.errorMsg.slug = msg.slugKategori;
                        at.errorMsg.deskripsi = msg.deskripsiKategori;
                    }
                    else
                    {
                        at.fetchCategory();
                        at.showCategoryEdit = false;
                    }
                }
            })
        },
        fetchCategory: function() {
            $.ajax({
                url: baseUrl + 'attribute/fetch_category',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    getCategory.splice(0, getCategory.length);
                    for(var i = 0; i < data.length; i++) {
                        at.categoryList.push({
                            id_kategori: data[i].id_kategori,
                            nama_kategori: data[i].nama_kategori,
                            slug_kategori: data[i].slug_kategori,
                            deskripsi_kategori: data[i].deskripsi_kategori
                        })
                    }
                    at.reset();
                }
            })
        },
        reset: function() {
            $("#nama-kategori").val("");
            $("#slug-kategori").val("");
            $("#deskripsi-kategori").val("");
            this.errorMsg.nama = '',
            this.errorMsg.slug = '',
            this.errorMsg.deskripsi = '';
            this.showCategoryEdit = false;
            this.editCategory.splice(0);
        }
    }
})
