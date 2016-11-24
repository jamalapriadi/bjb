<section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Form Fisik KCP Report</h3>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <form>                        

                        <div class="form-group"></div>
                        
                        <div class="form-group">
                            <label for="kcp" class="control-label">KCP</label>
                            <input class="form-control" readonly="readonly" name="kcp" type="text" id="kcp" ng-value="hasil.nama_kcp">                        
                        </div>

                        <div class="form-group">
                            <label for="fisik" class="control-label">Fisik</label>                            
                            <input class="form-control" readonly="readonly" name="fisik" type="text" ng-value="hasil.nama_fisik" id="fisik">                        
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

                        <hr>

                        <div class="form-group">
                            <button class="btn btn-save btn-primary" ng-click="simpan()">Simpan</button>
                            <a href="#" class="btn btn-default">Batal</a>
                        </div>

                        </form>                    
                   	</div>
                </div>
            </div>
        </div>

    </section>