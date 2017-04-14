var tag = new Vue({
    el: '#tag-control',
    data: {
        tags: [],
    },
    ready: function() {
        this.tagSender();

    },
    methods: {
        tagLoader: function(input) {
            let tag = input.val().split(", ");
            for(let i = 0; i < tag.length; i++) {
                let slug = tag[i];
                slug = slug.replace(/\W+/g, "-").toLowerCase()
                this.tags.push({"nama_tag": tag[i], "slug_tag": slug});
            }

            function hash(o) {
                return o.nama_tag;
            }

            var hashesFound = {};
            this.tags.forEach(function(o) {
                hashesFound[hash(o)] = o;
            })
            var result = Object.keys(hashesFound).map(function(k) {
                return hashesFound[k];
            })
            this.tags = result;
        },
        existTag: function() {
            this.tagLoader($("#tag-name"));
            if(this.tags[0].nama_tag === "") {
                this.tags.pop();
            }
        },
        addTag: function() {
            this.tagLoader($("#tag-input"));
            let lastItem = this.tags[this.tags.length - 1].nama_tag;
            if(lastItem === "") {
                this.tags.pop();
            }
            $("#tag-input").val("");
            this.tagSender();
        },
        tagSender: function() {
            let tagArr = {
                nama: [], slug: []
            };
            for(let i = 0; i < this.tags.length; i++) {
                tagArr.nama.push(this.tags[i].nama_tag);
                tagArr.slug.push(this.tags[i].slug_tag);
            }
            let nama = tagArr.nama.join(", ");
            let slug = tagArr.slug.join(", ");
            $("#tag-name").val(nama);
            $("#tag-slug").val(slug);
        },
        removeTag: function(index) {
            this.tags.splice(index, 1);
            this.tagSender();
        }
    }
})
