@extends('layouts.app')

@section('content')
    <x-errors/>
    <div class="container">
        <h3>{{__('Create Image')}}</h3>

        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    <input type="hidden" name="file_path" id="file_path" value="">
                    <div class="form-group">
                        <label for="name">{{__('Title')}}:</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">{{__('Upload Image:')}}</label>
                        <input type="file" name="image" class="form-control">

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">{{__('Description')}}:</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
        </form>
    </div>
@endsection
