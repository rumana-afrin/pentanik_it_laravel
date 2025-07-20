<?php


namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\FeatureIcon;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\Packagefeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All Package';
        $data['packageCategoryShowClass'] = 'show';
        $data['allpackageActiveClass'] = 'active';
        $data['package'] = Package::all();
        return view('package.package.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'All Package';
        $data['packageCategoryShowClass'] = 'show';
        $data['createpackageActiveClass'] = 'active';
        $data['packageCategory'] = PackageCategory::all();
        return view('package.package.create')->with($data);
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'package_name' => 'required|string',
            'package_subtitle' => 'nullable|string',
            'star_rating' => 'required|string',
            'price' => 'required|numeric',
            'currency' => 'nullable|string',
            'billing_period' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'package_feature' => 'required|array',
            'icon.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
        ]);

        $package = new Package();
        $package->package_category_id = $request->package_category_id;
        $package->package_name = $request->package_name;
        $package->package_subtitle = $request->package_subtitle;
        $package->star_rating = $request->star_rating;
        $package->price = $request->price;
        $package->currency = $request->currency;
        $package->billing_period = $request->billing_period;
        $package->display_order = $request->display_order ?? 0;
        $package->save();

        $featureTexts = $request->package_feature;
        $icons = $request->file('icon');

        foreach ($featureTexts as $index => $featureText) {
            $feature = Packagefeature::create([
                'package_id' => $package->id,
                'feature_text' => $featureText,
            ]);

            if ($icons && isset($icons[$index])) {
                // $file = $icons[$index];
                // $originalName = time() . '_' . $file->getClientOriginalName();
                // $fileName = pathinfo($originalName, PATHINFO_FILENAME);
                // $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                // $cleanName = preg_replace('/[^A-Za-z0-9\-]/', '', preg_replace('/\s+/', '', $fileName));
                // $finalName = $cleanName . '.' . $extension;

                // $imagePath = $file->storeAs('icon', $finalName, 'public');

                  $file = $icons[$index];

                $fileName = uniqid() . '_' . preg_replace('/\s+/', '', $file->getClientOriginalName());
                $imagePath = $file->storeAs('icon', $fileName, 'public');

                FeatureIcon::create([
                    'package_feature_id' => $feature->id,
                    'icon' => $imagePath,
                ]);
            }
        }

        // if ($package && $request->has('package_feature')) {
        //     $featureTexts = $request->package_feature;
        //     $icons = $request->file('icon');
        //     $insertData = [];

        //     foreach ($featureTexts as $index => $featureText) {
        //         $iconPath = null;

        //         if ($icons && isset($icons[$index])) {
        //             $file = $icons[$index];
        //             $orginalName = time() . '.' . $file->getClientOriginalName();
        //             $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
        //             $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
        //             $imageName = preg_replace('/\s+/', '', $fileName);
        //             $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
        //             $image_name = $file_name . '.' . $extension;

        //             $iconPath = $file->storeAs('upload', $image_name, 'public');
        //         }

        //         $insertData[] = [
        //             'package_id' => $package->id,
        //             'feature_text' => $featureText,
        //             'icon' => $iconPath,
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ];
        //     }

        //     Packagefeature::insert($insertData);
        // }

        return redirect()->route('admin.all-package')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }
    public function edit($id)
    {
        $data['pageTitle'] = 'All Package';
        $data['packageCategoryShowClass'] = 'show';
        $data['allpackageActiveClass'] = 'active';
        $data['packageCategory'] = PackageCategory::all();
        $data['package'] = Package::with('packageFeature.icon')->findOrfail($id);
        // dd($data['package']);
        return view('package.package.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'package_name' => 'required|string',
            'package_subtitle' => 'nullable|string',
            'star_rating' => 'required|string',
            'price' => 'required|numeric',
            'currency' => 'nullable|string',
            'billing_period' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'package_feature' => 'required|array',
            'icon.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
        ]);

        $package = Package::findOrfail($id);
        $package->package_category_id = $request->package_category_id;
        $package->package_name = $request->package_name;
        $package->package_subtitle = $request->package_subtitle;
        $package->star_rating = $request->star_rating;
        $package->price = $request->price;
        $package->currency = $request->currency;
        $package->billing_period = $request->billing_period;
        $package->display_order = $request->display_order ?? 0;
        $package->save();

        $currentFeatureIds = $package->packageFeature()->pluck('id')->toArray();
        $submittedFeatureIds = array_filter($request->feature_id ?? []);
        
        $featuresToDelete = array_diff($currentFeatureIds, $submittedFeatureIds);

        foreach ($featuresToDelete as $deletedId) {
            $deletedFeature = Packagefeature::find($deletedId);
            if ($deletedFeature) {
                if ($deletedFeature->icon && Storage::disk('public')->exists($deletedFeature->icon->icon)) {
                    Storage::disk('public')->delete($deletedFeature->icon->icon);
                }
                $deletedFeature->icon()?->delete();
                $deletedFeature->delete();
            }
        }

        $featureIds = $request->feature_id;
        $featureTexts = $request->package_feature;
        $icons = $request->file('icon');

        foreach ($featureTexts as $index => $text) {
            $featureId = $featureIds[$index] ?? null;

            if ($featureId) {
                $feature = Packagefeature::find($featureId);
                if (!$feature) continue;
                $feature->update(['feature_text' => $text]);
            } else {
                $feature = Packagefeature::create([
                    'package_id' => $package->id,
                    'feature_text' => $text,
                ]);
            }

            if ($icons && isset($icons[$index])) {
                $file = $icons[$index];

                if ($feature->icon && Storage::disk('public')->exists($feature->icon->icon)) {
                    Storage::disk('public')->delete($feature->icon->icon);
                }

                $fileName = uniqid() . '_' . preg_replace('/\s+/', '', $file->getClientOriginalName());
                $path = $file->storeAs('icon', $fileName, 'public');

                if ($feature->icon) {
                    $feature->icon->update(['icon' => $path]);
                } else {
                    FeatureIcon::create([
                        'package_feature_id' => $feature->id,
                        'icon' => $path,
                    ]);
                }
            }
        }



        // if ($package && $request->has('package_feature')) {
        //     $featureTexts = $request->package_feature;
        //     $icons = $request->file('icon');
        //     $insertData = [];
        //     $package->packageFeature()->delete();

        //     foreach ($featureTexts as $index => $featureText) {
        //         $iconPath = null;

        //         if ($icons && isset($icons[$index])) {
        //             $file = $icons[$index];
        //             $orginalName = time() . '.' . $file->getClientOriginalName();
        //             $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
        //             $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
        //             $imageName = preg_replace('/\s+/', '', $fileName);
        //             $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
        //             $image_name = $file_name . '.' . $extension;

        //             foreach ($package->packageFeature as $feature) {
        //                 if ($feature->icon && Storage::disk('public')->exists($feature->icon)) {
        //                     Storage::disk('public')->delete($feature->icon);
        //                 }
        //             }
        //             $iconPath = $file->storeAs('upload', $image_name, 'public');
        //         }
        //         $insertData[] = [
        //             'package_id' => $package->id,
        //             'feature_text' => $featureText,
        //             'icon' => $iconPath,
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ];
        //     }
        //     Packagefeature::insert($insertData);
        // }

        return redirect()->route('admin.all-package')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }

    public function destroy($id)
    {
        $package = Package::findOrfail($id);
        foreach ($package->packageFeature as $feature) {
            if ($feature->icon && Storage::disk('public')->exists($feature->icon)) {
                Storage::disk('public')->delete($feature->icon);
            }
        }
        $package->packageFeature()->delete();
        $package->delete();
        return redirect()->route('admin.all-package')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }
}
