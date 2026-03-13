<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'System';
    protected static ?int    $navigationSort  = 10;
    protected static string  $view            = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site Identity')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('site_name_en')
                                ->label('Site Name (English)')
                                ->required(),
                            Forms\Components\TextInput::make('site_name_bn')
                                ->label('Site Name (Bangla)')
                                ->required(),
                        ]),
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('site_tagline_en')
                                ->label('Tagline (English)'),
                            Forms\Components\TextInput::make('site_tagline_bn')
                                ->label('Tagline (Bangla)'),
                        ]),
                    ]),

                Forms\Components\Section::make('Contact & Social')
                    ->schema([
                        Forms\Components\TextInput::make('contact_email')
                            ->label('Contact Email')
                            ->email(),

                        Forms\Components\TextInput::make('whatsapp_number')
                            ->label('WhatsApp Number')
                            ->placeholder('+8801700000000'),

                        Forms\Components\TextInput::make('messenger_url')
                            ->label('Messenger URL')
                            ->url()
                            ->placeholder('https://m.me/yourpage'),

                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('facebook_url')
                                ->label('Facebook URL')
                                ->url(),
                            Forms\Components\TextInput::make('linkedin_url')
                                ->label('LinkedIn URL')
                                ->url(),
                        ]),

                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('address_en')
                                ->label('Address (English)'),
                            Forms\Components\TextInput::make('address_bn')
                                ->label('Address (Bangla)'),
                        ]),
                    ]),

                Forms\Components\Section::make('Order Messages')
                    ->schema([
                        Forms\Components\Textarea::make('whatsapp_order_msg_en')
                            ->label('WhatsApp Order Message (English)')
                            ->helperText('Use {product_title} as placeholder')
                            ->rows(3),
                        Forms\Components\Textarea::make('whatsapp_order_msg_bn')
                            ->label('WhatsApp Order Message (Bangla)')
                            ->helperText('Use {product_title} as placeholder')
                            ->rows(3),
                    ]),

                Forms\Components\Section::make('Google Sign-In')
                    ->description('Credentials from Google Cloud Console → APIs & Services → Credentials')
                    ->schema([
                        Forms\Components\TextInput::make('google_client_id')
                            ->label('Google Client ID')
                            ->placeholder('xxxxxxxxxxxx.apps.googleusercontent.com')
                            ->helperText('Authorized redirect URI must be: ' . url('/auth/google/callback')),
                        Forms\Components\TextInput::make('google_client_secret')
                            ->label('Google Client Secret')
                            ->password()
                            ->revealable()
                            ->placeholder('GOCSPX-…'),
                    ]),

                Forms\Components\Section::make('System')
                    ->schema([
                        Forms\Components\TextInput::make('preview_token_ttl_hours')
                            ->label('Preview Token TTL (hours)')
                            ->numeric()
                            ->default(24),
                        Forms\Components\Toggle::make('maintenance_mode')
                            ->label('Maintenance Mode')
                            ->formatStateUsing(fn ($state) => (bool) $state)
                            ->dehydrateStateUsing(fn ($state) => $state ? '1' : '0'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'updated_at' => now()]
            );
        }

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }
}
