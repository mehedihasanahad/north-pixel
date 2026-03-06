<?php

namespace App\Http\Controllers;

use App\Models\CustomRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $inquiries = CustomRequest::where('user_id', $user->id)
            ->orWhere('email', $user->email)
            ->orderByDesc('created_at')
            ->get();

        return view('pages.dashboard', compact('user', 'inquiries'));
    }
}
