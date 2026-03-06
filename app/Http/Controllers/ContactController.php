<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:191'],
            'phone'   => ['nullable', 'string', 'max:20'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        ContactMessage::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'subject'    => $request->subject,
            'message'    => $request->message,
            'created_at' => now(),
        ]);

        return back()->with('success', true);
    }
}
