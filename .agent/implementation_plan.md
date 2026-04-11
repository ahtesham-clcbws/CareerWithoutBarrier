# Fix: Re-enable Laravel Debugbar

The Debugbar is currently disabled because it was explicitly added to the `dont-discover` list in `composer.json`. Additionally, some registration code in `AppServiceProvider.php` was commented out.

## Proposed Changes

### [Component Name] composer.json

#### [MODIFY] [composer.json](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/composer.json)
Remove `barryvdh/laravel-debugbar` from the `dont-discover` array to allow Laravel's package discovery to automatically load the service provider and facades.

---

### [Component Name] AppServiceProvider

#### [MODIFY] [AppServiceProvider.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Providers/AppServiceProvider.php)
Uncomment the registration logic if necessary, or better yet, let auto-discovery handle it once `composer.json` is updated. I will remove the commented-out block to keep the code clean if auto-discovery is used.

## Verification Plan

### Automated Tests
- Run `composer dump-autoload` to refresh the package discovery cache.
- Run `php artisan package:discover` to verify that Debugbar is now discovered.

### Manual Verification
- Refresh the browser and check if the Debugbar appears at the bottom of the page.
- Verify that `APP_DEBUG=true` and `DEBUGBAR_ENABLED=true` are set in `.env` (already confirmed).
