@extends("app")

@section('head_title', trans('updates.reaction.'.$reaction) .' | '.getenvcong('sitename') )
@section('head_description', trans('updates.reaction.'.$reaction)  )

@section("content")
    <div class="buzz-container">
        <div class="global-container container">



            <div class="content">
                <div class="reaction-emojis" style="float:none;margin:30px auto;text-align:center">
                    <a {{ $reaction=='awesome' ? 'class=selected' : '' }} href="{{ action('PagesController@showReaction', ['reaction' => 'awesome'] ) }}" title="{{ trans('updates.reaction.awesome') }}" style="padding:7px;display: inline-block"><img alt="{{ trans('updates.reaction.awesome') }}" src="{{ Theme::asset('img/reactions/awesome.gif', null, false) }} " width="55"><div class="reaction_name">{{ trans('updates.reaction.awesome') }}</div></a>
                    <a {{ $reaction=='nice' ? 'class=selected' : '' }} href="{{ action('PagesController@showReaction', ['reaction' => 'nice'] ) }}" title="{{ trans('updates.reaction.nice') }}"  style="padding:7px;display: inline-block"><img alt="{{ trans('updates.reaction.nice') }}" src="{{ Theme::asset('img/reactions/nice.png', null, false) }}" width="55"><div class="reaction_name">{{ trans('updates.reaction.nice') }}</div></a>
                    <a {{ $reaction=='loved' ? 'class=selected' : '' }} href="{{ action('PagesController@showReaction', ['reaction' => 'loved'] ) }}" title="{{ trans('updates.reaction.loved') }}"  style="padding:7px;display: inline-block"><img alt="{{ trans('updates.reaction.loved') }}" src="{{ Theme::asset('img/reactions/loved.gif', null, false) }}" width="55"><div class="reaction_name">{{ trans('updates.reaction.loved') }}</div></a>
                    <a {{ $reaction=='lol' ? 'class=selected' : '' }} href="{{ action('PagesController@showReaction', ['reaction' => 'lol'] ) }}"  title="{{ trans('updates.reaction.lol') }}"  style="padding:7px;display: inline-block"><img alt="{{ trans('updates.reaction.lol') }}" src="{{ Theme::asset('img/reactions/lol.gif', null, false) }}" width="55"><div class="reaction_name">{{ trans('updates.reaction.lol') }}</div></a>
                    <a {{ $reaction=='funny' ? 'class=selected' : '' }} href="{{ action('PagesController@showReaction', ['reaction' => 'funny'] ) }}" title="{{ trans('updates.reaction.funny') }}"  style="padding:7px;display: inline-block"><img alt="{{ trans('updates.reaction.funny') }}" src="{{ Theme::asset('img/reactions/funny.gif', null, false) }}" width="55"><div class="reaction_name">{{ trans('updates.reaction.funny') }}</div></a>
                    <a {{ $reaction=='fail' ? 'class=selected' : '' }} href="{{ action('PagesController@showReaction', ['reaction' => 'fail'] ) }}" title="{{ trans('updates.reaction.fail') }}"  style="padding:7px;display: inline-block"><img alt="{{ trans('updates.reaction.fail') }}" src="{{ Theme::asset('img/reactions/fail.gif', null, false) }}" width="55"><div class="reaction_name">{{ trans('updates.reaction.fail') }}</div></a>
                    <a {{ $reaction=='omg' ? 'class=selected' : '' }} href="{{ action('PagesController@showReaction', ['reaction' => 'omg'] ) }}"  title="{{ trans('updates.reaction.omg') }}"  style="padding:7px;display: inline-block"><img alt="{{ trans('updates.reaction.omg') }}" src="{{ Theme::asset('img/reactions/wow.gif', null, false) }}" width="55"><div class="reaction_name">{{ trans('updates.reaction.omg') }}</div></a>
                    <a {{ $reaction=='ew' ? 'class=selected' : '' }} href="{{ action('PagesController@showReaction', ['reaction' => 'ew'] ) }}" title="{{ trans('updates.reaction.ew') }}"  style="padding:7px;display: inline-block"><img alt="{{ trans('updates.reaction.ew') }}" src="{{ Theme::asset('img/reactions/cry.gif', null, false) }}" width="55"><div class="reaction_name">{{ trans('updates.reaction.ew') }}</div></a>
                </div>


                <div class="content-body clearfix">
                    <div class="content-body__detail">

                        @if($lastItems->total() > 0)

                            <div class="content-timeline__list">
                                @foreach($lastItems as $k => $item)
                                         @include('pages.catpostloadpage')
                                @endforeach
                            </div>
                        @else
                            @include('errors.emptycontent')

                        @endif

                        <center>
                            {!! $lastItems->render() !!}
                        </center>

                    </div>
                </div>
            </div>

            <div class="sidebar info-sidebar hide-mobile">
                <div class="ads">
                    @include('_particles.ads', ['position' => 'CatSide', 'width' => 'auto', 'height' => 'auto'])

                </div>

                    @include('_sidebar.follow')
            </div>

        </div>
    </div>

@endsection