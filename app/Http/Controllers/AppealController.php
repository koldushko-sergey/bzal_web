<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\SubmissionService;
use Illuminate\Http\Request;

class AppealController extends Controller
{
    public function __construct(private SubmissionService $submissions) {}
    public function citizens()
    {
        $page = Page::where('slug', 'citizens')->where('is_published', true)->firstOrFail();

        return view('appeals.citizens', compact('page'));
    }

    public function business()
    {
        $page = Page::where('slug', 'business')->where('is_published', true)->firstOrFail();

        return view('appeals.business', compact('page'));
    }

    public function storeCitizens(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string|max:5000',
        ]);

        $this->submissions->store('citizen_appeal', $data, $request);

        return back()->with('success', 'Ваше обращение принято. Мы свяжемся с вами в ближайшее время.');
    }

    public function storeBusiness(Request $request)
    {
        $data = $request->validate([
            'company' => 'required|string|max:255',
            'unp' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'message' => 'required|string|max:5000',
        ]);

        $this->submissions->store('business_appeal', $data, $request);

        return back()->with('success', 'Ваше обращение принято. Мы свяжемся с вами в ближайшее время.');
    }
}
