<?php

namespace App\Http\Controllers;

use App\Models\CustomRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomRequestController extends Controller
{
    public function index(): View
    {
        return view('pages.custom-request');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'                => ['required', 'string', 'max:100'],
            'email'               => ['required', 'email', 'max:191'],
            'phone'               => ['required', 'string', 'max:20'],
            'project_type'        => ['required', 'in:' . implode(',', array_keys(CustomRequest::$projectTypes))],
            'project_description' => ['required', 'string', 'min:50'],
            'budget'              => ['required', 'in:' . implode(',', array_keys(CustomRequest::$budgets))],
            'deadline'            => ['nullable', 'string', 'max:100'],
            'preferred_contact'   => ['required', 'in:whatsapp,messenger,email'],
            'reference_links'     => ['nullable', 'array', 'max:3'],
            'reference_links.*'   => ['nullable', 'url', 'max:500'],
            'message'             => ['nullable', 'string', 'max:2000'],
        ]);

        // Filter out empty reference links
        if (isset($data['reference_links'])) {
            $data['reference_links'] = array_values(array_filter($data['reference_links']));
            if (empty($data['reference_links'])) {
                $data['reference_links'] = null;
            }
        }

        $data['user_id'] = auth()->id();

        CustomRequest::create($data);

        return redirect()->route('custom-request.success');
    }

    public function success(): View
    {
        return view('pages.custom-request-success');
    }
}
