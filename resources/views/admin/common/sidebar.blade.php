<div class="sidebar__area">
    <div class="sidebar__close">
        <button class="close-btn">
            <i class="fa fa-close"></i>
        </button>
    </div>

    <div class="sidebar__brand">
        <a href="{{ route('admin.dashboard') }}">
            @if(get_option('app_logo') != '')
                <img src="{{getImageFile(get_option('app_logo'))}}" style="width:100px; height:100px" alt="">
            @else
                <img src="" alt="">
            @endif
        </a>
    </div>

    <ul id="sidebar-menu" class="sidebar__menu">

        <li class=" {{ active_if_full_match('admin/dashboard') }} ">
            <a href="{{route('admin.dashboard')}}">
                <span class="iconify" data-icon="bxs:dashboard"></span>
                <span>{{__('Dashboard')}}</span>
            </a>
        </li>
        @canany(['manage_course', 'pending_course', 'hold_course', 'approved_course', 'all_course', 'manage_course_reference', 'manage_course_category', 'manage_course_subcategory', 'manage_course_tag', 'manage_course_language', 'manage_course_difficulty_level','manage_coupon'])
            <li>
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="dashicons:welcome-learn-more"></span>
                    <span>{{__('Manage Course')}}</span>
                </a>
                <ul>
                    @can('pending_course')
                        <li class="{{ active_if_match('admin/course/review-pending') }}">
                            <a href="{{route('admin.course.review_pending')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Review Pending')}}</span>
                            </a>
                        </li>
                    @endcan
                
                   
           

                    @can('all_course')
                        <li class="{{ active_if_full_match('admin/course') }}">
                            <a href="{{route('admin.course.index')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('All Courses')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage_course_category')
                        <li class="{{ active_if_match('admin/category') }}">
                            <a href="{{route('category.index')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Categories')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage_course_subcategory')
                        <li class="{{ active_if_match('admin/subcategory') }}">
                            <a href="{{route('subcategory.index')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Subcategory')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_course_tag')

                        <li class="{{ active_if_match('admin/tag') }}">
                            <a href="{{route('tag.index')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Tags')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage_course_language')
                        <li class="{{ active_if_match('admin/course-language') }}">
                            <a href="{{route('course-language.index')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Languages')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage_course_difficulty_level')

                        <li class="{{ active_if_match('admin/difficulty-level') }}">
                            <a href="{{route('difficulty-level.index')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Difficulty Levels')}}</span>
                            </a>
                        </li>

                    @endcan

                    <li class="{{ @$subNavSpecialPromotionIndexActiveClass }}">
                        <a href="{{route('special_promotional_tag.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Promotional Tag') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/course-upload-rules') }}">
                        <a href="{{route('course-rules.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Rules & Benefits') }}</span>
                        </a>
                    </li>

                    <li class="{{ @$subNavCouponIndexActiveClass }}">
                        <a href="{{ route('coupon.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Coupon List')}}</span>
                        </a>
                    </li>
                    <li class="{{ @$navCouponAddActiveClass }}">
                        <a href="{{ route('coupon.create') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Add Coupon')}}</span>
                        </a>
                    </li>



                </ul>
            </li>
        @endcanany
  
        @can(['product_module_product', 'product_module_tag', 'product_module_category'])
        @if(isAddonInstalled('LMSZAIPRODUCT'))
            <li>
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="gridicons:product"></span>
                    <span>{{__('Manage Product')}} 
                        @if(env('LOGIN_HELP') == 'active')
                        <span class="badge bg-warning">(Addon)</span>
                        @endif
                    </span>
                </a>
                <ul>
                    @can('product_module_category')
                    <li class="{{ active_if_match('admin/product-category') }}">
                        <a href="{{ route('lms_product.admin.category.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Category')}}</span>
                        </a>
                    </li>
                    @endcan
                    @can('product_module_tag')
                    <li class="{{ active_if_match('admin/product-tag') }}">
                        <a href="{{ route('lms_product.admin.tag.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Tags')}}</span>
                        </a>
                    </li>
                    @endcan
                    @can('product_module_product')
                    <li class="{{ @$subNavProductActiveClass }}">
                        <a href="{{ route('lms_product.admin.product.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('All Product')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/product/pending') }}">
                        <a href="{{ route('lms_product.admin.product.pending') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Pending')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/product/approved') }}">
                        <a href="{{ route('lms_product.admin.product.approved') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Approved')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/product/hold') }}">
                        <a href="{{ route('lms_product.admin.product.hold') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Hold')}}</span>
                        </a>
                    </li>
                    {{-- <li class="{{ active_if_match('admin/product/upcoming') }}">
                        <a href="{{route('lms_product.admin.product.upcoming')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Upcoming')}}</span>
                        </a>
                    </li> --}}
                    @endcan
                </ul>
            </li>
        @endif
        @endcanany

        @canany(['manage_instructor', 'pending_instructor', 'approved_instructor', 'all_instructor'])
            <li>
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="la:chalkboard-teacher"></span>
                    <span>{{__('Manage Instructor')}}</span>
                </a>
                <ul>
                    @can('pending_instructor')
                        <li class="{{ active_if_match('admin/instructor/pending') }}">
                            <a href="{{route('instructor.pending')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Pending Instructor')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('approved_instructor')
                        <li class="{{ active_if_match('admin/instructor/approved') }}">
                            <a href="{{route('instructor.approved')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Approved Instructors')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('approved_instructor')
                        <li class="{{ active_if_match('admin/instructor/blocked') }}">
                            <a href="{{route('instructor.blocked')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Blocked Instructors')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('all_instructor')

                        <li class="
                        {{ active_if_full_match('admin/instructor') }}
                        {{ active_if_match('admin/instructor/view/*') }}
                    ">
                            <a href="{{route('instructor.index')}}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('All Instructors')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('add_instructor')
                    <li class="{{ active_if_match('admin/instructor/create') }}">
                        <a href="{{route('instructor.create')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Add Instructor') }}</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
        @endcanany

       

        @can('manage_student')
            <li class=" {{ active_if_full_match('admin/student') }} ">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="ph:student"></span>
                    <span>{{__('Manage Student')}}</span>
                </a>
                <ul>
                    @if(get_option('private_mode'))
                    <li class="{{ active_if_match('admin/student/pending') }}">
                        <a href="{{route('student.pending_list')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Pending Student') }}</span>
                        </a>
                    </li>
                    @endif
                    <li class="{{ active_if_match('admin/student') }}">
                        <a href="{{route('student.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('All Student') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/student/create') }}">
                        <a href="{{route('student.create')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Add Student') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @if(get_option('subscription_mode'))
        @can('manage_subscriptions')
            <li class="{{ @$navSubscriptionParentActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="ph:student"></span>
                    <span>{{__('Manage Subscription')}}</span>
                </a>
                <ul class="{{ @$navSubscriptionParentShowClass }}">
                    <li class="{{ @$subNavSubscriptionActiveClass }}">
                        <a href="{{route('admin.subscriptions.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('All Subscription') }}</span>
                        </a>
                    </li>
                    <li class="{{ (request()->route()->getName() == "admin.subscriptions.create") ? 'mm-active' : '' }}">
                        <a href="{{route('admin.subscriptions.create')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Add Subscription') }}</span>
                        </a>
                    </li>
                    <li class="{{ (request()->route()->getName() == "admin.subscriptions.purchase_pending_list") ? 'mm-active' : '' }}">
                        <a href="{{route('admin.subscriptions.purchase_pending_list')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Subscription Sale Pending') }}</span>
                        </a>
                    </li>
                    <li class="{{ (request()->route()->getName() == "admin.subscriptions.purchase_list") ? 'mm-active' : '' }}">
                        <a href="{{route('admin.subscriptions.purchase_list')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Subscription Sale') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        @endif
       
        @if(get_option('wallet_recharge_system', 0))
        @can('manage_wallet_recharge')
            <li class="{{ @$navWalletParentActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="ph:student"></span>
                    <span>{{__('Manage Wallet')}}</span>
                </a>
                <ul class="{{ @$navWalletParentShowClass }}">
                    <li class="{{ (request()->route()->getName() == "admin.wallet_recharge.pending_list") ? 'mm-active' : '' }}">
                        <a href="{{route('admin.wallet_recharge.pending_list')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Recharge Pending') }}</span>
                        </a>
                    </li>
                    <li class="{{ (request()->route()->getName() == "admin.wallet_recharge.list") ? 'mm-active' : '' }}">
                        <a href="{{route('admin.wallet_recharge.list')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Recharge List') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        @endif

       

 


        @can('payout')
            <li class="{{ @$navFinanceParentActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="clarity:dollar-bill-solid"></span>
                    <span>{{__('Manage Payout')}}</span>
                </a>
                <ul class="{{ @$navFinanceShowClass }}">
                    <li class="{{@$subNavFinanceNewWithdrawActiveClass}}">
                        <a href="{{route('payout.new-withdraw')}}">
                            <i class="fa fa-circle"></i>
                            <span> {{ __('Request Withdrawal') }}</span>
                        </a>
                    </li>

                    <li class="{{@$subNavFinanceCompleteWithdrawActiveClass}}">
                        <a href="{{route('payout.complete-withdraw')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Complete Withdrawal')}}</span>
                        </a>
                    </li>
                    <li class="{{@$subNavFinancerejectedWithdrawActiveClass}}">
                        <a href="{{route('payout.rejected-withdraw')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Rejected Withdrawal')}}</span>
                        </a>
                    </li>
                    <li class="{{@$subNavFinanceDistributeSubscriptionActiveClass}}">
                        <a href="{{route('payout.distribute.subscriptions')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Subscription Payment')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan


        @can(['finance', 'support_ticket'])
            <li class="">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="map:finance"></span>
                    <span>{{ __('Finance') }}</span>
                </a>
                <ul>
                    <li class="{{ active_if_full_match('admin/report/course-revenue-report') }}{{ active_if_full_match('admin/report/bundle-revenue-report') }}{{ active_if_full_match('admin/report/consultation-revenue-report') }}">
                        <a href="{{route('course-report.revenue-report')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Revenue Report') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_full_match('admin/report/order-report') }}">
                        <a href="{{route('report.order-report')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Order Report') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_full_match('admin/report/order-pending') }}">
                        <a href="{{route('report.order-pending')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Order Pending') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_full_match('admin/report/order-cancelled') }}">
                        <a href="{{route('report.order-cancelled')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Order Cancelled') }}</span>
                        </a>
                    </li>

              
                </ul>
            </li>
        @endcan

        @can('manage_certificate')
            <li class="{{ @$navCertificateActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="fluent:certificate-20-filled"></span>
                    <span>{{__('Certificate')}}</span>
                </a>
                <ul>
                    <li class="{{ @$subNavAllCertificateActiveClass }}">
                        <a href="{{route('certificate.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('All Certificates')}}</span>
                        </a>
                    </li>
                    <li class="{{ @$subNavAddCertificateActiveClass }}">
                        <a href="{{route('certificate.create')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Add Certificate')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        
 




        @can(['user_management', 'user_management' ])
            <li class="{{ @$navUserParentActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="bxs:user-account"></span>
                    <span>{{__('Management')}}</span>
                </a>
                <ul class="{{ @$navUserParentShowClass }}">
                    <li class="{{ @$subNavUserCreateActiveClass }}">
                        <a href="{{route('user.create')}}">
                            <i class="fa fa-circle"></i>
                            <span> {{__('Add User')}} </span>
                        </a>
                    </li>
                    <li class="{{ @$subNavUserActiveClass }}">
                        <a href="{{route('user.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('All Users')}}</span>
                        </a>
                    </li>
                    <li class="{{ @$subNavUserRoleActiveClass }}">
                        <a href="{{route('role.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Roles')}}</span>
                        </a>
                    </li>


                     <li class="{{ @$subNavEmailTemplateActiveClass }}">
                        <a href="{{route('email-template.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Email Template')}}</span>
                        </a>
                    </li>

                    <li class="{{ @$subNavSendMailActiveClass }}">
                        <a href="{{route('email-template.send-email')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Send Email')}}</span>
                        </a>
                    </li>


                </ul>
            </li>
        @endcan


        @can(['content_setting', 'manage_blog'])
            <li class="{{ @$navContactUsParentActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="fluent:contact-card-32-regular"></span>
                    <span>{{__('Pages')}}</span>
                </a>
                <ul class="{{ @$navContactUsParentShowClass }}">
                    <li class="{{ @$subNavContactUsIndexActiveClass }}">
                        <a href="{{ route('contact.index') }}">
                            <i class="fa fa-circle"></i>
                            <span> {{__('All Contact Us')}} </span>
                        </a>
                    </li>
                    <li class="{{ @$subNavContactUsIssueIndexActiveClass }}">
                        <a href="{{ route('contact.issue.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('All Contact Us Issue')}}</span>
                        </a>
                    </li>
                    <li class="{{ @$subNavContactUsIssueAddActiveClass }}">
                        <a href="{{ route('contact.issue.create') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Add Contact Us Issue')}}</span>
                        </a>
                    </li>
                            <li class="{{ active_if_full_match('admin/blog/create') }}">
                        <a href="{{route('blog.create')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Add Blog')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_full_match('admin/blog') }} {{ active_if_full_match('admin/blog/edit/*') }}">
                        <a href="{{route('blog.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('All Blog')}}</span>
                        </a>
                    </li>
                    <li class="{{ @$subNavBlogCommentListActiveClass }}">
                        <a href="{{route('blog.blog-comment-list')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('Blog Comment List') }}</span>
                        </a>
                    </li>
                    <li class="{{ @$subNavBlogCategoryIndexActiveClass }}">
                        <a href="{{route('blog.blog-category.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Blog Category')}}</span>
                        </a>
                    </li>

                </ul>
            </li>
        @endcan

  

        @can(['account_setting', 'policy_management', 'application_setting', 'global_setting', 'home_setting', 'mail_configuration', 'payment_option', 'content_setting', 'manage_language'])
            <li>
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="bytesize:settings"></span>
                    <span>{{__('Settings')}}</span>
                </a>
                <ul class="{{ @$navUserParentShowClass }}">

                    <li class="{{ active_if_full_match('admin/profile') }}">
                        <a href="{{route('admin.profile')}}">
                            <i class="fa fa-circle"></i>
                            <span> {{__('Profile')}} </span>
                        </a>
                    </li>
                    <li class="{{ active_if_full_match('admin/profile/change-password') }}">
                        <a href="{{ route('admin.change-password') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Change Password')}}</span>
                        </a>
                    </li>

                          <li>
                <a href="{{ route('settings.general_setting') }}" class="list-item {{ @$generalSettingsActiveClass }}">
                     <i class="fa fa-circle"></i>
                    <span>{{__('Global Settings')}}</span>
                </a>
            </li>


                       <li class="{{ active_if_match('admin/language') }}">
                        <a href="{{route('language.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Language Settings')}}</span>
                        </a>
                    </li>

                       <li>
                <a href="{{ route('settings.currency.index') }}" class="list-item {{ @$subNavCurrencyActiveClass }}">
                     <i class="fa fa-circle"></i>
                    <span>{{ __('Currency Settings') }}</span>
                </a>
            </li>

               <li>
                <a href="{{ route('settings.color-settings') }}" class="list-item {{ @$colorActiveClass }}">
                   <i class="fa fa-circle"></i>
                    <span>{{ __('Color Settings') }}</span>
                </a>
            </li>

              <li>
                <a href="{{ route('settings.font-settings') }}" class="list-item {{ @$fontActiveClass }}">
                     <i class="fa fa-circle"></i>
                    <span>{{ __('Font Settings') }}</span>
                </a>
            </li>


            <li>
                <a href="{{ route('settings.vimeo-settings') }}" class="list-item {{ @$vimeoSettingsActiveClass }}">
                    <i class="fa fa-circle"></i>
                    <span>{{ __('Vimeo Settings') }}</span>
                </a>
            </li>

               <li>
                <a href="{{ route('settings.google-analytics') }}" class="list-item {{ @$siteGoogleAnalyticsActiveClass }}">
                    <i class="fa fa-circle"></i>
                    <span>{{ __('Google Analytics') }}</span>
                </a>
            </li>

              <li>
                <a href="{{ route('settings.chat-student-instructor') }}" class="list-item {{ @$chatSettingActiveClass }}">
                    <i class="fa fa-circle"></i>
                    <span>{{ __('Chat System') }}</span>
                </a>
            </li>

               <li>
                <a href="{{ route('settings.re-captcha-key') }}" class="list-item {{ @$siteRecaptchaKeyActiveClass }}">
                    <i class="fa fa-circle"></i>
                    <span>{{ __('Re-Captcha Key') }}</span>
                </a>
            </li>

                   

                  <li class="{{ @$subNavLocationSettingsActiveClass }}">
                        <a href="{{ route('settings.location.country.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>{{__('Location Settings')}}</span>
                        </a>
                    </li>

                    @can('home_setting')
                        <li class="{{ @$subNavHomeSettingsActiveClass }}">
                            <a href="{{ route('settings.section-settings') }}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Home Settings')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('mail_configuration')

                        <li class="{{ @$subNavMailConfigSettingsActiveClass }}">
                            <a href="{{ route('settings.mail-configuration') }}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Mail Configuration')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('payment_option')
                        <li class="{{ @$subNavPaymentOptionsSettingsActiveClass }}">
                            <a href="{{ route('settings.payment_method_settings') }}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Payment Options')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('content_setting')
                        <li class="{{ @$subNavInstructorSettingsActiveClass }}">
                            <a href="{{ route('settings.instructor-feature') }}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Become Instructor')}}</span>
                            </a>
                        </li>

                        <li class="{{ @$subNavFAQSettingsActiveClass }}">
                            <a href="{{ route('settings.faq.cms') }}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('FAQ')}}</span>
                            </a>
                        </li>
                    

                        <li class="{{ @$subNavAboutUsSettingsActiveClass }}">
                            <a href="{{ route('settings.about.gallery-area') }}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('About Us')}}</span>
                            </a>
                        </li>

                        <li class="{{ @$subNavContactUsSettingsActiveClass }}">
                            <a href="{{ route('settings.contact.cms') }}">
                                <i class="fa fa-circle"></i>
                                <span>{{__('Contact Us')}}</span>
                            </a>
                        </li>
                 

                    @endcan
                      <li class="{{ @$subNavTermConditionsActiveClass }}">
                    <a href="{{ route('admin.terms-conditions') }}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Terms Conditions')}} </span>
                    </a>
                </li>
                <li class="{{ @$subNavPrivacyPolicyActiveClass }}">
                    <a href="{{ route('admin.privacy-policy') }}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Privacy Policy')}} </span>
                    </a>
                </li>
                <li class="{{ @$subNavRefundPolicyActiveClass }}">
                    <a href="{{ route('admin.refund-policy') }}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Refund Policy')}} </span>
                    </a>
                </li>
                <li class="{{ @$subNavCookiePolicyActiveClass }}">
                    <a href="{{ route('admin.cookie-policy') }}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Cookie Policy')}} </span>
                    </a>
                </li>
                </ul>
            </li>
        @endcan

      
    </ul>

</div>
