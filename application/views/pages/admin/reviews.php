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
                                            <td>Commuters Comments/Reviews</td>
                                            <td align="right"><!--a href="#" class="btn btn-primary btn-sm addRider" data-toggle="modal" data-target="#ManageRider">Add Rider</a--></td>
                                        </tr>
                                    </table>                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>From</th>
                                                    <th>Message/Comments</th>                                                    
                                                    <th>Date / Time</th>                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $x=1;
                                                foreach($reviews as $item){  
                                                    $qry=$this->Booking_model->db->query("SELECT * FROM commuter WHERE username='$item[username]'");
                                                    $res=$qry->row_array();                                                   
                                                    echo "<tr>";
                                                        echo "<td align='center'>$x.</td>";                                                        
                                                        echo "<td>$res[fullname]</td>";
                                                        echo "<td>$item[message]</td>";
                                                        echo "<td>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</td>";                                                        
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