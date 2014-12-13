
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> School Manager Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
					<?php
					if($this->session->userdata('status') == 'trial')
					{
					?>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>You are currently on Trial Version. You have <?php $timeLeftInSeconds = $this->session->userdata('stopDate') - $this->session->userdata('loginTimeNow'); $timeLeftInDays = round($timeLeftInSeconds / 86400); echo $timeLeftInDays; ?></strong> days left. Please visit<a href="http://schoolmanager.or.ke"> Schoolmanager.or.ke</a> to get the full version!
                        </div>
					<?php
					}
					?>
					
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>School Manager Software makes management of Student Records a snap.</strong><a href="http://schoolmanager.or.ke" class="alert-link"> Recommend it to a friend</a> 
                        </div>
					
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like School Manager App?</strong> Try out <a href="http://schoolmanager.or.ke" class="alert-link">Our Online Version</a> for additional features!
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>New Admissions</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>admissions/records">
                                <div class="panel-footer">
                                    <span class="pull-left">View Student Records</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-pencil-square-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">2</div>
                                        <div>New Subjects</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>academics/enter_marks/enter_marks">
                                <div class="panel-footer">
                                    <span class="pull-left">Enter Examination Results</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-signal fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">18</div>
                                        <div>Days to End Term</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>academics/reports">
                                <div class="panel-footer">
                                    <span class="pull-left">End Term Reports</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">0</div>
                                        <div>Changes </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>settings/profile">
                                <div class="panel-footer">
                                    <span class="pull-left">Manage  Your Profile</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row 
