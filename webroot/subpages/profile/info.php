<div class="row">


                                        <div class="col-md-12">


                                            <div class="portlet box green-haze">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-user"></i>
                                                        <?php echo ucfirst($settings->profile); ?>
                                                    </div>
                                                </div>


                                                <div class="portlet-body">


                                                    <form role="form" action="" method="post">
                                                    <div class="col-md-12">
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Username</label>
                                                            <input <?php echo $is_disabled ?> name="username" type="text" class="form-control" <?php if(isset($p->username)){?> value="<?php echo $p->username; ?>" <?php } ?> />
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group col-md-12">
                                                            <label class="control-label col-md-12">Profile Type</label>
                                                            <div class="col-md-6">
                                                            <select name="profile_type" <?php echo $is_disabled ?>
                                                                class="form-control member_type">
                                                                <option value="">Select</option>
                                                                <option value="1" <?php if($p->profile_type==1){?> selected="selected" <?php } ?>>Admin</option>
                                                                <option value="2" <?php if($p->profile_type==2){?> selected="selected" <?php } ?>>Recruiter</option>
                                                                <option value="3" <?php if($p->profile_type==3){?> selected="selected" <?php } ?>>External</option>
                                                                <option value="4" <?php if($p->profile_type==4){?> selected="selected" <?php } ?>>Safety</option>
                                                                <option value="5" <?php if($p->profile_type==5){?> selected="selected" <?php } ?>>Driver</option>
                                                                <option value="6" <?php if($p->profile_type==6){?> selected="selected" <?php } ?>>Contact</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6" id="driver_div" style="display: none;">
                                                            <select name="driver" class="form-control select_driver">
                                                                <option value="">Select Driver Type</option>
                                                                <option value="">BC - BC FTL AB/BC</option>
                                                                <option value="">BCI5 - BC FTL I5</option>
                                                                <option value="">BULK</option>
                                                                <option value="">CLIMATE</option>
                                                                <option value="">FTL - SINGLE DIVISION</option>
                                                                <option value="">FTL - TOYOTA SINGLE HRLY</option>
                                                                <option value="">FTL - TOYOTA SINGLE HWY</option>
                                                                <option value="">LCV - LCV UNITS</option>
                                                                <option value="">LOC - LOCAL</option>
                                                                <option value="">SCD - SPECIAL COMMODITIES</option>
                                                                <option value="">SST-SANDRK- OPEN FUEL</option>
                                                                <option value="">SWD-SANDRK</option>
                                                                <option value="">TBL-TRANSBORDER</option>
                                                                <option value="">TEM - TEAM DIVISION</option>
                                                                <option value="">TEM - TOYOTA TEAM</option>
                                                                <option value="">WD - Wind</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Title</label>
                                                            <input <?php echo $is_disabled ?> name="title" type="text"
                                                                                              placeholder="eg. Mr"
                                                                                              class="form-control" <?php if(isset($p->title)){?> value="<?php echo $p->title; ?>" <?php } ?> />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">First Name</label>
                                                            <input <?php echo $is_disabled ?> name="fname" type="text"
                                                                                              placeholder="eg. John"
                                                                                              class="form-control" <?php if(isset($p->fname)){?> value="<?php echo $p->fname; ?>" <?php } ?>/>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Last Name</label>
                                                            <input <?php echo $is_disabled ?> name="lname" type="text"
                                                                                              placeholder="eg. Doe"
                                                                                              class="form-control" <?php if(isset($p->lname)){?> value="<?php echo $p->lname; ?>" <?php } ?>/>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Email</label>
                                                            <input <?php echo $is_disabled ?> name="email" type="text"
                                                                                              placeholder="eg. test@domain.com"
                                                                                              class="form-control" <?php if(isset($p->email)){?> value="<?php echo $p->email; ?>" <?php } ?>/>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Phone Number</label>
                                                            <input <?php echo $is_disabled ?> name="phone" type="text"
                                                                                              placeholder="eg. +1 646 580 6284"
                                                                                              class="form-control" <?php if(isset($p->phone)){?> value="<?php echo $p->phone; ?>" <?php } ?>/>
                                                        </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label col-md-6">Address</label>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="col-md-3">
                                                            <input <?php echo $is_disabled ?> name="address" type="text"
                                                                                              placeholder="Street"
                                                                                              class="form-control" <?php if(isset($p->address)){?> value="<?php echo $p->address; ?>" <?php } ?>/>
                                                            </div>
                                                            <div class="col-md-3">
                                                            <input <?php echo $is_disabled ?>  type="text"
                                                                                              placeholder="City"
                                                                                              class="form-control" <?php if(isset($p->address)){?> value="<?php echo $p->address; ?>" <?php } ?>/>
                                                             </div>
                                                            <div class="col-md-3">
                                                             <input <?php echo $is_disabled ?>  type="text"
                                                                                              placeholder="Province"
                                                                                              class="form-control" <?php if(isset($p->address)){?> value="<?php echo $p->address; ?>" <?php } ?>/>
                                                             </div>
                                                            <div class="col-md-3">
                                                             <input <?php echo $is_disabled ?>  type="text"
                                                                                              placeholder="Country"
                                                                                              class="form-control" <?php if(isset($p->address)){?> value="<?php echo $p->address; ?>" <?php } ?>/>                                
                                                        </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                        
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label">Driver License #</label>
                                                                <input <?php echo $is_disabled ?> name="driver_license_no" type="text" class="form-control" <?php if(isset($p->driver_license_no)){?> value="<?php echo $p->driver_license_no; ?>" <?php } ?> />
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label">Province (Driver's License was issued)</label>
                                                                <input <?php echo $is_disabled ?> name="driver_province" type="text" class="form-control" <?php if(isset($p->driver_province)){?> value="<?php echo $p->driver_province; ?>" <?php } ?> />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                        
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label">US DOT MC/MX#</label>
                                                                <input <?php echo $is_disabled ?> name="us_dot" type="text" class="form-control" <?php if(isset($p->us_dot)){?> value="<?php echo $p->us_dot; ?>" <?php } ?> />
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                            <div class="form-group col-md-12">
                                                                <label class="control-label">Two Pieces of ID</label>
                                                                <div id="more_id_div">
                                                                    <a href="" id="browse_id" class="btn btn-primary">Browse</a>
                                                                </div>
                                                                      <br /><a href="javascript:void(0);" id="addmore_id" class="btn btn-success">Add More</a>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                            
                                                            <div class="form-group col-md-12">
                                                                <label class="control-label">TransClick submission</label>
                                                            
                                                                <div id="more_trans_div">
                                                                    <a href="" id="browse_trans" class="btn btn-primary">Browse</a>
                                                                </div>
                                                                    <br /><a href="javascript:void(0);" id="addmore_trans" class="btn btn-success">Add More</a>
                                                            </div>
                                                            </div>

                                                        <?php
                                                        if (!isset($disabled)) {
                                                            ?>
                                                            <div class="margiv-top-10">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Save Changes </button>
                                                                <a href="#" class="btn default">
                                                                    Cancel </a>
                                                            </div>
                                                        <?php } ?>
                                                    </form>

                                                    <div class="clearfix"></div>


                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">


                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-user"></i>
                                                        <?php echo ucfirst($settings->profile); ?> Notes
                                                    </div>
                                                </div>


                                                <div class="portlet-body">


                                                    Lorem ipsum set tollaLorem ipsum set tollaLorem ipsum set tollaLorem
                                                    ipsum set tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum
                                                    set tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLsum set tollaLorem ipsum set tollaLorem
                                                    ipsum set tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum
                                                    set tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set tolla
                                                    <div class="clearfix"></div>


                                                </div>
                                            </div>
                                        </div>


                                    </div>

<script>
$(function(){
   
   $('#addmore_id').click(function(){
   $('#more_id_div').append('<div id="append_id"><div class="pad_bot"><a href="" class="btn btn-primary">Browse</a> <a href="javascript:void(0);" id="delete_id_div" class="btn btn-danger">Delete</a></div></div>') 
   }); 
   
   $('#delete_id_div').live('click',function(){
    $(this).closest('#append_id').remove();
   })
   
   $('#addmore_trans').click(function(){
   $('#more_trans_div').append('<div id="append_trans"><div class="pad_bot"><a href="" class="btn btn-primary">Browse</a> <a href="javascript:void(0);" id="delete_trans_div" class="btn btn-danger">Delete</a></div></div>') 
   }); 
   
   $('#delete_trans_div').live('click',function(){
    $(this).closest('#append_trans').remove();
   })
});
</script>