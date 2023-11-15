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
            <button type="submit" id="btn_add" class="btn btn-primary">THÊM MỚI</button>
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
    <script>
        load_cate('{{ route('categoryview') }}');

        load_products('{{ route('productapi_view', 'id_nhom') }}', 0);

        $('#form_add').on('submit', function(ev) {
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
                    load_products('{{ route('productapi_view', 'id_nhom') }}', $("#id_nhom").find(
                        ":selected").val());
                }
            })
        });

        $("#id_nhom").on("change", function() {
            load_products('{{ route('productapi_view', 'id_nhom') }}', $("#id_nhom").find(":selected").val());
        });

        $('#btn_reset').on('click', function(ev) {
            $('#ten_sp').val('');
            $('#ma_sp').val('');
            $('#donvi_sp').val('');
            $('#gia_sp').val('');
            $('#id_nhom').val(0);
            // load_products('{{ route('productapi_view', 'id_nhom') }}', 0);
            $('#group-edit').css("display", "none");
            $('#group-add').css("display", "block");
        });

        function editProduct(url) {
            $.get(url, function(res) {
                if (res.err === false) {
                    $('#ten_sp').val(res.data.ten_sp);
                    $('#ma_sp').val(res.data.ma_sp);
                    $('#donvi_sp').val(res.data.donvi_sp);
                    $('#gia_sp').val(res.data.gia_sp);
                    $('#id_nhom').val(res.data.id_nhom);
                    $('#btn_edit').attr('onclick', 'updateProduct(' + res.data.id + ')');
                    $('#group-add').css("display", "none");
                    $('#group-edit').css("display", "block");
                }
            });
        }

        function updateProduct(id) {
            let formdata = $('#form_add').serialize();
            url = '{{ route('productapi_update', 'id') }}';
            url = url.replace('id', id);
            $.post(url, formdata, function(res) {
                if (res.success == false) {
                    let div_ = '';
                    div_ += '<div id="err" class="alert alert-danger">' + res.message + '</div>';
                    $('#notify').html(div_);
                    setTimeout(function() {
                        $('#err').remove();
                    }, 3000);
                } else {
                    let div_ = '';
                    div_ += '<div id="success" class="alert alert-success">' + res.message + '</div>';
                    $('#notify').html(div_);
                    setTimeout(function() {
                        $('#success').remove();
                    }, 3000);
                    load_products('{{ route('productapi_view', 'id_nhom') }}', $("#id_nhom").find(
                        ":selected").val());
                }
            })
        }

        function getProduct(url) {
            console.log(url);
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
