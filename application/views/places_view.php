
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add places</h1>
                        <div class="col-lg-4">
                            <?php echo form_open('places/insert'); ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>Add new place</strong>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Place Name</label>
                                            <input class="form-control" name="placename" type="text" placeholder="Input place name">
                                            <?php echo form_error('placename'); ?>
                                    </div>
                                    <button type="submit" class="pull-right btn btn-default" name="submit">Add</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div><!--end col-lg-4-->
                        <div class="col-lg-8">
                            <?php if(isset($places)): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Vegitables list
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sn.</th>
                                            <th>Places Name</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count=1; ?>
                                        <?php foreach ($places as $value): ?>
                                        <tr class="<?php echo(tablestyle($value->StatusId)); ?>">
                                            <td><?php echo($count); ?></td>
                                            <td><?php echo($value->PlaceName);?></td>
                                            <td><a href="<?php echo site_url('places/update').'/'.$value->PlaceId; ?>"><i class="fa  fa-edit fa-fw"></i> Edit</a></td>
                                            <td>
                                                <fieldset disabled>
                                                  
                                                    <input type="checkbox" <?php echo(checkboxstatus($value->StatusId));?> >
                                                    
                                                </fieldset>
                                            </td>
                                        </tr>
                                    <?php $count=$count+1; endforeach;  ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                <?php endif;?>
                <?php if(!isset($places)): ?>
                    <div class="alert alert-danger">
                        There is no any places added to this list
                    </div>
                <?php endif; ?>
                </div><!--end col-lg-8-->

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

    