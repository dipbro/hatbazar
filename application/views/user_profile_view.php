
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa  fa-edit fa-fw"></i>User Edit form</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>User Details</strong>
                                </div>
                                <div class="panel-body">
                                    <?php  echo form_open('user_profile/update_profile'); ?>
                                    <fieldset disabled>
                                        <div class="form-group">
                                            <label for="disabledSelect">Full name</label>
                                            <input class="form-control" id="disabledInput" type="text" disabled="" name="fullname" value="<?php echo $user_detail[0]->FullName; ?>">
                                            <?php echo form_error('fullname'); ?>
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input class="form-control" name="username" value="<?php echo $user_detail[0]->UserName; ?>">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                    <div class="form-group">
                                        <a href="<?php echo(site_url('user_profile/change_password')); ?>">change password</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-default" name="reset">Reset</button>
                                        <button type="submit" class="btn btn-default pull-right" name="update">Update</button>
                                    </div>
                                    <?php echo(form_hidden('temp_username',$user_detail[0]->UserName)); ?>
                                    <?php echo(form_close()); ?>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    