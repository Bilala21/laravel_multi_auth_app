@extends("admin.layout.master")
@section('style')
    <style>
        body {
            background: #ededed;
        }

        .navbar {
            position: relative;
            z-index: 999;
        }

        .form-wrapper {
            box-shadow: 0px 0px 3px 1px #c6c6c6;
            transition: all 600ms ease-in;
            min-width: 280px;
            transform: translateY(-100vh);
        }

        .form-wrapper:hover {
            box-shadow: 0px 1px 24px 2px #c6c6c6;
        }
    </style>
@endsection
@section('content')
    <div id="wrapper" class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-7 col-sm-12 col-12 mx-auto form-wrapper bg-white rounded p-4 pt-3 position-relative">
                    @if (session()->get('errors'))
                        <p class="position-absolute top-0 start-0 w-100 bg-danger text-center text-white">{{ session()->get('errors')->first() }}</p>
                    @endif
                    @if (session("message"))
                    <p class="position-absolute top-0 start-0 w-100 bg-danger text-center text-white">{{ session("message") }}</p>
                    @endif
                    <strong class="mb-3 d-block fs-3">Sign In</strong>
                    <form class="w-100 m-0" method="post" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" autocomplete="off">
                        </div>
                        <div class="w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-primary">Sign-In</button>
                            {{-- <small>Have you any account?<a href="{{ route('admin.register') }}"
                                    class="text-decoration-none px-1">Sign-Up</a></small> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

