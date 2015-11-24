
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa  fa-edit fa-fw"></i>User Edit form</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                <?php if(isset($perror)): ?>
                    <div class="col-lg-6">
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo($perror); ?>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo(form_open('user_profile/change_password')); ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>User Details</strong>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Old password</label>
                                        <input class="form-control" name="oldpassword" value="" placeholder="Enter old password">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>New password</label>
                                        <input class="form-control" name="newpassword" value="" placeholder="Enter new password">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-default" name="reset">Reset</button>
                                        <button type="submit" class="btn btn-default pull-right" name="update">Update</button>
                                    </div>
                            </div>
                        </div>
                        <?php echo(form_close()); ?>
                    </div><!--end row-->
                </div>
                <!-- /.row -->
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    