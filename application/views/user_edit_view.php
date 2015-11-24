
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa  fa-edit fa-fw"></i>User Edit form</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>User Details</strong>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input class="form-control" name="fullname" value="<?php echo set_value('fullname'); ?>">
                                        <?php echo form_error('fullname'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input class="form-control" name="username" value="<?php echo set_value('username'); ?>">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>">
                                        <?php echo(form_error('password')); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="1" name="usercheck">Make This user as admin
                                            </label>
                                        </div>
                                    </div>
                                    <button type="reset" class="btn btn-default" name="reset">Reset</button>
                                    <button type="submit" class="btn btn-default pull-right" name="update">Update</button>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    