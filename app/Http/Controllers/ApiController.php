<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        $getData = Product::get();
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $getData
            ]);
    }

    public function getCategory()
    {
        $data = Category::get();
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $data
            ]);
    }

    public function getCategoryById(Request $request)
    {
        $data = Category::where('id', $request->id)->first();
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $data
            ]);
    }

    public function deleteProductById(Request $request)
    {
        $deleteData = Product::where('id', $request->id)->first();

        //If found
        if($deleteData)
        {
            //$data = $deleteData->each->delete();
            $data = $deleteData->delete();
            return response()->json([
                'status' => '200',
                'message' => 'Product successfully deleted',
                ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Already deleted',
                ]);
        }
    }
}
