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
    
    <form class="auth-login-form mt-2" method="post" action="/destination/create/"enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                @include('_partials.alert')
                <div class="col-md-8">
                    <div class="mb-1" id="title" style="display: block">
                        <div class="mb-1">
                            <label for="title">Title</label>
                        </div>
                        <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" placeholder="Wisata Mandeh">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="mb-1">
                        <div class="mt-1">
                            <label for="trip_id">Trip</label>
                        </div>
                        <select  name="trip_id" id="trip_id" class="form-control">
                            @foreach ($trip as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-1" id="daerah" style="display: block">
                        <div class="mb-1">
                            <label for="daerah">Daerah</label>
                        </div>
                        <input type="text" class="form-control  @error('daerah') is-invalid @enderror" id="daerah" name="daerah" placeholder="Nama Daerah Wisata">
                    </div>
                </div>
                <div class="col-md-8">
                <div class="mb-1">
                    <div class="mb-1">
                        <label for="cover">Cover</label>
                    </div>
                    <input class="form-control @error('cover') is-invalid @enderror"
                    name="cover" id="cover" type="file">
                </div>
                 </div>
                <div class="col-md-8">
                <div class="mb-1">
                    <div class="mb-1">
                        <label for="article">Article</label>
                    </div>
                    <input id="article" class="form-control @error('article') is-invalid @enderror"type="hidden" name="article">
                    <trix-editor input="article"></trix-editor>
                </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-1">
                        <div class="mb-1">
                            <label for="image">Activity Image</label>
                        </div>
                        <input class="form-control @error('image') is-invalid @enderror"
                        name="image" id="image" type="file" multiple required>
                    </div>
                 </div>
                 <div class="col-md-8">
                    <div class="mb-1" id="location" style="display: block">
                        <div class="mb-1">
                            <label for="location">Lokasi</label>
                        </div>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" placeholder="Jl. Wisata satu">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
                    
            <button class="btn btn-gradient-primary float-end" type="submit">Submit</button>
            
        </div>
    </form>
</div>

@endsection

@section('script')
<script>

                // Register FilePond plugins
        FilePond.registerPlugin(FilePondPluginImagePreview);

// Get a reference to the file input element
const inputElement = document.querySelector('input[id="image"]');

// Create a FilePond instance
const pond = FilePond.create(inputElement, {
    allowMultiple: true, // Allow multiple files
    server: {
        process: '/upload',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token from your server-side framework
        }
    }
});


</script>
@endsection