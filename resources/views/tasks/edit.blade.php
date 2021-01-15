@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Task') }}</div>

                    <div class="card-body">
                        @include('tasks-includes.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
