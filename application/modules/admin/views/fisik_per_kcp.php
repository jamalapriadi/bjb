<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Daftar Fisik KCP</h3>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-bordered" datatable="ng">
                        <thead>
                            <tr>
                                <th align="center" valign="middle">No.</th>
                                <th align="center" valign="middle">Cabang</th>
                                <th align="center" valign="middle">KCP</th>
                                <th align="center" valign="middle">Fisik</th>
                                <th class="aksi" align="center" valign="middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="s in hasil.data">
                                <td>{{$index+1}}</td>
                                <td>{{s.nama_cabang}}</td>
                                <td>{{s.nama_kcp}}</td>
                                <td>{{s.nama_fisik}}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs btn-sm" title="Rubah"  ng-click="form('edit',s.id)">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="#" class="btn btn-danger btn-xs btn-sm" ng-click="hapus(s.id)">
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
                                <label for="">KCP</label>
                                <select ng-model="newForm.kcp" data-placeholder="Pilih KCP" class="form-control" readonly>
                                    <option value="{{hasil.kcp.id_kcp}}" selected="selected">{{hasil.kcp.nama_kcp}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Fisik</label>
                                <select ui-select2="select2Options" ng-model="newForm.fisik" data-placeholder="Pilih Fisik" class="form-control">
                                    <option ng-repeat="f in hasil.fisik" value="{{f.id_fisik}}">{{f.nama_fisik}}</option>
                                </select>
                            </div>

                            <hr>


                            <button type="submit" class="btn btn-primary" ng-click="save(modalstate,id)">Simpan</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade large" id="myModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Detail Kota # {{details.cabang.nama_cabang}}</h4>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="">Kanwil</label>
                                <input type="text" ng-value="details.cabang.nama_kanwil" class="form-control" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" ng-value="details.cabang.nama_cabang" class="form-control" readonly="readonly">
                            </div>
                        </form>

                        
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-bookmark"></i>
                                    <h3 class="box-title">History</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="alert alert-warning" style="margin-top: 20px">
                                        <i class="fa fa-warning"></i>
                                        Belum ada history untuk data ini.
                                    </div>
                                </div><!-- /.box-body -->
                            </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>