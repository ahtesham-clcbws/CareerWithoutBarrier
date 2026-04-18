# Fix Overlapping Tabs on Scroll (About Us Page)

The user clarified that the tabs only overlap the header navigation during scrolling. This indicates a horizontal/vertical stacking issue (z-index) when the header becomes fixed.

## User Review Required

> [!IMPORTANT]
> I am proposing to increase the `z-index` of the fixed header and ensure the content stays behind it unless intended otherwise. If the tabs are meant to be sticky, I will also provide a proper offset.

## Proposed Changes

### website

#### [MODIFY] [aboutus.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/website/aboutus.blade.php)
- Add a `<style>` block to specifically target the header when it is in "fixed" mode.
- Increase the `z-index` of `.menu-head.fix-menu` to ensure it remains above the content tabs.
- If the tabs are sticky, adjust their `top` offset to clear the fixed header area.

```html
@section('content')
<style>
    /* Ensure the fixed header is always on top of the tabs */
    .menu-head.fix-menu {
        z-index: 1050 !important; /* Higher than other content elements */
    }

    /* Fixed top margin to clear the absolute header on page load */
    .perpration-page-banner.common-banner {
        margin-top: 110px !important;
    }

    /* Target the tabs specifically if they have their own stacking context */
    .carrier-glance .nav-tabs {
        position: relative;
        z-index: 10; /* Lower than header */
    }

    @media (max-width: 991px) {
        .perpration-page-banner.common-banner {
            margin-top: 80px !important;
        }
    }
</style>
...
```

## Verification Plan

### Manual Verification
- Scroll down the About Us page and verify the tabs pass BEHIND the header navigation.
- Ensure the header remains functional and clickable.
