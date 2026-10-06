## Decisions & "Why" (Last updated: 2026-10-06)
- **Homepage & Layout Mobile Responsiveness**: Overhauled `homepage.blade.php`, `layouts/website.blade.php`, and `custom.js` to eliminate layout bugs on screens < 768px.
- **Blade Architecture Isolation**: Relocated inline homepage `<style>` into `@push('custom-styles')` and eliminated obsolete jQuery 1.11.0 / migrate CDN scripts that were polluting the global scope ahead of layout's jQuery 3.6.0.
- **Navigation Drawer Collision Elimination**: Removed the `.menu` class from `.menu-top3` to prevent duplicate fixed sliding overlays, added a `.menu-close-btn` and `.menu-backdrop` with body scroll lock.
- **Form & Carousel Mobile Adaptations**: Fixed `.pop-up2` 50% width bug in modals, flexbox crushing on education category cards, course card title `line-height` blowouts, and tuned Splide breakpoints so mobile devices `<= 576px` display 1 card per slide.

## Handoff Summary (2026-10-06)
- **Modified Files**:
  - [layouts/website.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/layouts/website.blade.php)
  - [website/homepage.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/website/homepage.blade.php)
  - [public/website/assets/js/custom.js](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/public/website/assets/js/custom.js)
- **Status**: Tested and verified with 0 PHP/Blade syntax errors.

## Unresolved Questions
- None.

