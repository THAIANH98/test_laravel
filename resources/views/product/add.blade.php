<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')

</head>
<body>
    <form action method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" id="name" class="form-control"  placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label for="menu">Thứ tự sắp xếp</label>
                <input type="number" name="sort" id="sort" value="0" class="form-control"  placeholder="Nhập thứ tự sắp xếp">
            </div>
{{-- 
            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="0"> Danh Mục Cha </option>
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="content_x"  class="form-control"></textarea>
            </div>


            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" id="btn" class="btn btn-primary">Tạo Danh Mục</button>
        </div>
        @csrf
    </form>

</body>
@include('footer')