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
                <input type="text" name="ten_sp" id="ten_sp" class="form-control"  placeholder="Nhập Tên Sản Phẩm">
            </div>

            <div class="form-group">
                <label for="menu">Mã Sản Phẩm</label>
                <input type="text" name="ma_sp" id="ma_sp" class="form-control"  placeholder="Nhập Mã Sản Phẩm">
            </div>
            
            <div class="form-group">
                <label for="menu">Đơn vị tính</label>
                <input type="text" name="donvi_sp" id="donvi_sp" class="form-control"  placeholder="Nhập Đơn Vị Tính">
            </div>


            <div class="form-group">
                <label for="menu">Giá</label>
                <input type="number" name="gia_sp" id="gia_sp" class="form-control"  placeholder="Nhập Giá">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" id="btn" class="btn btn-primary">THÊM MỚI</button>
        </div>
        @csrf
    </form>

    <div class="container">
        <div class="container mt-3">
            <h2>Danh sản phẩm</h2>   
             <table class="table table-bordered" id='table_sp'>
              <thead>
                <tr>
                  <th>Nhóm</th>
                  <th>Mã Sản Phẩm</th>
                  <th>Sản phẩm</th>
                  <th>Đơn vị tính</th>
                  <th>Giá</th>
                </tr>
              </thead>
              <tbody id="list_product">

              </tbody>
        </table>
      </div>
    </div>
</body>
@section('footer')

    <script>
        load_cate()
        load_products(0)
        function load_cate(){
            $.get('{{route('categoryview')}}',function(res){
                $('#id_nhom').html(res);
            });
        }
        function load_products(cate){          
            let url = '{{route('productapi_view','id_nhom')}}'
            url = url.replace('id_nhom', cate);
            $.get(url,function(res){
                $('#list_product').html(res);
            });
        }

       

        $('#form_add').on('submit',function (ev){
            ev.preventDefault();
            let formdata = $('#form_add').serialize();
            $.post('{{route('productapi_add')}}',formdata, function(res){
                if(res.success == false){
                    let div_ = ''
                    div_ +='<div id="err" class="alert alert-danger">' + res.message +'</div>'
                    $('#notify').html(div_)
                    setTimeout(function(){
                        $('#err').remove();
                    },3000);
                }else{
                    let div_ = ''
                    div_ +='<div id="success" class="alert alert-success">' + res.message +'</div>'
                    $('#notify').html(div_)
                    setTimeout(function(){
                        $('#success').remove();
                    },3000);
                    load_products($( "#id_nhom" ).find(":selected").val())
                }
            })
        });
        
        
        $( "#id_nhom" ).on( "change", function() {
            load_products($( "#id_nhom" ).find(":selected").val())
        } );
    
    </script>
@endsection
@include('footer')