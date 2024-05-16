<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="row">
        @if (!empty($images) && count($images) > 0)
            @foreach ($images as $img)
                <div class="col-md-6">
                    <div class="card border-0 text-white">
                        <img class="card-img" src="{{ asset('storage/'.$img->image) }}" alt="Card" height="200" width="150">
                        <div class="card-img-overlay bg-overlay">
                            <button wire:click="deleteImage({{ $img->id }})" type="button" class="btn btn-icon btn-danger waves-effect waves-float waves-light">
                                <span>X</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="mb-1">
                <label for="image">Not have any images for Activity! Please upload.</label>
            </div>
        @endif
    </div>

</div>
