<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table      = 'site_settings';
    protected $primaryKey = 'key';
    public    $incrementing = false;
    protected $keyType    = 'string';
    public    $timestamps = false;

    protected $fillable = ['key', 'value', 'description'];

    public static function get(string $key, string $default = ''): string
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    public static function allKeyed(): array
    {
        return static::pluck('value', 'key')->toArray();
    }
}
