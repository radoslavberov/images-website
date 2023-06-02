@extends('layouts.app')

@section('content')
    <div class="container">
        @if (auth()->check() && auth()->user()->is_admin)
            @include('layouts.partials.admin')
        @else
            @if(auth()->check() && (!auth()->user()->is_admin))
                <div class="content-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3>{{__('Latest Images') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach($latestImages as $image)
                                <div class="col">
                                    <div class="card shadow-sm image-wrap">
                                        <img src="{{ asset('storage/images/' . $image->title) }}" alt="Image">
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
                    </div>
                </div>
            @else
           @include('auth.login')
            @endif
        @endif
    </div>
@endsection
