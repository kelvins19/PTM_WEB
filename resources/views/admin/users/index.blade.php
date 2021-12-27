@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form>
                <div class="form-row" style="margin-top: 20px;">
                    <div class="form-group col-md-6">
                        <label for="q">Search</label>
                        <input type="text" name="search" class="form-control" id="search" placeholder="Search..." value="{{ $search ?? '' }}" aria-label="search">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('admin.users') }}" class="btn btn-outline-primary">Reset filter</a>
                </div>
                <div class="form-group col-md-6">
                    <a href="{{ route('register') }}" class="btn btn-outline-success">Add User</a>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nama User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th colspan="2" scope="col" style="padding-left:4%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($users))
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name ?? '' }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                            @if ($user->roles === 1)
                                <td><span class="badge badge-danger">Admin</span></td>
                            @else
                                <td><span class="badge badge-secondary">Customer</span></td>
                            @endif
                            <td><a class="btn btn-secondary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a></td>
                            <td><a class="btn btn-danger" href="{{ route('admin.users.delete', $user->id) }}">Delete</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Sorry, no products found</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
            <div class="col-md-8">
                @if (!empty($merks))
                    {{ $merks->links('vendor.pagination.bootstrap-4') }}    
                @endif
            </div>
        </div>
    </div>

    
</div>
@endsection