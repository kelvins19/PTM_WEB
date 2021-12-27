@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Update User {{ $users->nama }}</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" id="add-user" action="{{ route('admin.users.update', ['id' => $users->id]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table>
                            <tr>
                                <th>Nama User</th>
                                <td colspan="3"><input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="{{ $users->name }}"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td colspan="3"><input type="text" class="form-control" id="email" aria-describedby="email" name="email" value="{{ $users->email }}" disabled></td>
                            </tr>
                            <tr>
                                <th>Roles</th>
                                <td colspan="3">
                                    <select name="roles" id="roles" class="form-control">
                                        @if ($users->roles === 0)
                                            <option value="0">Default: Customer</option>  
                                        @elseif ($users->roles === 1)
                                            <option value="1">Default: Admin</option>
                                        @endif  
                                        <option value="0">Customer</option>  
                                        <option value="1">Admin</option>  
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <button style="margin-top: 10px" type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(() => {
        $('#add-user').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.users.update', ['id' => $users->id]) }}",
                method: 'POST',
                data: new FormData(event.target),
                processData: false,
                contentType:false,
            }).done(function() {
                location.href = "{{ route('admin.users') }}"
            }).fail(function(_) {
                iziToast.error({
                    title: 'Error',
                    message: 'Failed to add users',
                    position: 'topRight'
                });
            });
        })
    });
</script>
@endpush