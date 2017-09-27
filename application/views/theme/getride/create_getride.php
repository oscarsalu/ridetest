        <?php
           if(!empty($_SESSION['obj'])){
              $obj=get_object_vars($_SESSION['obj']); 
           }
           ?>

<!-- Main content -->
	<section class="content">
        <div class="row">
                <div class="col-lg-12">
                <?php if($this->session->flashdata('message')){ ?>
                    <div class="alert alert-info"><?= $this->session->flashdata('message'); ?></div>
                <?php } ?>
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Add Ride<small> Information</small></h5>
                        </div>
                <div class="ibox-content">
                <form id="wizard" class="form-horizontal" method="post" action="<?= site_url('getride/create_getride') ?>">
                <h1>Route</h1>
                 <div class="step-content">
                 <div class="form-group">
					<label class="col-sm-2 control-label">Origin<span style="color:red">*</span></label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="origin" id="getorigin" value="<?php if(!empty($obj['origin'])){ echo $obj['origin'];} ?>" required>
								<span class="alert-msg  error"><?php echo form_error('origin'); ?></span>
							</div>
						</div>
                <div class="form-group">
							<label class="col-sm-2 control-label">Destination<span style="color:red">*</span></label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="destination" id="getdestination" value="<?php if(!empty($obj['destination'])){ echo $obj['destination'];} ?>" required>
								<span class="alert-msg  error"><?php echo form_error('destination'); ?></span>
							</div>
						</div>
                     </div>
                <h1>Vehicle Details</h1>
                <div class="step-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Vehicle Details<small></small></h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="form-group">
								<label class="col-sm-2 control-label">Capacity<span style="color:red">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="capacity" id="capacity" value="<?php if(!empty($obj['capacity'])){ echo $obj['capacity'];} ?>" required>
									<span class="alert-msg  error"><?php echo form_error('capacity'); ?></span>
								</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Vehicle Number<span style="color:red">*</span></label>
									<div class="col-sm-10">
										<input class="form-control" type="text" name="vehiclename" id="vehiclename" value="<?php if(!empty($obj['vehiclename'])){ echo $obj['vehiclename'];} ?>" required>
										<span class="alert-msg  error"><?php echo form_error('vehiclename'); ?></span>
									</div>
								</div>
	                         </div>
                        </div>
                    </div>
                </div>
            </div> 
            <h1>Date & Time</h1>
            <div class="step-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Time<small></small></h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                            <div class="form-group">
				                <label for="dtp_input1" class="col-md-2 control-label">Departer time</label>
				                <div class="col-sm-10">
				                <div class="input-group date form_datetime" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				                    <input class="form-control" type="text"  value="" readonly required>   
				                </div>
				                </div>
								<input type="hidden" id="dtp_input1" name="time" value="" required/><br/>
				            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>              
            </form>
                </div>
                            
                </form>
                </div>
			</div>
		</div>
	</section>
       