<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\Advisory;
use App\Models\AdvisorySkills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvisoryController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All Advisory';
        $data['advisoryShowClass'] = 'show';
        $data['allAdvisoryActiveClass'] = 'active';
        $data['advisory'] = Advisory::all();
        return view('advisory.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Create Advisory';
        $data['advisoryShowClass'] = 'show';
        $data['createAdvisoryActiveClass'] = 'active';
        return view('advisory.create')->with($data);
    }
    public function store(Request $request)
    {
        $data['pageTitle'] = 'Team';
        $data['advisoryShowClass'] = 'show';
        $data['createAdvisoryActiveClass'] = 'active';

        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,webp,jpeg',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'experience_years' => 'nullable|integer',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|integer|in:0,1',
            'skill' => 'nullable|array',
            'skill.*' => 'nullable|string'
        ]);

        $advisory = new Advisory();
        $advisory->name = $request->name;
        $advisory->designation = $request->designation;
        $advisory->bio = $request->bio;
        $advisory->email = $request->email;
        $advisory->phone = $request->phone;
        $advisory->experience_years = $request->experience_years;
        $advisory->sort_order = $request->sort_order ?? 0;
        $advisory->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $advisory->image = $store;
        }
        $advisory->save();

        if ($advisory) {
            if ($request->has('skill')) {
                $skills = $request->input('skill');
                $insertData = [];

                foreach ($skills as $skill) {
                    $insertData[] = [
                        'advisory_id' => $advisory->id,
                        'name' => $skill,
                    ];
                }
                AdvisorySkills::insert($insertData);
            }
        }

        return redirect()->route('admin.all-advisory')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }
    public function edit($id)
    {
       $data['pageTitle'] = 'All Advisory';
        $data['advisoryShowClass'] = 'show';
        $data['allAdvisoryActiveClass'] = 'active';
        $data['advisory'] = Advisory::with('advisorySkills')->findOrFail($id);
        // dd($data['advisory']);
        return view('advisory.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['pageTitle'] = 'Team';
        $data['advisoryShowClass'] = 'show';
        $data['createAdvisoryActiveClass'] = 'active';
        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'bio' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'experience_years' => 'nullable|integer',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|integer|in:0,1',
            'skill' => 'nullable|array',
            'skill.*' => 'nullable|string'
        ]);

        $advisory = Advisory::find($id);
        $advisory->name = $request->name;
        $advisory->designation = $request->designation;
        $advisory->bio = $request->bio;
        $advisory->email = $request->email;
        $advisory->phone = $request->phone;
        $advisory->experience_years = $request->experience_years;
        $advisory->sort_order = $request->sort_order ?? 0;
        $advisory->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($advisory->image && Storage::disk('public')->exists($advisory->image)) {
                Storage::disk('public')->delete($advisory->image);
            }
            $advisory->image = $store;
        }
        $advisory->save();

        if ($advisory) {
            if ($request->has('skill')) {
                $advisory->advisorySkills()->delete();
                $skills = $request->input('skill');
                $insertData = [];

                foreach ($skills as $skill) {
                    $insertData[] = [
                        'advisory_id' => $advisory->id,
                        'name' => $skill,
                    ];
                }
                AdvisorySkills::insert($insertData);
            }
        }

        return redirect()->route('admin.all-advisory')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }

        public function destroy($id)
    {
        $data = Advisory::findOrfail($id);

        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        $data->advisorySkills()->delete();

        return redirect()->route('admin.all-advisory')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
