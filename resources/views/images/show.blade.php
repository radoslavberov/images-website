@extends('layouts.app')
@section('content')
    <x-success/>
    <x-errors/>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="{{ asset('storage/images/' . $image->title) }}" alt="Image" width="200px" height="200px">
            </div>
            <div class="col-md-6">
                <label class="control-label" for="name">Title</label>
                <input
                    class="form-control"
                    type="text"
                    name="title"
                    value="{{ $image->title}}"
                    disabled
                />
                <br>
                <label class="control-label" for="email">Description</label>
                <textarea rows="5" cols="20"
                          class="form-control"
                          name="description"
                          disabled
                >{{ $image->description}}</textarea>
            </div>
            <div class="row d-flex mt-2">
                <div class="col-12 d-flex justify-content-end">
                    <a class="btn btn-primary mx-1" href="{{ route('images.index') }}">{{__('Go Back')}}</a>
                    @if(auth()->check() && (auth()->id() === $image->user_id || auth()->user()->is_admin))
                        <form
                            action="{{route('images.destroy', ['image' => $image->id])}}"
                            method="POST">
                            @method('DELETE') @csrf
                            <button type="submit" class="btn btn-danger mx-1">
                                {{__('Delete')}}
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(auth()->check())
        @include('comments.create')
    @endif
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h4>{{ __('Comments') }}</h4>
                @foreach($image->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text">{{ $comment->content }}</p>
                            <div class="d-flex justify-content-between">
                                <p class="card-text text-muted">{{ __('By') }}: {{ $comment->user->name }} {{$comment->created_at->diffForHumans()}}</p>
                                @if(auth()->check() && auth()->user()->is_admin)
                                    <form
                                        action="{{route('comments.destroy', ['comment' => $comment->id])}}"
                                        method="POST">
                                        @method('DELETE') @csrf
                                        <button type="submit" class="btn btn-danger mx-1">
                                            {{__('Delete Comment')}}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
