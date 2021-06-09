<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        return view('auth.products.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $file = $request->file('image')->getClientOriginalName();
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'code' => $request->code,
            'description' => $request->description,
            'image' => '/products/' . $file,
            'price' => $request->price,
            'new' => $request->new,
            'hit' => $request->hit,
            'recommend' => $request->recommend,
            'count' => $request->count,
        ]);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->move(public_path('/storage/products'),$file);
        }

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('auth.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::get();
        return view('auth.products.form',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request,$id)
    {
        $file = $request->file('image')->getClientOriginalName();
        Product::find($id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'code' => $request->code,
            'description' => $request->description,
            'image' => '/products/' . $file,
            'price' => $request->price,
            'new' => $request->new,
            'hit' => $request->hit,
            'recommend' => $request->recommend,
            'count' => $request->count,
        ]);
        if ($request->has('image')){
            $path=$request->file('image')->move(public_path('/storage/products'),$file);
            $params['image']=$path;
        }
        foreach (['new','hit','recommend'] as $fieldName){
            if(!isset($params[$fieldName])) {
                $params[$fieldName] = 0;
            }
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
