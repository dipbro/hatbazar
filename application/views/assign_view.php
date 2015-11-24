
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php if(isset($placename)){echo $placename;} ?></h1>
                        <?php echo form_open(); ?>
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Vegitables
                                </div>
                                    <div class="panel-body">
                                           <?php if(isset($placeid)){echo(form_hidden('placeid',$placeid));} ?>
                                        <div class="form-group">
                                            <label>Select Vegitables</label>
                                            <?php
                                            $options = array();//data for fill combo box options
                                            $options['0']="Select vegitable";
                                            if(isset($vegitablelist))
                                            {
                                                foreach ($vegitablelist as $row) 
                                                {
                                                    $value=$row->VegId;
                                                    $options[$value]=$row->VegName;
                                                }
                                                
                                            }
                                            $attribute='class="form-control" id="class"';
                                            echo form_dropdown('vegitable', $options, 'large',$attribute);
                                            ?>
                                            <p class="help-block error"><?php if(isset($errorselect)){echo($errorselect);} ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" name="price" placeholder="Input price">
                                            <?php echo form_error('price'); ?>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="pull-right btn btn-default" name="submit">Save</button>
                                        </div>
                                    </div>
                                
                            </div>
                        </div><!-- /.col-lg-4 -->
                        <?php if(isset($vegitables)): ?>
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Vegitables list
                                </div>
                                    <div class="panel-body">
                                          <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SN.</th>
                                            <th>Vegitable Name</th>
                                            <th>Price /kg</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1;
                                        ?>
                                        <?php foreach($vegitables as $row): ?>
                                        <tr class="success">
                                            <td><?php echo($count); $count=$count+1; ?></td>
                                            <td><?php echo $row->VegName; ?></td>
                                            <td><?php echo $row->VegPrice; ?></td>
                                            <td><a href="<?php echo(site_url('assign/update/'.$row->PHVID)); ?>"><i class="fa  fa-edit fa-fw"></i>Edit</a></td>
                                            <td>
                                                <fieldset disabled>
                                                  
                                                    <input type="checkbox" <?php echo(checkboxstatus($row->StatusId));?> >
                                                    
                                                </fieldset>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                                    </div>
                                
                            </div>
                        </div><!-- /.col-lg-4 -->
                    <?php endif; ?>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <?php 
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
        

    