# Database Design Document
## IT Company Website — Ready-Made Web Application Marketplace
**Version:** 2.0.0
**Last Updated:** 2026-03-03
**Database:** MySQL 8.0+
**ORM:** Laravel Eloquent
**Engine:** InnoDB (all tables)
**Charset:** utf8mb4 | **Collation:** utf8mb4_unicode_ci

---

## Table of Contents

1. [Overview & Design Principles](#1-overview--design-principles)
2. [Entity Relationship Summary](#2-entity-relationship-summary)
3. [Table Definitions](#3-table-definitions)
   - [users](#31-users)
   - [sessions](#32-sessions)
   - [categories](#33-categories)
   - [products](#34-products)
   - [product_screenshots](#35-product_screenshots)
   - [product_features](#36-product_features)
   - [product_tech_stack](#37-product_tech_stack)
   - [product_tags](#38-product_tags)
   - [custom_requests](#39-custom_requests)
   - [custom_request_reference_links](#310-custom_request_reference_links)
   - [contact_messages](#311-contact_messages)
   - [site_settings](#312-site_settings)
   - [preview_tokens](#313-preview_tokens)
4. [Relationships Diagram](#4-relationships-diagram)
5. [Indexes & Optimization](#5-indexes--optimization)
6. [Laravel Migrations](#6-laravel-migrations)
7. [Laravel Models & Relationships](#7-laravel-models--relationships)
8. [Seeders](#8-seeders)
9. [MySQL Configuration Tips](#9-mysql-configuration-tips)
10. [Migration Workflow](#10-migration-workflow)
11. [Phase 2 Tables (Future)](#11-phase-2-tables-future)

---

## 1. Overview & Design Principles

### Database
- **MySQL 8.0+** — required for window functions, JSON columns, and `CHECK` constraints
- **InnoDB** engine on all tables — supports foreign keys, transactions, row-level locking
- **utf8mb4** charset with **utf8mb4_unicode_ci** collation — full Unicode + emoji support (required for Bangla text)

### Design Decisions

| Decision | Choice | Reason |
|---|---|---|
| Primary keys | `BIGINT UNSIGNED AUTO_INCREMENT` | Faster joins and index lookups than UUID in MySQL; MySQL clusters UUIDs poorly on InnoDB B-tree |
| Bilingual content | Separate `_en` / `_bn` columns | No joins needed; simple and fast for this scale |
| Enums | MySQL `ENUM` type | Enforced at DB level; maps cleanly to Laravel `enum` cast |
| Soft deletes | `deleted_at TIMESTAMP NULL` | Laravel `SoftDeletes` trait compatible |
| Timestamps | `created_at` / `updated_at TIMESTAMP` | Laravel convention; auto-managed by Eloquent |
| String lengths | Tuned per column | Prevents index bloat; MySQL index key limit is 767 bytes (utf8mb4 = 4 bytes/char) |
| Full-text search | `FULLTEXT` on title + description | Native MySQL full-text search for product catalog |
| JSON columns | Used for `reference_links` only | Avoids a join table for a simple list |

---

## 2. Entity Relationship Summary

```
users (1) ──────< sessions (N)
users (1) ──────< preview_tokens (N)

categories (1) ─< products (N)

products (1) ───< product_screenshots (N)
products (1) ───< product_features (N)
products (1) ───< product_tech_stack (N)
products (1) ───< product_tags (N)
products (1) ───< preview_tokens (N)

custom_requests (standalone, with JSON reference_links column)
contact_messages (standalone)
site_settings (key-value store)
```

---

## 3. Table Definitions

> All tables use: `ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci`

---

### 3.1 `users`

Stores registered user accounts.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | Primary key |
| `name` | `VARCHAR(100)` | NOT NULL | Full name |
| `email` | `VARCHAR(191)` | NOT NULL, UNIQUE | Login email (191 = max for utf8mb4 unique index) |
| `phone` | `VARCHAR(20)` | NOT NULL | Phone number (for WhatsApp contact) |
| `password` | `VARCHAR(255)` | NULLABLE | Bcrypt hashed password |
| `role` | `ENUM('user','admin')` | NOT NULL, DEFAULT `'user'` | Access level |
| `email_verified_at` | `TIMESTAMP` | NULLABLE | Null = not verified |
| `preferred_language` | `ENUM('en','bn')` | NOT NULL, DEFAULT `'en'` | UI language preference |
| `is_active` | `TINYINT(1)` | NOT NULL, DEFAULT `1` | Account enabled flag |
| `remember_token` | `VARCHAR(100)` | NULLABLE | Laravel "remember me" token |
| `deleted_at` | `TIMESTAMP` | NULLABLE | Soft delete (Laravel SoftDeletes) |
| `created_at` | `TIMESTAMP` | NULLABLE | Auto-set by Laravel |
| `updated_at` | `TIMESTAMP` | NULLABLE | Auto-set by Laravel |

---

### 3.2 `sessions`

Laravel's built-in database session driver table (used when `SESSION_DRIVER=database`).

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `VARCHAR(255)` | PK | Session ID string |
| `user_id` | `BIGINT UNSIGNED` | NULLABLE, INDEX | FK → `users.id` (null for guests) |
| `ip_address` | `VARCHAR(45)` | NULLABLE | IPv4/IPv6 |
| `user_agent` | `TEXT` | NULLABLE | Browser/device string |
| `payload` | `LONGTEXT` | NOT NULL | Serialized session data |
| `last_activity` | `INT` | NOT NULL, INDEX | Unix timestamp of last activity |

> Note: This is Laravel's standard sessions table. Run `php artisan session:table` to generate its migration.

---

### 3.3 `categories`

Product categories for grouping and filtering.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | Primary key |
| `slug` | `VARCHAR(100)` | NOT NULL, UNIQUE | URL-safe identifier |
| `name_en` | `VARCHAR(100)` | NOT NULL | English name |
| `name_bn` | `VARCHAR(100)` | NOT NULL | Bangla name |
| `icon` | `VARCHAR(100)` | NULLABLE | Icon class or emoji |
| `sort_order` | `SMALLINT UNSIGNED` | NOT NULL, DEFAULT `0` | Display ordering |
| `is_active` | `TINYINT(1)` | NOT NULL, DEFAULT `1` | Visible to public |
| `created_at` | `TIMESTAMP` | NULLABLE | |
| `updated_at` | `TIMESTAMP` | NULLABLE | |

---

### 3.4 `products`

Core product listings — the most queried table.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | Primary key |
| `category_id` | `BIGINT UNSIGNED` | NOT NULL, FK, INDEX | → `categories.id` |
| `slug` | `VARCHAR(191)` | NOT NULL, UNIQUE | URL slug |
| `title_en` | `VARCHAR(200)` | NOT NULL | English title |
| `title_bn` | `VARCHAR(200)` | NOT NULL | Bangla title |
| `short_desc_en` | `VARCHAR(500)` | NOT NULL | Short English description (cards) |
| `short_desc_bn` | `VARCHAR(500)` | NOT NULL | Short Bangla description |
| `description_en` | `TEXT` | NOT NULL | Full English description |
| `description_bn` | `TEXT` | NOT NULL | Full Bangla description |
| `price_bdt` | `DECIMAL(10,2)` | NOT NULL | Price in BDT |
| `price_usd` | `DECIMAL(10,2)` | NULLABLE | Price in USD |
| `preview_url` | `VARCHAR(500)` | NULLABLE | Subdomain preview URL |
| `thumbnail_url` | `VARCHAR(500)` | NULLABLE | Main card thumbnail |
| `is_featured` | `TINYINT(1)` | NOT NULL, DEFAULT `0` | Featured section flag |
| `is_active` | `TINYINT(1)` | NOT NULL, DEFAULT `1` | Visible to public |
| `is_new` | `TINYINT(1)` | NOT NULL, DEFAULT `1` | "New" badge flag |
| `sort_order` | `SMALLINT UNSIGNED` | NOT NULL, DEFAULT `0` | Manual display ordering |
| `deleted_at` | `TIMESTAMP` | NULLABLE | Soft delete |
| `created_at` | `TIMESTAMP` | NULLABLE | |
| `updated_at` | `TIMESTAMP` | NULLABLE | |

**Composite indexes on `products` (see Section 5)**

---

### 3.5 `product_screenshots`

Gallery images per product.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | |
| `product_id` | `BIGINT UNSIGNED` | NOT NULL, FK, INDEX | → `products.id` ON DELETE CASCADE |
| `url` | `VARCHAR(500)` | NOT NULL | CDN image path |
| `alt_en` | `VARCHAR(255)` | NULLABLE | English alt text |
| `alt_bn` | `VARCHAR(255)` | NULLABLE | Bangla alt text |
| `sort_order` | `SMALLINT UNSIGNED` | NOT NULL, DEFAULT `0` | Gallery order |
| `created_at` | `TIMESTAMP` | NULLABLE | |

---

### 3.6 `product_features`

Bullet-point feature list per product (bilingual).

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | |
| `product_id` | `BIGINT UNSIGNED` | NOT NULL, FK, INDEX | → `products.id` ON DELETE CASCADE |
| `feature_en` | `VARCHAR(500)` | NOT NULL | Feature text in English |
| `feature_bn` | `VARCHAR(500)` | NOT NULL | Feature text in Bangla |
| `sort_order` | `SMALLINT UNSIGNED` | NOT NULL, DEFAULT `0` | |

---

### 3.7 `product_tech_stack`

Technology names used in each product.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | |
| `product_id` | `BIGINT UNSIGNED` | NOT NULL, FK, INDEX | → `products.id` ON DELETE CASCADE |
| `tech_name` | `VARCHAR(100)` | NOT NULL | e.g., `Laravel`, `Vue.js` |
| `sort_order` | `SMALLINT UNSIGNED` | NOT NULL, DEFAULT `0` | |

---

### 3.8 `product_tags`

Searchable tags per product.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | |
| `product_id` | `BIGINT UNSIGNED` | NOT NULL, FK, INDEX | → `products.id` ON DELETE CASCADE |
| `tag` | `VARCHAR(100)` | NOT NULL | Lowercase tag value |

---

### 3.9 `custom_requests`

Custom project inquiry submissions.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | |
| `name` | `VARCHAR(100)` | NOT NULL | Submitter's name |
| `email` | `VARCHAR(191)` | NOT NULL | Submitter's email |
| `phone` | `VARCHAR(20)` | NOT NULL | Submitter's phone |
| `project_type` | `ENUM(...)` | NOT NULL | See enum values below |
| `project_description` | `TEXT` | NOT NULL | Min 50 chars (validated in Laravel) |
| `budget` | `ENUM(...)` | NOT NULL | Budget range |
| `deadline` | `VARCHAR(100)` | NULLABLE | Preferred deadline (free text) |
| `preferred_contact` | `ENUM('whatsapp','messenger','email')` | NOT NULL | Follow-up method |
| `reference_links` | `JSON` | NULLABLE | Array of up to 3 URLs (MySQL JSON) |
| `message` | `TEXT` | NULLABLE | Additional notes |
| `status` | `ENUM(...)` | NOT NULL, DEFAULT `'new'` | Admin workflow status |
| `admin_notes` | `TEXT` | NULLABLE | Internal admin notes |
| `created_at` | `TIMESTAMP` | NULLABLE | |
| `updated_at` | `TIMESTAMP` | NULLABLE | |

**`project_type` ENUM values:**
`'custom_website'`, `'ecommerce_store'`, `'mobile_app_android'`, `'mobile_app_ios'`, `'mobile_app_both'`, `'web_app_saas'`, `'other'`

**`budget` ENUM values:**
`'under_50k'`, `'50k_to_100k'`, `'100k_to_300k'`, `'above_300k'`, `'to_be_discussed'`

**`status` ENUM values:**
`'new'`, `'seen'`, `'in_discussion'`, `'quoted'`, `'accepted'`, `'rejected'`, `'completed'`

> `reference_links` is stored as a MySQL JSON column instead of a separate table — eliminates a join for a simple list of max 3 URLs.

---

### 3.10 `contact_messages`

General contact form submissions.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | |
| `name` | `VARCHAR(100)` | NOT NULL | Sender name |
| `email` | `VARCHAR(191)` | NOT NULL | Sender email |
| `phone` | `VARCHAR(20)` | NULLABLE | Sender phone |
| `subject` | `VARCHAR(255)` | NOT NULL | Message subject |
| `message` | `TEXT` | NOT NULL | Message body |
| `is_read` | `TINYINT(1)` | NOT NULL, DEFAULT `0` | Admin read flag |
| `created_at` | `TIMESTAMP` | NULLABLE | |

---

### 3.11 `site_settings`

Admin-configurable key-value store.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `key` | `VARCHAR(100)` | PK | Setting key |
| `value` | `TEXT` | NULLABLE | Setting value |
| `description` | `VARCHAR(500)` | NULLABLE | Admin-facing description |
| `updated_at` | `TIMESTAMP` | NULLABLE | |

**Default keys:**

| Key | Example Value |
|---|---|
| `whatsapp_number` | `8801700000000` |
| `messenger_page_id` | `yourpagename` |
| `contact_email` | `hello@company.com` |
| `company_name_en` | `Your IT Company` |
| `company_name_bn` | `আপনার আইটি কোম্পানি` |
| `hero_tagline_en` | `Ready-Made Web Apps for Your Business` |
| `hero_tagline_bn` | `আপনার ব্যবসার জন্য রেডিমেড ওয়েব অ্যাপ` |

---

### 3.12 `preview_tokens`

Short-lived tokens gating authenticated subdomain preview access.

| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `BIGINT UNSIGNED` | PK, AUTO_INCREMENT | |
| `user_id` | `BIGINT UNSIGNED` | NOT NULL, FK, INDEX | → `users.id` |
| `product_id` | `BIGINT UNSIGNED` | NOT NULL, FK, INDEX | → `products.id` |
| `token` | `VARCHAR(191)` | NOT NULL, UNIQUE | Signed secure token |
| `expires_at` | `TIMESTAMP` | NOT NULL | Short-lived (15–60 min) |
| `used_at` | `TIMESTAMP` | NULLABLE | First-use timestamp |
| `created_at` | `TIMESTAMP` | NULLABLE | |

---

## 4. Relationships Diagram

```
┌───────────────┐          ┌──────────────────┐
│    users      │──── 1:N ─│    sessions      │
│               │          └──────────────────┘
│  id (BIGINT)  │──── 1:N ─┌──────────────────┐
└───────────────┘           │  preview_tokens  │
                            └──────────────────┘

┌───────────────┐          ┌────────────────────────────┐
│  categories   │──── 1:N ─│         products           │
│               │          │                            │
│  id (BIGINT)  │          │  id | category_id | slug   │
└───────────────┘          └──┬──────────────────────┬──┘
                              │                      │
               ┌──────────────▼───┐   ┌──────────────▼──────┐
               │product_features  │   │product_screenshots   │
               └──────────────────┘   └─────────────────────┘
               ┌──────────────▼───┐   ┌──────────────▼──────┐
               │product_tech_stack│   │   product_tags      │
               └──────────────────┘   └─────────────────────┘
                              │
                    ┌─────────▼────────┐
                    │  preview_tokens  │
                    └──────────────────┘

┌──────────────────┐     ┌──────────────────┐
│ custom_requests  │     │ contact_messages  │
│ (JSON ref_links) │     └──────────────────┘
└──────────────────┘
                          ┌──────────────────┐
                          │  site_settings   │
                          └──────────────────┘
```

---

## 5. Indexes & Optimization

### Composite Indexes on `products`

The catalog page filters by `is_active`, `category_id`, `is_featured` and sorts by `created_at` or `price_bdt`. These composite indexes cover the most common query patterns:

```sql
-- Catalog: active products by category, sorted by newest
ALTER TABLE products ADD INDEX idx_products_active_cat_date (is_active, category_id, created_at);

-- Featured section: active + featured
ALTER TABLE products ADD INDEX idx_products_active_featured (is_active, is_featured);

-- Price sort (active products, sorted by price)
ALTER TABLE products ADD INDEX idx_products_active_price (is_active, price_bdt);

-- Soft delete awareness (Laravel SoftDeletes always adds WHERE deleted_at IS NULL)
ALTER TABLE products ADD INDEX idx_products_deleted_at (deleted_at);
```

### Full-Text Search on `products`

```sql
-- Enables MATCH() AGAINST() search on product titles and descriptions
ALTER TABLE products ADD FULLTEXT INDEX ft_products_search (title_en, title_bn, short_desc_en, short_desc_bn);
```

Laravel usage:
```php
Product::whereFullText(['title_en', 'title_bn', 'short_desc_en', 'short_desc_bn'], $query)->get();
```

### Full Index Reference

| Table | Index | Columns | Type |
|---|---|---|---|
| `users` | `users_email_unique` | `email` | UNIQUE |
| `users` | `idx_users_role` | `role` | INDEX |
| `products` | `products_slug_unique` | `slug` | UNIQUE |
| `products` | `idx_products_active_cat_date` | `is_active, category_id, created_at` | COMPOSITE |
| `products` | `idx_products_active_featured` | `is_active, is_featured` | COMPOSITE |
| `products` | `idx_products_active_price` | `is_active, price_bdt` | COMPOSITE |
| `products` | `idx_products_deleted_at` | `deleted_at` | INDEX |
| `products` | `ft_products_search` | `title_en, title_bn, short_desc_en, short_desc_bn` | FULLTEXT |
| `product_tags` | `idx_product_tags_tag` | `tag` | INDEX |
| `product_tags` | `idx_product_tags_product` | `product_id` | INDEX |
| `sessions` | `idx_sessions_last_activity` | `last_activity` | INDEX |
| `sessions` | `idx_sessions_user` | `user_id` | INDEX |
| `preview_tokens` | `preview_tokens_token_unique` | `token` | UNIQUE |
| `preview_tokens` | `idx_preview_tokens_user_product` | `user_id, product_id` | COMPOSITE |
| `preview_tokens` | `idx_preview_tokens_expires` | `expires_at` | INDEX |
| `custom_requests` | `idx_custom_requests_status` | `status` | INDEX |
| `custom_requests` | `idx_custom_requests_created` | `created_at` | INDEX |
| `contact_messages` | `idx_contact_is_read` | `is_read` | INDEX |

---

## 6. Laravel Migrations

### Migration Execution Order

```
2026_03_03_000001_create_users_table.php
2026_03_03_000002_create_sessions_table.php
2026_03_03_000003_create_categories_table.php
2026_03_03_000004_create_products_table.php
2026_03_03_000005_create_product_screenshots_table.php
2026_03_03_000006_create_product_features_table.php
2026_03_03_000007_create_product_tech_stack_table.php
2026_03_03_000008_create_product_tags_table.php
2026_03_03_000009_create_custom_requests_table.php
2026_03_03_000010_create_contact_messages_table.php
2026_03_03_000011_create_site_settings_table.php
2026_03_03_000012_create_preview_tokens_table.php
```

### `create_users_table`

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name', 100);
    $table->string('email', 191)->unique();
    $table->string('phone', 20);
    $table->string('password', 255)->nullable();
    $table->enum('role', ['user', 'admin'])->default('user');
    $table->timestamp('email_verified_at')->nullable();
    $table->enum('preferred_language', ['en', 'bn'])->default('en');
    $table->boolean('is_active')->default(true);
    $table->rememberToken();
    $table->softDeletes();
    $table->timestamps();

    $table->index('role');
});
```

### `create_categories_table`

```php
Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('slug', 100)->unique();
    $table->string('name_en', 100);
    $table->string('name_bn', 100);
    $table->string('icon', 100)->nullable();
    $table->unsignedSmallInteger('sort_order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### `create_products_table`

```php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->foreignId('category_id')->constrained()->restrictOnDelete();
    $table->string('slug', 191)->unique();
    $table->string('title_en', 200);
    $table->string('title_bn', 200);
    $table->string('short_desc_en', 500);
    $table->string('short_desc_bn', 500);
    $table->text('description_en');
    $table->text('description_bn');
    $table->decimal('price_bdt', 10, 2);
    $table->decimal('price_usd', 10, 2)->nullable();
    $table->string('preview_url', 500)->nullable();
    $table->string('thumbnail_url', 500)->nullable();
    $table->boolean('is_featured')->default(false);
    $table->boolean('is_active')->default(true);
    $table->boolean('is_new')->default(true);
    $table->unsignedSmallInteger('sort_order')->default(0);
    $table->softDeletes();
    $table->timestamps();

    // Composite indexes
    $table->index(['is_active', 'category_id', 'created_at'], 'idx_products_active_cat_date');
    $table->index(['is_active', 'is_featured'], 'idx_products_active_featured');
    $table->index(['is_active', 'price_bdt'], 'idx_products_active_price');
    $table->index('deleted_at');

    // Full-text index (raw statement — Blueprint doesn't support FULLTEXT)
});

// Full-text index added separately
DB::statement('ALTER TABLE products ADD FULLTEXT ft_products_search (title_en, title_bn, short_desc_en, short_desc_bn)');
```

### `create_product_screenshots_table`

```php
Schema::create('product_screenshots', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained()->cascadeOnDelete();
    $table->string('url', 500);
    $table->string('alt_en', 255)->nullable();
    $table->string('alt_bn', 255)->nullable();
    $table->unsignedSmallInteger('sort_order')->default(0);
    $table->timestamp('created_at')->nullable();
});
```

### `create_product_features_table`

```php
Schema::create('product_features', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained()->cascadeOnDelete();
    $table->string('feature_en', 500);
    $table->string('feature_bn', 500);
    $table->unsignedSmallInteger('sort_order')->default(0);
});
```

### `create_product_tech_stack_table`

```php
Schema::create('product_tech_stack', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained()->cascadeOnDelete();
    $table->string('tech_name', 100);
    $table->unsignedSmallInteger('sort_order')->default(0);
});
```

### `create_product_tags_table`

```php
Schema::create('product_tags', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained()->cascadeOnDelete();
    $table->string('tag', 100);

    $table->index('tag', 'idx_product_tags_tag');
    $table->index('product_id', 'idx_product_tags_product');
});
```

### `create_custom_requests_table`

```php
Schema::create('custom_requests', function (Blueprint $table) {
    $table->id();
    $table->string('name', 100);
    $table->string('email', 191);
    $table->string('phone', 20);
    $table->enum('project_type', [
        'custom_website', 'ecommerce_store', 'mobile_app_android',
        'mobile_app_ios', 'mobile_app_both', 'web_app_saas', 'other',
    ]);
    $table->text('project_description');
    $table->enum('budget', [
        'under_50k', '50k_to_100k', '100k_to_300k', 'above_300k', 'to_be_discussed',
    ]);
    $table->string('deadline', 100)->nullable();
    $table->enum('preferred_contact', ['whatsapp', 'messenger', 'email']);
    $table->json('reference_links')->nullable();   // replaces separate join table
    $table->text('message')->nullable();
    $table->enum('status', [
        'new', 'seen', 'in_discussion', 'quoted', 'accepted', 'rejected', 'completed',
    ])->default('new');
    $table->text('admin_notes')->nullable();
    $table->timestamps();

    $table->index('status', 'idx_custom_requests_status');
    $table->index('created_at', 'idx_custom_requests_created');
});
```

### `create_contact_messages_table`

```php
Schema::create('contact_messages', function (Blueprint $table) {
    $table->id();
    $table->string('name', 100);
    $table->string('email', 191);
    $table->string('phone', 20)->nullable();
    $table->string('subject', 255);
    $table->text('message');
    $table->boolean('is_read')->default(false);
    $table->timestamp('created_at')->nullable();

    $table->index('is_read', 'idx_contact_is_read');
});
```

### `create_site_settings_table`

```php
Schema::create('site_settings', function (Blueprint $table) {
    $table->string('key', 100)->primary();
    $table->text('value')->nullable();
    $table->string('description', 500)->nullable();
    $table->timestamp('updated_at')->nullable();
});
```

### `create_preview_tokens_table`

```php
Schema::create('preview_tokens', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('product_id')->constrained()->cascadeOnDelete();
    $table->string('token', 191)->unique();
    $table->timestamp('expires_at');
    $table->timestamp('used_at')->nullable();
    $table->timestamp('created_at')->nullable();

    $table->index(['user_id', 'product_id'], 'idx_preview_tokens_user_product');
    $table->index('expires_at', 'idx_preview_tokens_expires');
});
```

---

## 7. Laravel Models & Relationships

### `User`

```php
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'password',
        'role', 'preferred_language', 'is_active',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active'         => 'boolean',
        'role'              => 'string',
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }

    public function previewTokens(): HasMany
    {
        return $this->hasMany(PreviewToken::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
```

### `Category`

```php
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name_en', 'name_bn', 'icon', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // Helper: get name by current locale
    public function getNameAttribute(): string
    {
        $locale = app()->getLocale(); // 'en' or 'bn'
        return $this->{"name_{$locale}"} ?? $this->name_en;
    }
}
```

### `Product`

```php
class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id', 'slug', 'title_en', 'title_bn',
        'short_desc_en', 'short_desc_bn', 'description_en', 'description_bn',
        'price_bdt', 'price_usd', 'preview_url', 'thumbnail_url',
        'is_featured', 'is_active', 'is_new', 'sort_order',
    ];

    protected $casts = [
        'price_bdt'   => 'decimal:2',
        'price_usd'   => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
        'is_new'      => 'boolean',
    ];

    // ── Relationships ─────────────────────────────────
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function screenshots(): HasMany
    {
        return $this->hasMany(ProductScreenshot::class)->orderBy('sort_order');
    }

    public function features(): HasMany
    {
        return $this->hasMany(ProductFeature::class)->orderBy('sort_order');
    }

    public function techStack(): HasMany
    {
        return $this->hasMany(ProductTechStack::class)->orderBy('sort_order');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(ProductTag::class);
    }

    public function previewTokens(): HasMany
    {
        return $this->hasMany(PreviewToken::class);
    }

    // ── Scopes ────────────────────────────────────────
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeSearch(Builder $query, string $term): Builder
    {
        return $query->whereFullText(
            ['title_en', 'title_bn', 'short_desc_en', 'short_desc_bn'],
            $term
        );
    }

    // ── Locale helpers ────────────────────────────────
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_en;
    }

    public function getDescriptionAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"} ?? $this->description_en;
    }
}
```

### `CustomRequest`

```php
class CustomRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'project_type', 'project_description',
        'budget', 'deadline', 'preferred_contact', 'reference_links',
        'message', 'status', 'admin_notes',
    ];

    protected $casts = [
        'reference_links' => 'array',   // JSON cast — auto encode/decode
    ];
}
```

### `PreviewToken`

```php
class PreviewToken extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id', 'product_id', 'token', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
        'used_at'    => 'datetime',
        'created_at' => 'datetime',
    ];

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function isUsed(): bool
    {
        return $this->used_at !== null;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
```

---

## 8. Seeders

### `DatabaseSeeder`

```php
public function run(): void
{
    $this->call([
        CategorySeeder::class,
        SiteSettingSeeder::class,
    ]);
}
```

### `CategorySeeder`

```php
public function run(): void
{
    $categories = [
        ['slug' => 'ecommerce',      'name_en' => 'E-Commerce Website',         'name_bn' => 'ই-কমার্স ওয়েবসাইট',       'icon' => '🛒', 'sort_order' => 1],
        ['slug' => 'business',       'name_en' => 'Business / Corporate',       'name_bn' => 'ব্যবসায়িক / কর্পোরেট',     'icon' => '🏢', 'sort_order' => 2],
        ['slug' => 'portfolio',      'name_en' => 'Portfolio Website',          'name_bn' => 'পোর্টফোলিও ওয়েবসাইট',      'icon' => '🎨', 'sort_order' => 3],
        ['slug' => 'restaurant',     'name_en' => 'Restaurant / Food Ordering', 'name_bn' => 'রেস্তোরাঁ / খাবার অর্ডার', 'icon' => '🍽️', 'sort_order' => 4],
        ['slug' => 'real-estate',    'name_en' => 'Real Estate',                'name_bn' => 'রিয়েল এস্টেট',             'icon' => '🏠', 'sort_order' => 5],
        ['slug' => 'education',      'name_en' => 'School / Education',         'name_bn' => 'স্কুল / শিক্ষা',             'icon' => '🎓', 'sort_order' => 6],
        ['slug' => 'healthcare',     'name_en' => 'Hospital / Clinic',          'name_bn' => 'হাসপাতাল / ক্লিনিক',        'icon' => '🏥', 'sort_order' => 7],
        ['slug' => 'news-blog',      'name_en' => 'News / Blog Platform',       'name_bn' => 'নিউজ / ব্লগ',               'icon' => '📰', 'sort_order' => 8],
        ['slug' => 'mobile-app',     'name_en' => 'Mobile App',                 'name_bn' => 'মোবাইল অ্যাপ',              'icon' => '📱', 'sort_order' => 9],
        ['slug' => 'saas-dashboard', 'name_en' => 'SaaS / Dashboard',           'name_bn' => 'স্যাস / ড্যাশবোর্ড',         'icon' => '📊', 'sort_order' => 10],
    ];

    foreach ($categories as $cat) {
        Category::updateOrCreate(['slug' => $cat['slug']], $cat);
    }
}
```

### `SiteSettingSeeder`

```php
public function run(): void
{
    $settings = [
        ['key' => 'whatsapp_number',   'value' => '8801700000000',                        'description' => 'WhatsApp number (international, no +)'],
        ['key' => 'messenger_page_id', 'value' => 'yourpagename',                          'description' => 'Facebook Messenger page username'],
        ['key' => 'contact_email',     'value' => 'hello@company.com',                    'description' => 'Primary contact email'],
        ['key' => 'company_name_en',   'value' => 'Your IT Company',                      'description' => 'Company name (English)'],
        ['key' => 'company_name_bn',   'value' => 'আপনার আইটি কোম্পানি',                  'description' => 'Company name (Bangla)'],
        ['key' => 'hero_tagline_en',   'value' => 'Ready-Made Web Apps for Your Business', 'description' => 'Hero tagline (English)'],
        ['key' => 'hero_tagline_bn',   'value' => 'আপনার ব্যবসার জন্য রেডিমেড ওয়েব অ্যাপ', 'description' => 'Hero tagline (Bangla)'],
    ];

    foreach ($settings as $setting) {
        SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
    }
}
```

---

## 9. MySQL Configuration Tips

### `.env` Settings

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=company_site
DB_USERNAME=root
DB_PASSWORD=secret
DB_CHARSET=utf8mb4
DB_COLLATION=utf8mb4_unicode_ci
```

### `config/database.php` — MySQL connection

```php
'mysql' => [
    'driver'    => 'mysql',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'strict'    => true,       // enforce strict mode — catch bad data early
    'engine'    => 'InnoDB',   // default engine for all migrations
    'options'   => [
        PDO::ATTR_EMULATE_PREPARES => false,   // use real prepared statements
    ],
],
```

### MySQL Server Recommendations (`my.cnf`)

```ini
[mysqld]
character-set-server  = utf8mb4
collation-server      = utf8mb4_unicode_ci
innodb_buffer_pool_size = 256M      # tune to 70% of available RAM on dedicated server
innodb_log_file_size    = 64M
slow_query_log          = 1
long_query_time         = 1         # log queries slower than 1s
```

### Scheduled Cleanup (expired preview tokens)

Add to Laravel's `app/Console/Kernel.php`:

```php
$schedule->command('preview-tokens:cleanup')->hourly();
```

Artisan command:
```php
// php artisan preview-tokens:cleanup
PreviewToken::where('expires_at', '<', now())->delete();
```

---

## 10. Migration Workflow

```bash
# Create the database (first time)
mysql -u root -p -e "CREATE DATABASE company_site CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Run all migrations
php artisan migrate

# Seed the database
php artisan db:seed

# Combined (fresh start)
php artisan migrate:fresh --seed

# Create a new migration
php artisan make:migration add_views_count_to_products_table --table=products

# Rollback last batch
php artisan migrate:rollback
```

### Migration Naming Convention

```
YYYY_MM_DD_NNNNNN_description.php

Examples:
  2026_03_03_000001_create_users_table.php
  2026_03_10_000001_add_views_count_to_products_table.php
  2026_04_01_000001_create_wishlists_table.php   ← Phase 2
```

---

## 11. Phase 2 Tables (Future)

Not required for Phase 1. Designed here for forward planning.

### `orders`

```php
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->restrictOnDelete();
    $table->foreignId('product_id')->constrained()->restrictOnDelete();
    $table->decimal('amount_bdt', 10, 2);
    $table->enum('payment_method', ['sslcommerz', 'stripe', 'manual'])->default('manual');
    $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
    $table->string('transaction_id', 191)->nullable()->unique();
    $table->timestamps();

    $table->index(['user_id', 'payment_status']);
});
```

### `reviews`

```php
Schema::create('reviews', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained()->cascadeOnDelete();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->unsignedTinyInteger('rating');   // 1–5
    $table->text('comment')->nullable();
    $table->boolean('is_approved')->default(false);
    $table->timestamp('created_at')->nullable();

    $table->unique(['product_id', 'user_id']);   // one review per product per user
    $table->index(['product_id', 'is_approved']);
});
```

### `wishlists`

```php
Schema::create('wishlists', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('product_id')->constrained()->cascadeOnDelete();
    $table->timestamp('created_at')->nullable();

    $table->unique(['user_id', 'product_id']);
});
```

---

*This document is the single source of truth for the MySQL database design. All decisions align with `feature_doc.md`. Any schema change must be accompanied by a migration file and a version bump to this document.*
