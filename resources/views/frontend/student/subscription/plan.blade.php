@extends('frontend.layouts.app')
@section('content')
    <div class="bg-page">
        <header class="page-banner-header blank-page-banner-header gradient-bg position-relative">
            <div class="section-overlay">
                <div class="blank-page-banner-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="page-banner-content text-center">
                                    <h3 class="page-banner-heading color-heading pb-15">{{ __(@$pageTitle) }}</h3>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item font-14"><a
                                                    href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                            <li class="breadcrumb-item font-14 active" aria-current="page">
                                                {{ __(@$pageTitle) }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="wishlist-page-area my-courses-page">
            <div class="container">
                <div class="row">
                    <div class="">
                        @if(count($userPackages) > 0)
                            <div class="table-responsive">
                                <table class="table bg-white my-courses-page-table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="color-gray font-15 font-medium">{{ __('SL') }}</th>
                                            <th scope="col" class="color-gray font-15 font-medium">{{ __('Package Title') }}</th>
                                            <th scope="col" class="color-gray font-15 font-medium">{{ __('Enroll Date') }}</th>
                                            <th scope="col" class="color-gray font-15 font-medium">{{ __('Expired Date') }}</th>
                                            <th scope="col" class="color-gray font-15 font-medium">{{ __('Course') }}</th>
                                            <th scope="col" class="color-gray font-15 font-medium">{{ __('Bundle Course') }}</th>
                                            <th scope="col" class="color-gray font-15 font-medium">{{ __('Subscription Course') }}</th>
                                            <th scope="col" class="color-gray font-15 font-medium">{{ __('Consultancy') }}</th>
                                            <th scope="col" class="color-gray font-15 font-medium">{{ __('Device') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userPackages as $userPackage)
                                        @php 
                                            $current = 0;
                                        @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($userPackage->where('status', PACKAGE_STATUS_ACTIVE)->whereDate('enroll_date', '<=', now())->whereDate('expired_date', '>=', now()) && !$current)
                                                    @php 
                                                        $current = 1;
                                                    @endphp   
                                                        <a href="{{ route('student.subscription_plan_details', $userPackage->id) }}">{{ $userPackage->package->title }} <span class="badge bg-success">{{ __('Current') }}</span></a>
                                                    @else
                                                        {{ $userPackage->package->title }}
                                                    @endif
                                                </td>
                                                <td>{{ date('Y-m-d H:i',strtotime($userPackage->enroll_date)) }}</td>
                                                <td>{{ date('Y-m-d H:i',strtotime($userPackage->expired_date)) }}</td>
                                                <td>{{ $userPackage->course }}</td>
                                                <td>{{ $userPackage->bundle_course }}</td>
                                                <td>{{ $userPackage->subscription_course }}</td>
                                                <td>{{ $userPackage->consultancy }}</td>
                                                <td>{{ $userPackage->device }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty-data">
                               <i class="fas fa-image fa-5x"></i>
                                <h4 class="my-3">{{ __('Empty Subscription Plan') }}</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
