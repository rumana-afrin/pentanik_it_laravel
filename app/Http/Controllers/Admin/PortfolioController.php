<?php


namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\SeoMetaTag;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Portfolio';
        $data['pCategoryShowClass'] = 'show';
        $data['allportfolioActiveClass'] = 'active';
        $data['portfolio'] = Portfolio::with('category')->get();
        // dd($data['portfolio']);
        return view('portfolio.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Portfolio';
        $data['pCategoryShowClass'] = 'show';
        $data['createportfolioActiveClass'] = 'active';
        $data['category'] = PortfolioCategory::all();
        return view('portfolio.create')->with($data);
    }
    public function store(Request $request)
    {
        $data['pageTitle'] = 'Portfolio';
        $data['pCategoryShowClass'] = 'show';
        $data['createportfolioActiveClass'] = 'active';

        // dd($request->all());
        $request->validate([
            'portfolio_category_id' => 'required',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'slug' => 'required|string|unique:portfolios,slug',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'client_name' => 'nullable|string',
            'project_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'featured_image' => 'required|image|mimes:jpg,png,webp,jpeg',
        ]);


        $portfolio = new Portfolio();
        $portfolio->portfolio_category_id = $request->portfolio_category_id;
        $portfolio->title = $request->title;
        $portfolio->subtitle = $request->subtitle;
        $portfolio->slug = $request->slug;
        $portfolio->image_alt = $request->image_alt;
        $portfolio->short_description = $request->short_description;
        $portfolio->description = $request->description;
        $portfolio->client_name = $request->client_name;
        $portfolio->project_url = $request->project_url;
        $portfolio->sort_order = $request->sort_order ?? 0;
        $portfolio->is_featured = $request->is_featured ?? false;
        $portfolio->is_active = $request->is_active ?? 1;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $portfolio->featured_image = $store;
        }
        $portfolio->save();

        if ($portfolio) {
            if ($request->has('technology')) {
                $technology = $request->input('technology');
                $insertData = [];

                foreach ($technology as $tech) {
                    $insertData[] = [
                        'portfolio_id' => $portfolio->id,
                        'name' => $tech,
                    ];
                }
                Technology::insert($insertData);
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

        $portfolio->seoMetaTag()->save($seo);

        return redirect()->route('admin.all-portfolio')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'Portfolio';
        $data['pCategoryShowClass'] = 'show';
        $data['allportfolioActiveClass'] = 'active';
        $data['category'] = PortfolioCategory::all();
        $data['portfolio'] = Portfolio::findOrfail($id);
        return view('portfolio.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['pageTitle'] = 'Portfolio';
        $data['pCategoryShowClass'] = 'show';
        $data['createportfolioActiveClass'] = 'active';

        // dd($request->all());
        $request->validate([
            'portfolio_category_id' => 'required',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'slug' => 'required|string|unique:portfolios,slug,' . $id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'client_name' => 'nullable|string',
            'project_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $portfolio = Portfolio::findOrfail($id);
        $portfolio->portfolio_category_id = $request->portfolio_category_id;
        $portfolio->title = $request->title;
        $portfolio->subtitle = $request->subtitle;
        $portfolio->slug = $request->slug;
        $portfolio->image_alt = $request->image_alt;
        $portfolio->short_description = $request->short_description;
        $portfolio->description = $request->description;
        $portfolio->client_name = $request->client_name;
        $portfolio->project_url = $request->project_url;
        $portfolio->sort_order = $request->sort_order ?? 0;
        $portfolio->is_featured = $request->is_featured ?? false;
        $portfolio->is_active = $request->is_active ?? 1;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($portfolio->featured_image && Storage::disk('public')->exists($portfolio->featured_image)) {
                Storage::disk('public')->delete($portfolio->featured_image);
            }

            $portfolio->featured_image = $store;
        }
        $portfolio->save();

        if ($portfolio) {
            if ($request->has('technology')) {
                $portfolio->technologies()->delete();

                $technology = $request->input('technology');
                $insertData = [];

                foreach ($technology as $tech) {
                    $insertData[] = [
                        'portfolio_id' => $portfolio->id,
                        'name' => $tech,
                    ];
                }
                Technology::insert($insertData);
            }
        }

        //seo meta

        $seo = $portfolio->seoMetaTag ?? new SeoMetaTag();
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

        $portfolio->seoMetaTag()->save($seo);

        return redirect()->route('admin.all-portfolio')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }

    public function destroy($id)
    {

        $data = Portfolio::findOrFail($id);

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

        return redirect()->route('admin.all-portfolio')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
