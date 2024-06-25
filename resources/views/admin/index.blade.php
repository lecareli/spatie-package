@extends('layout')

@section('content')
    <h1>Admin</h1>

    <div class="row">
        <div class="col-9">
            <h5>Roles</h5>

            <ul class="list-group">
                @forelse ($roles as $roles)
                    <li class="list-group-item">{{ $role->name }}</li>
                @empty
                    <li class="list-group-item">No roles created, yet</li>
                @endforelse
            </ul>

        </div>
        <div class="col-3">
            <h5>Permissions</h5>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <h5>Users</h5>
        </div>
    </div>
@endsection
