<?php

namespace App\Http\Controllers;

use App\Helpers\CoreConstant;
use App\Models\Consult;
use App\Models\Package;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'message' => 'nullable|string',
        ]);
        $consult = new Consult();
        $consult->package_id = $request->package_id;
        $consult->full_name = $request->full_name;
        $consult->email = $request->email;
        $consult->phone = $request->phone;
        $consult->address = $request->address;
        $consult->message = $request->message;
        $consult->consent = $request->consent ?? 0;

        $consult->save();
        $id = $consult->id;
        return response()->json([
            'status' => 'success',
            'message' => 'Your request has been submitted successfully!',
            'consult_id' => $id,
        ]);
    }
    public function confirmetion($id)
    {
        $data['consult'] = Consult::findOrfail($id);
        $package_id = $data['consult']->package_id;
        $data['package'] = Package::with(['packageFeature', 'packageCategory'])->findOrfail($package_id);
        return view('frontend.confirm-consult')->with($data);
    }
    public function index()
    {
        $data['pageTitle'] = 'All Consulting Customer';
        $data['consultShowClass'] = 'show';
        $data['allConsultActiveClass'] = 'active';
        $data['consult'] = Consult::all();
        return view('package.consult-customer.index')->with($data);
    }
    public function show($id)
    {
        $data['pageTitle'] = 'All Consulting Customer';
        $data['consultShowClass'] = 'show';
        $data['allConsultActiveClass'] = 'active';

        $data['consult'] = Consult::findOrfail($id);
        $package_id = $data['consult']->package_id;
        $data['package'] = Package::with(['packageFeature', 'packageCategory'])->findOrfail($package_id);

        return view('package.consult-customer.show')->with($data);
    }
        public function destroy($id){

        $consult = Consult::findOrfail($id);
        $consult->delete();
        return redirect()->route('admin.all-consult')->with('success', CoreConstant::DELETED_SUCCESSFULLY);

    }
}
