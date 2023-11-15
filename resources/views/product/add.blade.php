<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
    <div id='notify' style="height: 30px;">

    </div>
    <form action method="POST" id='form_add'>
        <div class="card-body">
            <div class="form-group" id='list_cate'>
                <label>Nhóm</label>
                <select class="form-control" id="id_nhom" name="id_nhom">
                </select>
            </div>

            <div class="form-group">
                <label for="menu">Tên Sản Phẩm</label>
                <input type="text" name="ten_sp" id="ten_sp" class="form-control"
                    placeholder="Nhập Tên Sản Phẩm">
            </div>

            <div class="form-group">
                <label for="menu">Mã Sản Phẩm</label>
                <input type="text" name="ma_sp" id="ma_sp" class="form-control" placeholder="Nhập Mã Sản Phẩm">
            </div>

            <div class="form-group">
                <label for="menu">Đơn vị tính</label>
                <input type="text" name="donvi_sp" id="donvi_sp" class="form-control"
                    placeholder="Nhập Đơn Vị Tính">
            </div>

            <div class="form-group">
                <label for="menu">Giá</label>
                <input type="number" name="gia_sp" id="gia_sp" class="form-control" placeholder="Nhập Giá">
            </div>
        </div>

        <div class="card-footer" id="group-add" style="display: block">
            <button type="button" id="btn_add" class="btn btn-primary">THÊM MỚI</button>
        </div>
        <div class="card-footer" id="group-edit" style="display: none">
            <button type="button" id="btn_edit" class="btn btn-primary">UPADTE</button>
            <button type="button" id="btn_reset" class="btn btn-primary">RESET</button>
        </div>
        @csrf
    </form>

    <div class="container">
        <div class="container mt-3">
            <h2>Danh sản phẩm</h2>
            <div id="list_product">

            </div>
        </div>
    </div>
</body>
@section('footer')
    <script src="/template/admin/js/product.js"></script>

    <script>
        loadCate('{{ route('categoryview') }}');

        loadProducts('{{ route('productapi_view', 'id_nhom') }}', 0);

        $('#btn_add').on('click', function(ev) {
            ev.preventDefault();
            let formdata = $('#form_add').serialize();
            $.post('{{ route('productapi_add') }}', formdata, function(res) {
                if (res.success == false) {
                    let div_ = '';
                    div_ += '<div id="err" class="alert alert-danger">' + res.message + '</div>';
                    $('#notify').html(div_);
                    setTimeout(function() {
                        $('#err').remove();
                    }, 3000);
                } else {
                    $('#ten_sp').val('');
                    $('#ma_sp').val('');
                    $('#donvi_sp').val('');
                    $('#gia_sp').val('');
                    let div_ = '';
                    div_ += '<div id="success" class="alert alert-success">' + res.message + '</div>';
                    $('#notify').html(div_);
                    setTimeout(function() {
                        $('#success').remove();
                    }, 3000);
                    loadProducts('{{ route('productapi_view', 'id_nhom') }}', $("#id_nhom").find(
                        ":selected").val());
                }
            })
        });

        $("#id_nhom").on("change", function() {
            loadProducts('{{ route('productapi_view', 'id_nhom') }}', $("#id_nhom").find(":selected").val());
        });

        $('#btn_reset').on('click', function(ev) {
            $('#ten_sp').val('');
            $('#ma_sp').val('');
            $('#donvi_sp').val('');
            $('#gia_sp').val('');
            $('#id_nhom').val(0);
            $('#group-edit').css("display", "none");
            $('#group-add').css("display", "block");
        });


        function getProduct(url) {
            $.ajax({
                url: String(url),
                type: 'GET',
            }).done(function(data) {
                $('#list_product').html(data);
            }).fail(function() {
                console.log('Error load page');
            });
        }

        $(document).on('click', ".pagination a", function(e) {
            e.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var url = $(this).attr('href');

            getProduct(url);
        });
    </script>
@endsection
@include('footer')
