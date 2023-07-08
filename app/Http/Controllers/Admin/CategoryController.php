<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        // Admin's Category Details
        $category = Category::all();
        return view('admin.category')->with(['categories' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create New Category by Admin
        return view('admin.add.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Data
        $category = $request->validate(
            [
                'name' => 'required|min:3|max:25',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]
        );

        $file = $request->file('image');
        $filename = $file->hashName();

        // Store image with hash name to storage directory
        $image_path = $request->file('image')->storeAs('admin/category', $filename, 'public');
        Category::create([
            'category_name' => $request->name,
            'category_image' => $filename,
        ]);

        return redirect('admin/category')->with(['message' => 'Category Created!']);
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
        $category = Category::findOrFail($id);

        return view('admin.edit.category')->with(['category' => $category]);
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
        // Validate Data
        $category = $request->validate([
            'name' => 'required|min:3|max:25',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('image')) {

            // Delete the first image
            if (file_exists('storage/admin/category/' . $category->category_image)) {
                unlink('storage/admin/category/' . $category->category_image);
            } elseif (file_exists('storage/organiser/category/' . $category->category_image)) {
                unlink('storage/organiser/category/' . $category->category_image);
            }

            // Update the category image
            $file = $request->file('image');
            $filename = $file->hashName();
            $image_path = $request->file('image')->storeAs('admin/category', $filename, 'public');
            $category->category_image = $filename;
        }

        // Update other category details
        $category->category_name = $request->name;
        $category->save();

        return redirect('admin/category')->with(['message' => 'Category Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete the first image
        if (file_exists('storage/admin/category/' . $category->category_image)) {
            unlink('storage/admin/category/' . $category->category_image);
        } elseif (file_exists('storage/organiser/category/' . $category->category_image)) {
            unlink('storage/organiser/category/' . $category->category_image);
        }

        // Delete the category record
        $category->delete();

        return redirect('admin/category')->with(['message' => 'Category Deleted!']);
    }
}
