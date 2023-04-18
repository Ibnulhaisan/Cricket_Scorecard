<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <h5 class="navbar-brand" style="animation: alternate">Score Card</h5>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{route('playerdata')}}">Players</a>
                <a class="nav-link" href="{{route('teamdatatable')}}">Teams</a>
                <a class="nav-link" href="{{route('matchdatatable')}}">Matches</a>
                <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                <a class="nav-link text-danger" href="{{route('logout')}}">Logout</a>
            </div>
        </div>
    </div>
</nav>
