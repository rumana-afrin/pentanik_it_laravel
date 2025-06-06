<?php

namespace App\Http\Controllers;

use App\Helpers\CoreConstant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index()
    {
         $data['userShowClass'] = 'show';
        $data['allUserActiveClass'] = 'active';
        $data['users'] = User::all();
        return view('user.index')->with($data);
    }
    public function create()
    {
        $data['userShowClass'] = 'show';
        $data['userActiveClass'] = 'active';
        return view('user.create')->with($data);
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'designation' => 'string',
            'email' => 'required|email|unique:users',
            'phone' => 'string',
            'password' => ['required', Password::min(6)],
            'role' => 'required|string|in:super admin, admin, manager, sales man, user',

        ]);

        $data = new User();
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->role = $request->role;
        $data->password = Hash::make($request->password);
        $data->status = 1;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();
            $filename = pathinfo($file_name, PATHINFO_FILENAME);
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = preg_replace('/\s+/', '', $filename);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $file_name);
            $file_name = $file_name . '.' . $extension;
            $storage = $file->storeAs('upload', $file_name, 'public');
            $data->image = $storage;
        }

        $data->save();
        return redirect()->route('admin.all-user')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }
    public function edit($id)
    {
        $data['user'] = User::findOrFail($id);
        // dd($data['user']);
        return view('user.edit')->with($data);
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'designation' => 'string',
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($id),],
            'phone' => 'string',
            'role' => 'required|string|in:super admin, admin, manager, sales man, user',

        ]);

        $user = User::findOrFail($id);

        $data =  $request->only(['name', 'designation', 'email', 'phone', 'role']);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();
            $filename = pathinfo($file_name, PATHINFO_FILENAME);
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = preg_replace('/\s+/', '', $filename);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $file_name);
            $file_name = $file_name . '.' . $extension;
            $storage = $file->storeAs('upload', $file_name, 'public');

            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
            $data['image'] = $storage;
        }
        // dd($data);

        $user->update($data);
        return redirect()->route('admin.all-user')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }
        $user->delete();
        return redirect()->route('admin.all-user')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
