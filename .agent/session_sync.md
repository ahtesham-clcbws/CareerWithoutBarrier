## Decisions & "Why" (Last updated: 2026-10-06)
- **Header Layout Restoration**: Reverted the website header layout, markup, styling, and JavaScript logic back to the original version in [layouts/website.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/layouts/website.blade.php) and [custom.js](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/public/website/assets/js/custom.js).
- **Font Awesome 404 Resolution**:
  - `public/fonts/` previously contained font files saved with literal query parameters in filenames (`fontawesome-webfont.woff2_v=4.7.0`), causing web servers to 404 when looking for `fontawesome-webfont.woff2`.
  - Standardized font assets in `public/fonts/` (`woff2`, `woff`, `ttf`, `eot`, `svg`) and removed the duplicate `<link href="{{ asset('css/font-awesome.min.css') }}">` inclusion from the layout.
- **Homepage Mobile Improvements**: Preserved education cards flex-wrapping, scoped custom styles inside `@push('custom-styles')`, and kept Splide breakpoint improvements.

## Handoff Summary (2026-10-06)
- **Modified & Restored Files**:
  - [layouts/website.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/layouts/website.blade.php)
  - [public/website/assets/js/custom.js](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/public/website/assets/js/custom.js)
  - [public/fonts/](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/public/fonts)
- **Status**: Committed to local git (`d00e2168`). Production assets built via `npm run build`.

## Unresolved Questions
- None.


