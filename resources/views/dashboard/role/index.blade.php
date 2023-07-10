@extends('dashboard.layout.app')

{{-- custom stylesheet --}}
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/dashboard/role.css') }}">
@endsection

{{-- BEGIN:: Role Content --}}
@section('content')
    <!-- heading content wrapper -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role</h1>
    </div>
    <div class="input-group w-50 mb-2">
        <input type="text" class="breadcrumb-search-box form-control bg-primary-light border-0 small" placeholder="Search for...">
        <div class="input-group-append">
            <button class="btn btn-sm btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
    <div class="role-content-wrapper mb-5">
        <!-- role list table -->
        <table class="table role-table-listing-wrapper">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Date Creation</th>
                    <th>Role</th>
                    <th>Permission</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>{{ ucwords( $role->name ) }}</td>
                        <td>
                            <div class="dropdown show">
                                <button data-toggle="dropdown" id="dropdown-permissions" class="btn btn-outline-dark btn-sm dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                                  Has Permissions
                                </button>
                                <div class="dropdown-menu" style="height: 200px; overflow: scroll; overflow-x: hidden;" aria-labelledby="dropdown-permissions">
                                    @if ( $role->permissions()->first() != null )
                                        @foreach ( $role->permissions->sortBy('name') as $permission )
                                            <span class="dropdown-item" >{{ $permission->name }}</span>
                                        @endforeach
                                    @else
                                        <span class="dropdown-item" style="color: red;">This user has no permission</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <!-- action dropdown menu -->
                            <img type="button" data-toggle="dropdown" class="btn dropdown-toggle" aria-haspopup="true" aria-expanded="false" src="{{ asset('img/icons/dashboard_sidebar/action.png') }}" alt="action icon">
                            <!-- dropdown items -->
                            <div class="dropdown-menu dropdown-menu-left" style="height: 100px !important;">
                                <!-- edit -->
                                @can('edit system_user')
                                    <div class="action-edit-wrapper">
                                        <a class="dropdown-item" href="{{ url("dashboard/roles/$role->id/edit") }}">Edit</a>
                                    </div>
                                @endcan
                                <!-- delete -->
                                @can('delete system_user')
                                    <div class="action-delete-wrapper">
                                        <form action="{{ route('role-delete', ['id' => $role->id]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="role-delete-btn dropdown-item">Delete</button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- create role -->
        @can('create system_user')
            <div class="create-role-link-wrapper">
                <a class="btn btn-sm btn-outline-success" href="{{ route('role-add') }}">Create New Role</a>
            </div>
        @endcan
    </div>
@endsection
{{-- END:: Role Content --}}

{{-- custom script --}}
@section('script')
    <script src="{{ asset('js/dashboard/role.js') }}"></script>

    <script>
        $(document).ready(function(){
            validListRole();
        });
    </script>
@endsection
