<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Portfolio Category';
        $data['pCategoryShowClass'] = 'show';
        $data['allpCategoryActiveClass'] = 'active';
        $data['pCategory'] = PortfolioCategory::all();
        return view('portfolio.category.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Portfolio Category';
        $data['pCategoryShowClass'] = 'show';
        $data['createpCategoryActiveClass'] = 'active';
        return view('portfolio.category.create')->with($data);
    }
    public function store(Request $request)
    {
        $data['pageTitle'] = 'Portfolio Category';
        $data['pCategoryShowClass'] = 'show';
        $data['createpCategoryActiveClass'] = 'active';

        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:portfolio_categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,webp,jpeg',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',

        ]);

        $portfolioCategory = new PortfolioCategory();
        $portfolioCategory->name = $request->name;
        $portfolioCategory->slug = $request->slug;
        $portfolioCategory->image_alt = $request->image_alt;
        $portfolioCategory->description = $request->description;
        $portfolioCategory->sort_order = $request->sort_order;
        $portfolioCategory->is_active = $request->is_active;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $portfolioCategory->image = $store;
        }
        $portfolioCategory->save();



        return redirect()->route('admin.all-portfolio-category')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'Portfolio Category';
         $data['pCategoryShowClass'] = 'show';
        $data['allpCategoryActiveClass'] = 'active';
        $data['pCategory'] = PortfolioCategory::findOrfail($id);
        // dd($data['pCategory']);
        return view('portfolio.category.edit')->with($data);
    }
    public function update(Request $request, $id)
    {
        $data['pageTitle'] = 'Portfolio Category';
        $data['pCategoryShowClass'] = 'show';
        $data['allpCategoryActiveClass'] = 'active';
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:portfolio_categories,slug,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,webp,jpeg',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',

        ]);

        $portfolioCategory = PortfolioCategory::findOrfail($id);
        $portfolioCategory->name = $request->name;
        $portfolioCategory->slug = $request->slug;
        $portfolioCategory->image_alt = $request->image_alt;
        $portfolioCategory->description = $request->description;
        $portfolioCategory->sort_order = $request->sort_order;
        $portfolioCategory->is_active = $request->is_active;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($portfolioCategory->image && Storage::disk('public')->exists($portfolioCategory->image)) {
                Storage::disk('public')->delete($portfolioCategory->image);
            }
            $portfolioCategory->image = $store;
        }
        $portfolioCategory->save();
        return redirect()->route('admin.all-portfolio-category')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }

    public function destroy($id)
    {
        $portfolioCategory = PortfolioCategory::findOrfail($id);

        if ($portfolioCategory->image && Storage::disk('public')->exists($portfolioCategory->image)) {
            Storage::disk('public')->delete($portfolioCategory->image);
        }
        $portfolioCategory->delete();
        
        return redirect()->route('admin.all-portfolio-category')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
