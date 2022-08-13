<div class="col-12">
    <div class="card mb-4">
        @if(isset($pageName))
            <div class="card-header pb-0">
                <h6>{{ $pageName }}</h6>
            </div>
        @endif
        <div class="card-body px-0 pt-0 pb-2">
            @yield('card_content')
        </div>
    </div>
</div>
