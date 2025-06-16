<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogGalleryImage;
use App\Models\BlogTag;
use App\Models\SeoMetaTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Blog';
        $data['blogShowClass'] = 'show';
        $data['allblogActiveClass'] = 'active';
        $data['blogs'] = Blog::all();
        return view('blog.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Blog';
        $data['blogShowClass'] = 'show';
        $data['createblogActiveClass'] = 'active';
        // $data['serviceCategory'] = ServiceCategory::all();
        return view('blog.create')->with($data);
    }

    public function store(Request $request)
    {
        $data['pageTitle'] = 'Blog';
        $data['blogShowClass'] = 'show';
        $data['createblogActiveClass'] = 'active';

        // dd($request->all());
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'slug' => 'required|string|unique:blogs',
            'image_alt' => 'required|string',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'author_name' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->subtitle = $request->subtitle;
        $blog->slug = $request->slug;
        $blog->image_alt = $request->image_alt;
        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;
        $blog->author_name = $request->author_name;
        $blog->sort_order = $request->sort_order;
        $blog->status = "published";
        $blog->is_featured = $request->is_featured;


        if ($request->hasFile('thumbnail_image')) {
            $image = $request->file('thumbnail_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $blog->thumbnail_image = $store;
        }
        $blog->save();

        if ($blog) {
            if ($request->has('tag')) {
                $features = $request->input('tag');
                $insertData = [];

                foreach ($features as $feature) {
                    $insertData[] = [
                        'blog_id' => $blog->id,
                        'tag_name' => $feature,
                    ];
                }

                BlogTag::insert($insertData);
            }

            if ($request->hasFile('gallary_image')) {
                $images = $request->file('gallary_image');
                foreach ($images as $file) {
                    $orginalName = time() . '.' . $file->getClientOriginalName();
                    $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
                    $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
                    $imageName = preg_replace('/\s+/', '', $fileName);
                    $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
                    $image_name = $file_name . '.' . $extension;

                    $image_store = $file->storeAs('gallary_image', $image_name, 'public');

                    BlogGalleryImage::create([
                        'blog_id' => $blog->id,
                        'gallary_image' => $image_store,
                    ]);
                }
            }
        }

        //seo meta

        $seo = new SeoMetaTag();
        $seo->meta_title =  $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->auther = $request->auther;
        // $seo->canonical_url = $request->canonical_url ?? "";
        $seo->og_title = $request->og_title ?? "";
        $seo->og_description  = $request->og_description ?? "";
        $seo->og_type  = $request->og_type ?? "";
        // $seo->og_url  = $request->og_url ?? "";
        $seo->og_site_name  = $request->og_site_name ?? "";
        $seo->twitter_card  = $request->twitter_card ?? "";
        $seo->twitter_title  = $request->twitter_title ?? "";
        $seo->twitter_description  = $request->twitter_description ?? "";
        $seo->twitter_site  = $request->twitter_site ?? "";

        if ($request->hasFile('og_image')) {
            $image = $request->file('og_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $seo->og_image = $store;
        }
        if ($request->hasFile('twitter_image')) {
            $image = $request->file('twitter_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $seo->twitter_image = $store;
        }

        $blog->seoMetaTag()->save($seo);

        return redirect()->route('admin.all-blog')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'Blog';
        $data['blogShowClass'] = 'show';
        $data['allblogActiveClass'] = 'active';
        $data['blog'] = Blog::with('blogTags', 'blogGallaryImage', 'seoMetaTag')->findOrFail($id);
        // dd($data['blog']);
        return view('blog.edit')->with($data);
    }
    public function update(Request $request, $id)
    {
        $data['pageTitle'] = 'Blog';
        $data['blogShowClass'] = 'show';
        $data['allblogActiveClass'] = 'active';


       
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'slug' => 'required|string|unique:blogs,slug,' . $id,
            'image_alt' => 'required|string',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'author_name' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
        ]);

        $blog = Blog::findOrfail($id);
        $blog->title = $request->title;
        $blog->subtitle = $request->subtitle;
        $blog->slug = $request->slug;
        $blog->image_alt = $request->image_alt;
        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;
        $blog->author_name = $request->author_name;
        $blog->sort_order = $request->sort_order;
        $blog->status = "published";
        $blog->is_featured = $request->is_featured;


        if ($request->hasFile('thumbnail_image')) {
            $image = $request->file('thumbnail_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($blog->thumbnail_image && Storage::disk('public')->exists($blog->thumbnail_image)) {
                Storage::disk('public')->delete($blog->thumbnail_image);
            }
            $blog->thumbnail_image = $store;
        }
        $blog->save();

        if ($blog) {
            $blog->blogTags()->delete(); // Remove existing tags

            if ($request->has('tag')) {
                $tags = $request->input('tag');
                $insertData = [];

                foreach ($tags as $tag) {
                    $insertData[] = [
                        'blog_id' => $blog->id,
                        'tag_name' => $tag,
                    ];
                }

                BlogTag::insert($insertData);
            }

            if ($request->hasFile('gallary_image')) {
                $blog->blogGallaryImage()->delete();

                $galleries = BlogGalleryImage::where('blog_id', $blog->id)->get();
                foreach ($galleries as $image) {
                    if ($image->gallary_image && Storage::disk('public')->exists($image->gallary_image)) {
                        Storage::disk('public')->delete($image->gallary_image);
                    }
                }
                $images = $request->file('gallary_image');
                foreach ($images as $file) {
                    $orginalName = time() . '.' . $file->getClientOriginalName();
                    $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
                    $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
                    $imageName = preg_replace('/\s+/', '', $fileName);
                    $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
                    $image_name = $file_name . '.' . $extension;

                    $image_store = $file->storeAs('gallary_image', $image_name, 'public');

                    BlogGalleryImage::create([
                        'blog_id' => $blog->id,
                        'gallary_image' => $image_store,
                    ]);
                }
            }
        }

        //seo meta
        $seo = $blog->seoMetaTag ?? new SeoMetaTag();
        $seo->meta_title =  $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->auther = $request->auther;
        // $seo->canonical_url = $request->canonical_url ?? "";
        $seo->og_title = $request->og_title ?? "";
        $seo->og_description  = $request->og_description ?? "";
        $seo->og_type  = $request->og_type ?? "";
        // $seo->og_url  = $request->og_url ?? "";
        $seo->og_site_name  = $request->og_site_name ?? "";
        $seo->twitter_card  = $request->twitter_card ?? "";
        $seo->twitter_title  = $request->twitter_title ?? "";
        $seo->twitter_description  = $request->twitter_description ?? "";
        $seo->twitter_site  = $request->twitter_site ?? "";

        if ($request->hasFile('og_image')) {
            $image = $request->file('og_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($seo->og_image && Storage::disk('public')->exists($seo->og_image)) {
                Storage::disk('public')->delete($seo->og_image);
            }

            $seo->og_image = $store;
        }
        if ($request->hasFile('twitter_image')) {
            $image = $request->file('twitter_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($seo->twitter_image && Storage::disk('public')->exists($seo->twitter_image)) {
                Storage::disk('public')->delete($seo->twitter_image);
            }

            $seo->twitter_image = $store;
        }

        $blog->seoMetaTag()->save($seo);

        return redirect()->route('admin.all-blog')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }

    public function destroy($id)
    {
        $data = Blog::findOrFail($id);

        if ($data->thumbnail_image && Storage::disk('public')->exists($data->thumbnail_image)) {
            Storage::disk('public')->delete($data->thumbnail_image);
        }

        $galleries = BlogGalleryImage::where('blog_id', $data->id)->get();
        foreach ($galleries as $image) {
            if ($image->gallary_image && Storage::disk('public')->exists($image->gallary_image)) {
                Storage::disk('public')->delete($image->gallary_image);
            }
            $image->delete();
        }

        $seo = $data->seoMetaTag;
        if ($seo) {
            if ($seo->og_image && Storage::disk('public')->exists($seo->og_image)) {
                Storage::disk('public')->delete($seo->og_image);
            }

            if ($seo->twitter_image && Storage::disk('public')->exists($seo->twitter_image)) {
                Storage::disk('public')->delete($seo->twitter_image);
            }

            $seo->delete();
        }
        $data->delete();


        return redirect()->route('admin.all-team')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
