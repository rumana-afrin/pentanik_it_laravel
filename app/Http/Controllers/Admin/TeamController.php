<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Team';
        $data['teamShowClass'] = 'show';
        $data['allteamActiveClass'] = 'active';
        $data['teams'] = Team::all();

        return view('team.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Team';
        $data['teamShowClass'] = 'show';
        $data['createteamActiveClass'] = 'active';
        return view('team.create')->with($data);
    }
    public function store(Request $request)
    {
        $data['pageTitle'] = 'Team';
        $data['teamShowClass'] = 'show';
        $data['createteamActiveClass'] = 'active';

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

        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->bio = $request->bio;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->experience_years = $request->experience_years;
        $team->sort_order = $request->sort_order ?? 0;
        $team->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $team->image = $store;
        }
        $team->save();

        if ($team) {
            if ($request->has('skill')) {
                $skills = $request->input('skill');
                $insertData = [];

                foreach ($skills as $skill) {
                    $insertData[] = [
                        'team_id' => $team->id,
                        'name' => $skill,
                    ];
                }
                Skill::insert($insertData);
            }
        }

        return redirect()->route('admin.all-team')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }
    public function edit($id)
    {
        $data['pageTitle'] = 'Team';
        $data['teamShowClass'] = 'show';
        $data['createteamActiveClass'] = 'active';
        $data['team'] = Team::with('skills')->findOrFail($id);
        // dd($data['team']);
        return view('team.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['pageTitle'] = 'Team';
        $data['teamShowClass'] = 'show';
        $data['createteamActiveClass'] = 'active';

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

        $team = Team::find($id);
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->bio = $request->bio;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->experience_years = $request->experience_years;
        $team->sort_order = $request->sort_order ?? 0;
        $team->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }
            $team->image = $store;
        }
        $team->save();

        if ($team) {
            if ($request->has('skill')) {
                $team->skills()->delete();
                $skills = $request->input('skill');
                $insertData = [];

                foreach ($skills as $skill) {
                    $insertData[] = [
                        'team_id' => $team->id,
                        'name' => $skill,
                    ];
                }
                Skill::insert($insertData);
            }
        }

        return redirect()->route('admin.all-team')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }

    public function destroy($id)
    {
        $data = Team::findOrfail($id);

        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        $data->skills()->delete();

        return redirect()->route('admin.all-team')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
