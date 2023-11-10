

<section class="bg-secondary price-comparision sec-padding">
    <div class="container">
        <div class="page-heading">
            <h2 class="title">Guaranteed Lowest Prices!</h2>
        </div>
        {{--<img src="/images/price-table.jpg" alt="" class="price-table">--}}
        <table class="table table-bordered desktop-view" id="price-comparison-table">
            <tr>
                <th><b>OSHA TRAINING PROVIDERS</b></th>
                <th>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/osha-outreach-courses.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/osha-outreach-courses.png') }}" type="image/jpeg">
                        <img src="{{ asset('/images/osha-outreach-courses.png') }}" alt="OSHA Outreach Courses"
                             title="OSHA Outreach Courses">
                    </picture>
                </th>
                <th>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/competitor-logos/turner.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/competitor-logos/turner.jpg') }}" type="image/jpeg">
                        <img src="{{ asset('/images/competitor-logos/turner.jpg') }}" alt="Turner Training"
                             title="Turner Training">
                    </picture>
                </th>
                {{--                    <th>--}}
                {{--                        <picture loading="lazy">--}}
                {{--                            <source srcset="{{ asset('/images/competitor-logos/usf-health.webp') }}" type="image/webp">--}}
                {{--                            <source srcset="{{ asset('/images/competitor-logos/usf-health.jpg') }}" type="image/jpeg">--}}
                {{--                            <img src="{{ asset('/images/competitor-logos/usf-health.jpg') }}" alt="USF Health"--}}
                {{--                                 title="USFOsha">--}}
                {{--                        </picture>--}}
                {{--                    </th>--}}
                {{--                    <th>--}}
                {{--                        <picture loading="lazy">--}}
                {{--                            <source srcset="{{ asset('/images/competitor-logos/360-training.webp') }}"--}}
                {{--                                    type="image/webp">--}}
                {{--                            <source srcset="{{ asset('/images/competitor-logos/360-training.jpg') }}" type="image/jpeg">--}}
                {{--                            <img src="{{ asset('/images/competitor-logos/360-training.jpg') }}" alt="360 Training"--}}
                {{--                                 title="360 Training">--}}
                {{--                        </picture>--}}
                {{--                    </th>--}}
                <th>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/competitor-logos/hsi.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/competitor-logos/hsi.jpg') }}" type="image/jpeg">
                        <img src="{{ asset('/images/competitor-logos/hsi.jpg') }}" alt="Health & Safety Institute"
                             title="Health & Safety Institute">
                    </picture>
                </th>
                <th>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/competitor-logos/oshacom.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/competitor-logos/oshacom.jpg') }}" type="image/jpeg">
                        <img src="{{ asset('/images/competitor-logos/oshacom.jpg') }}" alt="osha.com"
                             title="osha.com">
                    </picture>
                </th>
                <th>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/competitor-logos/clicksafety-new-logo.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/competitor-logos/clicksafety-new-logo.jpg') }}" type="image/jpeg">
                        <img src="{{ asset('/images/competitor-logos/clicksafety-new-logo.jpg') }}" alt="Clicksafety"
                             title="Clicksafety">
                    </picture>
                </th>
            </tr>
            <tr>
                <th>OSHA 10</th>
                <td class="ooc-row"><span class="fs-large lt-price">$89</span> $55</td>
                <td>N/A</td>
                <td>$55</td>
                <td>$64</td>
                <td>$79</td>
            </tr>
            <tr>
                <th>OSHA 30</th>
                <td class="ooc-row"><span class="fs-large lt-price">$189</span> $99
                </td>
                <td>$459</td>
                <td>$129</td>
                <td>$128</td>
                <td>$189</td>
            </tr>
        </table>
        <table class="table table-bordered mobile-view" id="price-comparison-table">
            <tr>
                <th><b>OSHA TRAINING PROVIDERS</b></th>
                <th>OSHA 10</th>
                <th>OSHA 30</th>
            </tr>
            {{--                <tr class="ooc-row">--}}
            <tr>
                <td>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/osha-outreach-courses.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/osha-outreach-courses.png') }}" type="image/jpeg">
                        <img src="{{ asset('/images/osha-outreach-courses.png') }}" alt="OSHA Outreach Courses"
                             title="OSHA Outreach Courses">
                    </picture>
                </td>
                <td class="ooc-mb-row" style="background-color: #FDBB33; font-weight: bold; font-size: 30px;"><span
                        class="fs-large lt-price">$89</span> $55
                </td>
                <td class="ooc-mb-row" style="background-color: #FDBB33; font-weight: bold; font-size: 30px;"><span
                        class="fs-large lt-price">$189</span> $99
                </td>
            </tr>
            <tr>
                <td>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/competitor-logos/turner.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/competitor-logos/turner.jpg') }}" type="image/jpeg">
                        <img src="{{ asset('/images/competitor-logos/turner.jpg') }}" alt="Turner Training"
                             title="Turner Training">
                    </picture>
                </td>
                <td>N/A</td>
                <td>$459</td>
            </tr>
            <tr>
                <td>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/competitor-logos/hsi.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/competitor-logos/hsi.jpg') }}" type="image/jpeg">
                        <img src="{{ asset('/images/competitor-logos/hsi.jpg') }}" alt="Health & Safety Institute"
                             title="Health & Safety Institute">
                    </picture>
                </td>
                <td>$55</td>
                <td>$129</td>
            </tr>
            <tr>
                <td>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/competitor-logos/oshacom.webp') }}"
                                type="image/webp">
                        <source srcset="{{ asset('/images/competitor-logos/oshacom.jpg') }}" type="image/jpeg">
                        <img src="{{ asset('/images/competitor-logos/oshacom.jpg') }}" alt="osha.com"
                             title="osha.com">
                    </picture>
                </td>
                <td>$64</td>
                <td>$164</td>
            </tr>
            <tr>
                <td>
                    <picture loading="lazy">
                        <source srcset="{{ asset('/images/competitor-logos/clicksafety-new-logo.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/competitor-logos/clicksafety-new-logo.jpg') }}" type="image/jpeg">
                        <img src="{{ asset('/images/competitor-logos/clicksafety-new-logo.jpg') }}" alt="Clicksafety"
                             title="Clicksafety">
                    </picture>
                </td>
                <td>$79</td>
                <td>$189</td>
            </tr>
        </table>
    </div>
</section>
