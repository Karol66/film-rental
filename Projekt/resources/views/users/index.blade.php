@extends('users.layout')
@section('content')
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand">Admin Panel</a>
            <ul class="navbar-nav d-flex flex-row me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ route('film.index') }}">Movies administration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ route('users.index') }}">Users Administration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ route('logout') }}">Log out</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <br />


    <div id="margin">

        <div class="table-responsive">
            <table class="table table-dark table-striped" id="margin">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Is Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->last_name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->password }}</td>
                            <td>{{ $item->is_admin }}</td>
                            <td>
                                <a href="{{ url('/users/' . $item->id) }}">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                            </path>
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                            </path>
                                        </svg>
                                        View
                                    </button>
                                </a>
                                <a href="{{ url('/users/' . $item->id . '/edit') }}">
                                    <button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                            </path>
                                        </svg>
                                        Edit
                                    </button>
                                </a>
                                <form method="POST" action="{{ url('/users' . '/' . $item->id) }}" accept-charset="UTF-8"
                                    style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                            class="fa fa-trash-o"aria-hidden="true"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z">
                                            </path>
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z">
                                            </path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagination-container d-flex justify-content-center mt-5">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection
