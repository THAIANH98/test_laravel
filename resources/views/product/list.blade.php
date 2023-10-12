
    @foreach ($products as $product )
        <tr>
            <td>{{$product->cate->ten_nhom}}</td>
            <td>{{$product->ma_sp}}</td>
            <td>{{$product->ten_sp}}</td>
            <td>{{$product->donvi_sp}}</td>
            <td>{{$product->gia_sp}}</td>
        </tr>
    @endforeach
    

