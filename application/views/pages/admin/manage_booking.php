<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?=$title;?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <?php
                    if($this->session->success){
                        ?>
                        <div class="alert alert-dismissable alert-success"><?=$this->session->success;?></div>
                        <?php
                    }
                    if($this->session->failed){
                        ?>
                        <div class="alert alert-dismissable alert-danger"><?=$this->session->danger;?></div>
                        <?php
                    }
                    ?>                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>Booking History</td>
                                            <td></td>
                                        </tr>
                                    </table>                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Commuter Name</th>
                                                    <th>Rider Name</th>
                                                    <th>Origin</th>
                                                    <th>Destination</th>
                                                    <th>Date/Time Booked</th>
                                                    <th>Status</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $x=1;
                                                foreach($bookings as $item){
                                                    $color="";
                                                    if($item['status']=="pending"){
                                                        $color="style='background-color:pink;'";                                                      
                                                    }
                                                    if($item['status']=="confirmed"){
                                                        $color="style='background-color:yellow;'";                                                        
                                                    }
                                                    if($item['status']=="completed"){
                                                        $color="style='background-color:cyan;'";
                                                    }
                                                    if($item['status']=="cancel"){
                                                        $color="style='background-color:red;'";
                                                    }
                                                    echo "<tr $color>";
                                                        echo "<td align='center'>$x.</td>";
                                                        echo "<td>$item[commuter]</td>";
                                                        echo "<td>$item[rider]</td>";
                                                        echo "<td>$item[loc_origin]</td>";
                                                        echo "<td>$item[loc_destination]</td>";
                                                        echo "<td>".date('m/d/Y',strtotime($item['book_date']))." ".date('h:i A',strtotime($item['book_time']))."</td>";
                                                        echo "<td>$item[status]</td>";                                                        
                                                    echo "</tr>";
                                                    $x++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->                                   
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->                    
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->