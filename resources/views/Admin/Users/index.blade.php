@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">User List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-secondary">Add User</a>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Admin</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email verified at</th>
                <th>created at</th>
            </tr>
            </thead>
            <tbody>
            @forelse($usersList as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}">change</a>
                        <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="color: red;">delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No entries</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $usersList->links() }}
    </div>
@endsection

@push("js")
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(elem, key) {
                elem.addEventListener("click", function() {
                    const id = this.getAttribute('rel');
                    if(confirm(`Confirm delete user with #id = ${id}`)) {
                        send(`/admin/news/${id}`).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
