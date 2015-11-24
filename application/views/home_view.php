
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Available places</h1>
                        <?php if(isset($places)): ?>
                        <?php foreach($places as $row): ?>
                            <div class="col-lg-3 col-md-6">
                                <label><?php echo $row->PlaceName; ?></label>
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-tasks fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?php echo vegcount($row->PlaceId,$place); ?></div>
                                                <div>Vegitales added !</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('assign/index/'.$row->PlaceId); ?>">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php endif;  ?>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <?php
        function vegcount($placeid,$place)
        {
            $count=0;
            if(isset($place['placeid-'.$placeid]))
            {
                foreach ($place['placeid-'.$placeid] as $value) 
                {
               # code...
                $count=$count+1;
                 }
            }
            else
            {
                $count=0;
            }
           
           return $count;
        }
        ?>

    