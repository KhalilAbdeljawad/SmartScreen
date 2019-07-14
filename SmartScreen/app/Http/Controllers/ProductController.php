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
		$data = json_decode('[
  {
    "name": "time",
    "value": "12"
  },

  {
    "name": "date",
    "value": "2019-07-13"
  },

  {
    "name": "temperature",
    "value": "25"
  }
]
');

		$tags = [];
		foreach ($data as $datum)
		{
			$dataTag = new DataConverter(new Data(json_encode($datum)));
			$dataTag = $dataTag->convertData();
			foreach ($dataTag as $value)
				array_push($tags, $value);
		}
		//return $tags;
		return $this->getProductsByTag($tags);
		//return Date::getSeason("2019-07-13");
	}

	/**
	 *
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
			$t = Tag::firstOrCreate(['name' => $tags]);
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
