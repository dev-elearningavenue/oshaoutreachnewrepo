<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
</head>

<body style="font-family: 'Inter', 'Roboto', sans-serif;background:#efefef;">
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%"
       style="width:640px;max-width:640px;background: #fff;">
    <tbody>
       <tr>
        <td align="center">
            <table border="0" align="center" cellpadding="0" cellspacing="0" class="outer-table row"
                   role="presentation" width="640" style="width:640px;max-width:640px;">
                <tbody>
                <tr>
                    <td align="center">
                        <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation"
                               width="100%" style="width:100%;max-width:100%;">
                            <tbody>
                            <tr>
                                <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table border="0" align="center" cellpadding="0" cellspacing="0"
                                           class="inner-table row container-padding" role="presentation"
                                           width="580" style="width:580px;max-width:580px;">
                                        <tbody>
                                        <tr>
                                            <td align="left">
                                                <a href="{{ config('app.url') }}" target="_blank">
                                                    <img style="width:220px;border:0px;display: block;margin:0 auto;"
                                                         src="https://www.oshaoutreachcourses.com/images/osha-outreach-courses.png"
                                                         width="220" border="0"
                                                         alt="OSHA Outreach Courses Logo" />
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table border="0" align="center" cellpadding="0" cellspacing="0"
                   class="outer-table row container-padding" role="presentation" width="640"
                   style="width:640px;max-width:640px;">
                <tbody>
                <tr>
                    <td align="center" class="container-padding">
{{--                        <table style="--}}
{{--                                background-image:url('{{asset('images/abandoned-email-bg.webp')}}');--}}
{{--                                background-repeat: no-repeat;--}}
{{--                                background-size: cover;background-position: center center;width:640px;max-width:640px;"--}}
{{--                               border="0" align="center" cellpadding="0" cellspacing="0" role="presentation"--}}
{{--                               class="inner-table row" width="640">--}}
                        <table style="width:640px;max-width:640px;"
                               border="0" align="center" cellpadding="0" cellspacing="0" role="presentation"
                               class="inner-table row" width="640">
                            <tbody
                                style="
                                    background-image:url('{{asset('images/abandoned-email-bg.webp')}}');
                                    background-repeat: no-repeat;
                                    background-size: cover;"
                            >
                                <tr>
                                <td align="center">
                                    <table border="0" align="center" cellpadding="0" cellspacing="0"
                                           role="presentation" width="100%"
                                           style="width:100%;max-width:100%;">
                                        <tbody>
                                            <tr>
                                                <td height="80"
                                                    style="font-size:80px;line-height:80px;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <table border="0" align="center" cellpadding="0"
                                                       cellspacing="0" role="presentation" width="80%"
                                                       style="width:80%;max-width:80%;background:#6db5e4;
                                                                        border: 4px solid rgb(255, 255, 255);
                                                                      ">
                                                    <tbody>
                                                    @yield('content')
                                                    </tbody>
                                                </table>
                                            </tr>
                                        <tr>
                                            <td height=" 20"
                                                style="font-size:20px;line-height:20px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="type48" align="center" width="360"
                                                style="font-size: 9px;font-family: 'Inter', 'Roboto', sans-serif;color: rgb(148, 148, 148);line-height: 1.2;text-align: center;font-weight:600;letter-spacing:1px;">
                                                P.S. If you`re having trouble placing your order
                                                online
                                                or have any questions,<br /> please reply to this
                                                email.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="60"
                                                style="font-size:60px;line-height:60px;">
                                                &nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td height="40" style="font-size:40px;line-height:40px;">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <a href="https://www.oshaoutreachcourses.com/" style="
                                                        font-size: 14.583px;
                                                        font-family: 'Inter', 'Roboto', sans-serif;
                                                        color: rgb(0, 0, 0);
                                                        font-weight: bold;
                                                        line-height: 1.2;
                                                        text-align: center;
                                                        text-decoration: none;
                                                        letter-spacing: 2px;
                                                        text-transform: uppercase;
                                                      ">
                                            oshaoutreachcourses.com
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 12.5px;font-family: 'Inter', 'Roboto', sans-serif;color: rgb(1, 78, 128);font-weight: bold;line-height: 1.2;text-align: center;text-transform: uppercase;">
                                        Call us
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10" style="font-size:10px;line-height:10px;">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <a href="tel:+1-833-212-6742" style="
                                                        font-size: 14.583px;
                                                        font-family: 'Inter', 'Roboto', sans-serif;
                                                        color: rgb(0, 0, 0);
                                                        font-weight: bold;
                                                        line-height: 1.2;
                                                        text-align: center;
                                                        text-decoration: none;
                                                      ">
                                            +1-833-212-6742
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 12.5px;font-family: 'Inter', 'Roboto', sans-serif;color: rgb(1, 78, 128);font-weight: bold;line-height: 1.2;text-align: center;text-transform: uppercase;">
                                        Email us
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10" style="font-size:10px;line-height:10px;">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <a href="mailto:help@oshaoutreachcourses.com" style="
                                                        font-size: 14.583px;
                                                        font-family: 'Inter', 'Roboto', sans-serif;
                                                        color: rgb(0, 0, 0);
                                                        font-weight: bold;
                                                        line-height: 1.2;
                                                        text-align: center;
                                                        text-decoration: none;
                                                      ">
                                            help@oshaoutreachcourses.com
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="text-align: center;margin:auto">
                                            <tbody>
                                            <tr>
                                                <td align="center" valign="middle">
                                                    <a style="text-align:center;display:block"
                                                       href="https://www.facebook.com/OSHAOutreachCourses"
                                                       target="_blank">
                                                        <img style="opacity:0.5;width:15px;border:0px;display: inline;"
                                                             src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1661258529/assets/outreach_images/facebook-icon-image_ku0hw3.png"
                                                             width="24" border="0" alt="Facebook">
                                                    </a>
                                                </td>
                                                <td width="20"></td>
                                                <td align="center" valign="middle">
                                                    <a style="text-align:center;display:block"
                                                       href="https://www.linkedin.com/company/osha-outreach-courses/"
                                                       target="_blank">
                                                        <img style="opacity:0.5;width:24px;border:0px;display: inline;"
                                                             src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1661258529/assets/outreach_images/linkedin-icon-image_mdctew.png"
                                                             width="24" border="0" alt="Linkedin">
                                                    </a>
                                                </td>
                                                <td width="20"></td>
                                                <td align="center" valign="middle">
                                                    <a style="text-align:center;display:block"
                                                       href="https://twitter.com/oshaoutreach"
                                                       target="_blank">
                                                        <img style="opacity:0.5;width:24px;border:0px;display: inline;margin-top:5px"
                                                             src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1661258529/assets/outreach_images/twitter-icon-image_qqynan.png"
                                                             width="24" border="0" alt="Twitter">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="40"
                                                    style="font-size:40px;line-height:40px;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>
