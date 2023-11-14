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
                load_products(url_load, cate);
            } else {
                alert('Xóa lỗi vui lòng thử lại');
            }
        }
    });
}

function load_products(url, cate) {
    url = url.replace('id_nhom', cate);
    $.get(url, function (res) {
        $('#list_product').html(res);
    });
}

function load_cate(url) {
    $.get(url, function (res) {
        $('#id_nhom').html(res);
    });
}


