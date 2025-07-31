<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All FAQ';
        $data['faqShowClass'] = 'show';
        $data['allfaqActiveClass'] = 'active';
        $data['faqs'] = Faq::all();
        return view('faq.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'All FAQ';
        $data['faqShowClass'] = 'show';
        $data['pageSlug'] = Page::pluck('slug');
        $data['createfaqActiveClass'] = 'active';
        return view('faq.create')->with($data);
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->category = $request->category ?? 'home';
        $faq->sort_order = $request->sort_order ?? 0;
        $faq->save();

        return redirect()->route('admin.all-faq')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
    }
    public function edit($id)
    {
        $data['pageTitle'] = 'All FAQ';
        $data['faqShowClass'] = 'show';
        $data['allfaqActiveClass'] = 'active';
        $data['faq'] = Faq::findOrFail($id);
        $data['pageSlug'] = Page::pluck('slug');
        return view('faq.edit')->with($data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->category = $request->category ?? 'home';
        $faq->sort_order = $request->sort_order ?? 0;
        $faq->save();

        return redirect()->route('admin.all-faq')->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('admin.all-faq')->with('success', CoreConstant::DELETED_SUCCESSFULLY);
    }
}
