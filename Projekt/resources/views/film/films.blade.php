@extends('film.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Film Length</th>
                        <th>Release Date</th>
                        <th>Country</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($film)
                        @foreach ($film as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img class="imidz" src="data:image/jpeg;base64,{{ base64_encode($item->image) }}">
                                </td>
                                <td>
                                    @if ($item->trashed())
                                        {{ $item->name }} [DELETED]
                                    @else
                                        {{ $item->name }}
                                    @endif
                                </td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->film_length }}</td>
                                <td>{{ $item->release_date }}</td>
                                <td>{{ $item->country }}</td>
                                <td>${{ $item->price }}</td>
                                <td>
                                    @if ($item->trashed())
                                        <form method="POST" action="{{ route('film.restore', $item->id) }}">
                                            @csrf

                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
                                                    <path
                                                        d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z" />
                                                    <path
                                                        d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('film.show', $item->id) }}">
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
                                            </button>
                                        </a>
                                        <a href="{{ route('film.edit', $item->id) }}">
                                            <button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </a>

                                        <form method="POST" action="{{ route('film.destroy', $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
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
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            {{-- @isset($film)
                        @foreach ($film as $item)
            <div class="filmx">
                <div class="filmx-leftwrapper">
                    <div class="film-item">
                        1
                    </div>
                    <div class="film-imgx">
                        <img class="imidz" src="data:image/jpeg;base64,{{ base64_encode($item->image) }}">
                    </div>
                </div>
                <div class="film-rightwrapper">
                    <div class="film-item">
                        {{ $item->name }}
                    </div>
                    <div class="film-item">
                        drama
                    </div>
                    <div class="film-item">
                        11
                    </div>
                    <div class="film-item">
                        2023-05-25
                    </div>
                    <div class="film-item">
                        xd
                    </div>
                    <div class="film-item">
                        2137
                    </div>
                    <div class="film-itembtns">
                        <button>xd</button>
                        <button>xd</button>
                        <button>xd</button>
                    </div>
                </div>
            </div>
            @endforeach
            @endisset --}}
            <div class="pagination-container d-flex justify-content-center mt-5">
                {{ $film->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </main>
@endsection
