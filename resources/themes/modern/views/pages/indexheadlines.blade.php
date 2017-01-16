
@unless(count($lastFeaturestop)==0)
    @if($cat== true)
        <div class="headline-cats clearfix">
            <div class="global-container container" >
                <h1 style="float:left;margin:5px 0">{{ trans('index.'.$category->name_slug) == 'index.'.$category->name_slug ? $category->name :  trans('index.'.$category->name_slug) }} </h1>

                @foreach(\App\Categories::where('type', $category->id)->orderBy('name')->groupBy('name')->get() as $cat)

                    <a class="cat_link"  data-type="{{ $cat->name_slug }}" href="/{{ $cat->name_slug }}"> {{ $cat->name }}</a>

                @endforeach
            </div>
        </div>
    @endif
<section class="headline hide-phone">
    <div class="global-container container" style="padding-top:0 !important;">
        <div style="margin-left:-4px; margin-right:-3px;">
        @foreach($lastFeaturestop->slice(0,4) as $key => $item)
        <article class="headline__blocks @if( $key == 0 ) headline__blocks--large  @elseif( $key == 1 ) headline__blocks--tall @else headline__blocks--small @endif">
            <div class="headline__blocks__image" style="background-image: url({{ makepreview($item->thumb, 'b', 'posts') }})"></div>
            <a class="headline__blocks__link" href="{{ makeposturl($item) }}" title="{{ $item->title }}" ></a>
            <header class="headline__blocks__header">
                <h2 class="headline__blocks__header__title @if( $key == 0 ) headline__blocks__header__title--large  @elseif($key == 1) headline__blocks__header__title--tall @else headline__blocks__header__title--small @endif">{{ $item->title }}</h2>
                <ul class="headline__blocks__header__other">
                    <li class="headline__blocks__header__other__author">{{ $item->user->username }}</li>
                    <li class="headline__blocks__header__other__date"><i class="material-icons"></i> <time datetime="{{ $item->created_at->toW3cString() }}">{{ $item->created_at->diffForHumans() }}</time></li>
                </ul>
            </header>
        </article>
        @endforeach
         <div class="clear"></div>
        </div>
   </div>
</section>
<section class="headline visible-phone">
    <div class="slider" id="headline-slider" data-pagination="true" data-navigation="false">
        <div class="slider__list">
            @foreach($lastFeaturestop->slice(0,4) as $key => $item)
                <article class="slider__item headline__blocks headline__blocks--phone">
                    <div class="headline__blocks__image" style="background-image: url({{ makepreview($item->thumb, 'b', 'posts') }})"></div>
                    <a class="headline__blocks__link" href="{{ makeposturl($item) }}" title="{{ $item->title }}" ></a>
                    <header class="headline__blocks__header">
                        <h2 class="headline__blocks__header__title headline__blocks__header__title--phone">{{ $item->title }}</h2>
                        <ul class="headline__blocks__header__other">
                            <li class="headline__blocks__header__other__author">{{ $item->user->username }}</li>
                            <li class="headline__blocks__header__other__date"><i class="material-icons">&#xE192;</i> <time datetime="{{ $item->created_at->toAtomString() }}">{{ $item->created_at->diffForHumans() }}</time></li>
                        </ul>
                    </header>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endunless