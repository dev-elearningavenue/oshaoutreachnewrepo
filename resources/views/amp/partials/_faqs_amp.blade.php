@if(Route::currentRouteName() == 'home' || Route::currentRouteName() == 'course.single')
{{--    NOTHING TO DO--}}
@elseif(isset($course))
    @php
        $faqs = $course->faqs
    @endphp
@elseif(isset($product))
    @php
        $faqs = $product->faqs;
    @endphp
@endif

@if(isset($faqs) && count($faqs) > 0)
    <section class="sec-padding ptpx-0">
        <div class="container">
            <div class="page-heading">
                <h2 class="title mtpx-40 mbpx-0">FAQ</h2>
                <p class="subtitle"></p>
            </div>
            @php
                $faq_rich_snippet_string = '';
            @endphp
            <amp-accordion id="faq-accordion" disable-session-states>
                @foreach($faqs as $key => $faq)
                    <section id="faq_{{ $key+1 }}" class="faq-section">
                        <h3 role="button" tabindex="{{ $key }}" class="title">{{ $faq->question }}</h3>
                        <p class="details" style="display: none;">{!! nl2br($faq->answer) !!}</p>
                    </section>
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
            </amp-accordion>
        </div>
    </section>
    @push('structure-data')
        <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [{!! rtrim($faq_rich_snippet_string, ',') !!}]
    }

        </script>
    @endpush
    @push('component-script')
        <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
    @endpush
    @push('custom-css')
        /* FAQs Section */

        .faq-section {
        padding: 20px 0;
        border-bottom: 1px solid #d2d2d2;
        }

        .faq-section .title{
        font-size: 20px;
        position: relative;
        cursor: pointer;
        background: none;
        border: none;
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
        .faq-section[expanded] .title:after {
        background-image: url('/images/arrow-up.png');
        }
        .faq-section .details {
        padding-top: 20px;
        padding-left: 20px;
        line-height: 2;
        }

        .faq-section .title {
        font-size: 13px;
        padding-right: 40px;
        font-weight: 600;
        }
    @endpush
@endif
