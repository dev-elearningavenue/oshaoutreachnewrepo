<div id="ouibounce-modal" style="display: none;">
    <section class="exitPopup x-modal">
        <div class="modal-content">
            <a href="javascript:void(0);" id="close-exit-popup" class="close-btn modal-close">
                x
            </a>
            <div class="exitPopUpTop">
                <h3>Give us a call</h3>
                <h2>To get your discount Coupon</h2>
            </div>
            <div class="exitPopUpIcon">
                <svg width="100%" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 97.7 90.8">
                    <g>
                        <path fill="#1E1E1F"
                              d="M96,50c0-5.2-2.9-9.8-7.2-11.8v-0.8c0-1-0.6-1.8-1.4-1.8H86c-1.1-8.6-5.2-16.3-11.2-22.1l0.8-0.8   c-15-14.7-38.9-14.6-54,0l0.8,0.8c-6,5.8-10,13.5-11.2,22.1h-1.1c-0.8,0-1.4,0.8-1.4,1.8v0.8c-4.2,2-7.2,6.5-7.2,11.8   c0,5.2,2.9,9.8,7.2,11.8v0.8c0,1,0.6,1.8,1.4,1.8h3.6c0.2,0.9,0.9,1.5,1.8,1.5H18c1,0,1.9-0.9,1.9-2V36.1c0-1.1-0.8-2-1.9-2h-0.8   c1.3-6.5,4.6-12.3,9.2-16.7l0.7,0.7c12.1-11.3,30.2-12,43.1,0l0.7-0.7c4.6,4.4,7.9,10.2,9.2,16.7h-0.6c-1,0-1.9,0.9-1.9,2V64   c0,1.1,0.8,2,1.9,2h0.1c-4,9.3-12.7,15.7-22.7,17c-0.3-1.9-1.7-3.5-3.6-4c-2.7-0.8-5.6,0.8-6.4,3.5c-0.8,2.7,0.8,5.6,3.5,6.4   c2.7,0.8,5.6-0.8,6.4-3.5c0.1-0.3,0.1-0.6,0.2-0.9c10.7-1.3,19.6-7.7,24.2-18.4H82c0.9,0,1.6-0.6,1.8-1.5h3.6   c0.8,0,1.4-0.8,1.4-1.8v-0.8C93,59.8,96,55.3,96,50z">
                        </path>
                        <g>
                            <g>
                                <path fill="#ffffff"
                                      d="M49.2,32c15.1,0.4,26,13.8,18.8,25.7c-1.2,2-2.8,3.7-4.6,5.1c-0.1,0.1-0.2,0.1-0.2,0.3     c-0.3,2.1,1.5,4.1,3.4,5.3c0.3,0.2,0.6,0.4,0.7,0.7c0.1,0.2-0.1,0.4-0.3,0.5c-0.6,0.4-1.3,0.3-2,0.4h-0.9     c-5.2-0.1-9.8-2.4-13-7.2c0.1,1.7,0.5,3.4,1.4,4.8c-6.3,0.7-12.5-0.5-17.5-4.1C20.2,52.9,28,32,49.2,32z M36.5,47.3     c-0.9,0.8-1.3,2.2-0.8,3.3c0.5,1.2,1.9,2,3.2,1.7c1.3-0.3,2.3-1.6,2.2-3C41.1,47,38.3,45.8,36.5,47.3z M47.5,46.8     c-1.7,0.5-2.5,2.5-1.7,4c0.6,1.2,2,1.9,3.3,1.5c1.3-0.3,2.3-1.7,2.1-3C51.1,47.5,49.4,46.2,47.5,46.8z M57.7,46.7     c-1.1,0.3-2,1.3-2.2,2.4C55.4,50.3,56,51.5,57,52c0.9,0.5,2.2,0.5,3-0.2c1-0.7,1.5-2.2,1-3.4C60.6,47.2,59,46.4,57.7,46.7z">
                                </path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="exitPopUpBottom">
                <a href="tel:+18332126742">
                    +1-833-212-6742</a>
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('src/js/ouibounce.min.js') }}"></script>
<script>
    var _ouibounce = ouibounce(document.getElementById('ouibounce-modal'), {
        aggressive: true,
        timer: 120000, // ouibounce will start after n seconds
        // delay: 5000, // ouibounce will show modal after n seconds if user remains on tab window
        callback: function() {
            $('#ouibounce-modal').show();
        }
    });
    $('body').on('click', function() {
        $('#ouibounce-modal').hide();
    });
    $('#close-exit-popup').on('click', function() {
        // $('#ouibounce-modal').hide();
        _ouibounce.disable();
    });
    $('#ouibounce-modal .modal-content').on('click', function(e) {
        if (e.target.id !== "close-exit-popup") {
            e.stopPropagation();
        }
    });
</script><style>
    .exitPopup.hide {
        display: none;
    }
    .exitPopup {
        height: 100vh;
        display: flex;
        z-index: 99999999;
        justify-content: center;
        align-items: center;
    }
    .exitPopup .modal-content {
        top: 0;
        margin: 0;
        max-width: 650px;
        padding: 0;
    }
    .exitPopup .modal-content a.close-btn.modal-close {
        height: 15px;
        width: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: ease all 0.25s;
    }
    .exitPopup .modal-content .exitPopUpTop {
        padding: 30px 30px 15px;
        text-align: center;
    }
    .exitPopup .modal-content .exitPopUpTop h3 {
        color: #1c82c4;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: 2px;
    }
    .exitPopup .modal-content .exitPopUpTop h2 {
        font-weight: 300;
    }
    .exitPopup .modal-content .exitPopUpBottom {
        background: #1c82c4;
        padding: 80px 30px 30px;
        text-align: center;
    }
    .exitPopup .modal-content .exitPopUpBottom p {
        color: #fff;
        font-weight: 700;
        font-size: 22px;
        letter-spacing: 2px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }
    .exitPopup .modal-content .exitPopUpBottom p svg {
        width: 30px;
        margin: 0px;
    }
    .exitPopup .modal-content .exitPopUpBottom a {
        border-radius: 25px;
        background: #fecd07;
        font-size: 22px;
        padding: 6px 30px;
        margin-bottom: 15px;
        display: inline-block;
        border: 1px solid #fecd07;
        font-weight: 900;
        transition: ease all 0.25s;
    }
    .exitPopup .modal-content .exitPopUpBottom a:hover {
        background: rgba(0, 0, 0, 0);
        color: #ffffff;
    }
    .exitPopup .modal-content .exitPopUpIcon{
        background: #fecd07;
        width: 100px;
        height: 100px;
        padding: 15px;
        border-radius: 100%;
        margin: auto;
        margin-bottom: -50px;
        z-index: 9999;
        position: relative;
    }
    @media (max-width: 767px) {
        .exitPopup .modal-content .exitPopUpTop h3 {
            font-size: 16px;
        }
        .exitPopup .modal-content .exitPopUpTop h2 {
            font-size: 25px;
        }
        .exitPopup .modal-content .exitPopUpTop {
            padding: 15px 20px;
        }
    }
</style>

