<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomRequest extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'project_type',
        'project_description', 'budget', 'deadline',
        'preferred_contact', 'reference_links', 'message',
        'status', 'admin_notes',
    ];

    protected $casts = [
        'reference_links' => 'array',
    ];

    public static array $projectTypes = [
        'custom_website'      => 'Custom Website',
        'ecommerce_store'     => 'E-Commerce Store',
        'mobile_app_android'  => 'Mobile App (Android)',
        'mobile_app_ios'      => 'Mobile App (iOS)',
        'mobile_app_both'     => 'Mobile App (Both)',
        'web_app_saas'        => 'Web Application / SaaS',
        'other'               => 'Other',
    ];

    public static array $budgets = [
        'under_50k'        => '< ৳50,000',
        '50k_to_100k'      => '৳50,000–1,00,000',
        '100k_to_300k'     => '৳1,00,000–3,00,000',
        'above_300k'       => '> ৳3,00,000',
        'to_be_discussed'  => 'To be discussed',
    ];

    public static array $statuses = [
        'new'           => 'New',
        'seen'          => 'Seen',
        'in_discussion' => 'In Discussion',
        'quoted'        => 'Quoted',
        'accepted'      => 'Accepted',
        'rejected'      => 'Rejected',
        'completed'     => 'Completed',
    ];
}
