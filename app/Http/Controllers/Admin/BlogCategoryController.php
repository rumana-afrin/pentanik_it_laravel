<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BlogCategoryController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All Blog Category';
        $data['blogShowClass'] = 'show';
        $data['allBlogCategoryActiveClass'] = 'active';
        $data['blogCategory'] = BlogCategory::all();
        return view('blog.blog-category.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Add Blog Category';
        $data['blogShowClass'] = 'show';
        $data['createBlogCategoryActiveClass'] = 'active';
        return view('blog.blog-category.create')->with($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $slug = Str::slug($request->name, '-');

        $blog = new BlogCategory();
        $blog->name = $request->name;
        $blog->slug = $slug;
        $blog->description = $request->description;
        $blog->sort_order = $request->sort_order;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('blog_category', $name, 'public');
            $blog->image = $store;
        }
        $blog->save();
        return redirect()->route('admin.all-blog-category')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }
    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Blog Category';
        $data['blogShowClass'] = 'show';
        $data['createBlogCategoryActiveClass'] = 'active';
        $data['blogCategory'] = BlogCategory::with('blogs')->findOrFail($id);
        return view('blog.blog-category.edit')->with($data);
    }
    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $slug = Str::slug($request->name, '-');

        $blog = BlogCategory::findOrfail($id);
        $blog->name = $request->name;
        $blog->slug = $slug;
        $blog->description = $request->description;
        $blog->sort_order = $request->sort_order;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;

            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $store = $image->storeAs('blog_category', $name, 'public');
            $blog->image = $store;
        }
        $blog->save();
        return redirect()->route('admin.all-blog-category')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }
    public function destroy($id)
    {
        $blog_category = BlogCategory::findOrfail($id);

        if ($blog_category->image && Storage::disk('public')->exists($blog_category->image)) {
            Storage::disk('public')->delete($blog_category->image);
        }
        $blog_category->delete();
        $blog_category->blogs()->delete();
        return redirect()->route('admin.all-blog-category')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
