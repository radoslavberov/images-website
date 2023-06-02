@extends('layouts.app')

@section('content')
    <x-success/>
    <x-errors/>
    <div class="container">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>{{__('Latest Users') }}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th>{{__('ID')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Email')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($latestUsers as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>{{__('Latest Images') }}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table class="table text-center">
                    <thead class="table-dark">
                    <tr>
                        <th>{{__('ID')}}</th>
                        <th>{{__('Title')}}</th>
                        <th>{{__('Description')}}</th>
                        <th>{{__('Created By')}}</th>
                        <th>{{__('Created At')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($latestImages as $image)
                        <tr>
                            <td> <img src="{{ asset('storage/images/' . $image->title) }}" alt="Image" width="100px" height="100px"></td>
                            <td>{{ $image->title }}</td>
                            <td>{{ $image->description }}</td>
                            <td>{{ $image->user->name }}</td>
                            <td>{{ $image->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
