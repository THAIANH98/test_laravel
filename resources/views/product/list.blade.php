<table class="table table-bordered" id='table_sp'>
    <thead>
        <tr>
            <th>Nhóm</th>
            <th>Mã Sản Phẩm</th>
            <th>Sản phẩm</th>
            <th>Đơn vị tính</th>
            <th>Giá</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr id="product-{{ $product->id }}">
                <td>{{ $product->cate->ten_nhom }}</td>
                <td>{{ $product->ma_sp }}</td>
                <td>{{ $product->ten_sp }}</td>
                <td>{{ $product->donvi_sp }}</td>
                <td>{{ $product->gia_sp }}</td>
                <td style="text-align: center">
                    <button type="button" onclick="editProduct('{{ route('productapi_edit', $product->id) }}')"
                        class="btn btn-outline-primary">Edit</button>
                </td>
                <td style="text-align: center">
                    <button type="button"
                        onclick="removeRow('{{ route('destroy_product', $product->id) }}', '{{ route('productapi_view', 'id_nhom') }}' , 0)"
                        class="btn btn-outline-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links('vendor.pagination.bootstrap-5') }}
