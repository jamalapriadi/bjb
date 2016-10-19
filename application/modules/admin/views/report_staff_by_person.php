<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Staff</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form>
                        <div class="form-group"></div>

                        <div class="form-group">
                            <label for="cabang">KCP</label>
                            <input class="form-control" disabled="disabled" name="kcp" type="text" id="cabang" ng-value="hasil.nama_kcp">                        
                        </div>

                        <div class="form-group">
                            <label for="nama">Posisi</label>
                            <input class="form-control" disabled="disabled" name="posisi" type="text" ng-value=" hasil.nama_posisi " id="posisi">                        
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" disabled="disabled" name="nama" type="text" ng-value=" hasil.nama_staff " id="nama">                        
                        </div>

                        <div class="form-group">
                            <label for="nama">Gender</label>
                            <input class="form-control" disabled="disabled" name="gender" type="text" ng-value=" hasil.gender " id="gender">                        
                        </div>

                        <div class="form-group">
                            <label for="score" class="control-label">Index</label>
                            <input class="form-control" min="0" max="100" step="0.01" name="score" type="number" id="score" ng-value="hasil.nilai" string-to-number ng-model="nilai">                        
                        </div>

                        <div ng-repeat="k in hasil.kategori" class="form-group">
                            <label for="">{{k.nama_kategori}}</label>
                            <table class="table table-bordered">
                                <tr ng-repeat="p in k.parameter">
                                    <td style="width:10%">
                                        <select class="form-control" name="parameter[582]">
                                            <option value="0" selected="selected">N/A</option>
                                            <option value="1">Ya</option>
                                            <option value="2">Tidak</option>
                                        </select> 
                                    </td>
                                    <td style="width:40%">{{p.nama_parameter}}</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Komentar">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="form-group">
                            <label for="">Konten</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="file" class="control-label">Video</label>
                            <input type="file" ngf-select ng-model="picFile[0]" name="file" required ngf-model-invalid="errorFile" class="form-control">
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
                            <label for="file" class="control-label">Mistery Caller</label>
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
                                Mystery Caller
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
</section>
