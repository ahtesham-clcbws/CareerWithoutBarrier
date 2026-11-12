{{-- Redesigned Modern Responsive Header --}}
<style>
    :root {
        --cwb-primary: #dc2626;
        --cwb-primary-hover: #b91c1c;
        --cwb-dark: #0f172a;
        --cwb-dark-light: #1e293b;
        --cwb-purple: #9333ea;
        --cwb-text: #1f2937;
        --cwb-muted: #64748b;
        --cwb-border: #e2e8f0;
    }

    /* Base Header Wrapper */
    .cwb-header-wrapper {
        position: relative;
        width: 100%;
        z-index: 1000;
        background: #ffffff;
        font-family: inherit;
    }

    /* Top Bar */
    .cwb-topbar {
        background: var(--cwb-dark);
        color: #ffffff;
        font-size: 13px;
        padding: 7px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .cwb-topbar .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cwb-topbar-tagline {
        color: #94a3b8;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .cwb-topbar-tagline strong {
        color: #ffffff;
        font-weight: 600;
    }

    .cwb-topbar-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-left: auto;
    }

    .cwb-prospectus-link {
        color: #e2e8f0;
        font-size: 12px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 8px;
        border-radius: 4px;
        transition: color 0.2s, background 0.2s;
        text-decoration: none !important;
    }

    .cwb-prospectus-link:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.08);
    }

    .cwb-auth-btns {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .cwb-btn-auth {
        background: var(--cwb-primary);
        color: #ffffff !important;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 4px;
        transition: background-color 0.2s, transform 0.1s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none !important;
        border: none;
        cursor: pointer;
        line-height: 1.2;
    }

    .cwb-btn-auth:hover {
        background: var(--cwb-primary-hover);
        color: #ffffff;
        transform: translateY(-1px);
    }

    .cwb-btn-auth.cwb-btn-user {
        background: var(--cwb-dark-light);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .cwb-btn-auth.cwb-btn-user:hover {
        background: rgba(255, 255, 255, 0.15);
    }

    /* Main Navigation Bar */
    .cwb-navbar {
        background: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.3s ease, background 0.3s ease;
        width: 100%;
        position: relative;
    }

    .cwb-navbar.cwb-is-sticky {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1040;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.1);
        animation: cwbSlideDown 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes cwbSlideDown {
        from { transform: translateY(-100%); }
        to { transform: translateY(0); }
    }

    .cwb-nav-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 10px;
        padding-bottom: 10px;
        min-height: 68px;
    }

    /* Brand Logo */
    .cwb-brand {
        display: inline-flex;
        align-items: center;
        text-decoration: none !important;
    }

    .cwb-brand img {
        height: 48px;
        width: auto;
        max-width: 280px;
        object-fit: contain;
        display: block;
        transition: transform 0.2s;
    }

    .cwb-brand:hover img {
        transform: scale(1.01);
    }

    /* Desktop Navigation List */
    .cwb-nav-menu {
        display: flex;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 22px;
    }

    .cwb-nav-item {
        position: relative;
    }

    .cwb-nav-link {
        color: #1e293b;
        font-size: 15px;
        font-weight: 500;
        padding: 8px 4px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        position: relative;
        text-decoration: none !important;
        transition: color 0.2s;
    }

    .cwb-nav-link:hover,
    .cwb-nav-link.active {
        color: var(--cwb-primary);
    }

    .cwb-nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2.5px;
        background: var(--cwb-primary);
        border-radius: 2px;
        transition: width 0.25s ease;
    }

    .cwb-nav-link:hover::after,
    .cwb-nav-link.active::after {
        width: 100%;
    }

    .cwb-home-icon {
        color: inherit;
        display: inline-flex;
        align-items: center;
        font-size: 18px;
    }

    /* Voucher Action Link */
    .cwb-voucher-wrap {
        display: flex;
        align-items: center;
    }

    .cwb-voucher-link {
        color: var(--cwb-purple);
        font-size: 13px;
        font-weight: 800;
        text-decoration: underline;
        padding: 6px 12px;
        border-radius: 6px;
        background: rgba(147, 51, 234, 0.06);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .cwb-voucher-link:hover {
        background: rgba(147, 51, 234, 0.12);
        color: #7e22ce;
        text-decoration: none;
        transform: translateY(-1px);
    }

    /* Mobile Hamburger Trigger */
    .cwb-mobile-toggle-btn {
        display: none;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        background: #f8fafc;
        border: 1px solid var(--cwb-border);
        border-radius: 8px;
        color: #0f172a;
        cursor: pointer;
        padding: 0;
        transition: all 0.2s;
        outline: none !important;
    }

    .cwb-mobile-toggle-btn:hover,
    .cwb-mobile-toggle-btn:focus {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }

    .cwb-hamburger-bars {
        width: 20px;
        height: 14px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .cwb-hamburger-bars span {
        display: block;
        height: 2px;
        width: 100%;
        background: #1e293b;
        border-radius: 2px;
        transition: all 0.25s ease;
    }

    /* Mobile Drawer & Backdrop */
    .cwb-drawer-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.65);
        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
        z-index: 1045;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .cwb-drawer-backdrop.is-active {
        opacity: 1;
        visibility: visible;
    }

    .cwb-drawer-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: 310px;
        max-width: 86vw;
        height: 100%;
        height: 100vh;
        height: 100dvh;
        background: #ffffff;
        z-index: 1050;
        display: flex;
        flex-direction: column;
        box-shadow: -6px 0 25px rgba(0, 0, 0, 0.18);
        transform: translateX(100%);
        transition: transform 0.32s cubic-bezier(0.16, 1, 0.3, 1);
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    .cwb-drawer-panel.is-open {
        transform: translateX(0);
    }

    /* Drawer Header */
    .cwb-drawer-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid var(--cwb-border);
        background: #f8fafc;
    }

    .cwb-drawer-header .cwb-brand img {
        height: 38px;
        max-width: 200px;
    }

    .cwb-drawer-close {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        background: #ffffff;
        border: 1px solid var(--cwb-border);
        border-radius: 50%;
        color: #475569;
        font-size: 20px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .cwb-drawer-close:hover {
        background: #fee2e2;
        color: var(--cwb-primary);
        border-color: #fecaca;
    }

    /* Drawer Body */
    .cwb-drawer-body {
        padding: 20px;
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .cwb-drawer-nav {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .cwb-drawer-nav-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 14px;
        border-radius: 8px;
        color: #1e293b;
        font-size: 15px;
        font-weight: 500;
        text-decoration: none !important;
        transition: background-color 0.2s, color 0.2s;
    }

    .cwb-drawer-nav-link:hover,
    .cwb-drawer-nav-link.active {
        background: #fef2f2;
        color: var(--cwb-primary);
        font-weight: 600;
    }

    .cwb-drawer-nav-link i {
        font-size: 13px;
        color: #94a3b8;
    }

    .cwb-drawer-nav-link:hover i,
    .cwb-drawer-nav-link.active i {
        color: var(--cwb-primary);
    }

    /* Drawer Voucher Banner */
    .cwb-drawer-voucher {
        background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%);
        border: 1px dashed #c4b5fd;
        border-radius: 10px;
        padding: 14px 16px;
        text-align: center;
    }

    .cwb-drawer-voucher a {
        color: var(--cwb-purple);
        font-weight: 800;
        font-size: 13px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    /* Drawer Footer (Actions) */
    .cwb-drawer-footer {
        padding: 20px;
        border-top: 1px solid var(--cwb-border);
        background: #f8fafc;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .cwb-drawer-footer .cwb-prospectus-link {
        background: #ffffff;
        border: 1px solid var(--cwb-border);
        color: #1e293b;
        padding: 10px;
        border-radius: 6px;
        justify-content: center;
        font-weight: 600;
    }

    .cwb-drawer-footer .cwb-prospectus-link:hover {
        background: #f1f5f9;
        color: #0f172a;
    }

    .cwb-drawer-auth-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }

    .cwb-drawer-auth-grid .cwb-btn-auth {
        padding: 10px 0;
        font-size: 12px;
        width: 100%;
    }

    /* Responsive Breakpoints */
    @media (max-width: 991px) {
        .cwb-topbar-tagline {
            display: none;
        }

        .cwb-nav-menu,
        .cwb-voucher-wrap {
            display: none !important;
        }

        .cwb-mobile-toggle-btn {
            display: inline-flex;
        }

        .cwb-brand img {
            height: 40px;
            max-width: 220px;
        }

        .cwb-nav-container {
            min-height: 58px;
            padding-top: 6px;
            padding-bottom: 6px;
        }
    }

    @media (max-width: 576px) {
        .cwb-brand img {
            height: 34px;
            max-width: 185px;
        }

        .cwb-topbar {
            padding: 5px 0;
        }

        .cwb-topbar-actions {
            width: 100%;
            justify-content: space-between;
        }

        .cwb-btn-auth {
            padding: 4px 10px;
            font-size: 10.5px;
        }
    }
</style>

<header class="cwb-header-wrapper" id="cwbHeader">
    <!-- Top Bar -->
    <div class="cwb-topbar">
        <div class="container">
            <div class="cwb-topbar-tagline">
                <span>Education For All Is Our Aim</span>
            </div>

            <div class="cwb-topbar-actions">
                @if ($prospectus?->e_prospectus)
                    <a href="{{ asset('home/eprospectus/' . $prospectus?->e_prospectus) }}"
                       target="_blank"
                       class="cwb-prospectus-link"
                       title="Download E-Prospectus">
                        <span>E-Prospectus</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                        </svg>
                    </a>
                @endif

                <div class="cwb-auth-btns">
                    @auth('student')
                        <a class="cwb-btn-auth cwb-btn-user" href="{{ route('studentDashboard') }}">
                            <span>{{ Auth::guard('student')->user()->name }}</span>
                        </a>
                        <a class="cwb-btn-auth" href="{{ route('student.logout') }}">
                            <span>Logout</span>
                        </a>
                    @else
                        <button type="button" class="cwb-btn-auth" data-toggle="modal" data-target="#myModalLogin">
                            <span>LOGIN</span>
                        </button>
                        <a class="cwb-btn-auth" href="{{ route('registration') }}">
                            <span>SIGN UP</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="cwb-navbar" id="cwbNavbar">
        <div class="container cwb-nav-container">
            <!-- Brand Logo -->
            <a href="{{ route('home.front') }}" class="cwb-brand" aria-label="Career Without Barrier">
                <img src="{{ asset('website/assets/images/brand/logo.png') }}" alt="Career Without Barrier Logo">
            </a>

            <!-- Desktop Nav Items -->
            <ul class="cwb-nav-menu">
                <li class="cwb-nav-item">
                    <a href="{{ route('home.front') }}" class="cwb-nav-link {{ request()->routeIs('home.front') ? 'active' : '' }}" title="Home">
                        <span class="cwb-home-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                            </svg>
                        </span>
                    </a>
                </li>
                <li class="cwb-nav-item">
                    <a href="{{ route('home.aboutus') }}" class="cwb-nav-link {{ request()->routeIs('home.aboutus') ? 'active' : '' }}">
                        About Us
                    </a>
                </li>
                <li class="cwb-nav-item">
                    <a href="{{ route('home.preparation') }}" class="cwb-nav-link {{ request()->routeIs('home.preparation') ? 'active' : '' }}">
                        Preparation For
                    </a>
                </li>
                <li class="cwb-nav-item">
                    <a href="{{ route('home.scholarship') }}" class="cwb-nav-link {{ request()->routeIs('home.scholarship') ? 'active' : '' }}">
                        Scholarship
                    </a>
                </li>
                <li class="cwb-nav-item">
                    <a href="{{ route('home.contact') }}" class="cwb-nav-link {{ request()->routeIs('home.contact') ? 'active' : '' }}">
                        Contact Us
                    </a>
                </li>
            </ul>

            <!-- Voucher Action Link -->
            <div class="cwb-voucher-wrap">
                <a href="{{ route('freeform') }}" class="cwb-voucher-link">
                    <span>Get Discount Voucher</span>
                    <i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 11px;"></i>
                </a>
            </div>

            <!-- Mobile Hamburger Toggle Button -->
            <button type="button" class="cwb-mobile-toggle-btn" id="cwbMobileToggle" aria-label="Toggle navigation menu" aria-expanded="false">
                <div class="cwb-hamburger-bars">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </nav>
</header>

<!-- Mobile Off-Canvas Drawer -->
<div class="cwb-drawer-backdrop" id="cwbDrawerBackdrop"></div>
<aside class="cwb-drawer-panel" id="cwbDrawerPanel" aria-label="Mobile Navigation">
    <div class="cwb-drawer-header">
        <a href="{{ route('home.front') }}" class="cwb-brand">
            <img src="{{ asset('website/assets/images/brand/logo.png') }}" alt="Logo">
        </a>
        <button type="button" class="cwb-drawer-close" id="cwbDrawerClose" aria-label="Close navigation menu">
            &times;
        </button>
    </div>

    <div class="cwb-drawer-body">
        <ul class="cwb-drawer-nav">
            <li>
                <a href="{{ route('home.front') }}" class="cwb-drawer-nav-link {{ request()->routeIs('home.front') ? 'active' : '' }}">
                    <span>Home</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('home.aboutus') }}" class="cwb-drawer-nav-link {{ request()->routeIs('home.aboutus') ? 'active' : '' }}">
                    <span>About Us</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('home.preparation') }}" class="cwb-drawer-nav-link {{ request()->routeIs('home.preparation') ? 'active' : '' }}">
                    <span>Preparation For</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('home.scholarship') }}" class="cwb-drawer-nav-link {{ request()->routeIs('home.scholarship') ? 'active' : '' }}">
                    <span>Scholarship</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('home.contact') }}" class="cwb-drawer-nav-link {{ request()->routeIs('home.contact') ? 'active' : '' }}">
                    <span>Contact Us</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
        </ul>

        <div class="cwb-drawer-voucher">
            <a href="{{ route('freeform') }}">
                <i class="fa fa-ticket" aria-hidden="true"></i>
                <span>Get Discount Voucher</span>
            </a>
        </div>
    </div>

    <div class="cwb-drawer-footer">
        @if ($prospectus?->e_prospectus)
            <a href="{{ asset('home/eprospectus/' . $prospectus?->e_prospectus) }}"
               target="_blank"
               class="cwb-prospectus-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                </svg>
                <span>Download E-Prospectus</span>
            </a>
        @endif

        <div class="cwb-drawer-auth-grid">
            @auth('student')
                <a class="cwb-btn-auth cwb-btn-user" href="{{ route('studentDashboard') }}">
                    <span>{{ Auth::guard('student')->user()->name }}</span>
                </a>
                <a class="cwb-btn-auth" href="{{ route('student.logout') }}">
                    <span>Logout</span>
                </a>
            @else
                <button type="button" class="cwb-btn-auth" data-toggle="modal" data-target="#myModalLogin" onclick="closeCwbDrawer()">
                    <span>LOGIN</span>
                </button>
                <a class="cwb-btn-auth" href="{{ route('registration') }}">
                    <span>SIGN UP</span>
                </a>
            @endauth
        </div>
    </div>
</aside>

<script>
    (function () {
        var mobileToggle = document.getElementById('cwbMobileToggle');
        var drawerClose = document.getElementById('cwbDrawerClose');
        var backdrop = document.getElementById('cwbDrawerBackdrop');
        var drawer = document.getElementById('cwbDrawerPanel');
        var navbar = document.getElementById('cwbNavbar');

        function openDrawer() {
            if (drawer && backdrop) {
                drawer.classList.add('is-open');
                backdrop.classList.add('is-active');
                document.body.style.overflow = 'hidden';
                if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'true');
            }
        }

        window.closeCwbDrawer = function () {
            if (drawer && backdrop) {
                drawer.classList.remove('is-open');
                backdrop.classList.remove('is-active');
                document.body.style.overflow = '';
                if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'false');
            }
        };

        if (mobileToggle) {
            mobileToggle.addEventListener('click', function (e) {
                e.preventDefault();
                openDrawer();
            });
        }

        if (drawerClose) {
            drawerClose.addEventListener('click', function (e) {
                e.preventDefault();
                window.closeCwbDrawer();
            });
        }

        if (backdrop) {
            backdrop.addEventListener('click', function () {
                window.closeCwbDrawer();
            });
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                window.closeCwbDrawer();
            }
        });

        // Sticky Navbar on Scroll
        var stickyThreshold = 45;
        window.addEventListener('scroll', function () {
            if (!navbar) return;
            if (window.scrollY > stickyThreshold) {
                navbar.classList.add('cwb-is-sticky');
            } else {
                navbar.classList.remove('cwb-is-sticky');
            }
        }, { passive: true });
    })();
</script>

