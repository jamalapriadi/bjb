<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Daftar KCP</h3>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-bordered" datatable="ng">
                        <thead>
                            <tr>
                                <th align="center" valign="middle">No.</th>
                                <th align="center" valign="middle">Cabang</th>
                                <th align="center" valign="middle">Nama</th>
                                <th align="center" valign="middle">Alamat</th>
                                <th class="aksi" align="center" valign="middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="r in hasils">
                                <td>{{$index+1}}</td>
                                <td>{{r.nama_cabang}}</td>
                                <td>{{r.nama_kcp}}</td>
                                <td>{{r.alamat_kcp}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <a href="#" ng-click="form('tambah',0)" class="btn btn-primary" style="margin-top:10px;"><i class="fa fa-plus"></i> Tambah</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">{{form_title}}</h4>
                    </div>

                    <div class="modal-body">
                        <form name="registrasi">
                            <div id="loading" class="alert alert-info" ng-show="loading">
                                <i class="fa fa-spin fa-spinner"></i> Please Wait. . .
                            </div>

                            <div class="form-group">
                                <label for="">Cabang</label>
                                <select ui-select2="select2Options" ng-model="newForm.cabang" data-placeholder="Pilih Cabang" class="form-control">
                                    <option ng-repeat="l in list" value="{{l.id_cabang}}">{{l.nama_cabang}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" ng-model="newForm.nama" ng-value="newForm.nama" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" ng-model="newForm.alamat" id="alamat" cols="30" rows="10" class="form-control">{{newForm.alamat}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Telp</label>
                                <input type="telp" ng-model="newForm.telp" ng-value="newForm.telp" name="telp" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" ng-model="newForm.username" ng-value="newForm.username" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" ng-model="newForm.password" class="form-control">
                            </div>

                            <hr>


                            <button type="submit" class="btn btn-primary" ng-click="save(modalstate,id)">Simpan</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>