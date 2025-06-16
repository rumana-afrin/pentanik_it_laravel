<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkProcessController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Work Process';
        $data['workProcessShowClass'] = 'show';
        $data['allworkProcessActiveClass'] = 'active';
        $data['workProcess'] = WorkProcess::all();

        return view('work-process.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Work Process';
        $data['workProcessShowClass'] = 'show';
        $data['createworkProcessActiveClass'] = 'active';
        return view('work-process.create')->with($data);
    }
    public function store(Request $request)
    {
        $data['pageTitle'] = 'Work Process';
        $data['workProcessShowClass'] = 'show';
        $data['createworkProcessActiveClass'] = 'active';

        // dd($request->all());

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'step_number' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $work_process = new WorkProcess();

        $work_process->title = $request->title;
        $work_process->description = $request->description;
        $work_process->step_number = $request->step_number;
        $work_process->status = $request->status;


        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');
            $work_process->icon = $store;
        }

        $work_process->save();

        return redirect()->route('admin.all-work-process')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'Work Process';
        $data['workProcessShowClass'] = 'show';
        $data['createworkProcessActiveClass'] = 'active';
        $data['workProcess'] = WorkProcess::findOrFail($id);
        return view('work-process.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['pageTitle'] = 'Work Process';
        $data['workProcessShowClass'] = 'show';
        $data['createworkProcessActiveClass'] = 'active';

        // dd($request->all());

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'step_number' => 'required|string',

        ]);

        $work_process = WorkProcess::find($id);
        $work_process->title = $request->title;
        $work_process->description = $request->description;
        $work_process->step_number = $request->step_number;
        $work_process->status = $request->status;

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $orginalName = time() . '.' . $image->getClientOriginalName();
            $fileName = pathinfo($orginalName, PATHINFO_FILENAME);
            $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
            $imageName = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
            $name = $file_name . '.' . $extension;
            $store = $image->storeAs('upload', $name, 'public');

            if ($work_process->icon && Storage::disk('public')->exists($work_process->icon)) {
                Storage::disk('public')->delete($work_process->icon);
            }

            $work_process->icon = $store;
        }

        $work_process->save();
        return redirect()->route('admin.all-work-process')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }


    public function destroy($id)
    {
        $work_process = WorkProcess::findOrFail($id);
        $work_process->delete();
        return redirect()->route('admin.all-work-process')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
