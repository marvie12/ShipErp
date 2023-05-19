<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container px-5">
        <a class="navbar-brand" href="/"><span class="fw-bolder text-primary">{{isset($pageTitle)?$pageTitle:''}}</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#providers">Providers</a></li>
                <li class="nav-item"><a class="nav-link" href="#developer">Developer</a></li>
                <li class="nav-item"><a class="nav-link" href="{{$gitHubLink}}" target="_blank">GIT Hub</a></li>
            </ul>
        </div>
    </div>
</nav>