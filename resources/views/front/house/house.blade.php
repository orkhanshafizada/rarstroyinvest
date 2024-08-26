@php
    $locale = app()->getLocale();
    $slug = $house->translate($locale)->slug ?? $house->translate('en')->slug;
    $mainImage = asset($house->main_image ?? '');
    $houseName = $house->translate($locale)->name ?? '';

    $structures = $house->structures;
    $filters = $house->filters;

    $requestStructureId = request()->structure_id;
    $randomStructure = $requestStructureId ? $structures->firstWhere('id', $requestStructureId) : ($structures->count() ? $structures->random() : null);

    $randomFilter = $filters->firstWhere('id', 5) ?? ($filters->count() ? $filters->random() : null);
    $remainingFilters = $filters->where('id', '!=', $randomFilter->id ?? 0);
    $randomFilterArea = $remainingFilters->count() ? $remainingFilters->firstWhere('id', 3) ?? $remainingFilters->random() : null;
@endphp

<a class="text-decoration-none card card__catalogue grid-item border-radius__20 border-0 overflow-hidden h-100"
   href="{{ route('house.show', $slug) }}">
    <img class="img-fluid border-radius__20" src="{{ $mainImage }}" alt=""/>
    <div class="card-footer bg-transparent border-0 h-100 d-flex flex-column">
        <div class="d-flex flex-row justify-content-between">
            @if($randomStructure)
                <p class="catalogue-title mb-2">{{ $randomStructure->translate($locale)->name }}</p>
                <p class="catalogue-price mb-2">{{ __('from') }} {{ $randomStructure->pivot->price }} ₽</p>
            @else
                <p class="catalogue-title mb-2">{{ __('No structure available') }}</p>
            @endif
        </div>
        <h2 class="catalogue-location text-truncate mt-auto mb-0">{{ $houseName }}</h2>
        <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-3 mb-0">
            <li class="catalogue-option">
                @if($randomFilter)
                    <span>
                        {{ $randomFilter->pivot->value }}
                        {{ $randomFilter->translate($locale)->name }}
                    </span>
                @else
                    <span>{{ __('No filter available') }}</span>
                @endif
            </li>
            <li class="catalogue-area">
                @if($randomFilterArea)
                    <span>
                        {{ $randomFilterArea->translate($locale)->name }}
                        {{ $randomFilterArea->pivot->value }}
                    </span>
                @else
                    <span>{{ __('No area filter available') }}</span>
                @endif
            </li>
        </ul>
    </div>
</a>
