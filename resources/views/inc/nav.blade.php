<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
<<<<<<< HEAD
        <a class="navbar-brand" href="{{url('/')}}">Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          {{-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('board.index')}}">게시판s</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/')}}/board">게시판-</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('/')}}/category">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('/')}}/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}/register">Reister</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
=======
        <a class="navbar-brand" href="{{url('/')}}">Home</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}/boards">게시판</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}/login">Login</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}/register">Reister</a>
              </li>
          </ul>
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
        </div>
    </div>
</nav>