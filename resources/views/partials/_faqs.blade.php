@php
    if (Route::currentRouteName() == 'home' || Route::currentRouteName() == 'course.single' || Route::currentRouteName() == 'statePromotions.single') {
        $faqs = $faqs;
    } elseif (isset($course)) {
        $faqs = $course->faqs;
    } elseif (isset($product)) {
        $faqs = $product->faqs;
    }
@endphp

@if (isset($faqs) && count($faqs) > 0)
    <section class="sec-padding {{ isset($blueBackground) ? 'bg-secondary' : '' }}">
        <div class="container">
            <div class="page-heading">
                <h2 class="title mbpx-0">FAQ</h2>
                <p class="subtitle"></p>
            </div>
            @php
                $faq_rich_snippet_string = '';
            @endphp
            <div class="tab-body">
                @foreach ($faqs as $faq)
                    <div class="faq-section">
                        <p class="title"><b>{{ $faq->question }}</b></p>
                        <p class="details" style="display: none;">{!! nl2br($faq->answer) !!}</p>
                    </div>
                    {{-- String for FAQ Rich Snippet --}}
                    @php
                        $faq_rich_snippet_string .= '{
                            "@type": "Question",
                            "name": "'.$faq->question.'",
                            "acceptedAnswer": {
                              "@type": "Answer",
                              "text": "'.nl2br($faq->answer).'"
                            }
                          },';
                    @endphp
                @endforeach
            </div>
        </div>
    </section>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [{!! rtrim($faq_rich_snippet_string, ',') !!}]
    }
</script>
    @push('custom-css')
        /* FAQs Section */

        .faq-section {
        padding: 20px 0;
        border-bottom: 1px solid #d2d2d2;
        }

        .faq-section .title {
        font-size: 16px;
        position: relative;
        cursor: pointer;
        padding-right: 40px;
        }

        .faq-section .title:after {
        position: absolute;
        right: 10px;
        top: 10px;
        background-image: url('/images/arrow-down.png');
        background-repeat: no-repeat;
        content: '';
        width: 18px;
        height: 12px;
        }
        .faq-section .title.open:after {
        background-image: url('/images/arrow-up.png');
        }
        .faq-section .details {
        padding-top: 20px;
        padding-left: 20px;
        line-height: 2;
        }

        p {
        font-size: 16px;
        }

        @media (max-width: 425px) {
        .faq-section .title {
        font-size: 14px!important;
        padding-right: 40px;
        font-weight: 600;
        }
        }
    @endpush
@endif
