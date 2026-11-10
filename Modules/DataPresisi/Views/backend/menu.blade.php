<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Kebutuhan Pokok</h3>
        <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <li class="@active($navigasi == 'sandang')"><a href="{{ ci_route('data_presisi.sandang.show', $id) }}"> Sandang</a></li>
            <li class="@active($navigasi == 'pangan')"><a href="{{ ci_route('data_presisi.pangan.show', $id) }}"> Pangan</a></li>
            <li class="@active($navigasi == 'papan')"><a href="{{ ci_route('data_presisi.papan.show', $id) }}"> Papan</a></li>
            <li class="@active($navigasi == 'kesehatan')"><a href="{{ ci_route('data_presisi.kesehatan.show', $id) }}"> Kesehatan</a></li>
        </ul>
    </div>
</div>
