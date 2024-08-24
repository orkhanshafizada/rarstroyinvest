<div class="row row-cols-lg-3 row-cols-1 row-cols-md-2 g-3 g-md-4 mt-2">
    @foreach($houses as $house)
        <div class="col">
        @include('front.house.house')
        </div>
    @endforeach
</div>
