<!-- resources/views/website/preparation.blade.php -->
@extends('layouts.website')

@section('title', 'Exam Preparation & Courses - Career Without Barrier')

@section('content')
    <style>
        .preparation-top-banner {
            background-color: #f26b3c;
        }

        .preparation-main-title {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .preparation-sub-title {
            font-size: 18px;
            opacity: 0.95;
            font-weight: 500;
        }

        .preparation-section {
            padding: 50px 0 80px 0;
            background-color: #f8fafc;
        }

        /* Desktop Sidebar */
        .cwb-sidebar-box {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
            position: sticky;
            top: 90px;
        }

        .cwb-sidebar-title {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.3px;
            margin-bottom: 18px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cwb-sidebar-search {
            position: relative;
            margin-bottom: 20px;
        }

        .cwb-sidebar-search input {
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding-left: 36px;
            font-size: 13px;
            height: 42px;
        }

        .cwb-sidebar-search i {
            position: absolute;
            left: 12px;
            top: 13px;
            color: #94a3b8;
            font-size: 14px;
        }

        .cwb-sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .cwb-sidebar-list li {
            margin-bottom: 8px;
        }

        .cwb-sidebar-list a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 9px 12px;
            border-radius: 8px;
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.2s ease;
        }

        .cwb-sidebar-list a:hover,
        .cwb-sidebar-list a.active {
            background: #fff7ed;
            color: #ea580c;
        }

        .cwb-sidebar-list a i {
            font-size: 12px;
            color: #94a3b8;
            transition: transform 0.2s;
        }

        .cwb-sidebar-list a:hover i {
            color: #ea580c;
            transform: translateX(3px);
        }

        /* Main Content Header */
        .cwb-courses-header {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            padding: 16px 20px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        }

        .cwb-found-count {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
        }

        .cwb-found-count span {
            color: #ea580c;
        }

        /* Course Cards */
        .cwb-course-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .cwb-course-card:hover {
            transform: translateY(-4px);
            border-color: #fdba74;
            box-shadow: 0 12px 28px rgba(242, 107, 60, 0.12);
        }

        .cwb-course-thumb {
            height: 190px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 20px;
            border-bottom: 1px solid #f1f5f9;
        }

        .cwb-course-thumb img {
            max-height: 130px;
            max-width: 80%;
            width: auto;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .cwb-course-card:hover .cwb-course-thumb img {
            transform: scale(1.05);
        }

        .cwb-vacancy-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(15, 23, 42, 0.85);
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            backdrop-filter: blur(4px);
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .cwb-course-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .cwb-category-tag {
            font-size: 11px;
            font-weight: 700;
            color: #ea580c;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .cwb-course-title {
            font-size: 17px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
            line-height: 1.35;
        }

        .cwb-course-title a {
            color: #0f172a;
            text-decoration: none;
            transition: color 0.2s;
        }

        .cwb-course-title a:hover {
            color: #f26b3c;
        }

        .cwb-course-sub {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 16px;
            line-height: 1.45;
            flex-grow: 1;
        }

        .cwb-course-footer {
            margin-top: auto;
            border-top: 1px solid #f1f5f9;
            padding-top: 14px;
        }

        .cwb-btn-view {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 10px 16px;
            background: #fff7ed;
            color: #ea580c !important;
            border: 1px solid #fed7aa;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            transition: all 0.2s ease;
            text-decoration: none !important;
        }

        .cwb-btn-view:hover {
            background: #f26b3c;
            color: #ffffff !important;
            border-color: #f26b3c;
        }

        /* Mobile Adjustments */
        @media (max-width: 991px) {
            .preparation-main-title {
                font-size: 24px;
            }

            .preparation-sub-title {
                font-size: 14px;
            }

            .preparation-section {
                padding: 25px 0 50px 0;
            }

            .cwb-courses-header {
                flex-direction: column;
                gap: 12px;
                align-items: stretch;
                padding: 14px 16px;
            }

            .cwb-mobile-search-wrap {
                position: relative;
                width: 100%;
            }

            .cwb-mobile-search-wrap input {
                border-radius: 10px;
                border: 1px solid #cbd5e1;
                padding-left: 36px;
                font-size: 13px;
                height: 40px;
                width: 100%;
            }

            .cwb-mobile-search-wrap i {
                position: absolute;
                left: 12px;
                top: 13px;
                color: #94a3b8;
                font-size: 13px;
            }

            .cwb-course-thumb {
                height: 160px;
                padding: 16px;
            }

            .cwb-course-thumb img {
                max-height: 110px;
            }

            .cwb-course-body {
                padding: 16px;
            }

            .cwb-course-title {
                font-size: 16px;
            }
        }
    </style>

    <div class="w-100 preparation-top-banner">
        <div class="container text-center py-4 py-md-5">
            <h2 class="text-white preparation-main-title">Competitive Exam Preparation</h2>
            <p class="text-white mb-0 preparation-sub-title">100% Scholarship-Supported Coaching for Top Government & Academic Exams</p>
        </div>
    </div>

    <section class="preparation-section">
        <div class="container">
            <div class="row">
                <!-- Desktop Sidebar -->
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="cwb-sidebar-box">
                        <div class="cwb-sidebar-title">
                            <span>Courses</span>
                            <span class="badge badge-pill badge-light text-muted">{{ count($featuredCourses) }}</span>
                        </div>
                        <div class="cwb-sidebar-search">
                            <i class="fa fa-search"></i>
                            <input type="text" id="courseSearchInput" class="form-control" placeholder="Search exam/course...">
                        </div>
                        @foreach ($featuredCourses->groupBy('scholarship_category') as $courses)
                            <div class="mb-3">
                                <h6 class="text-uppercase text-muted font-weight-bold mb-2" style="font-size: 11px; letter-spacing: 0.5px;">
                                    {{ $courses->first()?->scholarshipCategory?->name ?? 'Career Prep' }}
                                </h6>
                                <ul class="cwb-sidebar-list">
                                    @foreach ($courses as $course)
                                        <li>
                                            <a href="{{ route('home.career', encodeId($course->id)) }}">
                                                <span>{{ $course->title }}</span>
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Main Courses Grid -->
                <div class="col-lg-9 col-12">
                    <div class="cwb-courses-header">
                        <div class="cwb-found-count">
                            <span id="visibleCount">{{ count($featuredCourses) }}</span> Courses Available
                        </div>
                        <div class="cwb-mobile-search-wrap d-lg-none">
                            <i class="fa fa-search"></i>
                            <input type="text" id="mobileCourseSearch" class="form-control" placeholder="Search courses or exams...">
                        </div>
                    </div>

                    <div class="row" id="coursesGridContainer">
                        @foreach ($featuredCourses as $featuredCourse)
                            <div class="col-lg-6 col-md-6 col-12 mb-4 course-item-col"
                                 data-title="{{ strtolower($featuredCourse->title . ' ' . $featuredCourse->course_full_name) }}">
                                <div class="cwb-course-card">
                                    <div class="cwb-course-thumb">
                                        <img src="{{ asset('home/course/' . $featuredCourse->featured_image) }}"
                                             onerror="this.onerror=null;this.src='{{ asset('website/assets/images/placeholder.webp') }}';"
                                             alt="{{ $featuredCourse->title }}"
                                             loading="lazy">
                                        @if ($featuredCourse->vacancies && strtolower(trim($featuredCourse->vacancies)) !== 'no data available')
                                            <span class="cwb-vacancy-badge">
                                                <i class="fa fa-users mr-1"></i> {{ $featuredCourse->vacancies }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="cwb-course-body">
                                        <span class="cwb-category-tag">
                                            {{ $featuredCourse->scholarshipCategory?->name ?? 'Career Prep Scholarship' }}
                                        </span>
                                        <h4 class="cwb-course-title">
                                            <a href="{{ route('home.career', encodeId($featuredCourse->id)) }}">
                                                {{ $featuredCourse->title }}
                                            </a>
                                        </h4>
                                        <p class="cwb-course-sub">
                                            {{ $featuredCourse->course_full_name }}
                                        </p>
                                        <div class="cwb-course-footer">
                                            <a href="{{ route('home.career', encodeId($featuredCourse->id)) }}" class="cwb-btn-view">
                                                <span>View Course Details</span>
                                                <i class="fa fa-arrow-right ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="noCoursesFound" class="text-center py-5" style="display: none;">
                        <i class="fa fa-search fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No courses found matching your search</h5>
                        <p class="text-muted small">Try searching with a different term or keyword</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            function filterCourses(query) {
                query = (query || '').toLowerCase().trim();
                var count = 0;
                $('.course-item-col').each(function() {
                    var title = $(this).data('title') || '';
                    if (!query || title.indexOf(query) !== -1) {
                        $(this).show();
                        count++;
                    } else {
                        $(this).hide();
                    }
                });
                $('#visibleCount').text(count);
                if (count === 0) {
                    $('#noCoursesFound').show();
                } else {
                    $('#noCoursesFound').hide();
                }
            }

            $('#courseSearchInput, #mobileCourseSearch').on('input', function() {
                var val = $(this).val();
                $('#courseSearchInput, #mobileCourseSearch').not(this).val(val);
                filterCourses(val);
            });
        });
    </script>
@endpush
