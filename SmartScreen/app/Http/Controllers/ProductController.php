<?php

namespace App\Http\Controllers;

use App\Classes\Data;
use App\Classes\DataConverter;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use App\Classes\Date;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $d = new DataConverter(new Data('{"name":"date", "value":"2019-07-13"}'));
	    return $d->convertData();
	    return Date::getSeason("2019-07-13");
    }

	/**
	 *
	 */
	public function getProductsByTag(){
		return Product::whereHas('tags', function ($query){
			$query->where('name', '=', 'cold');
		})->get();

	}




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	return view('product');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

	    $this->validate($request, [
		    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	    ]);

	    $product = new Product;

	    if ($request->hasFile('image')) {
		    $image = $request->file('image');
		    $name = str_slug($request->name).'.'.$image->getClientOriginalExtension();
		    $destinationPath = public_path('/img/products/');
		    $imagePath = $destinationPath. "/".  $name;
		    $image->move($destinationPath, $name);
		    $product->image = $name;
	    }
		return $product;
	    $product->title = $request->get('title');
	    $product->category_id = $request->get('category_id');
	    // $article->image = str_slug($request->get('image'));
	    $product->subtitle = $request->get('subtitle');
	    $product->description = $request->get('description');

	    $product->save();
	    return back()->with('success', 'Your article has been added successfully. Please wait for the admin to approve.');





	    $product->name = 'IceCream';
	    $product->description = 'Good Ice cream';
	    $product->price = 4.0;
	    $product->image = "";

	    $product->save();

	    $category = Tag::find([1, 2]);
	    $product->tags()->attach($category);

	    return 'Success';
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
