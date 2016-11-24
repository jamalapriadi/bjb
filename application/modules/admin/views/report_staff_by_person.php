<style>
    .text-center{
        text-align: center;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Staff</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form enctype="multipart/form-data">
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
                            <input class="form-control" min="0" max="100" step="0.01" name="score" type="number" id="score" ng-value="nilai" string-to-number ng-model="nilai">                        
                        </div>

                        <div ng-repeat="k in hasil.kategori" class="form-group">
                            <label for="">{{k.nama_kategori}}</label>
                            <table class="table table-bordered">
                                <tr ng-repeat="p in k.parameter">
                                    <td style="width:10%">
                                        <div ng-if="p.report!=null">
                                            <select name="parameter" ng-model="$parent.parameter[p.id_parameter]" 
                                             ng-init="$parent.parameter[p.id_parameter] = pilihans[p.report.id]" 
                                            class="form-control" ng-options="pil.id for pil in pilihans">
                                            </select>
                                        </div>

                                        <div ng-if="p.report==null">
                                            <select name="parameter" ng-model="$parent.parameter[p.id_parameter]" 
                                            ng-init="$parent.parameter[p.id_parameter] = pilihans[0]" 
                                            class="form-control" ng-options="pil.id for pil in pilihans">
                                            </select>
                                        </div>
                                    </td>
                                    <td style="width:40%">{{p.nama_parameter}}</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Komentar" ng-model="$parent.komentar[p.id_parameter]" ng-init="$parent.komentar[p.id_parameter]=p.report.komentar">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div ng-if="hasil.mcoa.length==null">
                            <div class="alert alert-warning alert-dismissable" style="margin-top: 20px">
                                <i class="glyphicon glyphicon-warning-sign"></i>
                                Belum ada mcoa untuk kategori ini.
                            </div>
                        </div>

                        <div ng-repeat="m in hasil.mcoa">
                            <div class="form-group">
                                <label for="Telepon tersambung ke cabang">
                                    <strong>{{m.nama_kategori}}</strong>
                                </label>
                                <table ng-repeat="p in m.parameter" class="table table-bordered table-hover">
                                    <tr>
                                        <th colspan="3">
                                            {{p.nama_parameter}}
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="text-left" colspan="2">
                                            <div ng-repeat="d in p.detail" class="form-group">
                                                <div class="radio">
                                                    <label for="">
                                                        <input name="mcoa[{{p.id_parameter}}]" type="radio" ng-model="$parent.mcoa[p.id_parameter]" ng-value="d.id">
                                                        {{d.pilihan}}                                                 
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center" style="width: 50%;top:50%;" valign="center">
                                            <input class="form-control" placeholder="Komentar..." maxlength="255" name="mcoa_komentar[p.id_parameter]" type="text" ng-model="$parent.mcoa_komentar[p.id_parameter]">
                                        </td>

                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Konten</label>
                            <div ng-cloak ng-show="isReady">
                                <textarea ckeditor="editorOptions" name="editor" ng-model="konten" ng-value="konten"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="file" class="control-label">Video</label>
                            <input type="file" ngf-select ng-model="Video" name="file" ngf-model-invalid="errorFile" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="file" class="control-label">File</label>
                            <input type="file" ngf-select ng-model="file[0]" name="file" ngf-model-invalid="errorFile" class="form-control">
                        </div>

                        <div ng-repeat='item in items track by $index'>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="file" ngf-select ng-model="file[$index+1]" name="file"
                                        ngf-model-invalid="errorFile" class="form-control">
                                    <span class="input-group-addon" ng-click="del($parent.$index)">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary" ng-click="tambahFile()">
                                <i class="fa fa-plus"></i>
                                File
                            </a>
                        </div>

                        <div class="form-group">
                            <label for="file" class="control-label">Mistery Caller</label>
                            <input type="file" ngf-select ng-model="fileMistery[0]" name="file" ngf-model-invalid="errorFile" class="form-control">
                        </div>

                        <div ng-repeat='item in itemsMistery track by $index'>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="file" ngf-select ng-model="fileMistery[$index+1]" name="file"
                                        ngf-model-invalid="errorFile" class="form-control">
                                    <span class="input-group-addon" ng-click="delMistery($index)">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary" ng-click="tambahMistery()">
                                <i class="fa fa-plus"></i>
                                Mystery Caller
                            </a>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-save btn-primary" ng-click="simpan(file,fileMistery,Video)">Simpan</button>
                            <a href="#" class="btn btn-default">Batal</a>
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
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tipe</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="f in hasil.file">
                                <td>{{$index+1}}</td>
                                <td>{{f.tipe}}</td>
                                <td>{{f.nama_file}}</td>
                                <td>
                                    <a href="#" ng-click="hapusfile(f.id)" class="btn btn-sm btn-danger">
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
