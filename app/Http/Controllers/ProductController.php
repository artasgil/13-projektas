<?php

namespace App\Http\Controllers;

use App\Product;
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
        $products = Product::All();

        return view('product.index', ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $productsCount = $request->productsCount;

        if(!$productsCount) {
            $productsCount = 2;
        }

        if($request->productAdd == "plus") {
            $productsCount++;
        } else if($request->productAdd == "minus") {
            $productsCount--;
        }



        return view('product.create', ['productsCount' => $productsCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $product = new Product;
        $request->validate([
            "productTitle.*.title" => "required",
            "productPrice.*.price" => "required",
            "productExcerpt.*.excerpt" => "required",
            "productDescription.*.description" => "required",
        ]);

        $productsCount = count($request->productTitle);

        // foreach($request->productTitle as $productTitle) {

        // }

        for($i = 0; $i<$productsCount; $i++) {

        $product = new Product;

        $product->title = $request->productTitle[$i]['title'];
        $product->price = $request->productPrice[$i]['price'];
        $product->excerpt = $request->productExcerpt[$i]['excerpt'];
        $product->description = $request->productDescription[$i]['description'];
        $product->save();

        }



        //productTitle = masyvas ["Product1", "Product2"]
        //productPrice = masyvas
        //productExcerpt = masyvas
        //productDescription = masyvas

        // $product->title = $request->productTitle;
        // $product->price = $request->productPrice;
        // $product->excerpt = $request->productExcerpt;
        // $product->description = $request->productDescription;

        // $product->save();
        return redirect()->route("product.index");

        // return $request->productTitle;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
