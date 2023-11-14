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
