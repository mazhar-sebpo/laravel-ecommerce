<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
   public function index(){
return view('admin.category.index');
   }
   public function create(){
    return view('admin.category.create');
       }

       public function store(CategoryFormRequest $request){
        $validateData = $request->validated();
        $category = new Category;
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']);
        $category->description = $validateData['description'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $request->status;
        $category->save();
        return redirect('admin/category')->with('message','Category Added Successfully');

       }

       public function show(Category $category){
        return view('admin.category.show',compact('category'));
       }
       public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
           }

           public function update(CategoryFormRequest $request,$category){
            $validateData = $request->validated();
            $category = Category::findORFail($category);
            $category->name = $validateData['name'];
            $category->slug = Str::slug($validateData['slug']);
            $category->description = $validateData['description'];
            if($request->hasFile('image')){
                $path = 'uploads/category/'.$category->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/category/',$filename);
                $category->image = $filename;
            }
            $category->meta_title = $validateData['meta_title'];
            $category->meta_keyword = $validateData['meta_keyword'];
            $category->meta_description = $validateData['meta_description'];
            $category->status = $request->status;
            $category->save();
            return redirect('admin/category')->with('message','Category updated Successfully');

           }
}
