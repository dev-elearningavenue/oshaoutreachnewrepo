<section class="{{ isset($backgroundWhite) ? '' : 'bg-secondary' }} sec-padding whyus-without-desc">
    <div class="container pr-5 pl-5">
        <div class="page-heading mbpx-40">
            <h2 class="title mbpx-0">Manager Account Benefits</h2>
            <p class="subtitle"></p>
        </div>

        <div class="box --course-objectives">
            <div class="row hidden-sm-down">
                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_manager_account_access" title="Manager Account Access"></div>
                        <h3 class="fs-medium ta-center">Manager Account Access</h3>
                    @else
                            <div class="usp-icon usp_manager_account_access" title="Manager Account Access"></div>
                            <h3 class="fs-medium ta-center">Manager Account Access</h3>
                    @endif
                </div>
                @if(!in_array(Route::currentRouteName(), ['course.single']))
                    <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                        @if(isset($noLinks))
                            <div class="usp-icon usp_easy_employee_registration"
                                 title="Easy Employee Registration"></div>
                            <h3 class="fs-medium ta-center">Easy Employee Registration</h3>
                        @else
                            <div class="usp-icon usp_easy_employee_registration"
                                 title="Easy Employee Registration"></div>
                            <h3 class="fs-medium ta-center">Easy Employee Registration</h3>
                        @endif
                    </div>
                @else
                    <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                        @if(isset($noLinks))
                            <div class="usp-icon usp_easy_employee_registration" title="Easy Employee Registration"></div>
                            <h3 class="fs-medium ta-center">Easy Employee Registration</h3>
                        @else
                            <div class="usp-icon usp_easy_employee_registration" title="Easy Employee Registration"></div>
                            <h3 class="fs-medium ta-center">Easy Employee Registration</h3>
                        @endif
                    </div>
                @endif
                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_quick_course_assignment"
                        title="Quick Course Assignment"></div>
                        <h3 class="fs-medium ta-center">Quick Course Assignment</h3>
                    @else
                        <div class="usp-icon usp_quick_course_assignment"
                             title="Quick Course Assignment"></div>
                        <h3 class="fs-medium ta-center">Quick Course Assignment</h3>
                    @endif
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_performanceProgress_tracking"
                             title="Performance/Progress Tracking"></div>
                        <h3 class="fs-medium ta-center">Performance/Progress Tracking</h3>
                    @else
                        <div class="usp-icon usp_performanceProgress_tracking"
                             title="Performance/Progress Tracking"></div>
                        <h3 class="fs-medium ta-center">Performance/Progress Tracking</h3>
                    @endif
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_dashboard_analytics" title="Dashboard and Analytics"></div>
                        <h3 class="fs-medium ta-center">Dashboard and Analytics</h3>
                    @else
                        <div class="usp-icon usp_dashboard_analytics" title="Dashboard and Analytics"></div>
                        <h3 class="fs-medium ta-center">Dashboard and Analytics</h3>
                    @endif
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_on_demand_reporting"
                             title="On Demand Reporting"></div>
                        <h3 class="fs-medium ta-center">On Demand Reporting</h3>
                    @else
                        <div class="usp-icon usp_on_demand_reporting"
                             title="On Demand Reporting"></div>
                        <h3 class="fs-medium ta-center">On Demand Reporting</h3>
                    @endif
                </div>
            </div>
        </div>

        @include('partials._banner_strip')
    </div>
</section>
@push('custom-css')
    .whyus-without-desc .row {
    display: flex;
    flex-wrap: wrap;
    }
@endpush
