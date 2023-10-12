<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\tbl_Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $cates = tbl_Category::all();
        $arr = [
            'status' => true,
            'message'=> "Danh sách nhóm sản phẩm",
            'data'=> CategoryResource::collection($cates)
        ];
        return response()->json($arr,200);
    }

    public function categoryview()
    {
        $cates = tbl_Category::get();
        
        return view('category.select',compact('cates'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
