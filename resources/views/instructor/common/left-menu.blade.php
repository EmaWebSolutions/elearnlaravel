<div class="instructor-profile-left-part bg-white">
    <nav class="account-page-menu">
        <ul>
            <li><a href="{{ route('instructor.dashboard') }}" class="{{ active_if_full_match('instructor/dashboard') }} {{ @$navDashboardActiveClass }}"><i class="fas fa-home mr-15"></i>{{ __('Dashboard') }}</a></li>
            <li><a href="{{ route('instructor.course.create') }}" class="{{ active_if_full_match('instructor/course/create') }} {{ @$navCourseUploadActiveClass }}"><i class="fas fa-upload mr-15"></i>{{ __('Upload Course') }}</a></li>
            <li><a href="{{ route('instructor.course') }}" class="{{ active_if_full_match('instructor/course') }} {{ @$navCourseActiveClass }}"><i class="fas fa-sign-in-alt mr-15"></i>{{ __('My Courses') }}</a></li>
            @if(@auth()->user()->instructor->organization_id != NULL)
            <li><a href="{{ route('instructor.course.organization') }}" class="{{ active_if_full_match('instructor/course/organization') }} {{ @$navCourseOrganizationActiveClass }}"><i class="fas fa-sign-in-alt mr-15"></i>{{ __('Organization Courses') }}</a></li>
            @endif
            <li><a href="{{ route('instructor.all-student') }}" class="{{ @$navAllStudentActiveClass }}"><i class="fas fa-graduation-cap mr-15"></i>{{ __('All Students') }}</a></li>
            <li><a href="{{ route('notice-board.course-notice.index') }}" class="{{ @$navNoticeBoardActiveClass }}"><i class="fas fa-th-large mr-15"></i>{{ __('Notice Board') }}</a></li>
            @if(isAddonInstalled('LMSZAIPRODUCT'))
            <li class="menu-has-children current-menu-item {{ @$navProductActiveClass }}">
                <span class="toggle-account-menu">
                    <i class="fas fa-angle-down"></i>
                </span>
                <a href="#" class="{{ @$navProductActiveClass }}"><i class="fas fa-shopping-cart mr-15"></i>{{ __('Manage Product') }}</a>
                <ul class="account-sub-menu">
                    <li><a href="{{ route('lms_product.instructor.product.dashboard') }}" class="{{ @$subNavProductDashboardActiveClass }}">{{ __('Dashboard') }}</a></li>
                    <li><a href="{{ route('lms_product.instructor.product.my-product') }}" class="{{ @$subNavMyProductActiveClass }}">{{ __('My Product') }}</a></li>
                    <li><a href="{{ route('lms_product.instructor.product.upload', 'step-1') }}" class="{{ @$subNavUploadProductActiveClass }}">{{ __('Upload Products') }}</a></li>
                    <li><a href="{{ route('lms_product.instructor.product.orders') }}" class="{{ @$subNavOrderProductActiveClass }}">{{ __('Orders') }}</a></li>
                </ul>
            </li>
            @endif
            <li><a href="{{ route('instructor.refund.index') }}" class="{{ @$navRefundActiveClass }}"><i class="fas fa-undo mr-15"></i>{{ __('Refund List') }}</a></li>
            <li><a href="{{ route('instructor.certificate.index') }}" class="{{ @$navCertificateActiveClass }}"><i class="fas fa-certificate mr-15"></i>{{ __('Certificate') }}</a></li>
            <li><a href="{{ route('discussion.index') }}" class="{{ @$navDiscussionActiveClass }}"><i class="fas fa-comment-alt"></i></i>{{ __('Discussion') }}</a></li>
            <li><a href="{{ route('instructor.chat.index') }}" class="{{ @$navChatActiveClass }}"><i class="fas fa-comments"></i></i>{{ __('Chat') }}</a></li>
            <li><a href="{{ route('finance.analysis.index') }}" class="{{ @$subNavAnalysisActiveClass }}"><i class="fas fa-heartbeat mr-15"></i>{{ __('Finance') }}</a></li>
            <li><a href="{{ route('instructor.multi_instructor') }}" class="{{ @$navInstructorRequestActiveClass }}"><i class="fas fa-code-branch mr-15"></i>{{ __('Instructor Request') }}</a></li>
            <li class="menu-has-children current-menu-item {{ @$navProfileActiveClass }}">
                <span class="toggle-account-menu">
                    <i class="fas fa-angle-down"></i>
                </span>
                <a href="#" class="{{ @$navProfileActiveClass }}"><i class="fas fa-user mr-15"></i>{{ __('Profile') }}</a>
                <ul class="account-sub-menu">
                    <li><a href="{{ route('instructor.profile') }}" class="{{ @$subNavProfileBasicActiveClass }}">{{ __('Basic Information') }}</a></li>
                    <li><a href="{{ route('instructor.address') }}" class="{{ @$subNavProfileAddressActiveClass }}">{{ __('Address & Location') }}</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
