
        <!-- Page Content -->
        <div id="page-wrapper" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo form_open('user_registration/registration'); ?>
                        <h1 class="page-header text-success"><i class="fa fa-user fa-fw"></i>User Registration form</h1>
                        <div class="col-lg-6 col-md-6">
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
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" class="btn btn-default pull-right">Register</button>
                                </div>
                            </div>
                        </div><!--end col-lg-6-->
                        <div class="col-lg-6 col-md-6">
                            <?php if(!isset($admin)): ?>
                            <?php if(isset($users_list)): ?>
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Users List</strong>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SN.</th>
                                            <th>Full name</th>
                                            <th>User name</th>
                                            <th>User type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1; 
                                        foreach($users_list as $row): 
                                        ?>
                                        <tr>
                                            <td><?php echo($count); $count=$count+1; ?></td>
                                            <td><?php echo $row->FullName; ?></td>
                                            <td><?php echo $row->UserName; ?></td>
                                            <td><?php echo $row->LoginName; ?></td>
                                            <td><a href="<?php echo site_url('user_registration/edit').'/'.$row->UserId; ?>"><i class="fa  fa-edit fa-fw"></i>Edit</a> | <a href="<?php echo site_url('user_registration/delete').'/'.$row->UserId; ?>" class="text-danger data-toggle="tooltip" data-placement="left" title="Delete user permanently" data-original-title="Tooltip on left""><i class="fa fa-minus-circle fa-fw"></i>Delete</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        </div><!--end col-md-6-->
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.col-lg-12 -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    