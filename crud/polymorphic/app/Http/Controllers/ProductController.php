<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Photo;
use App\Models\Product;
use Exception;
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
        $products = Product::all();
        return view('product/product-list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/product-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        try {
            $product = new Product(["title" => $request->title, 'price' => str_replace(",", ".", str_replace(".", "", $request->price))]);
            $product->save();
            $product->photo()->save(new Photo(['path' => $request->path]));
            return redirect()->route('product.index')->with('message', __('messages.success_operation'));
        } catch (Exception $e) {
            return back()->with('error', [['title' => __('messages.error_operation'), 'details' => $e->getMessage()]]);
        }
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
        return view('product/product-update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $validated = $request->validated();
        try {
            $product = Product::find($id);
            $product->title = $request->title;
            $product->price = str_replace(",", ".", str_replace(".", "", $request->price));
            $product->update();
            $product->photo()->update(['path' => $request->path]);
            return redirect()->route('product.index')->with('message', __('messages.success_operation'));
        } catch (Exception $e) {
            return back()->with('error', [['title' => __('messages.error_operation'), 'details' => $e->getMessage()]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
