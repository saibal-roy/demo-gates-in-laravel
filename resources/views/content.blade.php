{{-- siteTitle --}}
@section('siteTitle', $siteTitle ?? config('app.name', 'Laravel') )

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $pageTitle ?? config('app.name', 'Laravel')}}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                    <br />
                    {{$description ?? config('app.name', 'Laravel')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
