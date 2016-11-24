<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Tambah Kategori Parameter</h3>
                </div>
                <div class="box-body">
                    <div class="alert alert-info" ng-show="loading">
                        <i class="fa fa-spin fa-spinner"></i> Please Wait. . .
                    </div>

                    <form>
                        <div class="form-gruop">
                            <label for="">Posisi</label>
                            <input type="text" ng-value="posisi.nama_posisi" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" ng-model="mcoa.kategori" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" ng-click="simpan()">
                                Simpan
                            </button>

                            <a href="#" class="btn btn-default">Batal</a>
                        </div>
                    </form>
                </div><!-- end box-body-->
            </div> <!-- end box-primary-->
        </div><!--end col-lg-12-->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Daftar Kategori Parameter</h3>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-bordered" datatable="ng">
                        <thead>
                            <tr>
                                <th align="center" valign="middle">No.</th>
                                <th align="center" valign="middle">Kategori</th>
                                <th class="aksi" align="center" valign="middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="p in parameter">
                                <td>{{$index+1}}</td>
                                <td>{{p.nama_kategori}}</td>
                                <td>
                                    <a href="<?php echo site_url();?>admin/positions_mcoa/{{posisi.id_posisi}}/{{p.id_kategori}}" class="btn btn-xs btn-sm btn-success" title="MCOA">
                                        <i class="fa fa-signal"></i>
                                    </a>

                                    <a href="#" class="btn btn-warning btn-xs btn-sm" title="Rubah" ng-click="form('edit',p.id_kategori)">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="#" class="btn btn-danger btn-xs btn-sm" ng-click="hapus(p.id_kategori)">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div><!-- end box-body-->
            </div> <!-- end box-primary-->
        </div><!--end col-lg-12-->
        
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
                                <label for="">Nama</label>
                                <input type="text" name="nama" ng-model="newForm.nama" class="form-control">
                            </div>

                            <hr>


                            <button type="submit" class="btn btn-primary" ng-click="save(modalstate,id)">Simpan</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div> <!-- end row -->
</div><!-- end ng-controller-->