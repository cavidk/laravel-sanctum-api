<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if ($products) {
            $products->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            return response()->json([
                'status' => 200,
                'message' => "Product udpated successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No such Product"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        Product::destroy($id);
        //        $products = Product::find($id);
//        $products->delete();

//        if ($products) {
//            return response()->json([
//                'status' => 200,
//                'message' => "Product deleted successfully!"
//            ], 200);
//        } else {
//            return response()->json([
//                'status' => 404,
//                "message" => "Product not deleted or error occurred!"
//            ], 404);
//        }

        }

}
