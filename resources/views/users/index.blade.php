@extends('layouts.app')
@section('content')
    <x-success/>
    <x-errors/>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-12 text-center">
                    <h1>{{ __('Users') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Email')}}</th>
                        <th>{{__('Image Count')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->image_count ?? 'no data'}}</td>
                            {{--                    <td>--}}
                            {{--                        <a class="btn btn-primary mx-1"--}}
                            {{--                           href="{{route('users.show', ['user' => $user->id])}}">{{__('Show')}}--}}
                            {{--                        </a>--}}

                            {{--                        <form action="{{route('users.destroy', ['user' => $user->id])}}" method="POST">--}}
                            {{--                            @method('DELETE') @csrf--}}
                            {{--                            <button class="btn btn-danger mx-1">--}}
                            {{--                                {{__('Delete')}}--}}
                            {{--                            </button>--}}
                            {{--                        </form>--}}

                            {{--                    </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex mt-3">
        {{ $users->links('vendor.pagination.simple-bootstrap-5') }}
    </div>
@endsection
