@php
    $locale = app()->getLocale();
    $slug = $house->translate($locale)->slug ?? $house->translate('en')->slug;
    $mainImage = asset($house->main_image ?? '');
    $houseName = $house->translate($locale)->name ?? '';

    $filters = $house->filters;
    $floor = $filters->firstWhere('id', 8) ?: null;
    $room = $filters->firstWhere('id', 6) ?: null;
    $bathroom = $filters->firstWhere('id', 7) ?: null;
@endphp

<a class="card card__portfolio text-decoration-none border-radius__20 border-0 overflow-hidden h-100"
   href="{{ route('portfolio.show', $slug) }}">
    <div class="card-img-top card-img-hover">
        <img src="{{ $mainImage }}" alt="{{ $houseName }}"/></div>
    <div class="card-body">
        <h2 class="h6 mb-1 text__primary fw-bold">{{ $houseName }}</h2>
        @foreach($filters->whereNotIn("id", [6,7,8]) as $filter)
            <div class="portfolio-option"><i class="fi-map-pin me-1"></i>
                <span>{{ $filter->translate($locale)->name }}:  {{ $filter->pivot->value }}</span>
            </div>
        @endforeach
    </div>
    <!--div class="card-footer border-0 pt-0">
        <div class="border-top border-primary border-1 pt-3">
            <div class="row g-2">
                <div class="col">
                    <div class="bg__grey5 rounded text-center w-100 h-100 p-2">
                        {!! $floor->icon ?? "" !!}
                        <span class="body__text2 text-light">{{ $floor->pivot->value ?? "" }} <br/>{{ $floor ? $floor->translate($locale)->name : "" }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="bg__grey5 rounded text-center w-100 h-100 p-2">
                        {!! $room->icon ?? "" !!}
                        <span class="body__text2 text-light">{{ $room->pivot->value ?? "" }} <br/>{{ $room ? $room->translate($locale)->name : "" }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="bg__grey5 rounded text-center w-100 h-100 p-2">
                        {!! $bathroom->icon ?? "" !!}
                        <span class="body__text2 text-light">{{ $bathroom->pivot->value ?? "" }} <br/>{{ $bathroom ? $bathroom->translate($locale)->name : "" }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div-->
</a>
