## Decisions & "Why" (Last updated: 2026-10-06)
- **Header Layout Restoration**: Reverted the website header layout, markup, styling, and JavaScript logic back to the original version in [layouts/website.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/layouts/website.blade.php) and [custom.js](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/public/website/assets/js/custom.js).
- **Font Awesome 404 Resolution**:
  - `public/fonts/` previously contained font files saved with literal query parameters in filenames (`fontawesome-webfont.woff2_v=4.7.0`), causing web servers to 404 when looking for `fontawesome-webfont.woff2`.
  - Standardized font assets in `public/fonts/` (`woff2`, `woff`, `ttf`, `eot`, `svg`) and removed the duplicate `<link href="{{ asset('css/font-awesome.min.css') }}">` inclusion from the layout.
- **Homepage Mobile Improvements**: Preserved education cards flex-wrapping, scoped custom styles inside `@push('custom-styles')`, and kept Splide breakpoint improvements.

- **Header Icons Resolution**:
  - Restored `<link href="{{ asset('css/font-awesome.min.css') }}">` after `style.css` and added Cloudflare CDN Font Awesome 4.7.0 as a reliable fallback.
  - Added `.fa, [class*="fa-"] { font-family: 'FontAwesome' !important; }` to protect Font Awesome glyphs from `style.css`'s universal font override.
  - Replaced the Home menu icon and E-Prospectus Download icon with direct Bootstrap Icons SVGs so they are 100% resilient to font-loading delays or font-family inheritance issues.

## Handoff Summary (2026-10-06)
- **Modified & Restored Files**:
  - [layouts/website.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/layouts/website.blade.php)
  - [public/website/assets/js/custom.js](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/public/website/assets/js/custom.js)
  - [public/fonts/](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/public/fonts)
- **Status**: Committed to local git (`2e97795e`). Production assets built via `npm run build`.

## Unresolved Questions
- None.


