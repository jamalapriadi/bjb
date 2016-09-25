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
                                <td>{{r.nama}}</td>
                                <td>{{r.start_date}} - {{r.end_date}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">
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