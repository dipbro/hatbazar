
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit form</h1>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                            <?php echo form_open('assign/update_price'); ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Update Panel
                                </div>
                                <div class="panel-body">
                                    <?php
                                    if(isset($phvid))
                                    {
                                        echo(form_hidden('phvid',$phvid));
                                    }
                                    if(isset($placeid))
                                    {
                                        echo(form_hidden('placeid',$placeid));
                                    }
                                      ?>

                                    <fieldset disabled>
                                        <div class="form-group">
                                            <label for="disabledSelect">Vegitable name</label>
                                            <input class="form-control" id="disabledInput" type="text" value="<?php if(isset($vegname)){echo($vegname);} ?>" disabled="" name="vegname">
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <label>Price @Rs.</label>
                                        <input class="form-control" value="<?php if(isset($vegprice)){echo($vegprice);} ?>" name="vegprice">
                                    </div>
                                    <button type="submit" class="btn btn-default pull-right" name="update">Update</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div><!-- /.col-lg-4 -->

                        <!--all html code goes here-->
                        <!--it is call by controller  which name is name blank-->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    