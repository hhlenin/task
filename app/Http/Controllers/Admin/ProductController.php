<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index',[
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $input = $request->only(['name', 'description', 'price', 'unit', 'quantity', 'image']);
        Product::storeProduct($input);
        return redirect(route('products.create'))->with('message', "Product data saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('admin.product.edit', compact([
                'product'
            ]));   
        }
        return redirect(route('products.index'))->with('error', 'No product found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $input = $request->only(['name', 'description', 'price', 'unit', 'quantity', 'image']);
        Product::storeProduct($input, $id);
        return redirect(route('products.index'))->with('message', "Product data updated successfully"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product) {
            if($product->image){
                if (file_exists($product->image)){
                    unlink($product->image);
                }
            }
            $product->delete();
            return redirect(route('products.index'))->with('warning', 'Product data deleted successfully');
        }
        return redirect(route('products.index'))->with('error', 'No product found');
    }
}
