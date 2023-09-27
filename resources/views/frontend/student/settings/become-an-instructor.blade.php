@extends('frontend.layouts.app')

@section('content')
    <div class="bg-page">
        <!-- Page Header Start -->
        <header class="page-banner-header gradient-bg position-relative">
            <div class="section-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="page-banner-content text-center">
                                <h3 class="page-banner-heading text-white pb-15">{{__('Become an Instructor')}}</h3>

                                <!-- Breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a></li>
                                        <li class="breadcrumb-item font-14 active" aria-current="page">{{__('Become an Instructor')}}</li>
                                    </ol>
                                </nav>
                                <!-- Breadcrumb End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Header End -->

       

        <!-- Become instructor Call to action Area Start -->
        <section class="become-instructor-call-to-action section-t-space text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section-heading">{{ __(get_option('app_instructor_footer_title')) }}</h3>
                        <div class="col-lg-6 mx-auto">
                            <p class="font-20 mb-4">{{ __(get_option('app_instructor_footer_subtitle')) }}</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="theme-btn theme-button1 theme-button3 mr-30" data-bs-toggle="modal" data-bs-target="#becomeAnInstructor"> {{__('Become an Instructor')}} <i data-feather="arrow-right"></i></button>
                                <a href="{{route('contact')}}" target="_blank" class="text-decoration-underline font-15 font-medium">{{__('Contact With Us')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Become an Instructor Modal Start -->
    <div class="modal fade becomeAnInstructorModal" id="becomeAnInstructor" tabindex="-1" aria-labelledby="becomeAnInstructorLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="becomeAnInstructorLabel">{{ __('Submit your application') }}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{route('student.save-instructor-info')}}" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('First Name')}}</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Write your first name" value="{{ @Auth::user()->student->first_name }}" required>
                            </div>
                            @if ($errors->has('first_name'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        
                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Account Type')}}</label>
                                <select class="form-control"  name="account_type">
                                    <option value="{{ USER_ROLE_INSTRUCTOR }}">{{ __('Instructor') }}</option>
                                    <option value="{{ USER_ROLE_ORGANIZATION }}">{{ __('Organization') }}</option>
                                </select>
                            </div>
                            @if ($errors->has('account_type'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('account_type') }}</span>
                            @endif
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Last Name')}}</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Write your last name" value="{{ @Auth::user()->student->last_name }}" required>
                            </div>
                            @if ($errors->has('last_name'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label for="professional_title" class="label-text-title color-heading font-medium font-16 mb-2">{{__('Professional Title')}}</label>
                                <input type="text" name="professional_title" class="form-control" id="professional_title" placeholder="{{__('Professional Title')}}" value="{{ old('professional_title') }}">
                            </div>
                            @if ($errors->has('professional_title'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('professional_title') }}</span>
                            @endif
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Phone Number')}}</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="{{__('Phone Number')}}" value="{{ old('phone_number') ?? @Auth::user()->student->phone_number }}" required>
                            </div>
                            @if ($errors->has('phone_number'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Address')}}</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="{{__('Address')}}" value="{{ old('address') ?? @Auth::user()->student->address }}" required>
                            </div>
                            @if ($errors->has('address'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                            @endif
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">CV</label>
                                <div class="create-assignment-upload-files">
                                    <input type="file" name="cv_file" accept="application/pdf"  class="form-control" />
                                    <p class="font-14 color-heading text-center mt-2 color-gray">No file selected (PDF) <span class="d-block">Maximum Image Upload Size is <span class="color-heading">5mb</span></span> </p>
                                </div>
                                @if ($errors->has('cv_file'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('cv_file') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Bio')}}</label>
                                <textarea name="about_me" class="form-control" cols="30" rows="10" placeholder="About your self" required>{{ old('about_me') }}</textarea>
                            </div>
                            @if ($errors->has('about_me'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('about_me') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center">
                        <button type="submit" class="theme-btn theme-button1 default-hover-btn">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Become an Instructor Modal End -->

@endsection

@push('script')
    @if (@$errors->any())
        <script>
            var myModal = document.getElementById('becomeAnInstructor');
            var modal = bootstrap.Modal.getOrCreateInstance(myModal)
            modal.show()
        </script>
    @endif
@endpush