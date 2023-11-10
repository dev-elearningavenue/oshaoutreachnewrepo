var hostname = window.location.origin;
var fileUrl = hostname + "/src/js";
$(window).on("load", function () {
    // var input = document.querySelector("#phoneField");
    // window.intlTelInput(input, {
    //   utilsScript: fileUrl + "/assets/inintlTelInput/js/utils.js",
    // });
    var input = document.querySelector("#phoneField");
    var iti = window.intlTelInput(input, {
        separateDialCode: true,
        initialCountry: "us",
        utilsScript: fileUrl + "/utils_new.js",
        preferredCountries: ["US"],
        formatOnDisplay: true,
    });

    $("#phoneField").on("keypress keyup change", formatIntlTelInput);

    function formatIntlTelInput(e) {
        var error = iti.getValidationError();
        if (error === intlTelInputUtils.validationError.TOO_LONG) {
            let currVal = $("#phoneField").val();

            $("#phoneField").val(currVal.slice(0, -1));
            return false;
        }

        if (typeof intlTelInputUtils !== "undefined") {
            // utils are lazy loaded, so must check
            var currentText = iti.getNumber(
                intlTelInputUtils.numberFormat.E164
            );
            if (typeof currentText === "string") {
                // sometimes the currentText is an object :)
                iti.setNumber(currentText); // will autoformat because of formatOnDisplay=true
            }
        }
    }

    // store the instance variable so we can access it in the console e.g. window.iti.getNumber()
    window.iti = iti;
    $('input[type="tel"]')
        .parent()
        .append(
            '<label id="phoneField-error" style="display:none"; class="error" for="phoneField"></label>'
        );
});

$(document).ready(function () {
    const data = [
        { id: "Architect", text: "Architect" },
        { id: "Scaffolder", text: "Scaffolder" },
        { id: "Carpenters", text: "Carpenters" },
        {
            id: "Cement Mason and Concrete Finisher",
            text: "Cement Mason and Concrete Finisher",
        },
        { id: "Civil Engineer", text: "Civil Engineer" },
        { id: "Construction Engineer", text: "Construction Engineer" },
        { id: "Construction Foreperson", text: "Construction Foreperson" },
        { id: "Crane Operator", text: "Crane Operator" },
        { id: "Drywall Installers", text: "Drywall Installers" },
        { id: "Electricians", text: "Electricians" },
        { id: "Equipment Operator", text: "Equipment Operator" },
        { id: "Estimator", text: "Estimator" },
        { id: "General Laborer", text: "General Laborer" },
        { id: "Ironworkers", text: "Ironworkers" },
        { id: "Joiners", text: "Joiners" },
        { id: "Painters", text: "Painters" },
        { id: "Pipefitters", text: "Pipefitters" },
        { id: "Plumbers", text: "Plumbers" },
        { id: "Project Manager", text: "Project Manager" },
        { id: "Roofers", text: "Roofers" },
        { id: "Safety Engineer", text: "Safety Engineer" },
        { id: "Safety Manager", text: "Safety Manager" },
        {
            id: "Senior Construction Manager",
            text: "Senior Construction Manager",
        },
        { id: "Signal Workers", text: "Signal Workers" },
        { id: "Structural Engineer", text: "Structural Engineer" },
        { id: "Superintendent", text: "Superintendent" },
        { id: "Surveyor", text: "Surveyor" },
        { id: "Welders", text: "Welders" },
        { id: "Loader", text: "Loader" },
        { id: "Other", text: "Other" },
    ];
    $('select[name="expertise"]').select2({
        placeholder: "Select",
        data: data,
        allowClear: true,
        dropdownAutoWidth: true,
    });

    var otValid = false;
    $('select[name="expertise"]').on("change", function (e) {
        var data = $(this).select2("val");
        if (data.includes("Other")) {
            if (otValid === false) {
                var elem = $(this).closest(".col-12");
                $(elem).after(
                    '<div class="col-12 otherExpertise"><div class="form-group"><label class="fieldName">Other Expertise <span class="text-red">*</span></label><input type="text" placeholder="Your Other Expertise" name="other_expertise" required=""aria-required="true"></div></div>'
                );
            }
            otValid = true;
        } else {
            $(".otherExpertise").remove();
            otValid = false;
        }
    });
    var ctrycode = "+1"; //------------------------------Change Country Code here if required.

    jQuery.ajax({
        type: "GET",
        url: fileUrl + "/country.json",
        dataType: "json",
        success: function (json) {
            jQuery(json.countrylist.country).each(function (i, data, p) {
                jQuery('select[name="country"]').append(
                    `<option value="` +
                        data.abbr +
                        `" dataVal="` +
                        data.code +
                        `">` +
                        data.name +
                        "</option>"
                );
                jQuery(
                    'select[name="country"] option[dataVal="' + ctrycode + '"]'
                ).attr("selected", "selected");
            });
        },
    });

    var stateVar = "";
    jQuery.ajax({
        type: "GET",
        url: fileUrl + "/states.json",
        dataType: "json",
        success: function (json) {
            stateVar = json.statelist.state;
            jQuery(json.statelist.state).each(function (i, data, p) {
                jQuery('select[name="state"]').append(
                    `<option value="` +
                        data.abbreviation +
                        `">` +
                        data.name +
                        "</option>"
                );
            });
        },
    });

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);
    $(".next").click(function (event) {
        event.preventDefault();
        current_fs = $(this).closest("fieldset");
        next_fs = $(this).closest("fieldset").next();
        //Add Class Active
        //show the next fieldset
        var phnValid = iti.isValidNumber();
        if (phnValid === false) {
            $('input[type="tel"]').siblings(".error").css("display", "inline");
            $('input[type="tel"]').addClass("error");
            $('input[type="tel"]')
                .siblings(".error")
                .html("Please Enter Correct Number");
        } else {
            $(current_fs).validate({
                rules: {
                    firstName: "required",
                    lastName: "required",
                    dob: "required",
                    expertise: "required",
                    experience: "required",
                    contactNo: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    city: "required",
                    state: "required",
                    country: "required",
                    zipCode: "required",
                    completed_trainings: "required",
                    address: "required",
                    osha_certified: "required",
                    email: {
                        required: true,
                        email: true,
                    },
                },
                // Specify validation error messages
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    email: "Please enter a valid email address",
                    certificationsCompleted: "You must check at least 1 box",
                },
            });
            setTimeout(checkRadio, 50);
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            if ($("form").valid() == true) {
                showNextFieldSet(current_fs, next_fs);
            }
        }
    });
    function showNextFieldSet(current_fs, next_fs) {
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate(
            { opacity: 0 },
            {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        display: "none",
                        position: "relative",
                    });
                    next_fs.css({ opacity: opacity });
                },
                duration: 500,
            }
        );
        setProgressBar(++current);
        formStepValue(1);
    }
    function checkRadio() {
        $(".radioFields .radioButtonsField label.error").each(function () {
            $(this).parent().parent().parent().parent().append($(this));
        });
        $(".checkBoxFields .checkboxButtonsField label.error").each(
            function () {
                $(this).parent().parent().parent().append($(this));
            }
        );
    }
    $(".previous").click(function () {
        current_fs = $(this).closest("fieldset");
        previous_fs = $(this).closest("fieldset").prev();

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate(
            { opacity: 0 },
            {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        display: "none",
                        position: "relative",
                    });
                    previous_fs.css({ opacity: opacity });
                },
                duration: 500,
            }
        );
        setProgressBar(--current);
        formStepValue(-1);
    });

    $(".completed_trainingsWrapper").hide();
    $(".has_dolWrapper").hide();
    $('input[name="osha_certified"]').bind("change click", function () {
        togglePlazo();
    });

    function togglePlazo() {
        plazo = $("[name='osha_certified']:checked").val();

        if (plazo === "certified") {
            $(".completed_trainingsWrapper").show();
            $(".has_dolWrapper").show();
        } else {
            $(".completed_trainingsWrapper").hide();
            $(".has_dolWrapper").hide();
        }
    }
    $("form button.submit").click(function (event) {
        event.preventDefault();
        // get all the inputs into an array.
        if ($("form").valid() == true) {
            var $inputs = $(".signupSection form").find("input,select");
            // not sure if you wanted this, but I thought I'd add it.
            // get an associative array of just the values.
            var formData = {};
            $inputs.each(function (i) {
                if ($inputs[i].attributes?.type?.value === "checkbox") {
                    var allVals = [];
                    $("input:checkbox:checked").each(function () {
                        allVals.push($(this).val());
                    });
                    formData[this.name] = allVals;
                } else if ($inputs[i].attributes?.type?.value === "radio") {
                    if ($inputs[i].attributes?.name?.nodeValue === "has_dol_card") {
                        $("input[name='has_dol_card']:checked").each(function () {
                            var data = $(this).val() === "true" ? "true" : '';
                            formData[this.name] = Boolean(data);
                        });
                    } else {
                        $("input:radio:checked").each(function () {
                            formData[this.name] = $(this).val();
                        });
                    }
                } else if ($inputs[i].attributes?.type?.value === "tel") {
                    formData[this.name] = iti.getNumber(
                        intlTelInputUtils.numberFormat.E164
                    );
                } else {
                    formData[this.name] = $(this).val();
                    if (formData.osha_certified === false) {
                        formData.completed_trainings = "";
                    }
                }
            });
            var settings = {
                url: "https://api.oshaoutreachcourses.com/american-recruits/signup",
                method: "POST",
                timeout: 0,
                headers: {
                    "Content-Type": "application/json",
                },
                data: JSON.stringify(formData),
            };

            $.ajax(settings).done(function (response) {
                if (response.message === "New Sign Up Successfully created") {
                    $("section.signupSection .signupWrapper").html(
                        `<div class="row justify-content-center">
            <div class="col-11 col-md-9 col-lg-7">
              <div class="thankYouWrapper">
                <div class="iconWrapper">
                    <img src="/images/american-recruits/formPostSubmissionIcon.svg" alt="">
                </div>
                <div class="desc">
                <br/>
                    <h3>
                        Please Check Your Inbox.
                    </h3>
                    <br />
                    <p>
                    An email has been sent to you to verify your email address.
                    </p>
                </div>
              </div>
            </div>
          </div>`
                    );
                } else {
                    var errorValid = "0";
                    if (errorValid === 0) {
                        $(
                            "section.signupSection .signupWrapper .formWrapper"
                        ).prepend(
                            `
            <div class="beErrorWrapper">
                <div class="desc">
                    <h3>
                        Opps!
                    </h3>
                    <p>
                        some error occured.
                    </p>
                </div>
            </div>`
                        );
                    }
                    errorValid = 1;
                }
            });
        }

        return false;
    });
    function formStepValue(val) {
        var container = $(".steps .stepCount");
        var current = parseInt(container.html(), 10);

        container.html(Math.max(0, current + val).toString());
        if (container.html() === "1") {
            $(".formHeader p").html(
                "Sign Up Now and Get Your Dream Job <br/> 50+ Companies Are Looking For You."
            );
            $(".formTitle").html("Personal Details");
        } else if (container.html() === "2") {
            $(".formHeader p").html(
                "Make your Profile Rank Higher <br/> Fill out your Professional Details"
            );
            $(".formTitle").html("Education & Work Experience");
        } else {
            $(".formHeader p").html(
                "Well Done, You are just One Step Away <br/> Form a Successful Career"
            );
            $(".formTitle").html("Your Address");
        }
    }
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar").css("width", percent + "%");
    }

    let urlParam = window.location.search;
    let userToken = urlParam.split("=");
    if (userToken[0] === "?user_id") {
        var form = new FormData();
        form.append("token", userToken[1]);

        var settings = {
            url: "https://api.oshaoutreachcourses.com/american-recruits/" + userToken[1],
            method: "GET",
            timeout: 0,
            processData: false,
            mimeType: "multipart/form-data",
            contentType: false,
        };

        $.ajax(settings).done(function (response) {
            const dataResponse = JSON.parse(response);
            if (dataResponse && dataResponse.user) {
                $.each(dataResponse.user, function (label, value) {
                    $("form")
                        .find('input[name="' + label + '"]')
                        .val(value);
                    if (label === "state") {
                        var stateAvailable = stateVar.find((val) => {
                            return val.name == value;
                        });
                        if (stateAvailable) {
                            $("form")
                                .find('select[name="' + label + '"] option')
                                .each(function () {
                                    if ($(this).text() === value) {
                                        $(
                                            'select[name="' + label + '"]'
                                        ).removeClass("ppb");
                                        $(this).prop("selected", true);
                                    }
                                });
                        }
                    }
                });
            }
        });
    }
    $('select[name="country"]').on("change", function () {
        if ($(this).val() !== "US") {
            $(".stateWrapper").html(
                '<input placeholder="State" required name="state" />'
            );
        } else {
            $(".stateWrapper").html(
                '<select required name="state"><option selected disabled>State</option></select><i class="fal fa-chevron-down"></i>'
            );
            jQuery.ajax({
                type: "GET",
                url: fileUrl + "/states.json",
                dataType: "json",
                success: function (json) {
                    jQuery(json.statelist.state).each(function (i, data, p) {
                        jQuery('select[name="state"]').append(
                            `<option value="` +
                                data.abbreviation +
                                `">` +
                                data.name +
                                "</option>"
                        );
                    });
                },
            });
        }
    });
    $('input[type="tel"]').on("change", function () {
        $(this).removeClass("error");
        $(this).siblings("label.error").css("display", "none");
    });
    $(".pp").on("change", function () {
        $(this).removeClass("ppb");
        if ($(this).val() === "") {
            $(this).addClass("ppb");
        }
    });
    var maxBirthdayDate = new Date();
    maxBirthdayDate.setFullYear(maxBirthdayDate.getFullYear() - 18);
    $("input[name='dob']").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "mm/dd/yy",
        yearRange: "-99:-18",
        maxDate: maxBirthdayDate
    });

    $("input[name='dob']").on("mousedown", function () {
        $(".ui-datepicker").addClass("active");
    });
});
