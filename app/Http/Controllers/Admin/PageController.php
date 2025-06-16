<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SeoMetaTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Page';
        $data['pageShowClass'] = 'show';
        $data['allPageActiveClass'] = 'active';
        $data['pages'] = Page::all();
        // dd($data['portfolio']);
        return view('page.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Page';
        $data['pageShowClass'] = 'show';
        $data['createPageActiveClass'] = 'active';
        return view('page.create')->with($data);
    }
    public function store(Request $request)
    {
        $data['pageTitle'] = 'Page';
        $data['pageShowClass'] = 'show';
        $data['createPageActiveClass'] = 'active';
        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'slug' => 'required|string|unique:pages',
            'short_content' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $page = new Page();
        $page->name = $request->name;
        $page->title = $request->title;
        $page->subtitle = $request->subtitle;
        $page->slug = $request->slug;
        $page->image_alt = $request->image_alt;
        $page->short_content = $request->short_content;
        $page->content = $request->content ?? "";
        $page->template = "default";
        $page->status = "active";
        $page->show_in_menu = false;
        $page->menu_type = $request->menu_type;
        $page->menu_order = 0;


        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $page->featured_image = $store;
        }
        $page->save();

        //seo meta
        $seo = new SeoMetaTag();
         $seo->meta_title =  $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->auther = $request->auther;
        // $seo->canonical_url = $request->canonical_url ?? "";
        $seo->og_title = $request->og_title ?? "";
        $seo->og_description  = $request->og_description ?? "";
        $seo->og_type = $request->og_type ?? 'website';
        // $seo->og_url  = $request->og_url ?? "";
        $seo->og_site_name  = $request->og_site_name ?? "";
        $seo->twitter_card = $request->twitter_card ?? 'summary';
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

        $page->seoMetaTag()->save($seo);

        return redirect()->route('admin.all-page')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'Page';
        $data['pageShowClass'] = 'show';
        $data['allPageActiveClass'] = 'active';
        $data['page'] = Page::findOrfail($id);
        return view('page.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['pageTitle'] = 'Page';
        $data['pageShowClass'] = 'show';
        $data['createPageActiveClass'] = 'active';

        $request->validate([
            'name' => 'required|string',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'slug' => 'required|string|unique:pages,slug,' . $id,
            'short_content' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $page = Page::findOrfail($id);
        $page->name = $request->name;
        $page->title = $request->title;
        $page->subtitle = $request->subtitle;
        $page->slug = $request->slug;
        $page->image_alt = $request->image_alt;
        $page->short_content = $request->short_content;
        $page->content = $request->content ?? "";
        $page->template = "default";
        $page->status = "active";
        $page->show_in_menu = false;
        $page->menu_type = $request->menu_type;
        $page->menu_order = 0;


        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($page->featured_image && Storage::disk('public')->exists($page->featured_image)) {
                Storage::disk('public')->delete($page->featured_image);
            }

            $page->featured_image = $store;
        }
        $page->save();

        //seo meta
        $seo = $page->seoMetaTag ?? new SeoMetaTag();
       $seo->meta_title =  $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->auther = $request->auther;
        // $seo->canonical_url = $request->canonical_url ?? "";
        $seo->og_title = $request->og_title ?? "";
        $seo->og_description  = $request->og_description ?? "";
        $seo->og_type = $request->og_type ?? 'website';
        // $seo->og_url  = $request->og_url ?? "";
        $seo->og_site_name  = $request->og_site_name ?? "";
        $seo->twitter_card = $request->twitter_card ?? 'summary';
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

        $page->seoMetaTag()->save($seo);

        return redirect()->route('admin.all-page')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }

    public function destroy($id)
    {
        $data = Page::findOrFail($id);
        if ($data->featured_image && Storage::disk('public')->exists($data->featured_image)) {
            Storage::disk('public')->delete($data->featured_image);
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

        return redirect()->route('admin.all-page')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
