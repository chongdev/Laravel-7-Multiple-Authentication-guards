@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @auth('admin')
                        Admin logged, <a href="/admin/logout">logout ?</a>
                    @else
                        <a href="/admin/login">login ?</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
