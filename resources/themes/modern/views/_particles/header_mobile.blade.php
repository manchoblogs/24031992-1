
<div class="drawer">
    <div class="drawer__header clearfix">
        <div class="drawer__header__logo"><a href="/"><img src="{{ url('/assets/img/logo.png') }}" alt=""></a></div>


        <span class="drawer__header__close"><i class="material-icons">&#xE408;</i></span>
    </div>
    <ul class="drawer__menu">
        <li class="drawer__menu__item drawer__menu__item--active">
            <a class="drawer__menu__item__link" href="/" >
                <span class="drawer__menu__item__icon"><i class="material-icons">&#xE88A;</i></span>
                <span class="drawer__menu__item__title">{{ trans('updates.home') }}</span>
            </a>
        </li>
        @foreach(\App\Categories::where("main", '1')->where("disabled", '0')->orwhere("main", '2')->where("disabled", '0')->orderBy('order')->limit(9)->get() as $categorys)
            <li class="drawer__menu__item ">
                <a class="drawer__menu__item__link" href="{{ url($categorys->name_slug) }}">
                    <span class="drawer__menu__item__icon">{!!   $categorys->icon !!}</span>
                    <span class="drawer__menu__item__title">{{ $categorys->name }}</span>
                </a>
            </li>

        @endforeach


        <li class=" drawer__menu__item--border ">
            <div class="reaction-emojis" style="padding:20px 10px">
                <a href="{{ action('PagesController@showReaction', ['reaction' => 'awesome'] ) }}" title="{{ trans('updates.reaction.awesome') }}" ><img alt="{{ trans('updates.reaction.awesome') }}" src="{{ Theme::asset('img/reactions/awesome.gif', null, false) }} " width="32"></a>
                <a href="{{ action('PagesController@showReaction', ['reaction' => 'nice'] ) }}" title="{{ trans('updates.reaction.nice') }}" ><img alt="{{ trans('updates.reaction.nice') }}" src="{{ Theme::asset('img/reactions/nice.png', null, false) }}" width="32"></a>
                <a href="{{ action('PagesController@showReaction', ['reaction' => 'loved'] ) }}" title="{{ trans('updates.reaction.loved') }}" ><img alt="{{ trans('updates.reaction.loved') }}" src="{{ Theme::asset('img/reactions/loved.gif', null, false) }}" width="32"></a>
                <a href="{{ action('PagesController@showReaction', ['reaction' => 'lol'] ) }}"  title="{{ trans('updates.reaction.lol') }}" ><img alt="{{ trans('updates.reaction.lol') }}" src="{{ Theme::asset('img/reactions/lol.gif', null, false) }}" width="32"></a>
                <a href="{{ action('PagesController@showReaction', ['reaction' => 'funny'] ) }}" title="{{ trans('updates.reaction.funny') }}" ><img alt="{{ trans('updates.reaction.funny') }}" src="{{ Theme::asset('img/reactions/funny.gif', null, false) }}" width="32"></a>
                <a href="{{ action('PagesController@showReaction', ['reaction' => 'fail'] ) }}" title="{{ trans('updates.reaction.fail') }}" ><img alt="{{ trans('updates.reaction.fail') }}" src="{{ Theme::asset('img/reactions/fail.gif', null, false) }}" width="32"></a>
                <a href="{{ action('PagesController@showReaction', ['reaction' => 'omg'] ) }}"  title="{{ trans('updates.reaction.omg') }}" ><img alt="{{ trans('updates.reaction.omg') }}" src="{{ Theme::asset('img/reactions/wow.gif', null, false) }}" width="32"></a>
                <a href="{{ action('PagesController@showReaction', ['reaction' => 'ew'] ) }}" title="{{ trans('updates.reaction.ew') }}" ><img alt="{{ trans('updates.reaction.ew') }}" src="{{ Theme::asset('img/reactions/cry.gif', null, false) }}" width="32"></a>
            </div>
        </li>
    </ul>

    <div class="footer-left " style="width:100%;padding:10px">
        <div class="footer-menu clearfix">
            @foreach(\App\Pages::where('footer', '1')->get() as $page)
                <a  class="footer-menu__item " style="color:#888" href="{{ action('PagesController@showpage', [$page->slug ]) }}" title="{{ $page->title }}">{{ $page->title }}</a>
            @endforeach
            @if(getenvcong('p-buzzycontact') == 'on')
                <a class="footer-menu__item"  style="color:#888" href="{{ action('ContactController@index') }}">{{ trans('buzzycontact.contact') }}</a>
            @endif
        </div>
        <div class="footer-copyright clearfix"  style="color:#aaa" >
            {{ trans("updates.copyright") }}

        </div>
    </div>
</div>