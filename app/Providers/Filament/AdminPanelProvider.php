<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Settings;
use App\Filament\Widgets\StatsOverview;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Support\HtmlString;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('NORTH PIXEL')
            ->brandLogo(new HtmlString('
                <span style="display:inline-flex;align-items:center;gap:0.5rem;">
                    <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="height:2rem;width:auto;">
                        <defs>
                            <linearGradient id="adm-g" x1="0" y1="0" x2="40" y2="40" gradientUnits="userSpaceOnUse">
                                <stop offset="0%"   stop-color="#7C3AED"/>
                                <stop offset="55%"  stop-color="#A855F7"/>
                                <stop offset="100%" stop-color="#F59E0B"/>
                            </linearGradient>
                        </defs>
                        <polygon points="20,2 38,20 20,38 2,20" fill="url(#adm-g)" opacity="0.18"/>
                        <polygon points="20,2 38,20 20,38 2,20" fill="none" stroke="url(#adm-g)" stroke-width="1.5"/>
                        <line x1="20" y1="6"  x2="20" y2="34" stroke="url(#adm-g)" stroke-width="2" stroke-linecap="round"/>
                        <line x1="6"  y1="20" x2="34" y2="20" stroke="url(#adm-g)" stroke-width="2" stroke-linecap="round"/>
                        <rect x="16" y="16" width="8" height="8" rx="1.5" fill="url(#adm-g)"/>
                        <circle cx="20" cy="6"  r="1.8" fill="#F59E0B"/>
                        <circle cx="20" cy="34" r="1.2" fill="#7C3AED"/>
                        <circle cx="6"  cy="20" r="1.2" fill="#7C3AED"/>
                        <circle cx="34" cy="20" r="1.2" fill="#A855F7"/>
                    </svg>
                    <span style="display:flex;flex-direction:column;line-height:1;font-weight:900;letter-spacing:0.04em;">
                        <span style="font-size:0.9rem;color:#F4F4F5;letter-spacing:0.08em;">NORTH</span>
                        <span style="font-size:0.75rem;letter-spacing:0.22em;background:linear-gradient(135deg,#7C3AED,#A855F7,#F59E0B);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">PIXEL</span>
                    </span>
                </span>
            '))
            ->brandLogoHeight('2.5rem')
            ->favicon(asset('favicon.svg'))
            ->colors([
                'primary' => Color::Violet,
                'warning' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
                Settings::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                StatsOverview::class,
            ])
            ->navigationGroups([
                'Catalog',
                'Inquiries',
                'Users',
                'System',
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
