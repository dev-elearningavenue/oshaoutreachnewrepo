<?php
// Coupon Types
define('COUPON_TYPE_FIXED',   1);
define('COUPON_TYPE_PERCENT', 2);

// STATUS
define('STATUS_DISABLED', 0);
define('STATUS_ACTIVE', 1);

// Coupon Functionality
define('COUPON_APPLY',  1);
define('COUPON_REMOVE', 0);

// USER TYPE
define('USER_TYPE_ADMIN', 1);
define('USER_TYPE_DIGITAL_MARKETER', 2);
define('USER_TYPE_BDM', 3);
define('USER_TYPE_SUPPORT', 4);

// Course ID
define('COURSE_OSHA_10_HOUR_CONSTRUCTION', 1);
define('COURSE_OSHA_30_HOUR_CONSTRUCTION', 2);
define('COURSE_FREE_INFECTION_CONTROL', 1501);
define('COURSE_FREE_PANDEMIC_COVID_19', 1502);

// Page Type
define('PAGE_TYPE_COURSE', 1);
define('PAGE_TYPE_STATIC', 2);

//define('WEB_CREDIT', '');

// LOG TYPE
define("LOG_TYPE_INDIVIDUAL", 1);
define("LOG_TYPE_GROUP", 2);
define("LOG_TYPE_PROMOTION", 3);

// LOG STATUS
define("LOG_STATUS_SUCCESS", 1);
define("LOG_STATUS_FAILED_AJAX_FAILURE", 2);
define("LOG_STATUS_FAILED_INTERNAL_FAILURE", 3);
define("LOG_STATUS_FAILED_TO_CAPTURE", 4);
define("LOG_STATUS_SAVE_AJAX_FAILURE", 5);
define("LOG_STATUS_ERROR", 99);

// COMMUNICATION TYPE
define('COMMUNICATION_EMAIL', 1);
define('COMMUNICATION_SMS',   2);

// LMS TYPE
define('LMS_TYPE_OSHA_OUTREACH', 1);
define('LMS_TYPE_PURE_SAFETY',   2);

//LMS USER TYPES
define('USER_TYPE_MANAGER', 2);

define('COURSE_LANG_ENGLISH', 'English');
define('COURSE_LANG_SPANISH', 'Spanish');

// Course Images Path
define('ALL_COURSE_IMG_PATH', '/images/all_course_images/');

const PAYMENT_STATUS = ["Unpaid", "Paid", "Pending", "Failed"];
