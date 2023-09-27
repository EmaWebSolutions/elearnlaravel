@extends('frontend.layouts.app')
@section('meta')
    @php
        $metaData = getMeta('home');
    @endphp

    <meta name="description" content="{{ __($metaData['meta_description']) }}">
    <meta name="keywords" content="{{ __($metaData['meta_keyword']) }}">

    <!-- Open Graph meta tags for social sharing -->
    <meta property="og:type" content="Learning">
    <meta property="og:title" content="{{ __($metaData['meta_title']) }}">
    <meta property="og:description" content="{{ __($metaData['meta_description']) }}">
    <meta property="og:image" content="{{ __($metaData['og_image']) }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta property="og:site_name" content="{{ __(get_option('app_name')) }}">

    <!-- Twitter Card meta tags for Twitter sharing -->
    <meta name="twitter:card" content="Learning">
    <meta name="twitter:title" content="{{ __($metaData['meta_title']) }}">
    <meta name="twitter:description" content="{{ __($metaData['meta_description']) }}">
    <meta name="twitter:image" content="{{ __($metaData['og_image']) }}">
    @if(isAddonInstalled('LMSZAIPRODUCT'))
    <link rel="stylesheet" href="{{ asset('addon/product/css/ecommerce-product.css') }}">
    @endif
@endsection
@section('content')
    <!-- Header Start -->
    <header class="hero-area gradient-bg position-relative">
        <div class="section-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-5">
                        <div class="hero-content">

                            <div class="text">
                                <h1 class="hero-heading">
                                   Learning online with EmaWebAcademy
                                </h1>
                                
                            </div>

                            <p>{{ __(@$home->banner_subtitle) }} </p>
                            @if(!get_option('private_mode') || !auth()->guest())
                            <div class="hero-btns">
                                <a href="{{ route('courses') }}" class="theme-btn theme-button1">{{ __('Browse Course') }} <i data-feather="arrow-right"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-md-5 col-lg-7">
                        <div class="hero-right-side">
                          <img src="{{ asset('frontend/assets/img/banner.png') }}" alt="hero-img" style="margin:-50px 50px 0px 50px" class="img-fluid">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

   <!-- Special Feature Area Start -->
<section class="special-feature-area p-0 {{ @$home->special_feature_area == 1 ? '' : 'd-none' }}">
    <div class="container">
        <div class="row">
            <!-- Single Feature Item start-->
            <div class="col-md-4">
                <div class="single-feature-item d-flex align-items-center">
                    <div class="flex-shrink-0 feature-img-wrap">
                        <i class="fas fa-heartbeat fa-3x"></i> <!-- Replace with the desired FontAwesome icon class -->
                    </div>
                    <div class="flex-grow-1 ms-3 feature-content">
                        <h6>{{ __(get_option('home_special_feature_first_title')) }}</h6>
                        <p>{{ __(get_option('home_special_feature_first_subtitle')) }}</p>
                    </div>
                </div>
            </div>
            <!-- Single Feature Item End-->
            <!-- Single Feature Item start-->
            <div class="col-md-4">
                <div class="single-feature-item d-flex align-items-center">
                    <div class="flex-shrink-0 feature-img-wrap">
                        <i class="fas fa-star fa-3x"></i> <!-- Replace with the desired FontAwesome icon class -->
                    </div>
                    <div class="flex-grow-1 ms-3 feature-content">
                        <h6>{{ __(get_option('home_special_feature_second_title')) }}</h6>
                        <p>{{ __(get_option('home_special_feature_second_subtitle')) }}</p>
                    </div>
                </div>
            </div>
            <!-- Single Feature Item End-->
            <!-- Single Feature Item start-->
            <div class="col-md-4">
                <div class="single-feature-item d-flex align-items-center">
                    <div class="flex-shrink-0 feature-img-wrap">
                        <i class="fas fa-cogs fa-3x"></i> <!-- Replace with the desired FontAwesome icon class -->
                    </div>
                    <div class="flex-grow-1 ms-3 feature-content">
                        <h6>{{ __(get_option('home_special_feature_third_title')) }}</h6>
                        <p>{{ __(get_option('home_special_feature_third_subtitle')) }}</p>
                    </div>
                </div>
            </div>
            <!-- Single Feature Item End-->
        </div>
    </div>
</section>


    @if(!get_option('private_mode') || !auth()->guest())

   <!-- All Courses Area Start -->
<!-- All Courses Area Start -->
<section class="courses-area section-t-space section-b-85-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Center-align the title -->
                <div class="text-center">
                    <h3 class="section-heading">Courses</h3>
                </div>
                <!-- Center-align the title -->

                <!-- One to one consultation Slider start -->
                <div class="row">
                    <div class="col-12">
                        @if(count($courses))
                        <!-- Consultation instructor slider items wrap -->
                        <div class="course-slider-items owl-carousel owl-theme">
                            @foreach ($courses as $course)
                            @php
                                $userRelation = getUserRoleRelation($course->user);
                            @endphp
                            <div class="col-12 col-sm-4 col-lg-3 w-100">
                                @include('frontend.partials.course')
                            </div>
                            @endforeach
                        </div>
                        @else
                        {{ __("No Course Found") }}
                        @endif
                    </div>
                </div>
                <!-- One to one consultation Slider end -->
                
                <!-- View All button at the bottom -->
                <div class="text-center mt-4">
                    <a href="{{ route('courses') }}" class="theme-btn theme-button2 theme-button3">{{ __('View All') }} <i data-feather="arrow-right"></i></a>
                </div>
                <!-- View All button at the bottom -->
                
            </div>
        </div>
    </div>
</section>
<!-- All Courses Area END -->

<!-- All Courses Area END -->

    @if($home->category_courses_area == 1)
    <!-- Board Selection of Courses Area Start -->
    <section class="courses-area section-t-space section-b-85-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section-left-align-->
                    <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                        <div class="section-title section-title-left d-flex align-items-start">
                            <div class="section-heading-img"><img src="{{ getImageFile(get_option('category_course_logo')) }}" alt="Category Course"></div>
                            <div>
                                <h3 class="section-heading">{{ __(get_option('category_course_title')) }}</h3>
                                <p class="section-sub-heading">{{ __(get_option('category_course_subtitle')) }}</p>
                            </div>
                        </div>

                        <!-- Tab panel nav list -->
                        <div class="course-tab-nav-wrap d-flex justify-content-between">
                            <ul class="nav nav-tabs tab-nav-list border-0" id="myTab" role="tablist">
                                @foreach($featureCategories as $key => $category)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $category->slug }}-tab" data-bs-toggle="tab" href="#{{ $category->slug }}" role="tab"
                                           aria-controls="{{ $category->slug }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ __($category->name) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Tab panel nav list -->

                    </div>
                    <!-- section-left-align-->
                </div>
            </div>

            <!-- Tab Content-->
            <div class="tab-content" id="myTabContent">
                @foreach($featureCategories as $key => $category)
                    <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="{{ $category->slug }}" role="tabpanel" aria-labelledby="{{ $category->slug }}-tab">
                            <div class="course-slider-items owl-carousel owl-theme">
                                <!-- Course item start -->
                                @foreach($category->courses as $course)
                                @php
                                    $userRelation = getUserRoleRelation($course->user);
                                @endphp
                                <div class="col-12 col-sm-4 col-lg-3 w-100">
                                    @include('frontend.partials.course')
                                </div>
                                @endforeach
                                <!-- Course item end -->
                            </div>
                        </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- Board Selection of Courses Area End -->
    @endif


    @endif

    @if($home->top_category_area == 1)
    <!-- Our Top Categories Area Start -->
    <section class="top-categories-area p-0">
        <div class=" section-t-space section-b-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <div class="section-heading-img"></div>
                            <h3 class="section-heading section-heading-light">Categories</h3>
                           
                        </div>
                    </div>
                </div>
                <div class="row top-categories-content-wrap">
                    @foreach(@$firstFourCategories as $firstFourCategory)

                        <!-- Single Feature Item start-->
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="single-feature-item top-cat-item align-items-center">
                               
                                <div class="flex-grow-1 mt-3 feature-content">
                                    <h6>{{ Str::limit($firstFourCategory->name, 20) }}</h6>
                                    <p>{{ @$firstFourCategory->courses->count() }} {{ __('Courses') }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Feature Item End-->

                    @endforeach
                    @if(!get_option('private_mode') || !auth()->guest())
                    <!-- section button start-->
                    <div class="col-12 text-center section-btn">
                        <a href="{{ route('courses') }}" class="theme-btn theme-button1">{{ __('All Categories') }} <i data-feather="arrow-right"></i></a>
                    </div>
                    <!-- section button end-->
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- Our Top Categories Area End -->
    @endif

<!-- Subscription Start -->
@if( @$home->subscription_show == 1 && get_option('subscription_mode'))
    @include('frontend.home.partial.subscription-home-list')
@endif
<!-- Subscription End -->

@if($home->instructor_area == 1)
<!-- Our Top Instructor Area Start -->
<section class="top-instructor-area section-t-space bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Center-align the title -->
                <div class="text-center">
                    <h3 class="section-heading">Instructor</h3>
                    
                </div>
                <!-- Center-align the title -->
            </div>
        </div>
        <div class="row top-instructor-content-wrap">
            @foreach ($instructors as $instructorUser)
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mt-0 mb-25">
                <div class="instructor-card">
                    <x-frontend.instructor :user="$instructorUser" :type=INSTRUCTOR_CARD_TYPE_ONE />
                </div>
            </div>
            @endforeach
        </div>
        <!-- Button "View All Instructor" at the bottom -->
        <div class="row">
            <div class="col-12 text-center mt-4">
                <a href="{{ route('instructor') }}" class="theme-btn theme-button2 theme-button3">{{ __('View All Instructor') }} <i data-feather="arrow-right"></i></a>
            </div>
        </div>
        <!-- Button "View All Instructor" at the bottom -->
    </div>
</section>
<!-- Our Top Instructor Area End -->
@endif


@if($home->achievement_area == 1)
<!-- Achievement Area Start -->
<section class="achievement-area">
    <div class="container">
        <div class="row achievement-content-area justify-content-center">
            <!-- Achievement Item start-->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="achievement-item d-flex align-items-center">
                    <div class="flex-shrink-0 achievement-icon-wrap">
                        <i class="fas fa-graduation-cap fa-3x"></i> <!-- Replace with your desired FontAwesome icon class -->
                    </div>
                    <div class="flex-grow-1 ms-3 achievement-content">
                        <h6>{{ __(get_option('achievement_first_title')) }}</h6>
                        <p>{{ __(get_option('achievement_first_subtitle')) }}</p>
                    </div>
                </div>
            </div>
            <!-- Achievement Item End-->

            <!-- Achievement Item start-->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="achievement-item d-flex align-items-center">
                    <div class="flex-shrink-0 achievement-icon-wrap">
                        <i class="fas fa-trophy fa-3x"></i> <!-- Replace with your desired FontAwesome icon class -->
                    </div>
                    <div class="flex-grow-1 ms-3 achievement-content">
                        <h6>{{ __(get_option('achievement_second_title')) }}</h6>
                        <p>{{ __(get_option('achievement_second_subtitle')) }}</p>
                    </div>
                </div>
            </div>
            <!-- Achievement Item End-->

            <!-- Achievement Item start-->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="achievement-item d-flex align-items-center">
                    <div class="flex-shrink-0 achievement-icon-wrap">
                        <i class="fas fa-certificate fa-3x"></i> <!-- Replace with your desired FontAwesome icon class -->
                    </div>
                    <div class="flex-grow-1 ms-3 achievement-content">
                        <h6>{{ __(get_option('achievement_third_title')) }}</h6>
                        <p>{{ __(get_option('achievement_third_subtitle')) }}</p>
                    </div>
                </div>
            </div>
            <!-- Achievement Item End-->

            <!-- Achievement Item start-->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="achievement-item d-flex align-items-center">
                    <div class="flex-shrink-0 achievement-icon-wrap">
                        <i class="fas fa-users fa-3x"></i> <!-- Replace with your desired FontAwesome icon class -->
                    </div>
                    <div class="flex-grow-1 ms-3 achievement-content">
                        <h6>{{ __(get_option('achievement_four_title')) }}</h6>
                        <p>{{ __(get_option('achievement_four_subtitle')) }}</p>
                    </div>
                </div>
            </div>
            <!-- Achievement Item End-->
        </div>
    </div>
</section>
<!-- Achievement Area End -->
@endif



    @if($home->customer_says_area == 1)
    <!-- Customers Says/ testimonial Area Start -->
    <section class="customers-says-area gradient-bg p-0">
        <div class="section-t-space section-b-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                         
                            <h3 class="section-heading section-heading-light mx-auto">{{ __(get_option('customer_say_title')) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-content-wrap">

                    <!-- Single Testimonial Item start-->
                    <div class="col-md-4">
                        <div class="testimonial-item">
                            <div class="testimonial-top-content d-flex align-items-center">
                                <div class="flex-shrink-0 quote-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/icons-svg/quote.svg') }}" alt="quote">
                                </div>
                                <div class="flex-grow-1 ms-3 testimonial-content">
                                    <h6 class="font-16">{{ __(get_option('customer_say_first_name')) }}</h6>
                                    <p class="font-13 font-medium">{{ __(get_option('customer_say_first_position')) }}</p>
                                </div>
                            </div>
                            <div class="testimonial-bottom-content">
                                <h6 class="text-white">{{ __(get_option('customer_say_first_comment_title')) }}</h6>
                                <p class="font-17">{{ __(get_option('customer_say_first_comment_description') )}}</p>
                                @include('frontend.home.partial.customer-say-first-comment-rating')
                            </div>

                        </div>
                    </div>
                    <!-- Single Testimonial Item End-->

                    <!-- Single Testimonial Item start-->
                    <div class="col-md-4">
                        <div class="testimonial-item">
                            <div class="testimonial-top-content d-flex align-items-center">
                                <div class="flex-shrink-0 quote-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/icons-svg/quote.svg') }}" alt="quote">
                                </div>
                                <div class="flex-grow-1 ms-3 testimonial-content">
                                    <h6 class="font-16">{{ __(get_option('customer_say_second_name')) }}</h6>
                                    <p class="font-13 font-medium">{{ __(get_option('customer_say_second_position')) }}</p>
                                </div>
                            </div>
                            <div class="testimonial-bottom-content">
                                <h6 class="text-white">{{ __(get_option('customer_say_second_comment_title')) }}</h6>
                                <p class="font-17">{{ __(get_option('customer_say_second_comment_description')) }}</p>
                                @include('frontend.home.partial.customer-say-second-comment-rating')
                            </div>

                        </div>
                    </div>
                    <!-- Single Testimonial Item End-->

                    <!-- Single Testimonial Item start-->
                    <div class="col-md-4">
                        <div class="testimonial-item">
                            <div class="testimonial-top-content d-flex align-items-center">
                                <div class="flex-shrink-0 quote-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/icons-svg/quote.svg') }}" alt="quote">
                                </div>
                                <div class="flex-grow-1 ms-3 testimonial-content">
                                    <h6 class="font-16">{{ __(get_option('customer_say_third_name')) }}</h6>
                                    <p class="font-13 font-medium">{{ __(get_option('customer_say_third_position')) }}</p>
                                </div>
                            </div>
                            <div class="testimonial-bottom-content">
                                <h6 class="text-white">{{ __(get_option('customer_say_third_comment_title')) }}</h6>
                                <p class="font-17">{{ __(get_option('customer_say_third_comment_description')) }}</p>
                                @include('frontend.home.partial.customer-say-third-comment-rating')
                            </div>

                        </div>
                    </div>
                    <!-- Single Testimonial Item End-->

                </div>
            </div>
        </div>
    </section>
    <!-- Customers Says/ testimonial Area End -->
    @endif



   
   
@endsection

@push('style')
    <!-- Video Player css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/video-player/plyr.css') }}">
@endpush

@push('script')
    <!--Hero text effect-->
    <script src="{{ asset('frontend/assets/js/hero-text-effect.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/course/addToCart.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/course/addToWishlist.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/booking.js') }}"></script>

    <!-- Video Player js -->
    <script src="{{ asset('frontend/assets/vendor/video-player/plyr.js') }}"></script>
    <script>
        const zai_player = new Plyr('#player');
    </script>
    <!-- Video Player js -->
@endpush
