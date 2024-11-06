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
                        <div class="col-lg-6 col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>Add Reviews/Comments</td>
                                            <td align="right"></td>
                                        </tr>
                                    </table>                                    
                                </div>
                                <?=form_open(base_url()."save_reviews");?>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table width="100%" border="0">
                                            <tr>
                                                <td><textarea name="message" class="form-control" rows="10"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><input type="submit" class="btn btn-primary" value="Submit"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <?=form_close();?>
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