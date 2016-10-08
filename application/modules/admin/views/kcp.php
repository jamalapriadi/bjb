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
                                    <a href="#" class="btn btn-xs btn-sm btn-primary" ng-click="detail(r.id_kcp)">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-sm btn-warning" ng-click="form('edit',r.id_kcp)">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-sm btn-danger" ng-click="hapus(r.id_kcp)">
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
                                <label for="">Fax</label>
                                <input type="text" ng-model="newForm.fax" ng-value="newForm.fax" name="fax" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="picture">Foto</label>  
                                <div ng-if="newForm.foto_kcp!=NULL || newForm.foto_kcp==''">
                                    <img src="<?php echo base_url();?>uploads/{{newForm.foto_kcp}}" alt="" class="img-responsive" style="width:150px;height:150px;">
                                </div>
                                <input id="file" ngf-select ng-model="picFile" ngf-max-size="2MB" name="file" type="file" class="form-control" accept="image/*" >
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


                            <button type="submit" class="btn btn-primary" ng-click="save(modalstate,id,picFile)">Simpan</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Data KCP</h4>
                    </div>

                    <div class="modal-body">
                        <form name="registrasi">
                            <div id="loading" class="alert alert-info" ng-show="loading">
                                <i class="fa fa-spin fa-spinner"></i> Please Wait. . .
                            </div>

                            <div class="form-group">
                                <label for="">Cabang</label>
                                <select ui-select2="select2Options" ng-model="detailForm.cabang" data-placeholder="Pilih Cabang" class="form-control" disabled>
                                    <option ng-repeat="l in list" value="{{l.id_cabang}}">{{l.nama_cabang}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" ng-model="detailForm.nama" ng-value="detailForm.nama" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" ng-model="detailForm.alamat" id="alamat" cols="30" rows="10" class="form-control" disabled>{{detailForm.alamat}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Telp</label>
                                <input type="telp" ng-model="detailForm.telp" ng-value="detailForm.telp" name="telp" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Fax</label>
                                <input type="text" ng-model="detailForm.fax" ng-value="detailForm.fax" name="fax" class="form-control" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label for="picture">Foto</label>  
                                <img src="<?php echo base_url();?>uploads/{{detailForm.foto_kcp}}" alt="" class="img-responsive" style="width:120px;height:120px;">
                            </div>
                            
                            <!--

                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" ng-model="detailForm.username" ng-value="detailForm.username" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" ng-model="detailForm.password" class="form-control" disabled>
                            </div>
                            -->

                            <hr>


                            <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>