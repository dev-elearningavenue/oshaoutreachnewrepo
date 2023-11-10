<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }

    /* Base */

    body, body *:not(html):not(style):not(br):not(tr):not(code) {
        font-family: Avenir, Helvetica, sans-serif;
        box-sizing: border-box;
    }

    body {
        /*background-color: #f5f8fa;*/
        color: #fff;
        color: #74787E;
        height: 100%;
        hyphens: auto;
        line-height: 1.4;
        margin: 0;
        -moz-hyphens: auto;
        -ms-word-break: break-all;
        width: 100% !important;
        -webkit-hyphens: auto;
        -webkit-text-size-adjust: none;
        word-break: break-all;
        word-break: break-word;
    }

    p,
    ul,
    ol,
    blockquote {
        line-height: 1.4;
        text-align: left;
    }

    a {
        color: #3869D4;
    }

    a img {
        border: none;
    }

    /* Typography */

    h1 {
        color: #2F3133;
        font-size: 19px;
        font-weight: bold;
        margin-top: 0;
        text-align: left;
    }

    h2 {
        color: #2F3133;
        font-size: 16px;
        font-weight: bold;
        margin-top: 0;
        text-align: left;
    }

    h3 {
        color: #2F3133;
        font-size: 14px;
        font-weight: bold;
        margin-top: 0;
        text-align: left;
    }

    p {
        color: #74787E;
        font-size: 14px;
        line-height: 1.5em;
        margin-top: 0;
        text-align: left;
    }

    p.sub {
        font-size: 12px;
    }

    img {
        max-width: 100%;
    }

    /* Layout */

    .wrapper {
        /*background-color: #00b1f8;*/
        margin: 0;
        padding: 0;
        width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        -premailer-width: 100%;
    }

    .content {
        margin: 0;
        padding: 0;
        width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        -premailer-width: 100%;
    }

    /* Header */

    .header {
        padding: 25px 0;
        text-align: center;
    }

    .header a {
        color: #ffffff;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        text-shadow: 0 1px 0 white;
    }

    /* Body */

    .body {
        background-color: #FFFFFF;
        border-bottom: 1px solid #EDEFF2;
        border-top: 1px solid #EDEFF2;
        margin: 0;
        padding: 30px 0;
        width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        -premailer-width: 100%;
    }

    .inner-body {
        background-color: #FFFFFF;
        margin: 0 auto;
        padding: 0;
        width: 570px;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        -premailer-width: 570px;
    }

    /* Subcopy */

    .subcopy {
        border-top: 1px solid #EDEFF2;
        margin-top: 25px;
        padding-top: 25px;
    }

    .subcopy p {
        font-size: 12px;
    }

    /* Footer */

    .footer {
        margin: 0 auto;
        padding: 0;
        text-align: center;
        /*width: 570px;*/
        width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        -premailer-width: 570px;
        /*background-color: #0b0e16;*/
        background-color: #1f2224;
        color: #a7a8a8;
    }

    .footer p {
        color: #AEAEAE;
        font-size: 12px;
        text-align: center;
        color:#ffffff;
        margin:0;
        line-height: 1em;
    }

    /* Tables */

    .table table {
        margin: 30px auto;
        width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        -premailer-width: 100%;
    }

    .table th {
        border-bottom: 1px solid #EDEFF2;
        padding-bottom: 8px;
    }

    .table td {
        color: #74787E;
        font-size: 15px;
        line-height: 18px;
        padding: 10px 0;
    }

    .content-cell {
        /*padding: 35px;*/
        padding: 5px 0;
    }

    /* Buttons */

    .action {
        margin: 30px auto;
        padding: 0;
        text-align: center;
        width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        -premailer-width: 100%;
    }

    .button {
        border-radius: 3px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
        color: #FFF;
        display: inline-block;
        text-decoration: none;
        -webkit-text-size-adjust: none;
    }

    .button-blue {
        background-color: #3097D1;
        border-top: 10px solid #3097D1;
        border-right: 18px solid #3097D1;
        border-bottom: 10px solid #3097D1;
        border-left: 18px solid #3097D1;
    }

    .button-green {
        background-color: #2ab27b;
        border-top: 10px solid #2ab27b;
        border-right: 18px solid #2ab27b;
        border-bottom: 10px solid #2ab27b;
        border-left: 18px solid #2ab27b;
    }

    .button-red {
        background-color: #bf5329;
        border-top: 10px solid #bf5329;
        border-right: 18px solid #bf5329;
        border-bottom: 10px solid #bf5329;
        border-left: 18px solid #bf5329;
    }

    /* Panels */

    .panel {
        margin: 0 0 21px;
    }

    .panel-content {
        background-color: #EDEFF2;
        padding: 16px;
    }

    .panel-item {
        padding: 0;
    }

    .panel-item p:last-of-type {
        margin-bottom: 0;
        padding-bottom: 0;
    }

    /* Promotions */

    .promotion {
        background-color: #FFFFFF;
        border: 2px dashed #9BA2AB;
        margin: 0;
        margin-bottom: 25px;
        margin-top: 25px;
        padding: 24px;
        width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        -premailer-width: 100%;
    }

    .promotion h1 {
        text-align: center;
    }

    .promotion p {
        font-size: 15px;
        text-align: center;
    }
    ol{
        padding-left: 15px;
    }
    ol li{
        font-size: 14px;
    }
    small{
        font-size:10px;
    }
    .body .inner-body td.content-cell th{
        text-align: left;
    }
    #cart {
        border-collapse: collapse;
        width: 100%;
        color: #000;
    }

    #cart td, #cart th {
        border: 1px solid #ddd;
        padding: 8px;
        color: #000;
    }

    #cart tr:nth-child(even){background-color: #f2f2f2;}

    #cart tr:nth-of-type(odd){
        background-color: rgba(0, 0, 0, 0.05);
    }
    #cart th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: rgba(0, 0, 0, 0.05);
        color: #000;
    }
</style>
</head>
<body>
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0">

                <tr>
                    <td class="header">
                        <a href="{{ config('app.url') }}">
                            <img src="https://www.oshaoutreachcourses.com/images/header-logo.png" alt="*">
                        </a>
                    </td>
                </tr>

            <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                    @yield('content')
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="content-cell" align="center">
                                    &copy; {{ date('Y') }} OSHA Outreach Courses. All rights reserved.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
