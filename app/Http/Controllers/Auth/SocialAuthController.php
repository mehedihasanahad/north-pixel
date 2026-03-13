<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Inject Google credentials from SiteSettings into the config at runtime,
     * then redirect to Google's OAuth consent screen.
     */
    public function redirectToGoogle()
    {
        $this->configureGoogle();

        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     */
    public function handleGoogleCallback()
    {
        $this->configureGoogle();

        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => __('auth.google_failed')]);
        }

        // Find existing user by google_id or email
        $user = User::withTrashed()
            ->where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        if ($user) {
            // Restore soft-deleted users who log in via Google
            if ($user->trashed()) {
                $user->restore();
            }

            // Link google_id if not already set
            if (!$user->google_id) {
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar'    => $googleUser->getAvatar(),
                ]);
            }
        } else {
            // Create new user
            $user = User::create([
                'name'              => $googleUser->getName(),
                'email'             => $googleUser->getEmail(),
                'google_id'         => $googleUser->getId(),
                'avatar'            => $googleUser->getAvatar(),
                'email_verified_at' => now(), // Google already verified the email
                'role'              => 'user',
                'is_active'         => true,
                'preferred_language'=> app()->getLocale(),
            ]);
        }

        Auth::login($user, remember: true);

        return redirect()->intended(route('dashboard'));
    }

    private function configureGoogle(): void
    {
        $settings = SiteSetting::whereIn('key', ['google_client_id', 'google_client_secret'])
            ->pluck('value', 'key');

        Config::set('services.google', [
            'client_id'     => $settings->get('google_client_id', config('services.google.client_id')),
            'client_secret' => $settings->get('google_client_secret', config('services.google.client_secret')),
            'redirect'      => route('auth.google.callback'),
        ]);
    }
}
