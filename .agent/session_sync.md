## Decisions & "Why" (Last updated: 2026-11-14)
- **Contact Us Page Mobile Responsiveness**:
  - Fixed mobile form input bug where "Email *" was stuck at 50% width and misaligned with `margin-left: 10px`.
  - Replaced legacy `nth-child` column widths with `.cwb-half-col` (50% side-by-side on desktop `>= 768px`, 100% full-width on mobile `< 768px`).
  - Removed overlapping light-blue circular blob (`.contact-input:before`) that cut into the top-left of the form on mobile.
  - Replaced message text input with a responsive `<textarea>` and made the submit button full-width and touch-friendly on mobile screens.
  - Added `flex-wrap: wrap` to `.biz-card-phone-section` to prevent phone numbers from overflowing on narrow devices.
  - Cleaned up unclosed `<body class="conact-page">` inside Blade content section.
- **Authentication Code / FreeForm Table Mobile Optimization**:
  - Resolved mobile layout breakdown in `resources/views/livewire/pages/free-form.blade.php`.
  - Fixed search input group breakage where `width: 100% !important` in legacy CSS caused search icon to wrap onto a separate line.
  - Implemented responsive mobile card view for institutes with full contact, address, and coupon badges visible without horizontal scrolling.
  - Added a mobile view toggle (`Cards View` vs `Table View`) with scroll hint indicator.
  - Enforced `min-width: 860px` on the table to prevent columns from being crushed into unreadable 40px columns when viewed on small viewports.
  - Removed top banner `margin-top: 72px` hack to naturally connect with the redesigned header.
- **Footer Mobile Layout Optimization**:
  - Reconfigured "Quick Links" and "Policies" columns to `col-6` on mobile (`col-lg-3 col-md-3 col-sm-6 col-6`), putting them side-by-side in a single 2-column row.
  - Centered the "Direct Get in Touch" section on mobile using `text-center text-md-left` and added `mt-4 mt-md-0` with block display for contact info.
  - Centered the SQS Foundation logo and contact info on mobile while maintaining left alignment on desktop.
- **Header 100% Redesign & Mobile Drawer**:
  - Developed a fully responsive modern header component in `resources/views/layouts/partials/header.blade.php`.
  - Replaced the clunky legacy mobile menu with an off-canvas slide-out drawer featuring a frosted backdrop, tactile close button, dedicated action grid, and smooth CSS transitions.
  - Placed the header in normal document flow with smooth sticky scroll behavior, eliminating arbitrary `margin-top` / `top` hacks across all viewports.
  - Kept the old header fully intact and commented out in `layouts/website.blade.php` for backup reference.
- **Homepage Hero Banner Slider Fix**:
  - Resolved 404 image errors by ensuring slider images in `public/home/slider/` match DB records (`SliderModel`).
  - Switched hero slider from background-image with `cover` to responsive `<img>` element with `object-fit: contain; width: 100%; height: auto;` to prevent cropping width/height.
  - Trimmed excess dead white top/bottom padding on slider banner images to eliminate artificial white gaps.
  - Added `autocomplete="current-password"` to password modal input.

## Handoff Summary (2026-11-13)
- **New Files**:
  - `resources/views/layouts/partials/header.blade.php`
- **Modified Files**:
  - `resources/views/layouts/website.blade.php`
  - `resources/views/website/homepage.blade.php`
  - `public/home/slider/` (banner assets synced and trimmed)


## Unresolved Questions
- None.



## Handoff Summary (2026-11-14) - About Us Mission Tab Fix
- Fixed "Our Mision" typo to "Our Mission" in database and Blade template.
- Resolved mobile squished 50/50 layout in `.custom-tooltip-container`; full-width stacked cards on mobile.
- Fixed 404 circular badges with asset fallbacks and Blade `onerror` handlers.
- Compiled assets with `npm run build` and ran `php artisan optimize:clear`.
- Committed to `master` (commit `85e90cd8`).

## Handoff Summary (2026-11-14 Final Deploy)
- **Production Asset Build**: Executed `npm run build` and compiled all CSS/JS bundles.
- **Cache Optimization**: Ran `php artisan optimize:clear` (routes, views, config, compiled bootstrap).
- **Git Push & Deployment**: Pushed 6 commits directly to `origin/master` (synced at `bdf53f86`).
- **All Core Endpoints Verified**: HTTP 200 on `/`, `/aboutus`, `/scholarship`, `/preparation`, `/contact`, `/authentication-code`.
- **Local Dev Server**: Active on `http://127.0.0.1:8000`.
