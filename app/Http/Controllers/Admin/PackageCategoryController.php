<?php


namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\PackageCategory;
use Illuminate\Http\Request;

class PackageCategoryController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All Package Category';
        $data['packageCategoryShowClass'] = 'show';
        $data['allpackageCategoryActiveClass'] = 'active';
        $data['packageCategory'] = PackageCategory::all();
        return view('package.package-category.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Create Package Category';
        $data['packageCategoryShowClass'] = 'show';
        $data['createpackageCategoryActiveClass'] = 'active';
        return view('package.package-category.create')->with($data);
    }
    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'status' => 'nullable|boolean|in:0,1',

        ]);

        $packageCategory = new PackageCategory();
        $packageCategory->title = $request->title;
        $packageCategory->subtitle = $request->subtitle;
        $packageCategory->display_order = $request->display_order ?? 0;
        $packageCategory->status = $request->status ?? 1;
        $packageCategory->save();

        return redirect()->route('admin.all-package-category')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'All Package Category';
        $data['packageCategoryShowClass'] = 'show';
        $data['allpackageCategoryActiveClass'] = 'active';
        $data['packageCategory'] = PackageCategory::findOrFail($id);
        return view('package.package-category.edit')->with($data);
    }
    public function update(Request $request, $id)
    {

        // dd($request->all());

        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'status' => 'nullable|boolean|in:0,1',

        ]);

        $packageCategory = PackageCategory::findOrFail($id);
        $packageCategory->title = $request->title;
        $packageCategory->subtitle = $request->subtitle;
        $packageCategory->display_order = $request->display_order ?? 0;
        $packageCategory->status = $request->status ?? 1;
        $packageCategory->save();

        return redirect()->route('admin.all-package-category')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }
    public function destroy($id)
    {
        $packageCategory = PackageCategory::findOrFail($id);
        $packageCategory->delete();

        return redirect()->route('admin.all-package-category')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
