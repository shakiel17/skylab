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
                                            <td>List of Riders</td>
                                            <td align="right"><a href="#" class="btn btn-primary btn-sm addRider" data-toggle="modal" data-target="#ManageRider">Add Rider</a></td>
                                        </tr>
                                    </table>                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>License</th>
                                                    <th>Full Name</th>
                                                    <th>Address</th>
                                                    <th>Contact #</th>
                                                    <th>Plate #</th>
                                                    <th>Status</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $x=1;
                                                foreach($riders as $item){
                                                    if($item['license']==""){
                                                        $license="<a href='#' class='btn btn-info btn-sm addLicense' data-toggle='modal' data-target='#manageLicense' data-id='$item[id]'><i class='fa fa-picture'>Add License</i></a>";
                                                    }else{
                                                        $license="<a href='#' class='addLicense' data-toggle='modal' data-target='#manageLicense' data-id='$item[id]'><img src='data:image/jpg;charset=utf8;base64,".base64_encode($item['license'])."' width='70'></a><br><a href='".base_url()."view_license_image/$item[id]' target='_blank'>View Image</a>";
                                                    }
                                                    echo "<tr>";
                                                        echo "<td align='center'>$x.</td>";
                                                        echo "<td align='center'>$license</td>";
                                                        echo "<td>$item[fullname]</td>";
                                                        echo "<td>$item[address]</td>";
                                                        echo "<td>$item[contactno]</td>";
                                                        echo "<td>$item[plateno]</td>";
                                                        echo "<td>$item[status]</td>";
                                                        echo "<td><a href='#' class='btn btn-warning btn-sm editRider' data-toggle='modal' data-target='#ManageRider' data-id='$item[id]'><i class='fa fa-edit'></i> Edit</a>";
                                                        ?>
                                                        <a href="<?=base_url();?>delete_rider/<?=$item['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this record?');return false;"><i class="fa fa-trash"></i> Delete</a>
                                                        <?php
                                                        echo "</td>";
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