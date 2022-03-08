@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="vue-app">

            <subject-component
                scope=" {{$scope}}"
                :id="{{$id ?? 0}}"
            >
            </subject-component>
        </div>
    </div>

@endsection
