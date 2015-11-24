
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Place </h1>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                            <?php echo form_open('places/update'); ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>Edit palce</strong>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Vegitable Name</label>
                                            <input class="form-control" name="placename" type="text" value="<?php if(isset($place)){echo $place;} ?>">
                                            <?php echo form_error('placename'); ?>
                                    </div>
                                    <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <?php
                                                    $checkstat;
                                                    if(isset($chkstatus))
                                                    {
                                                        $checkstat=$chkstatus;
                                                    }
                                                    else
                                                    {
                                                        $checkstat=0;
                                                    }

                                                    ?>
                                                    <input type="checkbox" name="statuscheck" value="1" <?php  echo(checkboxstatus($checkstat)); ?>>Make this place enable.
                                                </label>
                                            </div>
                                                    
                                    </div>
                                    <?php 
                                        if(isset($placeid))
                                        {
                                           echo form_hidden('placeid', $placeid);
                                        }
                                         
                                    ?>
                                    <button type="submit" class="pull-right btn btn-default" name="update">Update</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div><!--end col-lg-4-->
                        

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <?php

            function tablestyle($status)
            {   $style="";
                if($status==1)
                {
                    $style="success";
                }
                else
                {
                    $style="danger";
                }
                return $style;
            }
            function checkboxstatus($status)
            {
                 $temp="";
                                                 
                if($status==1)
                {
                    $temp='checked="checked"';
                }
                return $temp;
            }
         ?>

    