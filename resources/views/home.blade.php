@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">

                    @auth
                        User logged, <a href="/logout">logout ?</a>
                    @else
                        <a href="/login">login ?</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
