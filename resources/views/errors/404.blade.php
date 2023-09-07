@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="{{ asset('404.jpg') }}" style="width: 100%;" alt="">
            <center>
                <button onclick="window.history.back();" class="btn btn-primary">Go Back</button>
            </center>
        </div>
    </div>
</div>
@endsection
