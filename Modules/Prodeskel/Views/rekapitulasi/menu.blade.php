<div class="box box-info">
    <ul class="nav-menu">
        <li @class(['nav-item' => true, 'active' => $childMenu == 'profil'])><a href="{{ ci_route('prodeskel.rekapitulasi.profil') }}">Profil Desa &
                Kelurahan</a>
        <li @class(['nav-item' => true, 'active' => $childMenu == 'potensi'])><a href="{{ ci_route('prodeskel.rekapitulasi.potensi') }}">Potensi</a>
        <li @class(['nav-item' => true, 'active' => $childMenu == 'perkembangan'])><a href="{{ ci_route('prodeskel.rekapitulasi.perkembangan') }}">Perkembangan</a>
    </ul>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.nav-menu > li.nav-item > a').on('click', function(e) {
                if ($(this).parent().hasClass('collapsed')) {
                    $(this).find('i').removeClass('fa-plus').addClass('fa-minus');
                } else {
                    $(this).find('i').removeClass('fa-minus').addClass('fa-plus');
                }
                $(this).parent().toggleClass('collapsed');
                $(this).next().collapse('toggle');
                if ($(this).attr('href') == '#') {
                    e.preventDefault();
                }

            });
        });
    </script>
@endpush

@push('css')
    <style type="text/css">
        .nav-menu {
            list-style: none;
            padding: 2px;
            margin: 0;
        }

        .nav-menu .nav-item {
            position: relative;
            padding: 0 0 0 2em;
            line-height: 2em;
        }

        .nav-menu .nav-item:before {
            content: "";
            position: absolute;
            top: 0.5em;
            left: 0.5em;
            width: 1em;
            height: 1em;
            background: url('/assets/images/folder.svg') no-repeat;
            background-size: contain;
        }

        .nav-menu .nav-item.collapsed:before {
            background-image: url('/assets/images/folder.svg');
        }

        .nav-item.active a {
            font-size: 110%;
            font-weight: 700;
            color: #a94442;
            width: 100%;
        }
    </style>
@endpush
