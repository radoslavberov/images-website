@extends('layouts.app')
@section('content')
    <x-success/>
    <x-errors/>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 text-center">
                    <h1>{{ __('Images') }}</h1>
                    @if(Auth::check())
                        <a class="btn btn-success" href="{{ route('images.create') }}">{{__('Upload Image')}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($images as $image)
                    <div class="col">
                        <div class="card shadow-sm image-wrap">
                            <img src="{{ asset('storage/images/' . $image->title) }}" alt="Image" width="200px">
                            <div class="card-body">
                                <h4 class="card-text text-center">{{$image->title}}</h4>
                                <p class="card-text ">{{$image->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('images.show', $image->id)}}"
                                           class="btn btn-sm btn-outline-secondary mx-1">{{__('View')}}</a>
                                        @if(auth()->check() && (auth()->id() === $image->user_id || auth()->user()->is_admin))
                                            <form
                                                action="{{route('images.destroy', ['image' => $image->id])}}"
                                                method="POST">
                                                @method('DELETE') @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    {{__('Delete')}}
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <small class="text-muted">{{$image->created_at->diffForHumans()}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex mt-3">
                {{ $images->links('vendor.pagination.simple-bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
