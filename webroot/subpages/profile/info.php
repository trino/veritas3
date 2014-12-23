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
                                                    <div class="form-group col-md-12">
                                                            <label class="control-label col-md-12">Username</label>
                                                    </div>
                                                    <div class="form-group col-md-12">                                                            <div class="col-md-6">

                                                        <input <?php echo $is_disabled ?> name="username" type="text" class="form-control" <?php if(isset($p->username)){?> value="<?php echo $p->username; ?>" <?php } ?> />
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                            <label class="control-label col-md-12">Profile Type</label>
                                                    </div>
                                                    <div class="form-group col-md-12">
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
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Address</label>
                                                            <input <?php echo $is_disabled ?> name="address" type="text"
                                                                                              placeholder="eg. Street, City, Province, Country"
                                                                                              class="form-control" <?php if(isset($p->address)){?> value="<?php echo $p->address; ?>" <?php } ?>/>
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
