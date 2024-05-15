@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label"></div>
        <div class="dt-action-buttons text-end">
            <div class="dt-buttons d-inline-flex">
                
            </div>
        </div>
</div>
    
    <form class="auth-login-form mt-2" method="post" action="/trip/add/"enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-2" id="title" style="display: block">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="" placeholder="Wisata Mandeh">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-2" id="title" style="display: block">
                        <label for="title">Lokasi</label>
                        <input type="text" class="form-control" id="title" name="title" value="" placeholder="Jl. Wisata satu">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

