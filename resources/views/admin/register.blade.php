@extends("admin.layout.master")
@section('style')
    <style>
        .navbar {
            position: relative;
            z-index: 999;
        }

        .form-wrapper {
            box-shadow: 0px 0px 3px 1px #c6c6c6;
            transition: all 800ms ease-in;
            min-width: 280px;
            transform: translateY(-100vh);
        }

        .form-wrapper:hover {
            box-shadow: 0px 1px 24px 2px #c6c6c6;
        }
    </style>
@endsection
@section('content')
    <div id="wrapper" class="pt-5 px-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-7 col-sm-12 col-12 mx-auto form-wrapper bg-white rounded p-4 pt-3 position-relative form-wrapper">
                    @if (session("message"))
                    <div class="bg-success w-100 text-center text-white pb-2 pt-1 success-message">
                        {{ Session('message') }}
                    </div>
                    <div class="text-end">
                        <a href="{{ route('admin.login') }}" class="mt-3 btn btn-info d-block text-center">Sign In</a>
                    </div>
                @endif
                    <div>
                        <strong class="mb-3 d-block fs-3">Sign Up</strong>
                        <form class="w-100 m-0" method="post" action="{{ route('admin.create') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="w-100 d-flex justify-content-between">
                                <button type="submit" class="btn btn-sm btn-primary">Sign-Up</button>
                                <small>Have you any account?<a href="{{ route('admin.login') }}"
                                        class="text-decoration-none px-1">Sign-In</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

