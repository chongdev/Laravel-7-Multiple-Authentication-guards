@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blogger Dashboard</div>

                <div class="card-body">
                    @auth('blogger')
                        Blogger logged, <a href="/blogger/logout">logout ?</a>
                    @else
                        <a href="/blogger/login">login ?</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
