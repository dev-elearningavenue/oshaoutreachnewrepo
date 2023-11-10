<section class="{{ isset($backgroundWhite) ? '' : 'bg-secondary' }} sec-padding" id="group-enrollment">
    <div class="contWrapper">
        <div class="container">
            <div class="page-heading">
                <h3 class="title mbpx-10">
                    Need to train your Employees?
                </h3>
                <p>
                    Sign up today to set up a business account for bulk purchase. We offer an enhanced Learning
                    Management System (LMS).
                </p>
            </div>

            <div class="box --course-objectives">
                <div class="row need_to_train_slider">
                    <div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 usp-col">
                        @if (isset($noLinks))
                            <div class="usp-icon usp_manager_account_access" title="Manager Account Access"></div>
                            <h3 class="fs-small ta-center">Manager Account Access</h3>
                        @else
                            <div class="usp-icon usp_manager_account_access" title="Manager Account Access"></div>
                            <h3 class="fs-small ta-center">Manager Account Access</h3>
                        @endif
                    </div>
                    @if (!in_array(Route::currentRouteName(), ['course.single']))
                        <div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 usp-col">
                            @if (isset($noLinks))
                                <div class="usp-icon usp_easy_employee_registration" title="Easy Employee Registration">
                                </div>
                                <h3 class="fs-small ta-center">Easy Employee Registration</h3>
                            @else
                                <div class="usp-icon usp_easy_employee_registration" title="Easy Employee Registration">
                                </div>
                                <h3 class="fs-small ta-center">Easy Employee Registration</h3>
                            @endif
                        </div>
                    @else
                        <div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 usp-col">
                            @if (isset($noLinks))
                                <div class="usp-icon usp_easy_employee_registration" title="Easy Employee Registration">
                                </div>
                                <h3 class="fs-small ta-center">Easy Employee Registration</h3>
                            @else
                                <div class="usp-icon usp_easy_employee_registration" title="Easy Employee Registration">
                                </div>
                                <h3 class="fs-small ta-center">Easy Employee Registration</h3>
                            @endif
                        </div>
                    @endif
                    <div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 usp-col">
                        @if (isset($noLinks))
                            <div class="usp-icon usp_quick_course_assignment" title="Quick Course Assignment"></div>
                            <h3 class="fs-small ta-center">Quick Course Assignment</h3>
                        @else
                            <div class="usp-icon usp_quick_course_assignment" title="Quick Course Assignment"></div>
                            <h3 class="fs-small ta-center">Quick Course Assignment</h3>
                        @endif
                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 usp-col">
                        @if (isset($noLinks))
                            <div class="usp-icon usp_performanceProgress_tracking"
                                title="Performance / Progress Tracking">
                            </div>
                            <h3 class="fs-small ta-center">Performance / Progress Tracking</h3>
                        @else
                            <div class="usp-icon usp_performanceProgress_tracking"
                                title="Performance / Progress Tracking">
                            </div>
                            <h3 class="fs-small ta-center">Performance / Progress Tracking</h3>
                        @endif
                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 usp-col">
                        @if (isset($noLinks))
                            <div class="usp-icon usp_dashboard_analytics" title="Dashboard and Analytics"></div>
                            <h3 class="fs-small ta-center">Dashboard and Analytics</h3>
                        @else
                            <div class="usp-icon usp_dashboard_analytics" title="Dashboard and Analytics"></div>
                            <h3 class="fs-small ta-center">Dashboard and Analytics</h3>
                        @endif
                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 usp-col">
                        @if (isset($noLinks))
                            <div class="usp-icon usp_on_demand_reporting" title="On Demand Reporting"></div>
                            <h3 class="fs-small ta-center">On Demand Reporting</h3>
                        @else
                            <div class="usp-icon usp_on_demand_reporting" title="On Demand Reporting"></div>
                            <h3 class="fs-small ta-center">On Demand Reporting</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="cta">
                <a href="/group-enrollment">
                    Group Enrollment
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    #group-enrollment .contWrapper {
        width: min-content;
        /* border: 1px solid #e9e9e9; */
        margin: 0 auto;
        padding: 50px 7%;
    }

    section#group-enrollment .usp-icon {
        margin-bottom: 20px;
    }

    section#group-enrollment .box {
        padding-top: 25px;
    }

    #group-enrollment .contWrapper .page-heading p {
        font-size: 16px;
        font-family: "Poppins";
        color: rgb(0, 0, 0);
        line-height: 1.667;
        text-align: center;
        max-width: 75%;
        margin: 0 auto;
    }

    section#group-enrollment h3.fs-small.ta-center {
        font-size: 14px;
    }

    section#group-enrollment .cta {
        text-align: center;
    }

    section#group-enrollment .cta a {
        background-color: #ffb900;
        margin-top: 50px;
        font-weight: bold;
        text-transform: uppercase;
        display: inline-block;
        transition: ease all 0.25s;
        padding: 8px 35px;
    }

    section#group-enrollment .cta a:hover {
        color: #FFFFFF;
        opacity: 1;
    }

    @media (max-width: 991px) {
        #group-enrollment .contWrapper {
            width: calc(100% - 30px);
            padding: 50px 0;
        }
    }

    @media(max-width:500px) {
        #group-enrollment .contWrapper .page-heading p {
            max-width: 100%;
            font-size: 14px;
        }

        .page-heading .title {
            max-width: 100%;
        }
    }
</style>
