<div class="row row-cols-lg-3 row-cols-1 row-cols-md-2 g-3 g-md-4 mt-2">
    @foreach($houses as $house)
        <div class="col">
            <a class="text-decoration-none card card__catalogue grid-item border-radius__20 border-0 overflow-hidden h-100"
               href="{{ route('house.show', $house->translate('ru')->slug ?? $house->translate('en')->slug) }}">
                <img class="img-fluid border-radius__20" src="{{ asset($house->main_image ?? '')}}" alt=""/>
                <div class="card-footer bg-transparent border-0 h-100 d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between">
                        @php
                            $request_structure_id = request()->structure_id;
                            $randomStructure = $request_structure_id ? $house->structures->firstWhere('id', $request_structure_id) : $house->structures->random();
                        @endphp
                        <p class="catalogue-title mb-2">{{ $randomStructure->translate(app()->getLocale())->name }}</p>
                        <p class="catalogue-price mb-2">{{ __('from') }} {{ $randomStructure->pivot->price }} ₽</p>
                    </div>
                    <p class="catalogue-location text-truncate mt-auto mb-0">{{ $house->translate(app()->getLocale())->name ?? "" }}</p>
                    <ul class="list-group list-group-horizontal list-unstyled justify-content-between w-100 mt-3 mb-0">
                        <li class="catalogue-option">
                            @php
                                $randomFilter = $house->filters->firstWhere('id', 5) ?? $house->filters->random();
                            @endphp
                            <span>
                                {{ $randomFilter->pivot->value }}
                                {{ $randomFilter->translate(app()->getLocale())->name }}
                            </span>
                        </li>
                        <li class="catalogue-area">
                            @php
                                $remainingFilters = $house->filters->where('id', '!=', $randomFilter->id);
                                $randomFilterArea = $remainingFilters->firstWhere('id', 2) ?? $remainingFilters->random();
                            @endphp
                            <span>
                                {{ $randomFilterArea->translate(app()->getLocale())->name }}
                                {{ $randomFilterArea->pivot->value }}
                             </span>
                        </li>
                    </ul>
                </div>
            </a>
        </div>
    @endforeach
</div>
