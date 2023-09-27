@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Dashboard') }} </h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{ get_option('app_name') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-user-tie color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">{{ $total_admins }}</h2>
                            <h3>{{ __('Total Admin') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-laptop color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">{{ $total_instructors }}</h2>
                            <h3>{{ __('Total Instructors') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-graduation-cap color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">{{ $total_students }}</h2>
                            <h3>{{ __('Total Students') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-book-open color-green"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-green">{{ $total_courses }}</h2>
                            <h3>{{ __('Total Courses') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">

                        <div class="status__box__icon">
                            <i class="fas fa-check-circle color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">{{ $total_active_courses }}</h2>
                            <h3>{{ __('Active Courses') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-download color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">{{ $total_pending_courses }}</h2>
                            <h3>{{ __('Pending Courses') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-credit-card color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">{{ $total_free_courses }}</h2>
                            <h3>{{ __('Free Courses') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-dollar-sign color-green"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-green">{{ $total_paid_courses }}</h2>
                            <h3>{{ __('Paid Courses') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-list-alt color-red"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-red">{{ $total_lessons }}</h2>
                            <h3>{{ __('Total Lessons') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-desktop color-red"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-red">{{ $total_lectures }}</h2>
                            <h3>{{ __('Total Lectures') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-blog color-yellow"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-yellow">{{ $total_blogs }}</h2>
                            <h3>{{ __('Total Blogs') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-money-bill-alt color-green"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-green">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_paid_sales }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_paid_sales }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Paid Sales') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-money-check-alt color-red"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-red">{{ $total_free_sales }}</h2>
                            <h3>{{ __('Total Free Sales') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-money-check color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_platform_charge }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_platform_charge }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Platform Charge') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-money-bill-wave color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_platform_charge_this_month }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_platform_charge_this_month }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Platform Charge (Current Month)') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-percent color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_admin_commission }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_admin_commission }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Sell Commission') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-shopping-cart color-red"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-red">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_admin_commission_this_month }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_admin_commission_this_month }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Sell Commission (Current Month)') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-money-bill color-blue"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_revenue }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_revenue }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Revenue') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-money-check-alt color-yellow"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-yellow">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_new_withdraws }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_new_withdraws }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Request Withdraw') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__icon">
                            <i class="fas fa-money-check color-green"></i>
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-green">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_complete_withdraws }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_complete_withdraws }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Complete Withdraw') }}</h3>
                        </div>
                    </div>
                </div>
            </div>


    <div class="row">
        <!-- Enrollment Chart -->
        <div class="col-md-12">
            <div class="custom-card">
                <div class="card-header">
                    <h2 class="card-title">{{ __('Enrollment') }}</h2>
                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">
                                {{ __('Month') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" role="tab" aria-controls="nav-three" aria-selected="false">
                                {{ __('Year') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="total-enrollment">
                        <h2>{{ __('Total Enrollment') }} <span>{{ $total_enrolments }}</span></h2>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                            <div id="chartMonth"></div>
                        </div>
                        <div class="tab-pane fade show active" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                            <div id="chartYear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Top Courses and Requested Withdrawal -->
    <div class="row">
        <!-- Top Courses -->


        <!-- Requested Withdrawal -->
        <div class="col-md-12">
            <div class="custom-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="card-title">{{ __('Requested Withdrawal') }}</h2>
                        <a href="{{ route('payout.new-withdraw') }}" class="btn btn-primary">{{ __('View All') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="withdrawal-list">
                        <ul>
                            @forelse($withdraws as $withdraw)
                                <li>
                                    <span class="user-info">
                                        <span>{{__('Name')}}: {{$withdraw->user->student->name ?? $withdraw->user->instructor->name}}</span>
                                        <span>{{__('Phone')}}: {{$withdraw->user->student->phone_number ?? $withdraw->user->instructor->phone_number}}</span>
                                    </span>
                                    @if($withdraw->payment_method == 'paypal')
                                        <span class="payment-info">
                                            <span>{{__('Payment Method')}}: PayPal</span>
                                            <span>{{__('Email')}}: {{$withdraw->user->paypal ? $withdraw->user->paypal->email : '' }}</span>
                                        </span>
                                    @elseif($withdraw->payment_method == 'card')
                                        <span class="payment-info">
                                            <span>{{__('Payment Method')}}: Card</span>
                                            @if($withdraw->user->card)
                                                <span>{{__('Card Number')}}: {{$withdraw->user->card->card_number }}</span>
                                                <span>{{__('Card Holder')}}: {{$withdraw->user->card->card_holder_name }}</span>
                                                <span>{{__('Date')}}: {{$withdraw->user->card->month }}/{{$withdraw->user->card->year }}</span>
                                            @endif
                                        </span>
                                    @endif
                                    <span class="request-date">{{$withdraw->created_at->format('d M Y')}}</span>
                                    <span class="amount">
                                        @if(get_currency_placement() == 'after')
                                            {{$withdraw->amount}} {{ get_currency_symbol() }}
                                        @else
                                            {{ get_currency_symbol() }} {{$withdraw->amount}}
                                        @endif
                                    </span>
                                </li>
                            @empty
                                <li>{{ __('No Requested Found') }}</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Add your custom CSS styles here */

    .custom-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        padding: 20px;
    }

    .card-header {
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 24px;
        font-weight: 600;
        margin: 0;
    }

    .nav-tabs .nav-link {
        font-size: 14px;
        font-weight: 500;
    }

    .total-enrollment h2 {
        font-size: 16px;
        font-weight: 600;
    }

    /* Add more custom styles as needed */
</style>


    </div>

@endsection

@push('script')

    <script>

        'use strict'

        // Month
        var options = {
            series: [{
                name: 'Total Enroll students',
                data: @json($totalMonthlyEnroll)
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'year',
                categories: @json($totalMonths)
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartMonth"), options);
        chart.render();

        // Year
        var options = {
            series: [{
                name: 'Total enroll students',
                data: @json($totalYearlyEnroll)
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'year',
                categories: @json($totalYears)
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartYear"), options);
        chart.render();

        var options = {
            series: @json(@$allPercentage),
            chart: {
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            },
            ],
            labels: @json(@$allName)
        };

        var chart = new ApexCharts(document.querySelector("#topSellerChart"), options);
        chart.render();

    </script>
@endpush
