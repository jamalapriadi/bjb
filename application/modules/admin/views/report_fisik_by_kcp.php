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
                            <input class="form-control" min="0" max="100" step="0.01" name="score" type="number" ng-value="hasil.nilai" id="score">                        
                        </div>

                        <div ng-repeat="k in hasil.kategori" class="form-group">
                            <label for="Keberadaan ATM">{{k.nama_kategori}}</label>
								<table class="table table-bordered table-hover">
									<tr ng-repeat="p in k.parameter">
                                        <td class="text-center" style="width: 10%">
                                            <select class="form-control" name="parameter[294]">
                                            	<option value="0">N/A</option>
                                            	<option value="1" selected="selected">Ya</option>
                                            	<option value="2">Tidak</option>
                                            </select>                                                    
                                        </td>

                                        <td style="width: 45%">{{p.nama_parameter}}</td>
                                        <td class="text-center" style="width: 45%">
                                            <input class="form-control" placeholder="Komentar..." maxlength="255" name="komentar[294]" type="text" value="">
                                        </td>
                                    </tr>
                                </table>
                        </div>

                        <div class="alert alert-warning alert-dismissable" style="margin-top: 30px">
                                <i class="glyphicon glyphicon-warning-sign"></i>
                                Belum ada kategori mcoa untuk fisik ini.
                            </div>

                        </form>                    
                   	</div>
                </div>
            </div>
        </div>

    </section>