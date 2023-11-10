@extends('american-recruits.ar_master')

@section('title', "American Recruits")

@section('content')
<section class="signupSection">
    <div class="container">
        <div class="signupWrapper">
            <div class="row justify-content-center">
                <div class="col-11 col-md-9 col-lg-7 col-xl-5">
                    <div class="formHeader">
                        <h1>
                            Are you an OSHA Professional?
                        </h1>
                        <p>
                            Sign Up Now and Get Your Dream Job
                            <br /> 50+ Companies are Looking For You.
                        </p>
                    </div>
                    <div class="formWrapper">
                        <form novalidate>
                            <h4 class="formTitle">Personal Details</h4>
                            <div class="formSteps">
                                <h2 class="steps"><span>Step <span class="stepCount">1</span></span> of 3</h2>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <fieldset>
                                <div class="fieldsWrapper">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label class="fieldName">First Name <span
                                                        class="text-red">*</span></label>
                                                <input type="text" placeholder="First Name" name="firstName" required />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label class="fieldName">Last Name <span
                                                        class="text-red">*</span></label>
                                                <input type="text" placeholder="Last Name" name="lastName" required />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">Birthday <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="pp ppb" placeholder="mm/dd/yy" readonly="readonly" name="dob"
                                                    max="12/31/2005" required />
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.2"
                                                        d="M2.8125 6.1875H15.1875V3.375C15.1875 3.22582 15.1282 3.08274 15.0227 2.97725C14.9173 2.87176 14.7742 2.8125 14.625 2.8125H3.375C3.22582 2.8125 3.08274 2.87176 2.97725 2.97725C2.87176 3.08274 2.8125 3.22582 2.8125 3.375V6.1875Z"
                                                        fill="#6C727F"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.25 3.375C2.25 2.75368 2.75368 2.25 3.375 2.25H14.625C15.2463 2.25 15.75 2.75368 15.75 3.375V14.625C15.75 15.2463 15.2463 15.75 14.625 15.75H3.375C2.75368 15.75 2.25 15.2463 2.25 14.625V3.375ZM14.625 3.375H3.375V14.625H14.625V3.375Z"
                                                        fill="#6C727F"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.375 1.125C12.6857 1.125 12.9375 1.37684 12.9375 1.6875V3.9375C12.9375 4.24816 12.6857 4.5 12.375 4.5C12.0643 4.5 11.8125 4.24816 11.8125 3.9375V1.6875C11.8125 1.37684 12.0643 1.125 12.375 1.125Z"
                                                        fill="#6C727F"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.625 1.125C5.93566 1.125 6.1875 1.37684 6.1875 1.6875V3.9375C6.1875 4.24816 5.93566 4.5 5.625 4.5C5.31434 4.5 5.0625 4.24816 5.0625 3.9375V1.6875C5.0625 1.37684 5.31434 1.125 5.625 1.125Z"
                                                        fill="#6C727F"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.25 6.18752C2.25 5.87686 2.50184 5.62502 2.8125 5.62502H15.1875C15.4982 5.62502 15.75 5.87686 15.75 6.18752C15.75 6.49818 15.4982 6.75002 15.1875 6.75002H2.8125C2.50184 6.75002 2.25 6.49818 2.25 6.18752Z"
                                                        fill="#6C727F"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">E-mail <span class="text-red">*</span></label>
                                                <input type="email" placeholder="Your email address" name="email"
                                                    required />
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.2" d="M15.75 3.9375L9 10.125L2.25 3.9375H15.75Z"
                                                        fill="#6C727F"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.83535 3.55741C2.04527 3.3284 2.40109 3.31293 2.6301 3.52285L9 9.36193L15.3699 3.52285C15.5989 3.31293 15.9547 3.3284 16.1647 3.55741C16.3746 3.78641 16.3591 4.14223 16.1301 4.35215L9.3801 10.5397C9.16504 10.7368 8.83496 10.7368 8.61991 10.5397L1.86991 4.35215C1.6409 4.14223 1.62543 3.78641 1.83535 3.55741Z"
                                                        fill="#6C727F"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.6875 3.9375C1.6875 3.62684 1.93934 3.375 2.25 3.375H15.75C16.0607 3.375 16.3125 3.62684 16.3125 3.9375V13.5C16.3125 13.7984 16.194 14.0845 15.983 14.2955C15.772 14.5065 15.4859 14.625 15.1875 14.625H2.8125C2.51413 14.625 2.22798 14.5065 2.017 14.2955C1.80603 14.0845 1.6875 13.7984 1.6875 13.5V3.9375ZM2.8125 4.5V13.5H15.1875V4.5H2.8125Z"
                                                        fill="#6C727F"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8.18409 8.61981C8.39407 8.84876 8.37868 9.20459 8.14973 9.41456L2.80598 14.3153C2.57702 14.5253 2.2212 14.5099 2.01123 14.281C1.80125 14.052 1.81664 13.6962 2.04559 13.4862L7.38934 8.58544C7.61829 8.37547 7.97412 8.39085 8.18409 8.61981Z"
                                                        fill="#6C727F"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.81591 8.61981C10.0259 8.39085 10.3817 8.37547 10.6107 8.58544L15.9544 13.4862C16.1834 13.6962 16.1988 14.052 15.9888 14.281C15.7788 14.5099 15.423 14.5253 15.194 14.3153L9.85028 9.41456C9.62132 9.20459 9.60594 8.84876 9.81591 8.61981Z"
                                                        fill="#6C727F"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">Phone <span class="text-red">*</span></label>
                                                <input type="tel" name="contactNo" id="phoneField" required />
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.2"
                                                        d="M6.50391 8.77499C7.08273 9.97031 8.04929 10.9344 9.24609 11.5101C9.33437 11.5519 9.43202 11.57 9.52942 11.5626C9.62681 11.5552 9.72061 11.5226 9.80156 11.468L11.5594 10.2937C11.637 10.2411 11.7268 10.2089 11.8202 10.2003C11.9137 10.1917 12.0078 10.2069 12.0938 10.2445L15.3844 11.6578C15.4968 11.7046 15.5908 11.7871 15.6518 11.8925C15.7128 11.998 15.7374 12.1206 15.7219 12.2414C15.6176 13.0554 15.2202 13.8036 14.6042 14.3458C13.9882 14.8881 13.1957 15.1873 12.375 15.1875C9.83887 15.1875 7.40661 14.18 5.61329 12.3867C3.81998 10.5934 2.8125 8.16113 2.8125 5.62499C2.81268 4.8043 3.1119 4.0118 3.65416 3.39577C4.19642 2.77975 4.94456 2.38241 5.75859 2.27812C5.87942 2.2626 6.00199 2.28723 6.10745 2.34821C6.2129 2.40919 6.29538 2.50315 6.34219 2.61562L7.75547 5.91327C7.79222 5.99789 7.8076 6.09025 7.80024 6.18221C7.79288 6.27418 7.76302 6.36292 7.71328 6.44062L6.53906 8.22655C6.48679 8.30733 6.4561 8.40017 6.44995 8.49619C6.44379 8.59221 6.46237 8.6882 6.50391 8.77499Z"
                                                        fill="#6C727F"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.68711 1.72018C5.93023 1.68899 6.17686 1.73856 6.38905 1.86127C6.60029 1.98344 6.76573 2.17134 6.86017 2.39628L8.27141 5.68919C8.27161 5.68966 8.27182 5.69013 8.27202 5.6906C8.34508 5.85946 8.37562 6.04366 8.36095 6.22707C8.34623 6.411 8.28651 6.58848 8.18703 6.74388L8.18333 6.74966L7.01131 8.53218C7.53437 9.611 8.40677 10.4813 9.48683 11.0018L9.48911 11.0002L11.2455 9.82692C11.4014 9.72167 11.5813 9.65744 11.7686 9.64019C11.9559 9.62294 12.1446 9.65323 12.317 9.72824C12.3177 9.72854 12.3184 9.72885 12.3191 9.72916L15.604 11.1399C15.8288 11.2344 16.0166 11.3998 16.1387 11.6109C16.2614 11.8231 16.311 12.0698 16.2798 12.3129C16.1581 13.2626 15.6946 14.1354 14.9759 14.7681C14.2572 15.4007 13.3326 15.7498 12.3751 15.75C9.68981 15.75 7.11435 14.6833 5.21554 12.7844C3.31674 10.8856 2.25 8.31031 2.25 5.62499C2.25022 4.66752 2.5993 3.74281 3.23194 3.02411C3.86453 2.30546 4.73747 1.84189 5.68711 1.72018ZM6.50391 8.77499L5.99652 9.01781C5.91345 8.84423 5.87629 8.65225 5.8886 8.46021C5.90091 8.26817 5.96228 8.08249 6.06683 7.92094L6.06904 7.91752L7.23951 6.13731L7.23844 6.13486L5.82517 2.8372C5.14879 2.92512 4.52713 3.25537 4.07638 3.76744C3.62453 4.28076 3.37518 4.94113 3.375 5.62499M6.50391 8.77499L5.99764 9.02015C6.63186 10.3299 7.69091 11.3862 9.00224 12.017L9.00537 12.0185C9.18193 12.1021 9.37722 12.1383 9.57202 12.1235C9.76631 12.1088 9.95343 12.0438 10.1151 11.935C10.1155 11.9347 10.1159 11.9344 10.1163 11.9342L11.8718 10.7615L15.1624 12.1747L15.1633 12.1751C15.0753 12.8514 14.7446 13.4729 14.2326 13.9236C13.7192 14.3755 13.0589 14.6248 12.375 14.625M3.375 5.62499C3.37503 8.0119 4.32324 10.3012 6.01104 11.989C7.69884 13.6768 9.9881 14.625 12.375 14.625"
                                                        fill="#6C727F"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="ctaWrapper">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="formSubmit">
                                                            <button type="button"
                                                                class="next action-button">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </fieldset>
                            <fieldset>
                                <div class="fieldsWrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">Area of Expertise
                                                    <span class="text-red">*</span></label>
                                                <select name="expertise" multiple placeholder="Area of Expertise">
                                                </select>
                                                <i class="fal fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">Years of Experience <span
                                                        class="text-red">*</span></label>
                                                <input type="number" placeholder="Your experience" max="80"
                                                    name="experience_years" required />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">Select Education</label>
                                                <select name="education" class="pp ppb">
                                                    <option selected disabled>Select</option>
                                                    <option value="High School Education">High School
                                                        Education</option>
                                                    <option value="GED Certificate">GED Certificate</option>
                                                    <option value="Associate's Degree">Associate's Degree
                                                    </option>
                                                    <option value="Graduate School Degree">Graduate School
                                                        Degree</option>
                                                    <option value="Certificates">Certificates</option>
                                                    <option value="University Degree">University Degree</option>
                                                </select>
                                                <i class="fal fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="radioFields">
                                                <div class="col-12 row justify-content-between">
                                                    <label>
                                                        Are you OSHA Certified?
                                                        <span class="text-red">*</span>
                                                    </label>
                                                    <div class="radioButtonsField">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                required="required"
                                                                data-msg-required="This value is required."
                                                                name="osha_certified" value="certified" id="certified">
                                                            <label class="form-check-label" for="certified">
                                                                Yes
                                                            </label>
                                                            <div class="check"></div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                required="required"
                                                                data-msg-required="This value is required."
                                                                name="osha_certified" value="non_certified"
                                                                id="certifiedNo">
                                                            <label class="form-check-label" for="certifiedNo">
                                                                No
                                                            </label>
                                                            <div class="check"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="radioFields has_dolWrapper">
                                                <div class="col-12 row justify-content-between">
                                                    <label>
                                                        Do you have DOL Card?
                                                        <span class="text-red">*</span>
                                                    </label>
                                                    <div class="radioButtonsField">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                required="required"
                                                                data-msg-required="This value is required."
                                                                name="has_dol_card" value="true" id="has_dolCard_true">
                                                            <label class="form-check-label" for="has_dolCard_true">
                                                                Yes
                                                            </label>
                                                            <div class="check"></div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                required="required"
                                                                data-msg-required="This value is required."
                                                                name="has_dol_card" value="false"
                                                                id="has_dolCard_flase">
                                                            <label class="form-check-label" for="has_dolCard_flase">
                                                                No
                                                            </label>
                                                            <div class="check"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="checkBoxFields completed_trainingsWrapper">
                                                <label>
                                                    Select your OSHA Certifications
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="checkboxButtonsField">
                                                    <div class="form-checkBox">
                                                        <input class="form-checkbox-input" required="required"
                                                            data-msg-required="This value is required."
                                                            id="osha10Construction" name="completed_trainings"
                                                            type="checkbox" value="osha10c">
                                                        <label class="form-checkbox-label" for="osha10Construction">
                                                            OSHA 10 Hour Construction
                                                        </label>
                                                    </div>
                                                    <div class="form-checkBox">
                                                        <input class="form-checkbox-input" required="required"
                                                            data-msg-required="This value is required."
                                                            id="osha30Construction" name="completed_trainings"
                                                            type="checkbox" value="osha30c">
                                                        <label class="form-checkbox-label" for="osha30Construction">
                                                            OSHA 30 Hour Construction
                                                        </label>
                                                        <div class="check"></div>
                                                    </div>
                                                    <div class="form-checkBox">
                                                        <input class="form-checkbox-input" id="osha10GeneralIndustry"
                                                            required="required"
                                                            data-msg-required="This value is required."
                                                            name="completed_trainings" type="checkbox" value="osha10g">
                                                        <label class="form-checkbox-label" for="osha10GeneralIndustry">
                                                            OSHA 10 Hour General Industry
                                                        </label>
                                                        <div class="check"></div>
                                                    </div>
                                                    <div class="form-checkBox">
                                                        <input class="form-checkbox-input" id="osha30GeneralIndustry"
                                                            required="required"
                                                            data-msg-required="This value is required."
                                                            name="completed_trainings" type="checkbox" value="osha30g">
                                                        <label class="form-checkbox-label" for="osha30GeneralIndustry">
                                                            OSHA 30 Hour General Industry
                                                        </label>
                                                        <div class="check"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="ctaWrapper">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="formSubmit backButton">
                                                            <button type="button" class="previous">Back</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="formSubmit">
                                                            <button type="button"
                                                                class="next action-button">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="fieldsWrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">
                                                    Address Line 1
                                                    <span class="text-red">*</span>
                                                </label>
                                                <input type="text" placeholder="Your home address" name="address"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">
                                                    Address Line 2
                                                    <span class="text-red">*</span>
                                                </label>
                                                <input type="text" placeholder="Your street name" name="street" />
                                            </div>
                                        </div>
                                        {{--                                            <div class="col-12">--}}
                                        {{--                                                <div class="form-group">--}}
                                        {{--                                                    <label class="fieldName">Country <span--}}
                                        {{--                                                            class="text-red">*</span></label>--}}
                                        {{--                                                    <select required name="country">--}}
                                        {{--                                                    </select>--}}
                                        {{--                                                    <i class="fal fa-chevron-down"></i>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">State <span class="text-red">*</span></label>
                                                <div class="stateWrapper">
                                                    <select required name="state" class="pp ppb">
                                                        <option value="" selected disabled>Select</option>
                                                    </select>
                                                    <i class="fal fa-chevron-down"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">City <span class="text-red">*</span></label>
                                                <input type="text" placeholder="Your city" required name="city">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="fieldName">
                                                    Zip code
                                                    <span class="text-red">*</span>
                                                </label>
                                                <input type="number" minlength="5" maxlength="5" placeholder="Your zip code"
                                                    name="zipCode" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ctaWrapper">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="formSubmit backButton">
                                                        <button type="button" class="previous">Back</button>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="formSubmit">
                                                        <button type="submit" class="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


{{--@push("styles")--}}
{{--@endpush--}}

{{--@push('scripts')--}}
{{--@push--}}
