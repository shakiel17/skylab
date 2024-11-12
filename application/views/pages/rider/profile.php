<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?=$title;?></h1>
                        </div>                                        
                    </div>
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
                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                <div class="icon">
                                    <?php
                                    if($profile['license']==""){
                                    ?>
                                    <a href="#" data-toggle="modal" data-target="#AddLicense" data-id="<?=$profile['id'];?>" class="addLicense"><i class="glyphicon glyphicon-user"></i></a>
                                    <?php
                                    }else{
                                        ?>
                                        <a href="#" data-toggle="modal" data-target="#AddLicense" data-id="<?=$profile['id'];?>" class="addLicense"><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($profile['license']);?>" width='100'></a>
                                        <?php
                                    }			
                                    ?>
                                
                                </div>
                                <div class="text">
                                    <label class="text-muted"><?=$profile['fullname'];?></label><br>
                                    <small class="text-muted"><a href="#" class="editUserAccount" data-toggle="modal" data-target="#updateUserAccount" data-id="<?=$profile['id'];?>_<?=$profile['username'];?>_<?=$profile['password'];?>">@<?=$profile['username'];?></a></small>
                                </div>
                                <div class="options">
                                    <a href="#" class="btn btn-primary editUserProfile" data-toggle="modal" data-target="#EditUserProfile" data-id="<?=$profile['id'];?>_<?=$profile['fullname'];?>_<?=$profile['address'];?>_<?=$profile['contactno'];?>_<?=$profile['email'];?>"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
                                </div>
<div class="options">
                                    <?=$profile['status'];?>
                                    <?php
                                    if($profile['status']=="Active"){
                                        $stat="Set to Inactive";
                                        $status="Inactive";
                                    }else{
                                        $stat="Set to Active";
                                        $status="Active";
                                    }
                                    ?>
                                    <br>
                                    <a href="<?=base_url();?>change_rider_status/<?=$profile['id'];?>/<?=$status;?>" class="btn btn-warning btn-sm" onclick="return confirm('Do you wish to change your status?');return false;"><?=$stat;?></a></td>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Basic Information
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#home" data-toggle="tab">Profile</a>
                                        </li>
                                        <li><a href="#profile" data-toggle="tab">Bookings</a>
                                        </li>                                        
                                        <li><a href="#settings" data-toggle="tab">User Account</a>
                                        </li>
                                        <li><a href="#messages" data-toggle="tab">Plate No.</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="home">
                                            <h5>Fullname</h5>
                                            <p><b><?=$profile['fullname'];?></b></p>
                                            <h5>Address</h5>
                                            <p><b><?=$profile['address'];?></b></p>
                                            <h5>Contact No.</h5>
                                            <p><b><?=$profile['contactno'];?></b></p>                                            
                                            <h5>Email Address</h5>
                                            <p><b><?=$profile['email'];?></b></p>
                                            <h5>Plate No.</h5>
                                            <p><b><?=$profile['plateno'];?></b></p>
                                        </div>
                                        <div class="tab-pane fade" id="profile">
                                            <h4>Booking History</h4>
                                            <table class="table table-striped">
                                                <tr>
                                                    <td>No.</td>
                                                    <td>Rider</td>
                                                    <td>Origin</td>
                                                    <td>Destination</td>
                                                    <td>Date/Time Booked</td>
                                                    <td>Status</td>
                                                </tr>
                                                <?php
                                                $x=1;
                                                foreach($bookings as $item){
                                                    echo "<tr>";
                                                        echo "<td>$x.</td>";
                                                        echo "<td>$item[fullname]</td>";
                                                        echo "<td>$item[loc_origin]</td>";
                                                        echo "<td>$item[loc_destination]</td>";
                                                        echo "<td>".date('m/d/Y',strtotime($item['book_date']))." ".date('h:i A',strtotime($item['book_time']))."</td>";
                                                        echo "<td>$item[status]</td>";
                                                    echo "  </tr>";
                                                    $x++;
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="messages">
                                            <h4>Rider Plate No</h4>
                                            <p>
                                                <table width="100%" border="0">
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            if($profile['plateno_pic']==""){
                                                                ?>
                                                                <a href="#" class="btn btn-primary btn-sm addPlateNo" data-toggle="modal" data-target="#AddPlateNo" data-id="<?=$profile['id'];?>">Add Plate No</a>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <a href="#" class="addPlateNo" data-toggle="modal" data-target="#AddPlateNo" data-id="<?=$profile['id'];?>"><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($profile['plateno_pic']);?>" width='100'></a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>                                                        
                                                    </tr>                                                    
                                                </table>
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="settings">
                                            <h5>Username</h5>
                                            <p><b><?=$profile['username'];?></b></p>
                                            <h5>Paswword</h5>
                                            <p><b><?=$profile['password'];?></b></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    </div>                                          
                </div>        
            </div>
