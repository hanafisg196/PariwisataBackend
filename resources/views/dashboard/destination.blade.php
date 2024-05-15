@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label"></div>
        <div class="dt-action-buttons text-end">
            <form action="/wallpaper/search" method="get">
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
        </div>
        <div class="dt-action-buttons text-end">
            <div class="dt-buttons d-inline-flex">
                <a href="/destination/add" class="btn btn-gradient-primary pull-right">
                    <span><i data-feather='plus'></i> Add Wallpaper</span>
                </a>
            </div>
        </div>
        
    </div>
    <div class="card-body mt-2">
        <div class="row">
            @include('_partials.alert')
            {{-- @foreach ($data as $item) --}}
            <div class="col-md-2">
                <div class="card border-0 text-white">
                    <img class="card-img"
                        {{-- src="{{asset('storage/'. $item->thumbnail)}}" --}}
                    alt="wallpaper" height="300">

                    <div class="card-img-overlay bg-overlay">
                        <div class="btn-group">
                            <a type="button" class="btn btn-icon btn-warning waves-effect
                                waves-float waves-light"
                                 href="/destination/update">
                                <span><i data-feather='edit-2'></i></span>
                            </a>
                           
                            <form action="/destination/delete/" method="post">
                                @csrf
                            <button type="submit" class="btn btn-icon btn-danger
                                waves-effect waves-float waves-light"
                                data-bs-toggle="tooltip"
                                 data-bs-placement="top">
                            <span><i data-feather='trash-2'></i></span>
                            </button>
                           </form>
                          
                            <a type="button" href=""
                                class="btn btn-icon btn-primary waves-effect waves-float waves-light">
                                <span><i data-feather='bell'></i></span>
                            </a>
                        </div>
                    </div>
                    
                </div>
              
            </div>
            {{-- @endforeach --}}
        </div>
    </div>

    <div class="card-footer">
        {{-- {{ $data->links() }} --}}
    </div>
</div>


@endsection