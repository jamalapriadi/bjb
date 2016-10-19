<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Laporan Staff</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example" class="table table-bordered" datatable="ng">
                        <colgroup>
                            <col class="con0" />
                            <col class="con1" />
                            <col class="con2" />
                            <col class="con3" />
                            <col class="con4" />
                            <col class="con5" />
                            <col class="con6" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th align="center" valign="middle" class="head1">No</th>
                                <th align="center" valign="middle" class="head2">Cabang</th>
                                <th align="center" valign="middle" class="head3">KCP</th>
                                <th align="center" valign="middle" class="head4">Posisi</th>
                                <th align="center" valign="middle" class="head5">Nama</th>
                                <th align="center" valign="middle" class="head6">Nilai</th>
                                <th align="center" valign="middle" class="head7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="r in hasil">
                                <td>{{$index+1}}</td>
                                <td>{{r.nama_cabang}}</td>
                                <td>{{r.nama_kcp}}</td>
                                <td>{{r.nama_posisi}}</td>
                                <td>{{r.nama_staff}}</td>
                                <td>
                                    <span ng-if="r.nilai==null">-</span>
                                    <span ng-if="r.nilai!=null">
                                        {{r.nilai}}
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo site_url();?>admin/report_staff_by_person/{{r.id_staff}}" class="btn btn-sm btn-xs btn-primary">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
