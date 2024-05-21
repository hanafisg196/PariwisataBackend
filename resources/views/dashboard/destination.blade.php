@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label"></div>
        <div class="dt-action-buttons text-end">
            <form action="/destination/search" method="get">
                @csrf
                <div class="dt-buttons d-inline-flex">
                    <input type="text" class="form-control" id="search"
                    name="search" placeholder="Search" value="{{ request('search') }}">
                    &nbsp;
                    <button type="submit" class="btn btn-icon btn-primary waves-effect waves-float waves-light">
                        <span><i data-feather='search'></i></span>
                    </button>
                </div>
            </form>
            <livewire:clear-temporary />
        </div>
        <div class="dt-action-buttons text-end">
            <div class="dt-buttons d-inline-flex">
                <a href="/destination/addform" class="btn btn-gradient-primary pull-right">
                    <span><i data-feather='plus'></i> Add Destination</span>
                </a>
            </div>
        </div>

    </div>
    <div class="card-body mt-2">
        <div class="row">
            @include('_partials.alert')
            @foreach ($data as $item)
            <div class="col-md-3">
                <div class="card border-0 text-white">
                    <img class="card-img" src="{{asset('storage/'. $item->cover)}}"
                     alt="Card" height="200">
                    <div class="card-img-overlay bg-overlay">
                        <h4 class="card-title text-white">{{ $item->title }}</h4>
                        <div class="btn-group">
                            <a type="button" class="btn btn-icon btn-warning waves-effect
                                waves-float waves-light"
                                 href="/destination/view/{{ $item->id }}">
                                <span><i data-feather='edit-2'></i></span>
                            </a>
                            &nbsp;
                            <a type="button" class="btn btn-icon btn-info waves-effect
                            waves-float waves-light"
                             href="/destination/map/{{ $item->id }}">
                            <span><i data-feather='map'></i></span>
                             </a>

                                &nbsp;
                                <form action="/destination/delete/{{ $item->id }}" method="post">
                                        @csrf
                                <button type="submit" class="btn btn-icon btn-danger
                                waves-effect waves-float waves-light"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top">
                                <span><i data-feather='trash-2'></i></span>
                                    </button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>

    <div class="card-footer">
        {{ $data->links() }}
    </div>
</div>


@endsection
