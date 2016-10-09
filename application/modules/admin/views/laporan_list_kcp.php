<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Daftar Laporan</h3>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-bordered" datatable="ng">
                        <thead>
                            <tr>
                                <th align="center" valign="middle">No.</th>
                                <th align="center" valign="middle">Cabang</th>
                                <th align="center" valign="middle">Nama</th>
                                <th align="center" valign="middle">Nilai</th>
                                <th class="aksi" align="center" valign="middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="r in hasils">
                                <td>{{$index+1}}</td>
                                <td>{{r.nama_cabang}}</td>
                                <td>{{r.nama_kcp}}</td>
                                <td>
                                    <span ng-if="r.index_nilai==null">-</span>
                                    <span ng-if="r.index_nilai!=null">
                                        {{r.index_nilai}}
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo site_url();?>admin/report_kcp/{{r.id_kcp}}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>