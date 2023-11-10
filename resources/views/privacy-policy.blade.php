@extends('layouts.master')

@section('title', $page['seo_tags']['title'] ?? 'Privacy Policy | '.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title" content="{{ $page['seo_tags']['title'] ?? 'Privacy Policy' }}">
    <meta property="twitter:title" content="{{ $page['seo_tags']['title'] ?? 'Privacy Policy' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Privacy Policy' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Privacy Policy' }}">
    <meta property="og:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "name": "Breadcrumb",
        "itemListElement": {
            "@type": "ListItem",
            "position": 1,
            "name": "{{ $page['h1_heading'] ?? 'Privacy Policy' }}"
        }
    }


    </script>
@endsection

@section('content')
    <section class="home-intro sec-padding">
        <div class="container">
            <h1 class="title" style="text-decoration: underline;">{{ $page['h1_heading'] ?? 'Privacy Policy' }}</h1>
            <div class="box --course-objectives ta-left">
                <p class="desc" style="text-align: left;">
                    Protecting your privacy is important to us. This Privacy Policy explains how
                    this Web Site collects, uses, and discloses the personal information you
                    may provide while using the Web Site and the content, information and
                    services provided through the Web site (collectively the “Web Site”).
                </p>
                <h6>Your Consent</h6>
                <p class="desc" style="text-align: left;">
                    By using the Web Site, you signify your consent to the collection, use, and
                    disclosure of your personal information in accordance with this Policy.
                </p>

                <h6>Information Automatically Collected:</h6>
                <br/>

                <p class="desc" style="text-align: left;">
                    <b>Non-Identifiable Information –</b> As is the case with many other Web
                    sites, the Web Site automatically collects certain non-identifiable
                    information about Web Site users, such as the Internet Protocol (IP)
                    address of your computer, the IP address of your Internet Service
                    Provider, the date and time you access the Web Site, the Internet address
                    of the Web site from which you linked directly to the Web Site, and the
                    referring Web site. This non-identifiable information is used to administer
                    the Web Site and its systems, as well as to improve the Web Site. Non-
                    identifiable information about you may be disclosed to others and
                    preserved indefinitely for future use.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Cookies –</b> The Web Site makes use of "cookies," a technology that stores
                    information on a Web Site user's computer in order for the Web Site to
                    identify that user's computer on subsequent visits. Cookies contribute to
                    the Website's ease and usability. For instance, the information collected
                    via cookies is used to identify you as a previous user of the Web Site, to
                    track your activity on the Web Site in order to better serve your needs, to
                    provide personalised Web page content and information for your use, to
                    automatically populate online forms with your personal information for
                    your convenience, and to otherwise enhance your Web Site experience.
                    Advertisements displayed on the Web Site may also contain cookies or
                    other technologies. Those advertisements may be provided by third party
                    advertising companies, and this Web Site does not have any control over,
                    or any responsibility or liability for, the cookies or other technologies used
                    in the advertisements or for the use and disclosure of information
                    collected through advertisement cookies.
                    You may choose to decline cookies if your browser permits, but doing so
                    may affect your use of the Web Site and your ability to access or use
                    certain Web Site features.
                </p>

                <h6>Personal Information You Specifically Provide:</h6>
                <br/>

                <p class="desc" style="text-align: left;">
                    <b>Your Personal Information –</b> During your use of the Web Site, you may
                    be asked to voluntarily provide your résumé, curriculum vitae or other
                    personal information (such as your name, email address, postal address,
                    telephone number) and information regarding any customer or other
                    person you represent, for purposes such as facilitating communications
                    with you, applying for access to certain special features or areas of the
                    Web Site, using this Web Site employment-related services, carrying out
                    transactions, or facilitating your use of the Web Site. If you choose not to
                    provide certain requested personal information, you will not be able to use
                    the Web Site.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Use of Your Personal Information –</b> This Web Site may use your
                    personal information to contact and correspond with you, to respond to
                    your communications, to process transactions and charge for services, to
                    facilitate and enhance your use of the Web Site, to provide you with
                    information and services requested through the Web Site, and as
                    otherwise permitted by law. This Web Site may develop a confidential
                    user profile for you, which will be used to facilitate your use of the Web
                    Site. Additionally, this Web Site may keep a record of all communications
                    with you.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Emails from this Web Site –</b>If you contact this Web Site or otherwise
                    indicate that you would like to receive email from this Web Site, then this
                    Web Site may send to you, from time to time, email or other
                    communications containing information about this Web Site and other
                    matters (including third party products or services) it believes will interest
                    you. At any time, you may ask this Web Site to stop sending you email
                    and other information.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Tracking Information –</b> this Web Site may use non-personal information
                    to create aggregate tracking information reports regarding Web Site user
                    demographics and the use of the Web Site, and then provide those
                    reports to others. None of the tracking information in the reports can be
                    connected to the identities or other personal information of individual
                    users. This Web Site also may link tracking information with Web Site
                    users’ personal information. Once such a link is made, all of the linked
                    information is treated as personal information and will be used and
                    disclosed only in accordance with this Policy.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Disclosure of Your Personal Information – this Web Site may
                        disclose your personal information in the following
                        circumstances:</b>
                </p>

                <p class="desc" style="text-align: left;">
                    <b>(i) Disclosure to Authorizing Persons –</b> If your access to certain areas
                    of the Web Site has been authorized by a customer or other person, this
                    Web Site may provide your personal information to that authorizing
                    person. This Web Site has no control over authorizing persons’ use of your
                    personal information, and that use is not necessarily subject to this Policy.
                    If you do not wish your personal information to be disclosed to the person
                    who has authorized your use of the Web Site, you may not use the Web
                    Site.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>(ii) Disclosure to Affiliates –</b> This Web Site may share your personal
                    information with its connected businesses for employment-related reasons
                    or to address issues concerning your usage of the Web Site. This Web Site
                    has no control over the manner in which its connected businesses use
                    your personal information, and such use is not always governed by this
                    Policy. You may not use the Web Site if you do not want your personal
                    information revealed to specified or associated entities.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>(iii) Disclosure in Business Transfers –</b> This Web Site may be in the
                    process of selling or transferring all or a portion of its company. This Web
                    Site may disclose your personal information to the acquiring business as
                    part of that sale or transfer, but will require the acquiring business to
                    agree to protect your personal information in a manner consistent with
                    this Policy. If you do not desire for your personal information to be
                    disclosed as part of the sale or transfer of parts or all of this Web Site's
                    business, you may not use the Web Site
                </p>

                <p class="desc" style="text-align: left;">
                    <b>(iv) Law Enforcement and Legal Disclosure –</b> This Web Site may
                    disclose your personal information to a government institution that has
                    asserted its lawful authority to obtain the information or where this Web
                    Site has reasonable grounds to believe the information could be useful in
                    the investigation of unlawful activity, or to comply with a subpoena or
                    warrant or an order made by a court, person or body with jurisdiction to
                    compel the production of information, or to comply with court rules
                    regarding the production of records and information, or to their legal
                    counsel.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Location of Information –</b> This Web Site will store and process your
                    personal information in Park Hills, Missouri, U.S.A., or, from time to time,
                    in other locations that this Web Site decides are necessary or convenient
                    in order to provide you with efficient and effective service.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Securing Your Information –</b> To help protect the confidentiality of your
                    personal information, this Web Site employs security safeguards
                    appropriate to the sensitivity of the information. Nevertheless, due to the
                    nature of Internet technologies, security and privacy risks cannot be
                    eliminated and this Web Site cannot guarantee that your personal
                    information will not be disclosed in ways not otherwise described in this
                    Policy.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Accessing Your Personal Information –</b> You may request access to
                    your personal information and information about this Web Site’s
                    collection, use and disclosure of that information by contacting this Web
                    Site. Subject to certain exceptions prescribed by law, you will be given
                    reasonable access to your personal information, and will be entitled to
                    challenge the accuracy and completeness of the information and to have
                    it amended as appropriate. You can help this Web Site maintain the
                    accuracy of your information by notifying this Web Site of any changes to
                    your personal information.
                </p>

                <h6>Other Matters</h6>
                <br/>

                <p class="desc" style="text-align: left;">
                    <b>Web Site Use Agreement –</b> The Web Site Use Agreement governing
                    your use of the Web Site (which may be viewed by clicking here) contains
                    important provisions, including provisions disclaiming, limiting or
                    excluding the liability of this Web Site and others for your use of the Web
                    Site and the use of your user’s name and password, and provisions
                    determining the applicable law and exclusive jurisdiction for the resolution
                    of any disputes regarding your use of the Web Site. Each of those
                    provisions applies to any disputes that may arise in relation to this Policy
                    and the collection, use and disclosure of your personal information, and
                    are of the same force and effect as if they had been reproduced directly in
                    this Policy.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Former Users –</b> If you stop using the Web Site or your permission to use
                    the Web Site is terminated, this Web Site may continue to use and
                    disclose your personal information in accordance with this Policy as
                    amended from time to time.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Other Web Sites –</b> The Web Site may contain links to other Web sites or
                    Internet resources. When you click on one of those links you are
                    contacting another Web site or Internet resource that may collect
                    information about you voluntarily or through cookies or other
                    technologies. this Web Site has no responsibility, liability for, or control
                    over those other Web sites or Internet resources or their collection, use
                    and disclosure of your personal information. You should review the privacy
                    policies of those other Web sites and Internet resources to understand
                    how they collect and use information
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Privacy Policy Changes –</b> This Policy may be changed from time to time
                    in this Web Site’s sole discretion and without any prior notice or liability to
                    you or any other person. The collection, use and disclosure of your
                    personal information by this Web Site will be governed by the version of
                    this Policy in effect at that time. New versions of this Policy will be posted
                    here. Your continued use of the Web Site subsequent to any changes to
                    this Policy will signify that you consent to the collection, use and
                    disclosure of your personal information in accordance with the changed
                    Policy. Accordingly, when you use the Web Site you should check the date
                    of this Policy and review any changes since the last version. You should
                    also bookmark this page and periodically review this Policy to ensure that
                    you are familiar with the most current version.
                </p>

                <p class="desc" style="text-align: left;">
                    <b>Contests and Promotions –</b> If contests or promotions are made
                    available through the Web Site, the applicable contest or promotion rules
                    may include rules regarding the collection, use and disclosure of personal
                    information. To the extent that those specific rules conflict with this Policy,
                    the contest or promotion rules will govern regarding personal information
                    collected regarding the particular contest or promotion.
                </p>

                <strong class="desc">Please contact our support team at <a href="tel:+18332126742">+1-833-212-6742</a>
                    for assistance with technical troubleshooting or any other issues or concerns you may have.</strong>
            </div>
        </div>
    </section>
@endsection
