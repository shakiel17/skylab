<aside class="sidebar navbar-default" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                                <b>Administrator Module</b>                        
                        </li>
                        <li>
                            <a href="<?=base_url();?>admin_main" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> Bookings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url();?>booking_status/pending">Pending</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>booking_status/confirmed">Confirmed</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>booking_status/completed">Completed</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?=base_url();?>manage_rider"><i class="fa fa-motorcycle fa-fw"></i> Riders</a>
                        </li>
                        <li>
                            <a href="<?=base_url();?>manage_commuter"><i class="fa fa-users fa-fw"></i> Commuters</a>
                        </li>                        
                    </ul>
                </div>
            </aside>