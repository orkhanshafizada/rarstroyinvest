<aside class="col-lg-3 col-md-4 mb-4 mb-md-0">
    <div class="catalogue__filters offcanvas offcanvas-start offcanvas-collapse w-md-50" id="offcanvasCategory"
         tabindex="-1" aria-labelledby="offcanvasCategoryLabel">
        <div class="offcanvas-header d-lg-none mb-4">
            <h6 class="h6 fw-bold offcanvas-title text__primary mb-0" id="offcanvasCategoryLabel"><span
                    class="me-2">{{ __('Filters') }}</span><i class="far fa-sliders-up"></i></h6>
            <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <form id="filterForm" class="offcanvas-body ps-lg-2 py-0" method="GET" action="{{ route('house.filter') }}">
            <div class="input-group flex-column mb-8">
                <h6 class="h6 fw-bold text__primary d-none d-lg-block mb-3">Seach filter</h6>
                <div class="col-12">
                    <label class="form-label" for="structure_id">{{ __('Construction technology') }}</label>
                    <select class="form-select" id="structure_id" name="structure_id">
                        <option value="">{{ __('All') }}</option>
                        @foreach($structures as $structure)
                            <option
                                value="{{ $structure->id }}" {{ request('structure_id') == $structure->id ? 'selected' : '' }}>
                                {{ $structure->translate(app()->getLocale())->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 input-group flex-column my-4">
                    <p class="body__text2 fw-normal text__dark mb-3">{{ __('Price') }}</p>
                    <div class="container">
                        <div class="row d-inline-flex justify-content-between align-items-center g-0"
                            id="priceRangeMain-value">
                            <div class="col d-inline-flex align-items-center justify-content-start me-auto">
                                <label class="me-2">{{ __('from') }}</label>
                                <input class="form-control-plaintext text-start min" name="price_min" readonly type="text" value="{{ request('price_min', $minPrice) }}"/>
                            </div>
                            <div class="col d-inline-flex align-items-center justify-content-end ms-auto">
                                <label class="ms-auto me-2">{{ __('before') }}</label>
                                <input class="form-control-plaintext text-end max" name="price_max" readonly type="text" value="{{ request('price_max', $maxPrice) }}"/>
                            </div>
                        </div>
                        <!-- range-->
                        <div class="w-100 mt-4 mb-3" id="priceRangeMain"></div>
                    </div>
                </div>
                <!-- nav-->
                <ul class="nav nav-category" id="categoryCollapseMenu">
                    @foreach($filters as $filter)
                        <li class="nav-item w-100">
                            <a class="nav-link px-0" href="#categoryFlush{{$filter->id}}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="categoryFlush{{$filter->id}}">
                                <span
                                    class="body__text2 fw-normal text__dark">{{ $filter->translate(app()->getLocale())->name }}</span>
                            </a>
                            <div class="multi-collapse collapse show" id="categoryFlush{{$filter->id}}">
                                <div class="mt-2">
                                    @foreach($filter->houses->unique('pivot.value') as $house)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="filter_{{ $house->id }}" type="checkbox"
                                                name="filters[{{ $filter->id }}][]"
                                                value="{{ $house->pivot->value }}"
                                                {{ is_array(request('filters.' . $filter->id)) && in_array($house->pivot->value, request('filters.' . $filter->id)) ? 'checked' : '' }} />
                                            <label class="form-check-label"
                                                for="filter_{{ $house->id }}">{{ $house->pivot->value }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <!-- <div class="col mt-4">
                    <button class="btn btn-primary fw-bold flex-nowrap text-uppercase border-radius__50 w-100 px-3"
                            type="submit">
                        <span>Search</span>
                    </button>
                </div> -->
                <div class="col mt-4">
                    <a class="btn body__text2 fw-normal text__grey5 d-inline-flex align-items-center flex-nowrap gap-2"
                    href="{{ route('house.index') }}">
                        <i class="far fa-times-circle"></i>
                        <span>{{ __('Clear filters') }}</span>
                    </a>
                </div>
            </div>

        </form>
    </div>
</aside>

<script>
    var minPrice = {{ $minPrice }};
    var maxPrice = {{ $maxPrice }};
</script>
