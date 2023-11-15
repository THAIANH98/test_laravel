$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(url_delete, url_load, cate) {
    $.ajax({
        type: 'DELETE',
        datatype: 'JSON',
        url: url_delete,
        success: function (result) {
            if (result.err === false) {
                loadProducts(url_load, cate);
            } else {
                alert('Xóa lỗi vui lòng thử lại');
            }
        }
    });
}

function editProduct(url) {
    $.get(url, function (res) {
        if (res.err === false) {
            $('#ten_sp').val(res.data.ten_sp);
            $('#ma_sp').val(res.data.ma_sp);
            $('#donvi_sp').val(res.data.donvi_sp);
            $('#gia_sp').val(res.data.gia_sp);
            $('#id_nhom').val(res.data.id_nhom);
            $('#btn_edit').attr('onclick', 'updateProduct("' + res.url_update + '","' + res.url_load + '")');
            $('#group-add').css("display", "none");
            $('#group-edit').css("display", "block");
        }
    });
}

function updateProduct(url_update, url_load) {
    let formdata = $('#form_add').serialize();
    $.post(url_update, formdata, function (res) {
        if (res.success == false) {
            let div_ = '';
            div_ += '<div id="err" class="alert alert-danger">' + res.message + '</div>';
            $('#notify').html(div_);
            setTimeout(function () {
                $('#err').remove();
            }, 3000);
        } else {
            let div_ = '';
            div_ += '<div id="success" class="alert alert-success">' + res.message + '</div>';
            $('#notify').html(div_);
            setTimeout(function () {
                $('#success').remove();
            }, 3000);
            loadProducts(url_load);
        }
    })
}

function loadProducts(url, cate = null) {
    if (cate !== null)
        url = url.replace('id_nhom', cate);
    $.get(url, function (res) {
        $('#list_product').html(res);
    });
}

function loadCate(url) {
    $.get(url, function (res) {
        $('#id_nhom').html(res);
    });
}

$(document).keypress(function (event) {
    var keycode = event.keyCode || event.which;
    if (keycode == '13') {
        if ($('#group-add').css("display") == 'none') {
            return $('#btn_edit').focus();
        } else {
            return $('#btn_add').focus();
        }
    }
});
