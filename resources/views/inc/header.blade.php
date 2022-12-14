<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('main') }}">Main</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('login')}}">Cabinet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('topics.index') }}">Topics</a>
                </li>
                @can('view', auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">Admin cabinet</a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="#">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Contacts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
