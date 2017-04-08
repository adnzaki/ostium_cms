/**
 * OstiumCMS
 * A simple, fast and fully customizable Content Management System
 * for website made by Wolestech (Software Development Agency)
 *
 * @copyright   Copyright (c) 2016-2017, Wolestech | Adnan Zaki
 * @license     MIT License | https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

$(".buat-post").on('click', function() {
    $("#dashboard, #all-post").each(function() {
        $(this).fadeOut(300, function() {
            $("#add-post, .post-sidebar").each(function() {
                $(this).fadeIn(400);
            })
            runTinyMCE();
        });
    })
});

$(".tutup-post-editor").on('click', function() {
    $("#add-post, .post-sidebar").each(function() {
        $(this).fadeOut(300, function() {
            $("#dashboard, #all-post").each(function() {
                $(this).fadeIn(400);
            })
        })
    })
});

$("#simpan-draft").on('click', function(e) {
    e.preventDefault();
    var judul       = $("#judul_post").val();
    var kategori    = $("#kategori").val();
    var penulis     = $("#user").val();
    var konten      = tinymce.get('editor').getContent();
    var gambar      = $("#link-img").val();
    var permalink   = $("#permalink").val();
    var visibilitas = $("#visibilitas").val();
    var data        = 'judul_post=' + judul + '&kategori=' + kategori + '&user=' + penulis + '&isi_post=' +
                        '&visibilitas=' + visibilitas + konten + '&gambar-fitur=' + gambar + '&permalink=' + permalink;
    $.ajax({
        url: baseUrl + 'posts/add_draft',
        type: 'POST',
        dataType: 'html',
        data: data,
        success: function() {
            window.location.href = baseUrl + 'posts/edit_saved_draft/';            
        }
    })
});

// Publish draft
$("#publish-draft").on('click', function(e) {
    e.preventDefault();
    var id          = $("#post-id").val();
    var judul       = $("#judul_post").val();
    var kategori    = $("#kategori").val();
    var penulis     = $("#user").val();
    var konten      = tinymce.get('editor').getContent();
    var gambar      = $("#link-img").val();
    var permalink   = $("#permalink").val();
    var data        = 'judul_post=' + judul + '&kategori=' + kategori + '&user=' + penulis +
                        '&isi_post=' + konten + '&gambar-fitur=' + gambar + '&permalink=' + permalink;
    $.ajax({
        url: baseUrl + 'posts/publish_draft/' + id,
        type: 'POST',
        dataType: 'html',
        data: data,
        success: function() {
            window.location.href = baseUrl + 'post/edit/' + id;
        }
    })
})

// Show confirmation box to delete post
$(document).delegate('.post-delete', 'click', function() {
    var id = $(this).data('post');
    var color = $(this).data('color');
    $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
    $('#mdModal').modal('show');
    var path = window.location.pathname;
    var arr = path.split("/").slice(2);
    var uri_target = arr.join("-");
    $("#delete-link").attr('href', baseUrl + 'post/del/' + id + '/' + uri_target);
});

// Post Attribute Setting
var postAttribute = {
    user: "#user-sender",
    // send user id to form input
    setUser: function() {
        $(this.user).on('change', function() {
            var id = $(this).find(":selected").attr('id');
            $("#user").val(id);
        })
    },
    // default attribute selected when the page is loaded
    defaultAttribute: function() {
        var user        = $(this.user).find(":selected").attr('id'),
            gambar      = $("#prev-img").attr('src'),
            permalink   = $("#permalink").val();

        $("#user").val(user);
        $("#link-img").val(gambar);
        $("#permalink-text").text(permalink);
        postVisibility();
        postStatus();
        isEditedPost();
        defaultCategory();
        getKategori($kats);
    }
}

// generate URL from the date selector option
$("#date-selector").change(function() {
    filterLinkGenerator();
})

// generate URL from category selector
$("#cat-selector").change(function() {
    filterLinkGenerator();
})

function filterLinkGenerator() {
    var dateValue = $("#date-selector").find(":selected").val(),
        catID = $("#cat-selector").find(":selected").val(),
        path = window.location.pathname,
        arr = path.split('/').slice(2),
        postUri = 'posts/filter_post/',
        status;
    dateValue === '' ? dateValue = 0 : dateValue = dateValue;
    catID === '' ? catID = 0 : catID = catID;

    if(arr[0] === 'post' || arr[1] === 'index') {
        status = 'all';
    } else {
        status = arr[2];
    }

    var uri = baseUrl + postUri + status + '/' + dateValue + '/' + catID;
    $("#go-filter").attr('href', uri);
}

// Create permalink
$("#judul_post").keyup(function () {
    createLink("#judul_post");
    var getLink = $("#permalink-text").text();
    var getSeo = getLink.split(" ");
    var seo = getSeo.slice(1);
    seo = seo.toString().split("/").slice(5);
    $("#permalink-input").val(seo);
});

// edit permalink
$("#permalink-input").keyup(function () {
    var teks = $(this).val();
    teks = teks.replace(/\W+/g, "-").toLowerCase();
    $(this).val(teks);
    createLink("#permalink-input");
})

function createLink(input) {
    var postLink = $(input).val(),
        baseLink = baseUrl + 'read/';

    var permalink = baseLink + postLink.replace(/\W+/g, "-").toLowerCase();
    var lastChar = permalink.substr(permalink.length - 1);

    if (lastChar.search(/\W/) === 0) {
        permalink = permalink.substring(0, permalink.length - 1);
    }
    $("#permalink-text").html("<b>Permalink: </b><br>" + permalink);
    $("#permalink").val(permalink);
}

$("input.status-post-input").on('click', function() {
    $("#status-post").val($(".status-post-input:checked").val())
})

function postVisibility() {
    var visibilitas = $("#visibilitas").val();
    if(visibilitas === 'show' || visibilitas === '') {
        $("#post-visible").prop('checked', true);
        $("#visibilitas").val('show')
    } else {
        $("#post-visible").prop('checked', false);
    }
}

function postStatus() {
    var statusPost  = $("#status-post").val();
    if(statusPost === 'publik' || statusPost === '') {
        $("#post-publik").prop('checked', true);
    } else {
        $("#post-draft").prop('checked', true);
    }
    $("#status-post").val($(".status-post-input:checked").val())
}

$("#post-visible").change(function() {
    if(this.checked) {
        $("#visibilitas").val('show');
    } else {
        $("#visibilitas").val('hide');
    }
})

function isEditedPost() {
    var path = window.location.pathname;
    if(path.indexOf('edit') === -1 || $("#status-post").val() === 'draft') {
        $("#status-post-wrapper").hide();
    } else {
        $("#status-post-wrapper").show();
    }
}

var $kats = $("input:checkbox.filled-in");
$kats.on('change', function() {
    getKategori($kats);
})

function getKategori(target) {
    var string = target.filter(":checked").map(function(i,v) {
        return this.value;
    }).get().join(",");
    $('#kategori').val(string);
}

function defaultCategory() {
    if($("#kategori").val() === '') {
        var length = $kats.length;
        //$("input:checkbox#basic_checkbox_1").prop('checked', true);
        $("input:checkbox.filled-in").first().prop('checked', true);
    }
}

// scripts running when the page is loaded
$(window).load(function() {
    runTinyMCE();
    activateScroll();
    postAttribute.setUser();
    postAttribute.defaultAttribute();
});

$(window).resize(function () {
    activateScroll();
});

function responsive_filemanager_callback(field_id) {
    var image = $("#" + field_id).val();
    $("#prev-img").attr('src', image);
}

var $list = $('.list-setting'),
    minsHeight = 100,
    windowHeight = $(window).height(),
    scrollHeight = windowHeight - minsHeight;

function activateScroll() {
    $list.slimscroll({
        height: scrollHeight + 'px',
        scrollColor: 'rgba(0,0,0,0.5)',
        scrollWidth: '4px',
        scrollAlwaysVisible: false,
        scrollBorderRadius: '0',
        scrollRailBorderRadius: '0'
    })
}

function runTinyMCE() {
    tinymce.init({
        selector: "textarea#editor",
        height: 400,
        plugins: [
            'advlist autolink lists link charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime nonbreaking save table contextmenu directionality codesample',
            'emoticons template paste textcolor colorpicker textpattern imagetools image responsivefilemanager'
        ],
        menubar: false,
        toolbar1: 'insertfile undo redo | fontsizeselect styleselect fontselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify',
        toolbar2: 'bullist numlist outdent indent | link image | responsivefilemanager print preview | forecolor backcolor emoticons | codesample fullscreen',
        image_advtab: true,
        codesample_dialog_height: 200,
        fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
        relative_urls: false,
		remove_script_host: false,
        external_filemanager_path: baseUrl + "assets/plugins/tinymce/plugins/filemanager/",
        filemanager_title:"File Manager" ,
        external_plugins: { "filemanager" : "plugins/filemanager/plugin.min.js"}
    });
}
