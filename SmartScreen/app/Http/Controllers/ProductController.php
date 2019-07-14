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
	 * Developed by Khalil Abdeljawad
	 * For Insider PHP Hackathon
	 *
	 * Product marketing software
	 *
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//

	}

	// Doing all the work using the other functions
	public function getProductsToShow(Request $request){
		$data = json_decode($request['json_data']);

		$tags = [];
		foreach ($data as $datum)
		{
			$dataTag = new DataConverter(new Data(json_encode($datum)));
			$dataTag = $dataTag->convertData();
			foreach ($dataTag as $value)
				array_push($tags, $value);
		}
		//return $tags;
		$products = $this->getProductsByTag($tags);

		//return $products;
		$result = $this->sortProductsByTags($tags, $products);


		return $result;
		//return Date::getSeason("2019-07-13");
	}
	/**
	 * Sorts product according the number of selected tags
	 */

	public function sortProductsByTags($tags, $products){
		$products = array_unique($products);
		$productsArray=[];
		foreach ($products as $key => $value)
		{
			$productsArray[$key]= 0;

			foreach ($value->tags as $k => $v)
			{

				if(in_array($v->name, $tags)){

					$productsArray[$key] = $productsArray[$key]+1;
				}
			}
		}

		$sortedValues = $productsArray;
		rsort($sortedValues);
		$sortedValues = array_unique($sortedValues);

		$sortedArray = [];

		foreach ($sortedValues as $value)
		{
			foreach ($productsArray as $key => $val)
			{
				if($val == $value)
					array_push($sortedArray, $products[$key]);
			}
		}
		return $sortedArray;

//		return $sortValues;
//		return $productsArray;
	}

	/**
	 * Get products with their tags from data base based on $tags array
	 * param : $tags array
	 */
	public function getProductsByTag($tags)
	{
		$products = [];
		foreach ($tags as $tag)
		{
			$data = Product::with('tags')->whereHas('tags', function ($query) use(&$tag)
			{
				$query->where('name', '=', $tag);
			})->get();
			if(!empty($data[0]))
				foreach ($data as $datum)
					array_push($products, $datum);
		}

		return $products;

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
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$this->validate($request, [
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$product = new Product;

		$product->name = $request->name;
		$product->price = $request->get('price');
		$product->description = $request->get('description');
		$product->save();

		$tags = explode(',', $request->get('tags'));
		$tagsIds=[];
		foreach ($tags as $tag){
			$t = Tag::firstOrCreate(['name' => trim($tag)]);
			array_push($tagsIds, $t->id);
		}
		$product->tags()->attach($tagsIds);

		if ($request->hasFile('image'))
		{
			$image = $request->file('image');
			$name = $product->id . '.' . $image->getClientOriginalExtension();
			$destinationPath = public_path('/img/products/');
			$imagePath = $destinationPath . "/" . $name;
			$image->move($destinationPath, $name);
			$product->image = $name;
			$product->save();
		}



		return back()->with('success', 'Your product has been added successfully.');


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
	 * @param \App\Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		//
	}
}
