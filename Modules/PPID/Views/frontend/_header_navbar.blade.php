<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container px-3">
        <a class="navbar-brand d-flex align-items-center" href="{{ request()->segment(1) == 'ppid' ? route('ppid.index') : site_url() }}">
            <img src="{{ gambar_desa(identitas()->logo) }}" class="logo-brand" alt="{{ identitas()->nama_desa }}" width="50" height="50" class="me-2" />
            <div class="text-start text-truncate">
                <span class="d-block small text-mobile-sm">{{ ucwords(setting('ppid_judul_portal')) }}</span>
                <span class="d-block text-uppercase fw-bold text-mobile-lg">
                    {{ ucwords(setting('sebutan_desa') . ' ' . identitas()->nama_desa) }}
                </span>
            </div>
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @include('ppid::frontend._menu')
            </ul>
        </div>
    </div>
</nav>
