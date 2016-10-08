<?php echo $_header;?>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo $_sidebar;?>

    
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <section class="content-header">
            <h1>
                <?php echo $title;?> <small>Control Panel</small>
            </h1>
        </section>

        <div style="margin: 20px 15px 0 0"></div>

        <div ng-if="pesan.success == true" ng-show="showMessage">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{pesan.pesan}}
            </div>
        </div>

        <div ng-if="pesan.success == false" ng-show="showMessage">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{pesan.pesan}}
            </div>
        </div>
                

        <section class="content">
            <?php echo $_content;?>
        </section>
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php echo $_footer;?>

    