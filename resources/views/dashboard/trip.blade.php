@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label"></div>
        
        <div class="dt-action-buttons text-end">
            <div class="dt-buttons d-inline-flex">
                <button type="button"
                class="btn btn-gradient-primary pull-right"
                data-bs-toggle="modal" data-bs-target="#addModal">
                <span><i
                 data-feather='plus'></i> Add Trip</span></button>
            </div>
        </div>
        
    </div>
   
    <div class="card-body mt-2">
        <div class="row">
            @include('_partials.alert')
            @foreach ( $data as $item )
                <div class="col-md-3">
                    <div class="card border-0 text-white">
                        <img class="card-img" src="{{asset('storage/'. $item->cover)}}"
                         alt="Card" height="200">
                        <div class="card-img-overlay bg-overlay">
                            <h4 class="card-title text-white">{{ $item->name }}</h4>
                            <div class="btn-group">
                                <a type="button" class="btn btn-icon btn-warning
                                   waves-effect waves-float waves-light"
                                   data-bs-toggle="modal"
                                   data-bs-target="#editModal">
                                   <span><i data-feather='edit-2'></i></span>
                                </a>
                                    &nbsp;
                                    <form action="/trip/delete/{{ $item->id }}" method="post">
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

             @foreach ($data as $item)
                <div class="modal fade" id="editModal" tabindex="-1"
                aria-labelledby="editModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalTitle">Edit Trip</h5>
                                <button type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close">
                            </button>
                            </div>
                            <form class="auth-login-form mt-2" action="/trip/update/{{ $item->id }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="id" type="hidden" value="" id="id">
                                            <div class="mb-1">
                                                <label for="name">Name</label>
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Masukan Nama Kota/Kabupaten"
                                                name="name" type="text"
                                                value="{{ $item->name }}" id="name" required>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                             @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label for="cover">Cover</label>
                                                <input class="form-control @error('cover') is-invalid @enderror"
                                                name="cover"
                                                value="{{ $item->cover }}" id="cover" type="file">

                                                @error('cover')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                             @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                   
                                        <button type="submit"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                class="btn btn-gradient-primary float-end">Submit</button>
                                  
                                </div>
                            </form>
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

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Add Trip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form class="auth-login-form mt-2" action="/trip/add" method="post"
                      enctype="multipart/form-data">
                   @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <label for="name">Nama</label>
                                    <input class="form-control  @error('name') is-invalid @enderror"
                                    placeholder="Masukan Nama Trip"
                                     name="name" type="text"id="name" required>

                                     @error('name')
                                     <div class="invalid-feedback">
                                         {{ $message }}
                                     </div>
                                  @enderror
                                     
                                        
                                </div>
                                <div class="mb-1">
                                    <label for="cover">Cover</label>
                                    <input class="form-control  @error('cover') is-invalid @enderror"
                                     name="cover" id="cover" type="file" required>

                                     @error('cover')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                     @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button type="submit"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    class="btn btn-gradient-primary float-end">
                                    Add</button>
                    </div>
                </form>
        </div>
    </div>
</div>


@endsection