

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle operator-name" data-toggle="dropdown" role="button" aria-expanded="false">
                        bjbsyariah <span class="caret"></span>
                    </a>  

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo site_url('home');?>">
                                Dashboard
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin/dashboard');?>">
                                Panel
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/logout');?>" style="background-color:white">
                                <img class="logout-btn" src="<?php echo base_url('assets/images/logout-button.png');?>"></img>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
    
    <div class="container" style="padding:0; min-height:calc(100% - 140px); background-color:lightgrey;">
    <div class="col-sm-9" style="background-color:white; padding:0 40px; height:100%;">
        <div class="col-sm-10 col-sm-offset-1 text-center home-result" style="height:140px; margin-top:80px; margin-bottom: 40px;">
            <div class="home-logo text-center col-sm-5 col-sm-push-4">
                <img src="<?php echo base_url('assets/images/logo.png');?>" style="padding-right:0">
            </div>
        </div>                     
        <div class="clearfix"></div>
            
        <div>
            <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab-data" data-toggle="tab">
                Data
            </a>
        </li>
        <li>
            <a href="#tab-chart" data-toggle="tab" class="link-tab-chart-cabang" data-chart="<?php echo site_url('home/chart/cabang');?>">
                Chart
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active fade in" id="tab-data">
            <div class="nav-tabs-custom" id="tab-ajax">
                <ul class="nav nav-tabs" style="border-bottom: 2px solid orange; padding-bottom: 10px; ">
                    <li class="active">
                        <a href="#top-kcp" data-toggle="tab">
                            10 Jaringan Teratas
                        </a>
                    </li>

                    <li>
                        <a href="#top-kcp-posisi" data-target="#top-kcp-posisi" data-ajax="http://ms-bjbsyariah.com/ajax/list_kcp_posisi" data-toggle="tab">
                            10 Jaringan Teratas Per Posisi
                        </a>
                    </li>

                    <li>
                        <a href="#top-cabang" data-target="#top-cabang" data-ajax="http://ms-bjbsyariah.com/ajax/top_cabang" data-toggle="tab">
                            Cabang Konsolidasi Teratas
                        </a>
                    </li>

                    <li>
                        <a href="#kcp-by-cabang" data-target="#kcp-by-cabang" data-ajax="http://ms-bjbsyariah.com/ajax/kcp_by_cabang" data-toggle="tab">
                            Jaringan Berdasarkan Wilayah
                        </a>
                    </li>

                    <li>
                        <a href="#list-kcp" data-target="#list-kcp" data-ajax="http://ms-bjbsyariah.com/ajax/list_kcp" data-toggle="tab">
                            Jaringan Kantor
                        </a>
                    </li>

                    <li>
                        <a href="#list-staff" data-target="#list-staff" data-ajax="http://ms-bjbsyariah.com/ajax/list_staff" data-toggle="tab">
                            Staff
                        </a>
                    </li>

                    <li>
                        <a href="#list-fisik" data-target="#list-fisik" data-ajax="http://ms-bjbsyariah.com/ajax/list_fisik" data-toggle="tab">
                            Fisik
                        </a>
                    </li>
                </ul>

                <div class="tab-content home-tabs">
                    <div class="tab-pane active fade in" id="top-kcp">
    <div class="row list-dealer">
                                    <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/64/kcp/375">
                            <span class="rank">
                                1                            </span>

                            <span class="mrg-top-10">
                                 KCP Tambun                             </span>

                            <span>
                                Jl. Sultan Hasanudin No. 5 Kabupaten Bekasi, Jawa Barat                            </span>
                        </a>
                                    </div>
                            <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/61/kcp/352">
                            <span class="rank">
                                2                            </span>

                            <span class="mrg-top-10">
                                 KCP Pabuaran                             </span>

                            <span>
                                Jl. Raya Pabuaran Wetan No.12, Kec. Ciledug, Kab. Cirebon                            </span>
                        </a>
                                    </div>
                            <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/66/kcp/392">
                            <span class="rank">
                                3                            </span>

                            <span class="mrg-top-10">
                                KCP Sukajadi                            </span>

                            <span>
                                Jl. Sukajadi No.70 Kota Bandung, Jawa Barat
                            </span>
                        </a>
                                    </div>
                            <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/60/kcp/339">
                            <span class="rank">
                                4                            </span>

                            <span class="mrg-top-10">
                                 KCP Singaparna                             </span>

                            <span>
                                Jl. Raya Timur No.  36 Cikiray Singaparna Kab. Tasikmalaya, Jawa Barat                            </span>
                        </a>
                                    </div>
                            <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/60/kcp/340">
                            <span class="rank">
                                5                            </span>

                            <span class="mrg-top-10">
                                 KCP Bantarkalong                             </span>

                            <span>
                                Jl. Raya Simpang RT/RW. 07/04 Desa Simpang Kec. Bantarkalong Kab. Tasikmalaya, Jawa Barat                            </span>
                        </a>
                                    </div>
                            <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/63/kcp/367">
                            <span class="rank">
                                6                            </span>

                            <span class="mrg-top-10">
                                 KCP Ciputat                             </span>

                            <span>
                                Jl. Ir. H. Juanda No.117 Ciputat Kota Tangerang Selatan, Banten                            </span>
                        </a>
                                    </div>
                            <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/65/kcp/378">
                            <span class="rank">
                                7                            </span>

                            <span class="mrg-top-10">
                                 KC Soepomo                            </span>

                            <span>
                                Menara Bidakara 2 Jl. Gatot Subroto Kav. 71-73 Jakarta Selatan, DKI Jakarta                            </span>
                        </a>
                                    </div>
                            <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/60/kcp/341">
                            <span class="rank">
                                8                            </span>

                            <span class="mrg-top-10">
                                 KCP Ciawi                             </span>

                            <span>
                                Jl. Pelita 1 Pasar Baru Ciawi RT/RW. 02/08 Desa Pakemitan Kec. Ciawi Kab. Tasikmalaya, Jawa Barat                            </span>
                        </a>
                                    </div>
                            <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/63/kcp/364">
                            <span class="rank">
                                9                            </span>

                            <span class="mrg-top-10">
                                 KCP Pandeglang                             </span>

                            <span>
                                Jl. Raya Serang Km.01 No. 15A Kab. Pandeglang, Banten                            </span>
                        </a>
                                    </div>
                            <div>
                                            <a href="http://ms-bjbsyariah.com/cabang/66/kcp/389">
                            <span class="rank">
                                10                            </span>

                            <span class="mrg-top-10">
                                 KCP Lembang                             </span>

                            <span>
                                Jl. Raya Lembang No. 374 A-B Lembang Kab. Bandung Barat, Jawa Barat                            </span>
                        </a>
                                    </div>
                        </div>
</div>
                    <div class="tab-pane fade" id="top-kcp-posisi">
    <div class="loader">Loading...</div>
</div>
                    <div class="tab-pane fade" id="top-cabang">
    <div class="loader">Loading...</div>
</div>
                    <div class="tab-pane fade" id="kcp-by-cabang">
    <div class="loader">Loading...</div>
</div>
                    <div class="tab-pane fade" id="list-kcp">
    <div class="loader">Loading...</div>
</div>
                    <div class="tab-pane fade" id="list-staff">
    <div class="loader">Loading...</div>
</div>
                    <div class="tab-pane fade" id="list-fisik">
    <div class="loader">Loading...</div>
</div>                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="tab-chart">
            <div class="nav-tabs-custom">
                <!--<ul class="nav nav-tabs">
                    <li>
                        <a href="#tab-chart-kanwil" data-toggle="tab" class="link-tab-chart-kanwil" data-chart="http://ms-bjbsyariah.com/home/chart/kanwil">
                            Kanwil
                        </a>
                    </li>
                    <li class="active">
                        <a href="#tab-chart-cabang" data-toggle="tab" class="link-tab-chart-cabang" data-chart="http://ms-bjbsyariah.com/home/chart/cabang">
                            Cabang
                        </a>
                    </li>
                </ul>-->

                <div class="tab-content">
                    <!--<div class="tab-pane  fade in" id="tab-chart-kanwil">
                        <div id="chart-kanwil-container">
    <div class="loader">Loading...</div>
</div>                    </div>-->

                    <div class="tab-pane active" id="tab-chart-cabang">
                        <div id="chart-cabang-container">
    <div class="loader">Loading...</div>
</div>                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
            </div>
        </div>

        <div class="col-sm-3">
    <ul class="list-group link-index">
        <li class="list-group-item">
            <div id="accordion" class="accordion">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-highest" data-ajax="http://ms-bjbsyariah.com/ajax/highest">
                    <img src="<?php echo base_url('assets/images/diamond.png');?>">

                    Nilai Tertinggi
                </a>

                <div id="collapse-highest" class="collapse mrg-top-10">
                    <div class="loader">Loading...</div>
                </div>
            </div>
        </li>

        <li class="list-group-item">
            <div id="accordion" class="accordion">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-lowest" data-ajax="http://ms-bjbsyariah.com/ajax/lowest">
                    <img src="<?php echo base_url('assets/images/diamond.png');?>">

                    Nilai Terrendah
                </a>

                <div id="collapse-lowest" class="collapse mrg-top-10">
                    <div class="loader">Loading...</div>
                </div>
            </div>
        </li>

        <li class="list-group-item">
            <div id="accordion" class="accordion">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-average" data-ajax="http://ms-bjbsyariah.com/ajax/average">
                    <img src="<?php echo base_url('assets/images/diamond.png');?>">

                    Nilai Rata-rata
                </a>

                <div id="collapse-average" class="collapse mrg-top-10">
                    <div class="loader">Loading...</div>
                </div>
            </div>
        </li>

                    <li class="list-group-item">
                <div id="accordion" class="accordion">
                    <a data-toggle="collapse" data-parent="#accordion" href="#position-5" data-ajax="http://ms-bjbsyariah.com/ajax/position-index/5">
                        <img src="<?php echo base_url('assets/images/diamond.png');?>">

                        Jumlah Staff Analis Emas                    </a>

                    <div id="position-5" class="collapse mrg-top-10">
                        <div class="loader">Loading...</div>
                    </div>
                </div>
            </li>
                    <li class="list-group-item">
                <div id="accordion" class="accordion">
                    <a data-toggle="collapse" data-parent="#accordion" href="#position-1" data-ajax="http://ms-bjbsyariah.com/ajax/position-index/1">
                        <img src="<?php echo base_url('assets/images/diamond.png');?>">

                        Jumlah Staff Customer Service                    </a>

                    <div id="position-1" class="collapse mrg-top-10">
                        <div class="loader">Loading...</div>
                    </div>
                </div>
            </li>
                    <li class="list-group-item">
                <div id="accordion" class="accordion">
                    <a data-toggle="collapse" data-parent="#accordion" href="#position-4" data-ajax="http://ms-bjbsyariah.com/ajax/position-index/4">
                        <img src="<?php echo base_url('assets/images/diamond.png');?>">

                        Jumlah Staff Phoneliner                    </a>

                    <div id="position-4" class="collapse mrg-top-10">
                        <div class="loader">Loading...</div>
                    </div>
                </div>
            </li>
                    <li class="list-group-item">
                <div id="accordion" class="accordion">
                    <a data-toggle="collapse" data-parent="#accordion" href="#position-3" data-ajax="http://ms-bjbsyariah.com/ajax/position-index/3">
                        <img src="<?php echo base_url('assets/images/diamond.png');?>">

                        Jumlah Staff Satpam                    </a>

                    <div id="position-3" class="collapse mrg-top-10">
                        <div class="loader">Loading...</div>
                    </div>
                </div>
            </li>
                    <li class="list-group-item">
                <div id="accordion" class="accordion">
                    <a data-toggle="collapse" data-parent="#accordion" href="#position-2" data-ajax="http://ms-bjbsyariah.com/ajax/position-index/2">
                        <img src="<?php echo base_url('assets/images/diamond.png');?>">

                        Jumlah Staff Teller                    </a>

                    <div id="position-2" class="collapse mrg-top-10">
                        <div class="loader">Loading...</div>
                    </div>
                </div>
            </li>
            </ul>
</div>        <div class="clearfix"></div>
    </div>

    