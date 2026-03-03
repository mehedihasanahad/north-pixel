# Feature Documentation
## IT Company Website — Ready-Made Web Application Marketplace
**Version:** 1.0.0
**Last Updated:** 2026-03-03
**Standard:** Global Product Feature Specification

---

## Table of Contents

1. [Project Overview](#1-project-overview)
2. [Technology & Stack Requirements](#2-technology--stack-requirements)
3. [Localization & Language](#3-localization--language)
4. [Design & Animation System](#4-design--animation-system)
5. [Public Pages & Navigation](#5-public-pages--navigation)
6. [Product Catalog System](#6-product-catalog-system)
7. [Authentication System](#7-authentication-system)
8. [Product Preview System](#8-product-preview-system)
9. [Order & Inquiry Flow (WhatsApp / Messenger)](#9-order--inquiry-flow-whatsapp--messenger)
10. [Custom Project Request Feature](#10-custom-project-request-feature)
11. [Subdomain Preview Architecture](#11-subdomain-preview-architecture)
12. [Admin Panel](#12-admin-panel)
13. [SEO & Performance](#13-seo--performance)
14. [Security Requirements](#14-security-requirements)
15. [Accessibility Standards](#15-accessibility-standards)
16. [Future Scope (Phase 2+)](#16-future-scope-phase-2)

---

## 1. Project Overview

### 1.1 Purpose
An IT company website that showcases and sells **ready-made web applications** as products. Visitors can browse products, preview live demos (after login), and place orders via WhatsApp or Facebook Messenger. The website also accepts **custom website and mobile app requests**.

### 1.2 Core Goals
- Attract clients through exceptional UI/UX design with rich animations
- Allow authenticated users to preview live product demos on subdomains
- Drive sales through direct WhatsApp and Messenger communication
- Support both **Bangla** and **English** languages
- Handle custom project inquiries alongside ready-made product sales

### 1.3 Target Audience
- Small and medium businesses in Bangladesh and international markets
- Startups looking for ready-made solutions
- Entrepreneurs requiring custom digital products

---

## 2. Technology & Stack Requirements

### 2.1 Confirmed Stack (Phase 1)
| Layer | Technology | Rationale |
|---|---|---|
| Backend Framework | **Laravel 11** (PHP 8.2+) | Mature, batteries-included, Eloquent ORM |
| Database | **MySQL 8.0+** InnoDB utf8mb4_unicode_ci | Production-proven, FULLTEXT search support |
| Frontend (Blade) | **Laravel Blade** + **Alpine.js 3** | KISS — no build step for interactivity; CDN delivery |
| Styling | **Tailwind CSS v4** (Vite plugin) | Utility-first, zero dead CSS, custom `@theme` tokens |
| Animations | **GSAP 3 + ScrollTrigger** (CDN) | Industry standard, 60fps, tree-shakeable |
| Fonts | Google Fonts — Inter, Plus Jakarta Sans, Hind Siliguri | Variable fonts, subsetting via `display=swap` |
| Asset pipeline | **Vite 7 + laravel-vite-plugin** | HMR, ESM, fast builds |
| Auth | **Laravel Breeze** (email + password) | Minimal, auditable, extensible to OAuth Phase 2 |
| Hosting | VPS + wildcard subdomain (`*.domain.com`) | Required for product preview architecture |

### 2.2 Frontend Engineering Principles
- **DRY** — Blade components (`x-*`) for all repeated UI (cards, badges, buttons, modals)
- **SOLID** — Single-responsibility: one Blade component per UI concern; controllers delegate to services
- **KISS** — Alpine.js `x-data` for all interactive state (no bundled SPA framework on landing)
- **Progressive Enhancement** — all critical content visible without JS; animations are additive
- **Performance Budget** — Lighthouse ≥ 90; LCP < 2.5s; no render-blocking scripts (all `defer`)

### 2.3 Animation Libraries & Usage
| Library | Delivery | Usage |
|---|---|---|
| **GSAP 3** | CDN (`defer`) | Hero text reveal, stagger entrances, timeline sequences |
| **GSAP ScrollTrigger** | CDN (`defer`) | Scroll-pinned sections, counter animations, parallax |
| **Alpine.js 3** | CDN (`defer`) | Language toggle, mobile drawer, order modal, cat filter |
| **Canvas API** (vanilla) | Inline | Hero particle field (no library dependency) |

### 2.4 Code Quality Standards
- PSR-12 PHP code style enforced via Laravel Pint
- Blade views use Blade components for DRY rendering; no logic in views beyond display conditionals
- All CSS in `resources/css/app.css` using `@layer base / components / utilities`
- All JS in `resources/js/app.js` or inline `<script>` only for page-specific Alpine `x-data`
- No inline `style=""` beyond dynamic values that cannot be expressed as Tailwind classes
- Environment secrets in `.env` only — never hardcoded in views or JS

---

## 3. Localization & Language

### 3.1 Supported Languages
| Code | Language | Script |
|---|---|---|
| `en` | English | Latin |
| `bn` | Bangla (Bengali) | Bengali Unicode |

### 3.2 Requirements
- Language toggle visible on all pages (header)
- Default language detection based on browser locale; fallback to English
- All UI strings stored in locale JSON files (`/locales/en.json`, `/locales/bn.json`)
- Bangla font: **Hind Siliguri** or **Noto Sans Bengali** (Google Fonts)
- English font: **Inter** or **Plus Jakarta Sans**
- RTL/LTR: both languages are LTR — no directional switch required
- Date and number formatting per locale
- SEO meta tags, Open Graph, and `lang` attribute updated on language switch

---

## 4. Design & Animation System

### 4.1 Visual Identity
- **Style:** Modern, premium dark-themed with vibrant gradient accents
- **Primary Palette:** Deep navy/black background (`#0A0A0F`, `#0D1117`) with electric blue, violet, and cyan gradients
- **Accent Colors:** `#6366F1` (indigo), `#8B5CF6` (violet), `#06B6D4` (cyan), `#10B981` (emerald)
- **Typography:** Bold, large headlines; clean body text
- **Imagery:** High-quality product mockups, device frames, abstract tech visuals

### 4.2 Animation Specifications

#### Hero Section
- Animated gradient mesh or particle background (Three.js / CSS canvas)
- Headline text reveal with staggered letter/word animation (GSAP SplitText or Framer Motion)
- CTA buttons with magnetic hover effect
- Floating 3D product mockup cards with depth parallax

#### Product Cards
- Hover: 3D card tilt effect (perspective transform)
- Hover: Gradient border glow animation
- Hover: Tag/badge slide-in reveal
- Scroll entrance: staggered fade-up with scale

#### Page Transitions
- Smooth route transitions using Framer Motion `AnimatePresence`
- Page loader with branded animation on first load

#### Scroll Animations
- Scroll-triggered counter animations (stats section)
- Horizontal scroll product showcase section
- Sticky section with pinned content reveal (GSAP ScrollTrigger)
- Parallax depth layers on feature sections

#### Micro-interactions
- Button hover: gradient shift + shadow pulse
- Input focus: animated border glow
- Navigation links: underline slide animation
- Language toggle: flip/fade transition
- Loading states: skeleton shimmer

### 4.3 Responsive Breakpoints
| Name | Width |
|---|---|
| Mobile | < 640px |
| Tablet | 640px – 1024px |
| Desktop | 1024px – 1440px |
| Wide | > 1440px |

---

## 5. Public Pages & Navigation

### 5.1 Pages

| Route | Page Name | Description |
|---|---|---|
| `/` | Home | Hero, featured products, stats, testimonials, CTA |
| `/products` | Products / Shop | Full product catalog with filters |
| `/products/[slug]` | Product Detail | Product info, screenshots, features, buy CTA |
| `/custom-request` | Custom Request | Form for custom website/app project inquiry |
| `/about` | About Us | Company info, team, mission |
| `/contact` | Contact | Contact form + social links + map |
| `/login` | Login | Auth page (to unlock product previews) |
| `/register` | Register | Account creation |
| `/dashboard` | User Dashboard | Saved products, inquiry history |

### 5.2 Navigation Structure
- **Header:** Logo, nav links, language toggle, login/register button (sticky, blur-glass effect)
- **Footer:** Logo, quick links, contact info, social media icons, copyright
- **Mobile:** Hamburger menu with full-screen animated drawer

---

## 6. Product Catalog System

### 6.1 Product Data Model

```
Product {
  id: UUID
  slug: string (URL-friendly)
  title: { en: string, bn: string }
  description: { en: string, bn: string }
  shortDescription: { en: string, bn: string }
  category: Category
  tags: string[]
  price: number (BDT)
  priceUSD: number (optional)
  currency: "BDT" | "USD"
  screenshots: Image[]         // product gallery images
  previewUrl: string           // subdomain URL for live preview
  features: { en: string[], bn: string[] }
  techStack: string[]
  isActive: boolean
  isFeatured: boolean
  createdAt: DateTime
  updatedAt: DateTime
}
```

### 6.2 Product Categories
- E-Commerce Website
- Business / Corporate Website
- Portfolio Website
- Restaurant / Food Ordering
- Real Estate Website
- School / Education Platform
- Hospital / Clinic System
- News / Blog Platform
- Mobile App (Android / iOS)
- SaaS / Dashboard

### 6.3 Catalog Features
- Filter by category, price range, tech stack
- Sort by: newest, price (low/high), featured
- Search by title or tag
- Pagination or infinite scroll
- "Featured" badge on highlighted products
- "New" badge on recently added products
- Product count display

---

## 7. Authentication System

### 7.1 Auth Methods
- Email + Password registration/login
- Google OAuth (optional Phase 1)
- Facebook OAuth (optional Phase 1)

### 7.2 User Roles
| Role | Permissions |
|---|---|
| Guest | Browse products, view product detail page, submit custom request |
| Authenticated User | All guest permissions + access live preview subdomains |
| Admin | Full CMS access, manage products, view inquiries |

### 7.3 Auth Flow
1. Guest clicks "Preview" button on product page
2. If not logged in → redirect to `/login` with return URL
3. After login → redirect back to product page with preview unlocked
4. Session stored with JWT or session cookie (7-day expiry)

### 7.4 Registration Requirements
- Name (required)
- Email (required, unique)
- Phone number (required, for WhatsApp contact)
- Password (min 8 chars)
- Email verification (optional in Phase 1)

---

## 8. Product Preview System

### 8.1 Preview Access Rules
- Only authenticated users can access live preview
- Preview URL is a subdomain of the main domain (e.g., `ecommerce-demo.yourdomain.com`)
- Preview links are NOT publicly indexed (noindex on subdomain)
- Preview access can be time-limited or session-gated (optional)

### 8.2 Preview Button States
| User State | Button Text | Action |
|---|---|---|
| Guest | "Login to Preview" | Redirect to login |
| Authenticated | "Live Preview" | Open subdomain in new tab |

### 8.3 Preview iframe (Optional)
- Embedded iframe preview within the product page (sandboxed)
- Full-screen toggle button
- Device mockup frame switcher: Desktop / Tablet / Mobile

---

## 9. Order & Inquiry Flow (WhatsApp / Messenger)

### 9.1 "Buy Now" / "Order" Action
- No payment gateway in Phase 1
- Clicking "Buy Now" or "Order Now" opens a contact panel with two options:

**Option A — WhatsApp**
- Pre-filled message template:
  > "Hi! I'm interested in buying [Product Name]. Please provide more details."
- Opens `https://wa.me/<PHONE>?text=<ENCODED_MESSAGE>`

**Option B — Facebook Messenger**
- Opens Messenger chat with the company page
- Pre-filled context message (if Messenger API supports it)

### 9.2 Contact Panel UI
- Bottom sheet / modal with two large buttons (WhatsApp green, Messenger blue)
- Product name and price shown in the panel for reference
- Panel triggered by any "Buy", "Order", or "Get Quote" CTA
- Language-aware button labels

### 9.3 Floating Contact Widget
- Persistent floating button on all pages (bottom-right corner)
- Expands to show WhatsApp + Messenger + optional Email icons
- Animated entrance on scroll or after 3s delay

---

## 10. Custom Project Request Feature

### 10.1 Purpose
Allow visitors to request a custom website or mobile app built from scratch.

### 10.2 Custom Request Form Fields

```
CustomRequest {
  name: string (required)
  email: string (required)
  phone: string (required)
  projectType: enum [
    "Custom Website",
    "E-Commerce Store",
    "Mobile App (Android)",
    "Mobile App (iOS)",
    "Mobile App (Both)",
    "Web Application / SaaS",
    "Other"
  ]
  projectDescription: string (required, min 50 chars)
  budget: enum ["< ৳50,000", "৳50,000–1,00,000", "৳1,00,000–3,00,000", "> ৳3,00,000", "To be discussed"]
  deadline: string (optional)
  referenceLinks: string[] (optional, up to 3 URLs)
  preferredContact: enum ["WhatsApp", "Messenger", "Email"]
  message: string (optional)
}
```

### 10.3 Submission Flow
1. User fills and submits the form
2. Form data saved to database (admin can view)
3. Auto-reply email/notification sent to user (optional)
4. Admin notified via email or dashboard
5. Success screen with WhatsApp/Messenger CTA to follow up immediately

---

## 11. Subdomain Preview Architecture

### 11.1 Structure
- Main site: `yourdomain.com`
- Product previews: `[product-slug].yourdomain.com`
- Example: `restaurant-app.yourdomain.com`, `ecommerce-demo.yourdomain.com`

### 11.2 Requirements
- Wildcard SSL certificate (`*.yourdomain.com`) — via Let's Encrypt or Cloudflare
- Each demo app deployed independently (can be static or dynamic)
- Demo data pre-populated (not live/real data)
- "This is a demo" banner shown on all preview subdomains
- Demo subdomains set to `noindex, nofollow` in robots/meta

### 11.3 Preview Protection (Optional Phase 1)
- Token-based preview access: main site passes a signed token in URL query param
- Preview subdomain verifies token before rendering (prevents direct access without login)

---

## 12. Admin Panel

### 12.1 Access
- Route: `/admin` (protected, Admin role only)
- Separate login or role-gated from main auth

### 12.2 Admin Features
| Feature | Description |
|---|---|
| Product Management | Add, edit, delete, activate/deactivate products |
| Product Media | Upload screenshots, set featured image |
| Category Management | Create and manage product categories |
| Custom Requests | View all custom project inquiry submissions |
| Users | View registered users |
| Settings | Update WhatsApp number, Messenger page ID, contact email |
| Language Strings | Edit Bangla/English UI text (optional CMS mode) |

---

## 13. SEO & Performance

### 13.1 SEO Requirements
- Dynamic `<title>` and `<meta description>` per page and per product
- Open Graph and Twitter Card meta tags (product image, title, description)
- JSON-LD structured data for products (`Product` schema)
- Sitemap auto-generation (`/sitemap.xml`)
- `robots.txt` with subdomain preview exclusion
- Canonical URLs
- Language alternate tags (`hreflang` for `en` and `bn`)

### 13.2 Performance Targets
| Metric | Target |
|---|---|
| Lighthouse Performance | ≥ 90 |
| First Contentful Paint | < 1.5s |
| Largest Contentful Paint | < 2.5s |
| Cumulative Layout Shift | < 0.1 |
| Total Blocking Time | < 200ms |

### 13.3 Optimization Techniques
- Next.js Image optimization (`<Image>` component, WebP/AVIF)
- Code splitting and lazy loading for heavy animation libraries
- Font subsetting for Bangla Unicode font
- Static generation (SSG) for product catalog pages
- CDN delivery for static assets

---

## 14. Security Requirements

- HTTPS enforced on all routes and subdomains
- CSRF protection on all forms
- Rate limiting on login, register, and custom request endpoints
- Input sanitization and validation (server-side)
- SQL injection / NoSQL injection prevention via ORM/ODM
- Authenticated preview links (no direct subdomain access without login)
- Admin panel behind role-based access control
- Environment variables for all secrets (never exposed to client)
- HTTP security headers: `X-Frame-Options`, `Content-Security-Policy`, `X-XSS-Protection`

---

## 15. Accessibility Standards

- WCAG 2.1 Level AA compliance
- All images have descriptive `alt` text (in both languages)
- Keyboard navigable UI (tab order, focus rings)
- ARIA labels on interactive elements
- Sufficient color contrast ratio (≥ 4.5:1 for text)
- No animations for users with `prefers-reduced-motion` (graceful degradation)
- Skip-to-content link for screen readers

---

## 16. Future Scope (Phase 2+)

| Feature | Phase |
|---|---|
| Online payment integration (SSLCommerz / Stripe) | Phase 2 |
| User order history and invoice download | Phase 2 |
| Product ratings and reviews | Phase 2 |
| Wishlist / Save for later | Phase 2 |
| Google & Facebook OAuth login | Phase 2 |
| Email verification on registration | Phase 2 |
| Blog / Tech articles section | Phase 2 |
| Affiliate or referral system | Phase 3 |
| Mobile app (React Native) for the platform | Phase 3 |
| Multi-vendor / reseller support | Phase 3 |

---

## Appendix A — WhatsApp Integration Reference

```
Base URL: https://wa.me/{phone_number}?text={url_encoded_message}
Phone format: International without '+' (e.g., 8801XXXXXXXXX)
Example:
  https://wa.me/8801700000000?text=Hello!%20I%20am%20interested%20in%20buying%20Restaurant%20App.
```

## Appendix B — Folder Structure (Next.js)

```
/
├── app/
│   ├── (public)/
│   │   ├── page.tsx              # Home
│   │   ├── products/
│   │   │   ├── page.tsx          # Catalog
│   │   │   └── [slug]/page.tsx   # Product Detail
│   │   ├── custom-request/
│   │   ├── about/
│   │   └── contact/
│   ├── (auth)/
│   │   ├── login/
│   │   └── register/
│   ├── dashboard/
│   └── admin/
├── components/
│   ├── ui/                       # Reusable UI primitives
│   ├── sections/                 # Page sections (Hero, ProductGrid, etc.)
│   ├── animations/               # Animation wrappers
│   └── layout/                  # Header, Footer, Sidebar
├── locales/
│   ├── en.json
│   └── bn.json
├── lib/
│   ├── auth.ts
│   ├── db.ts
│   └── utils.ts
├── types/
└── public/
    ├── images/
    └── fonts/
```

---

*This document is the single source of truth for all features of the IT Company Website project. All development work must align with the specifications defined here. Any deviation or addition must be documented via a version update to this file.*
