<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">{{ Auth::guard('admin')->user() ? "Admin Dashboard" :"Home" }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end w-100">
                @if (Auth::guard('admin')->user())
                <li class="nav-item btn border p-1 btn-sm">
                    <a  href="#" class="nav-link active" aria-current="page">{{Auth::guard('admin')->user()->email }}</a>
                </li>
                @else
                    
                <li class="nav-item btn border p-1 btn-sm">
                    <a  href="" class="nav-link active" aria-current="page">Sign Up/Sign In</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>