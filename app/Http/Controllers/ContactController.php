<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\SiteSetting;
use App\Services\SubmissionService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(private SubmissionService $submissions) {}
    public function index()
    {
        $page = Page::where('slug', 'contacts')->where('is_published', true)->firstOrFail();

        return view('contacts.index', [
            'page' => $page,
            'phone' => SiteSetting::get('phone'),
            'phoneMarketing' => SiteSetting::get('phone_marketing'),
            'email' => SiteSetting::get('email'),
            'address' => SiteSetting::get('address'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string|max:5000',
        ]);

        $this->submissions->store('contact', $data, $request);

        return back()->with('success', 'Сообщение отправлено. Мы свяжемся с вами в ближайшее время.');
    }
}
