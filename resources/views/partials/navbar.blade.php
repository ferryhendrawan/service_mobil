<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-0 mb-lg-0">
        <li class=" nav-item">
          <a class="nav-link" aria-current="page" href="/konsumen">Konsumen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/service">Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pembayaran">Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/sparepart">Sparepart</a>
        </li>
      </ul>
      <form class="d-flex" method="post" action="/logout">
        @csrf
        <button class="btn btn-outline-secondary" type="submit">Log Out</button>
      </form>
    </div>
  </div>
</nav>