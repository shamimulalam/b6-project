<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List of Categories';
        $data['categories'] = Category::orderBy('id','DESC')->paginate(5);
        return view('admin.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Category';
        return view('admin.category.create',$data);
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
            'name'      => 'required',
            'status'    => 'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        if($request->has('is_featured')){
            $category->is_featured = $request->is_featured;
        }

        if($request->hasFile('image')){
            $image_path = $this->fileUpload($request->file('image'));
            $category->image = $image_path;
        }
        $category->save();
        session()->flash('success','Category created successfully');
        return redirect()->route('category.index');
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
        $data['title'] = 'Edit Category';
        $data['category'] = Category::findOrFail($id);
        return view('admin.category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        if($request->has('is_featured')){
            $category->is_featured = $request->is_featured;
        }else{
            $category->is_featured = 0;
        }

        if($request->hasFile('image')){
            $image_path = $this->fileUpload($request->file('image'));
            if($category->image != null && file_exists($category->image)){
                unlink($category->image);
            }

            $category->image = $image_path;
        }
        $category->save();
        session()->flash('success','Category updated successfully');
        return redirect()->route('category.index');
    }
    private function fileUpload($img){
        $path = 'images/category';
        $file_name = rand(0000,9999).'_'.$img->getFilename().'.'.$img->getClientOriginalExtension();
        $img->move($path,$file_name);
        return $path.'/'.$file_name;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        session()->flash('success','Category deleted successfully');
        return redirect()->route('category.index');
    }
}
