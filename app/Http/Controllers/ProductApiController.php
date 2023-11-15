<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\tbl_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    protected $limit = 5;

    public function index()
    {
        $products = tbl_product::paginate($this->limit);
        $arr = [
            'status' => true,
            'message' => "Danh sách nhóm sản phẩm",
            'data' => ProductResource::collection($products)
        ];
        return response()->json($arr, 200);
    }

    public function productapi_view(Request $request, string $id_nhom)
    {
        // dd($request->page);
        if ($id_nhom == '0')
            $products = ProductResource::collection(tbl_product::orderBy('id', 'Desc')->paginate($this->limit));
        else
            $products = ProductResource::collection(tbl_product::where('id_nhom', $id_nhom)->orderBy('id', 'Desc')->paginate($this->limit));
        return view('product.list', compact('products'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->input('id_nhom') == 0) {
            $arr = [
                'success' => false,
                'message' => 'Vui lòng chọn nhóm sản phẩm',
            ];
            return response()->json($arr, 200);
        }
        $validator = Validator::make($input, [
            'ten_sp' => 'required',
            'ma_sp' => 'required',
            'donvi_sp' => 'required',
            'gia_sp' => 'required',
        ]);
        if ($validator->fails()) {
            $arr = [
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];

            return response()->json($arr, 200);
        }
        $product = tbl_product::create($input);
        $arr = [
            'success' => true,
            'message' => "Sản phẩm đã lưu thành công",
            'data' => new ProductResource($product)
        ];
        return response()->json($arr, 201);
    }


    public function show($id)
    {
        //
    }

    public function edit(tbl_product $product)
    {
        return response()->json([
            'err' => false,
            'data' => $product,
        ]);
    }

    public function update(Request $request, tbl_product $product)
    {
        try {
            $input = $request->all();
            if ($request->input('id_nhom') == 0) {
                $arr = [
                    'success' => false,
                    'message' => 'Vui lòng chọn nhóm sản phẩm',
                ];
                return response()->json($arr, 200);
            }
            $validator = Validator::make($input, [
                'ten_sp' => 'required',
                'ma_sp' => 'required',
                'donvi_sp' => 'required',
                'gia_sp' => 'required',
            ]);
            if ($validator->fails()) {
                $arr = [
                    'success' => false,
                    'message' => 'Lỗi kiểm tra dữ liệu',
                    'data' => $validator->errors()
                ];
                return response()->json($arr, 200);
            }
            $product->fill($request->input());
            $product->save();
            $arr = [
                'success' => true,
                'message' => "update successfully",
                'data' => new ProductResource($product)
            ];
            return response()->json($arr, 201);
        } catch (\Exception $err) {
            $arr = [
                'success' => true,
                'message' => "Update fail",
                'data' => new ProductResource($product)
            ];
            return response()->json($arr, 201);
        }
    }

    public function destroy(tbl_product $product)
    {
        $product->delete();
        return response()->json([
            'err' => false,
            'message' => 'Delete successfully'
        ]);
    }
}
