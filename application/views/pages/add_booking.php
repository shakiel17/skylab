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
                        <?php
                            foreach($riders as $item){
                        ?>
                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                <div class="icon">
                                        <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($item['license']);?>" width='200'></a>                                    
                                </div>
                                <div class="text">
                                    <i class="fa fa-user"></i> <label class="text-muted"><?=$item['fullname'];?></label><br>                                    
                                    <i class="fa fa-phone"></i> <label class="text-muted"><?=$item['contactno'];?></label><br>                                    
                                    <i class="fa fa-motorcycle"></i> <label class="text-muted"><?=$item['plateno'];?></label><br>
                                </div>
                                <div class="options">
                                    <a href="#" class="btn btn-primary addBooking" data-toggle="modal" data-target="#addBooking" data-id="<?=$commuter_id;?>_<?=$item['id'];?>"><i class="glyphicon glyphicon-edit"></i> Select Rider</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>                                          
                </div>        
            </div>