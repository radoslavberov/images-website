<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h4>{{ __('Add New Comment') }}</h4>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="image_id" value="{{ $image->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div class="form-group">
                    <label for="content">{{ __('Content') }}</label>
                    <textarea class="form-control" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">{{ __('Submit') }}</button>
            </form>
        </div>
    </div>
</div>
