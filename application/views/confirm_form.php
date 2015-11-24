
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <p>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-red">
                        <div class="panel-heading">
                            Confirm !
                        </div>
                        <div class="panel-body">
                            <?php echo form_open('user_registration/delete'); ?>
                            <p class="text-warning"><span class="text-danger"><i class="fa fa-warning fa-2x"></i></span>are you sure want to delete ?</p>
                            <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
                            <button type="submit" class="btn btn-default pull-right" name="ok">Ok</button>
                            <?php echo(form_hidden('userid', $userid)); ?>
                        <?php echo(form_close()); ?>
                        </div>
                    </div>
                    </div>
                </p>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    