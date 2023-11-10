<section class="home-courses sec-padding {{$classes ?? ""}}">
    <div class="container">
        <div class="page-heading">
            <h2 class="title">Latest News & Articles</h2>
        </div>
        <div class="row latest-articles-slider">
            @php
            if(env('APP_ENV') == 'local'){
            $arrContextOptions=array(
            "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            ),
            );
            } else {
            $arrContextOptions=array(
            "ssl"=>array(
            "verify_peer"=>true,
            "verify_peer_name"=>true,
            ),
            );
            }

            $posts = json_decode(Storage::get(base_path('public/articles.json')));

            @endphp
            @foreach($posts as $post)
            <div class="item-banner latest-article">
                <a href="{{ $post->link }}" target="_blank">
                    <img src="{{ $post->featured_image_thumbnail }}" alt="{{ $post->title }}" title="{{ $post->title }}" loading="lazy">
                </a>
                <div class="latest-article-heading">
                    <a href="{{ $post->link }}" target="_blank">
                        <h3 title="{{ $post->title }}">{!! $post->title !!}</h3>
                    </a>
                    <p>{!! $post->excerpt !!}</p>
                    <ul>
                        <li class="date">
                            <span>
                                {{ Carbon\Carbon::parse($post->publish_date)->format('jS F Y') }}
                            </span>
                        </li>
                        <li class="cta-btn">
                            <a href="{{ $post->link }}" target="_blank">View Post</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <div class="view-all-btn ta-center view_all_btn_space">
            <a href="https://www.oshaoutreachcourses.com/blog/" target="_blank">View All</a>
        </div>
    </div>
</section>

<style>
    .view_all_btn_space{
        margin-top:50px;
    }
    @media screen and (max-width: 768px) {
        .home_course_mobile {
            width: 90%;
            margin: 0 auto;

        }

        .view-all-btn {
            margin-top: 12px;
        }
    }
</style>
@push('custom-css')
    .latest-article{
    margin: 10px 15px 20px;
    background: #FFFFFF;
    transition:Ease all 0.25s;
    }
    .latest-article:hover{
    transform: translate(0px, -2px);
    box-shadow: 0px 0px 6px 0px rgba(0, 0, 0,50%);
    border-radius: 5px;
    }
    .latest-article img{
    border: 1px solid #005384 ;
    border-top-right-radius:5px;
    border-top-left-radius:5px;
    width:100%;
    }
    .latest-article-heading{
    display: flex;
    text-align: center;
    border: 1px solid #cccccc;
    border-top: 0px solid #cccccc;
    flex-direction: column;
    padding: 10px 15px 5px;
    border-bottom-right-radius:5px;
    border-bottom-left-radius:5px;
    }
    .latest-article-heading ul {
    display: flex;
    width: 100%;
    justify-content: space-between;
    list-style: none;
    align-items: center;
    padding-bottom: 15px;
    }
    .latest-article h3{
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    font-size: 16px;
    font-family: "Poppins";
    color: rgb(0, 0, 0);
    font-weight: bold;
    line-height: 1.2;
    margin-bottom: 15px;
    text-align: left;
    height:40px;
    }
    .latest-article p{
    color: #666666;
    margin-bottom: 10px;
    }

    .latest-article-heading p{
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    text-align:left;
    font-size: 13px;
    font-family: "Poppins";
    color: rgb(0, 0, 0);
    line-height: 1.2;
    margin-bottom: 15px
    }
    .latest-article .btn{
    background-color: #ffb900;
    margin-bottom: 20px;
    }
    .latest-article .btn:hover {
    color: #000000;
    }

    .latest-article .latest-article-content{
    border: 1px solid #cccccc;
    border-top: none;
    padding: 0 10px;
    text-align: center;
    }
    .latest-article-heading li.cta-btn a {
    display: inline-block;
    padding: 5px 15px;
    -webkit-transition: 0.4s;
    -moz-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 600;
    background: #005384;
    color: #fff;
    border-radius: 5px;
    }

    .latest-article-heading li.cta-btn a:hover {
    background: #2f80ad;
    }
    .latest-article-heading li.date span {
    font-size: 11px;
    font-family: "Poppins";
    color: rgb(117, 117, 117);
    font-weight: bold;
    line-height: 1.2;
    }
    .latest-articles-slider .slick-dots{
    bottom: -30px;
    }
    .slick-dots li button:before{
    font-size:6px!important
    }
    @media (max-width: 767px) {
    .latest-articles-slider .slick-dots{
    bottom:10px;
    }
    }
@endpush
