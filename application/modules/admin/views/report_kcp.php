<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form KCP</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form>
                        <div class="form-group"></div>

                        <div class="form-group">
                            <label for="cabang">Cabang</label>
                            <input class="form-control" disabled="disabled" name="cabang" type="text" id="cabang" ng-value="kcp.nama_cabang">                        
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" disabled="disabled" name="nama" type="text" ng-value=" kcp.nama_kcp " id="nama">                        
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" disabled="disabled" name="alamat" cols="50" rows="10" id="alamat">{{kcp.alamat_kcp}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="score" class="control-label">Index</label>
                            <input class="form-control" min="0" max="100" step="0.01" name="score" type="number" id="score" ng-value="nilai" string-to-number ng-model="nilai">                        
                        </div>


                        <div class="form-group">
                            <label for="file" class="control-label">File</label>
                            <input type="file" ngf-select ng-model="picFile[0]" name="file" required ngf-model-invalid="errorFile" class="form-control">
                        </div>

                        <div ng-repeat='item in items track by $index'>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="file" ngf-select ng-model="picFile[$index+1]" name="file"
                                        required ngf-model-invalid="errorFile" class="form-control">
                                    <span class="input-group-addon" ng-click="del($index)">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" ng-click="tambahPilihan()">
                                <i class="fa fa-plus"></i>
                                File
                            </button>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-save btn-primary" ng-click="simpan(picFile)">Simpan</button>
                            <a href="http://ms-bjbsyariah.com/admin/reports/list/kcp" class="btn btn-default">Batal</a>
                        </div>
                    </form>
                    
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info text-center" role="progressbar" data-aria-valuenow="0" data-aria-valuemin="0" data-aria-valuemax="100">
                            <span class="percent">0%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">File Yang Diupload</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped" datatable="ng">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>File Type</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="f in berkas">
                                <td>{{$index+1}}</td>
                                <td>{{f.type_file}}</td>
                                <td>{{f.nama_file}}</td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-xs" ng-click="hapus(f.id)">
                                        <i class="fa fa-trash"></i>
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
