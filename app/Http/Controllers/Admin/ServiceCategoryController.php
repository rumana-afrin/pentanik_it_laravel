<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServiceFeatured;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'digital Services';
        $data['serviceCategoryShowClass'] = 'show';
        $data['allSrviceCategoryActiveClass'] = 'active';
        $data['serviceCategory'] = ServiceCategory::all();
        return view('digital-services.index')->with($data);
    }

    public function create()
    {
        $data['pageTitle'] = 'Digital Services';
        $data['serviceCategoryShowClass'] = 'show';
        $data['createSrviceCategoryActiveClass'] = 'active';
        return view('digital-services.create')->with($data);
    }

    public function store(Request $request)
    {
        $data['pageTitle'] = 'Digital Services';
        $data['serviceCategoryShowClass'] = 'show';
        $data['createSrviceCategoryActiveClass'] = 'active';

        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:service_categories,slug',
            'short_description' => 'required|string|max:350',
            'sort_order' => 'nullable|integer',
            'status' => 'required|string|in:featured,regular',
            'is_active' => 'required|boolean',
            'feature' => 'nullable|array',

        ]);

        $service_category = new ServiceCategory();
        $service_category->name = $request->name;
        $service_category->slug = $request->slug;
        $service_category->short_description = $request->short_description;
        $service_category->sort_order = $request->sort_order;
        $service_category->status = $request->status;
        $service_category->is_active = $request->is_active;

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $service_category->icon = $store;
        }


        $service_category->save();

        if ($service_category) {
            if ($request->has('feature')) {
                $features = $request->input('feature');
                $insertData = [];

                foreach ($features as $feature) {
                    $insertData[] = [
                        'service_category_id' => $service_category->id,
                        'name' => $feature,
                    ];
                }
                ServiceFeatured::insert($insertData);
            }
        }

        return redirect()->route('admin.all-service-category')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'Digital Services';
        $data['serviceCategoryShowClass'] = 'show';
        $data['createSrviceCategoryActiveClass'] = 'active';
        $data['serviceCategory'] = ServiceCategory::with('features')->findOrFail($id);
        return view('digital-services.edit')->with($data);
    }
    public function update(Request $request, $id)
    {
        $data['pageTitle'] = 'Digital Services';
        $data['serviceCategoryShowClass'] = 'show';
        $data['createSrviceCategoryActiveClass'] = 'active';

        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:service_categories,slug,' . $id,
            'short_description' => 'required|string|max:350',
            'sort_order' => 'nullable|integer',
            'status' => 'required|string|in:featured,regular',
            'is_active' => 'required|boolean',
            'feature' => 'nullable|array',
        ]);

        $service_category = ServiceCategory::find($id);
        $service_category->name = $request->name;
        $service_category->slug = $request->slug;
        $service_category->short_description = $request->short_description;
        $service_category->sort_order = $request->sort_order;
        $service_category->status = $request->status;
        $service_category->is_active = $request->is_active;

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($service_category->icon && Storage::disk('public')->exists($service_category->icon)) {
                Storage::disk('public')->delete($service_category->icon);
            }

            $service_category->icon = $store;
        }


        $service_category->save();

        if ($service_category) {
            if ($request->has('feature')) {

                $service_category->features()->delete();

                $features = $request->input('feature');
                $insertData = [];

                foreach ($features as $feature) {
                    $insertData[] = [
                        'service_category_id' => $service_category->id,
                        'name' => $feature,
                    ];
                }

                ServiceFeatured::insert($insertData);
            }
        }

        return redirect()->route('admin.all-service-category')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }

    public function destroy($id)
    {
        $service_category = ServiceCategory::findOrFail($id);
        $service_category->delete();
        $service_category->features()->delete();
        return redirect()->route('admin.all-service-category')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
