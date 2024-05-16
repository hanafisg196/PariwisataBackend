@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label"></div>
        <div class="dt-action-buttons text-end">
</div>
    
    <form class="auth-login-form mt-2" method="post"
    action="/destination/update/{{ $destination->id }}"enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                @include('_partials.alert')
                <div class="col-md-8">
                    <div class="mb-1" id="title" style="display: block">
                        <div class="mb-1">
                            <label for="title">Title</label>
                        </div>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                         value="{{ old('title', $destination->title) }}" id="title" name="title"
                          placeholder="Wisata Mandeh">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="mb-1">
                        <div class="mt-1">
                            <label for="trip_id">Trip</label>
                        </div>
                        <select name="trip_id" id="trip_id" class="form-control">
                            @foreach ($trip as $itemTrip)
                            @if (old('trip_id', $itemTrip->id) == $itemTrip->id)
                            <option value="{{ $itemTrip->id }}"
                                 selected> {{ $itemTrip->name}}
                                </option>
                             @else
                                <option value="{{ $itemTrip->id }}">
                                {{ $itemTrip->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-1" id="daerah" style="display: block">
                        <div class="mb-1">
                            <label for="daerah">Daerah</label>
                        </div>
                        <input type="text" class="form-control  @error('daerah') is-invalid @enderror"
                         id="daerah" name="daerah" value="{{ old('daerah', $destination->daerah) }}"
                          placeholder="Nama Daerah Wisata">
                    </div>
                </div>
                <div class="col-md-8">
                <div class="mb-1">
                    <div class="mb-1">
                        <label for="cover">Cover</label>
                    </div>
                    @if ($destination->cover)
                    <div style="max-width: 200px; max-height: 300px; overflow: hidden;">
                        <img src="{{asset('storage/'. $destination->cover)}}" class="thumb-preview img-fluid" alt="">
                    </div>
                  @else
                    <img class="cover-preview img-fluid" alt="">
                  @endif
                  <input class="form-control" name="cover" id="cover" type="file">
                </div>
                 </div>
                <div class="col-md-8">
                <div class="mb-1">
                    <div class="mb-1">
                        <label for="article">Article</label>
                    </div>
                    <input id="article" class="form-control @error('article') is-invalid @enderror"
                    type="hidden" name="article" value="{{ old('article', $destination->article) }}">
                    <trix-editor input="article"></trix-editor>
                </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-1">
                        <div class="mb-1">
                            <label for="image">Activity Image</label>
                        </div>
                        
                        <livewire:delete-image :id="$destination->id" />

                        <div class="mb-1">
                            <div class="mb-1">
                                <label for="image">Upload Image</label>
                            </div>
                            <input class="form-control @error('image') is-invalid @enderror"
                            name="image" id="image" type="file" multiple>
                        </div>

                    </div>
                </div>
                
                 <div class="col-md-8">
                    <div class="mb-1" id="location" style="display: block">
                        <div class="mb-1">
                            <label for="location">Lokasi</label>
                        </div>
                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                        id="location" value="{{ old('location', $destination->location) }}" name="location"
                        placeholder="Jl. Wisata satu">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-gradient-primary float-end" type="submit">Update</button>
        </div>
    </form>
</div>

@endsection

@section('script')
<script>

    FilePond.registerPlugin(FilePondPluginImagePreview);
    const inputElement = document.querySelector('input[id="image"]');
    const pond = FilePond.create(inputElement, {
    allowMultiple: true,
    server: {
        process: '/upload',
        revert: '/delete',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }
    });

</script>
@endsection