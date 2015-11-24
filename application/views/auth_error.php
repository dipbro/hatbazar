
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($message)): ?>
                                <p>
                                    <div class="alert alert-danger">
                                        <ul class="list-inline">
                                            <li><i class="fa fa-warning fa-2x"></i></li>
                                            <li><?php echo $message; ?><a href="<?php echo site_url($pagepath);?>" class="alert-link text-right">Try it again !</a>.</li>
                                        </ul>
                                    </div>
                                </p>  
                        <?php endif; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   