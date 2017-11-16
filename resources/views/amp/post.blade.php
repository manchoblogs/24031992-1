@extends("amp.app")
@section("header")
    <title>{{ $post->title }}</title>
    <link rel="canonical" href="{{ makeposturl($post) }}" />
    <meta property="fb:app_id" content="{{  getenvcong('facebookapp') }}" />
    <meta property="og:type"   content="website" />
    <meta property="og:site_name" content="{{  getenvcong('sitename') }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ str_limit(str_replace('"', '', $post->body), 150) }}">
    <meta property="og:url" content="{{ makeposturl($post) }}">
    <meta property="og:locale" content="{{  getenvcong('sitelanguage') }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:url" content="{{ makeposturl($post) }}">
    <meta name="twitter:description" content="{{ str_limit(str_replace('"', '', $post->body), 150) }}">
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    <script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>
    <script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-dailymotion" src="https://cdn.ampproject.org/v0/amp-dailymotion-0.1.js"></script>
    <script async custom-element="amp-vimeo" src="https://cdn.ampproject.org/v0/amp-vimeo-0.1.js"></script>
    <script custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js" async></script>
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
    <script async custom-element="amp-sticky-ad" src="https://cdn.ampproject.org/v0/amp-sticky-ad-1.0.js"></script>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <style amp-custom>
        .social-box {
            max-width: 255px;
            margin: 16px auto 0px auto;
        }
        amp-social-share[type=whatsapp] {
            background-color:  #25d366;
            text-align: center;
            color: #0e5829;
            font-size: 18px;
            padding: 10px;
            width: 60px;
            height: 44px;
            position: relative;
            background-size: 60%;
            display:inline-block ;
        }
        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }
        .clearfix { display: inline-block; }
        /* start commented backslash hack \*/
        * html .clearfix { height: 1%; }
        .clearfix { display: block; }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;
        }

        .material-shadow--1dp {
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.1), 0 1px 5px 0 rgba(0, 0, 0, 0.1); }


        .headline {
            color: #1e1e1e;
            font-size: 24px;
            font-weight: bold;
            line-height: 1.125;
            margin-bottom: 0;
        }
        .title-bottom {
            font-size: 12px;
            margin-top: 8px;
        }
        .timestamp-container {
            display: inline-block;
        }
        .author-container {
            display: inline-block;
        }
        .timestamp {
            display: inline-block;
            color: #aaa;
        }
        .author-name {
            display: inline-block;
            color: #999;

        }

        .content-description {
            margin-top: 16px;
            font-weight: bold;
            font-size: 17px;
            line-height: 1.4;
        }
        .content-body {
            margin-top: 16px;
            line-height: 1.6;
            font-size: 15px;
        }
        .content-body a {
            color: #6F2722;
            text-decoration: none;
            font-weight: bold;
        }
        .news-img {
            margin-top: 8px;
            margin-left: -16px;
            margin-right: -16px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            padding: 5px 0
        }
        h3 {
            -webkit-margin-before: 1em;
            -webkit-margin-after: 1em;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
            font-weight: 700;
            padding: 5px 0;
            margin-bottom: 10px;
        }

        .content-body__detail ol, .content-body__detail ul {
            padding: 0 20px;
        }
        .content-card {
            float:left;
            width: 48%;
            margin: 16px 0;
            background: #fff;
        }
        .content-card:nth-child(even){
            float:right;
            margin-left:20px;
        }

        @media only screen and (max-width: 550px) {
            .content-card,.content-card:nth-child(even) {
                float:none;
                width: 100%;
                margin: 10px 0;
            }

        }
        .content-card__image {
            float:left;
            width: 100%;
        }

        .content-card__detail {
            float: left;
            padding: 16px;
            width: 100%;
        }

        .content-card__category {
            font-size: 13px;
        }
        .content-card__title {
            color: #333;
            font-weight: bold;
            margin-top: 5px;
            font-size: 15px;
        }
    </style>

@endsection
@section("content")
    <div itemscope itemtype="http://schema.org/NewsArticle">
        <meta itemprop="mainEntityOfPage" content="{{ makeposturl($post) }}">
        <h1 itemprop="headline" class="headline">{{ $post->title }}</h1>
        <meta itemprop="inLanguage" content="{{  getenvcong('sitelanguage') }}" />
        <meta itemprop="genre" content="news" name="medium" />
        <div class="title-bottom">
            <div class="author-container" itemprop="author" itemscope itemtype="http://schema.org/Person">
                <span class="author-name" itemprop="name">{{ $post->user->username }}</span>
            </div>
            <div class="timestamp-container">
                <time itemprop="datePublished" class="timestamp" datetime="{{ $post->published_at->toW3cString() }}"> / {{ $post->published_at->diffForHumans() }}</time>
                <meta itemprop="dateModified" content="{{ $post->updated_at->toW3cString() }}"/>
            </div>
        </div>

        <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="news-img">
            <amp-img src="{{ makepreview($post->thumb, 'b', 'posts') }}" alt="{{ $post->title }}" width="728" height="410" layout="responsive"></amp-img>
            <meta itemprop="url" content="{{ makepreview($post->thumb, 'b', 'posts') }}" />
            <meta itemprop="width" content="728" />
            <meta itemprop="height" content="410" />
        </div>

        <div itemprop="description" class="content-description">{!! nl2br($post->body) !!}</div>

        <div class="social-box">
            <amp-social-share type="facebook"
                              data-param-text="{{ $post->title }}"
                              data-param-href="{{ makeposturl($post) }}"
                              data-param-app_id="{{  getenvcong('facebookapp') }}"></amp-social-share>

            <amp-social-share type="twitter"></amp-social-share>

            <amp-social-share type="gplus"></amp-social-share>


            <amp-social-share type="whatsapp"
                              layout="container"
                              data-share-endpoint="whatsapp://send"
                              data-param-text="{{ $post->title }}">
            </amp-social-share>
        </div>

        @include('_particles.ads', ['position' => 'PostShareBwAmp', 'width' => '300', 'height' => 'auto'])

        <div itemprop="articleBody" class="content-body">
            @include("amp.entryslists")
        </div>

        @include('_particles.ads', ['position' => 'PostBelowAmp', 'width' => '300', 'height' => 'auto'])

    </div>


    <div class="social-box">
        <amp-social-share type="facebook"
                          data-param-text="{{ $post->title }}"
                          data-param-href="{{ makeposturl($post) }}"
                          data-param-app_id="{{  getenvcong('facebookapp') }}"></amp-social-share>

        <amp-social-share type="twitter"></amp-social-share>

        <amp-social-share type="gplus"></amp-social-share>


        <amp-social-share type="whatsapp"
                          layout="container"
                          data-share-endpoint="whatsapp://send"
                          data-param-text="{{ $post->title }}">
        </amp-social-share>
    </div>
    @if(isset($lastFeatures))
    <div class="related-news">
        <h3>{{ trans('index.maylike') }}</h3>
        <div class="related-news__inner clearfix">

            @foreach($lastFeatures as $item)
            <div class="content-card material-shadow--1dp clearfix">
                <a href="{{ url('amp/'.$item->type.'/'.$item->id) }}" title="{{ $item->title }}">
                    <div class="content-card__image">
                        <div class="content-card__image__transparent"></div>
                        <amp-img src="{{ makepreview($item->thumb, 'b', 'posts') }}" alt="{{ $item->title }}" width="728" height="410" layout="responsive"></amp-img>
                    </div>
                    <div class="content-card__detail">
                        <?php $postacatpe = getfirstcat($item->categories); ?>
                        {!! isset($item->categories) && isset($postacatpe) ? '<div class="content-card__category">'.$postacatpe->name. '</div>' : '' !!}
                        <div class="content-card__title">{{ $item->title }}</div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
    @endif
@endsection