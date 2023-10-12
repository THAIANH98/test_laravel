
    <option value="0">Tất cả</option>
        @foreach($cates as $cate)
    <option value="{{ $cate->id }}">{{ $cate->ten_nhom }}</option>
        @endforeach


