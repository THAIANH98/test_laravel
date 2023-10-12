<?php

namespace App\Http\Controllers;

use App\Models\tbl_Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.add',[
            'title'=>'Sản phẩm',
        ]);
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
