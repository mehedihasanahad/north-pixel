<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function __invoke(Request $request, string $locale): RedirectResponse
    {
        abort_if(! in_array($locale, ['en', 'bn']), 404);

        session(['locale' => $locale]);

        return back();
    }
}
