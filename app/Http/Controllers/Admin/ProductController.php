<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
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
        $data['title'] = 'List of products';
        $data['products'] = Product::orderBy('id','DESC')->paginate('5');
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new product';
        $data['categories'] = Category::all();
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,png'
        ]);
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->stock = $request->stock;

        if($request->hasFile('image')){
            $image_path = $this->fileUpload($request->file('image'));
            $product->image = $image_path;
        }
        $product->save();
        session()->flash('success','Product created successfully');
        return redirect()->route('product.index');
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
        $data['title'] = 'Edit product';
        $data['categories'] = Category::all();
        $data['product'] = $product;
        return view('admin.product.edit',$data);
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
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,png'
        ]);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->stock = $request->stock;
        if($request->hasFile('image')){
            $image_path = $this->fileUpload($request->file('image'));
            if($product->image != null && file_exists($product->image)){
                unlink($product->image);
            }

            $product->image = $image_path;
        }

        $product->save();

        session()->flash('success','Product updated successfully');
        return redirect()->route('product.index');
    }
    private function fileUpload($img){
        $path = 'images/product';
        $file_name = rand(0000,9999).'_'.$img->getFilename().'.'.$img->getClientOriginalExtension();
        $img->move($path,$file_name);
        return $path.'/'.$file_name;
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
        session()->flash('success','Product deleted successfully');
        return redirect()->route('product.index');
    }
}
