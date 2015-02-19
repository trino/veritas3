<style>div {
        border: 0px solid green;
    }</style>

<?php
    $getProfileType = $this->requestAction('profiles/getProfileType/' . $this->Session->read('Profile.id'));
    $sidebar = $this->requestAction("settings/all_settings/" . $this->request->session()->read('Profile.id') . "/sidebar");
    $settings = $this->requestAction('settings/get_settings'); 
    function printoption($option, $selected, $value = "")
    {
        $tempstr = "";
        if ($option == $selected) {
            $tempstr = " selected";
        }
        if (strlen($value) > 0) {
            $value = " value='" . $value . "'";
        }
        echo '<option' . $value . $tempstr . ">" . $option . "</option>";
    }

function printoption2($value, $selected="", $option)
{
    $tempstr = "";
    if ($option == $selected or $value == $selected) { $tempstr = " selected"; }
    echo '<OPTION VALUE="' . $value . '"' . $tempstr . ">" . $option . "</OPTION>";
}

function printoptions($name, $valuearray, $selected="", $optionarray, $isdisabled="", $isrequired=false){
    echo '<SELECT ' . $isdisabled . ' name="' . $name . '" class="form-control member_type"';
    if ($isrequired == 1) { echo ' required="required">';} else { echo '>';}
    for ($temp = 0; $temp < count($valuearray); $temp += 1) {
        printoption2($valuearray[$temp], $selected, $optionarray[$temp]);
    }
    echo '</SELECT>';
}

function printprovinces($name, $selected="", $isdisabled="", $isrequired=false){
    printoptions($name, array("", "AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT"), $selected, array("Select Province", "Alberta", "British Columbia", "Manitoba", "New Brunswick", "Newfoundland and Labrador", "Northwest Territories", "Nova Scotia", "Nunavut", "Ontario", "Prince Edward Island", "Quebec", "Saskatchewan", "Yukon Territories"),  $isdisabled, $isrequired );

}
?>

<!-- removed tab
<ul class="nav nav-tabs">
    <li class="active">
        <a href="#subtab_4_1" data-toggle="tab">Info</a>
    </li>
    <!--<li class="">
        <a href="#subtab_4_2" data-toggle="tab">Picture</a>
    </li>-->
    <?php
        //if ($this->request['action'] == 'edit') {
    ?>
    <!--
                <li>
                    <a href="#subtab_4_3" data-toggle="tab">Password</a>
                </li>-->
    <?php
        //}
    ?>
<!-- </ul> --><!-- BEGIN PORTLET-->
<!--
<div class="portlet box green-haze">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-briefcase"></i>Settings
        </div>
    </div>
    -->
    <div class="portlet-body">

<div class="tab-content">
    <div class="tab-pane active" id="subtab_4_1">


        <div class="portlet box form">

            
            <form role="form" action="" method="post" id="save_clientz" >
                <input type="hidden" name="client_ids" value="" class="client_profile_id"/>
                <input type="hidden" name="drafts" value="0" id="profile_drafts" />
                <div class="row">
                <input type="hidden" name="created_by" value="<?php echo $this->request->session()->read('Profile.id') ?>"/>
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><?php echo ucfirst($settings->profile); ?> Type</label>


                            <select  <?php echo $is_disabled ?>
                                name="profile_type" <?php if (isset($id) && $this->request->session()->read('Profile.id') == $id) echo "disabled='disabled'"; ?>
                                class="form-control member_type" required='required'>
                                <option value="">Select</option>
                                <?php

                                if ($this->request->session()->read('Profile.super')) {
                                    ?>
                                    <option value="1" <?php if (isset($p) && $p->profile_type == 1) { ?> selected="selected" <?php } ?>>
                                        Admin
                                    </option>
                                <?php }

                                $isISB = (isset($sidebar) && $settings->client_option == 0);
                                if ($isISB){
                                ?>


                                <option value="2" <?php if (isset($p) && $p->profile_type == 2) { ?> selected="selected" <?php }
                                if (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1 && $getProfileType->admin != 1 && $getProfileType->super != 1) { ?> disabled="disabled"
                                <?php } ?>>
                                    Recruiter
                                </option>

                                <option value="3" <?php if (isset($p) && $p->profile_type == 3) { ?> selected="selected" <?php }
                                if (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1 && $getProfileType->admin != 1 && $getProfileType->super != 1) { ?> disabled="disabled"
                                <?php } ?>>
                                    External
                                </option>

                                <option value="4" <?php if (isset($p) && $p->profile_type == 4) { ?> selected="selected" <?php }
                                if (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1 && $getProfileType->admin != 1 && $getProfileType->super != 1) { ?> disabled="disabled"
                                <?php } ?>>
                                    Safety
                                </option>

                                <option value="5" <?php if ((isset($p) && $p->profile_type == 5) || (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1 && $getProfileType->profile_type == 2)) { ?> selected="selected" <?php } ?>>
                                    Driver
                                </option>

                                <option value="6" <?php if (isset($p) && $p->profile_type == 6) { ?> selected="selected" <?php }
                                if (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1) { ?> disabled="disabled"
                                <?php } ?>>
                                    Contact
                                </option>

                                <option value="7" <?php if (isset($p) && $p->profile_type == 7) { ?> selected="selected" <?php } if (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1) { ?> disabled="disabled"
                                <?php }?>>
                                    Owner Operator
                                </option>

                                <option value="8" <?php if (isset($p) && $p->profile_type == 8) { ?> selected="selected" <?php } if (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1) { ?> disabled="disabled"
                                <?php } ?>>
                                    Owner Driver
                                </option> 

                                <?php } else { ?>

                                    <option value="9" <?php if (isset($p) && $p->profile_type == 9) { ?> selected="selected" <?php }
                                if (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1) { ?> disabled="disabled" <?php } ?>>
                                        Employee
                                    </option>
                                    <option value="10" <?php if (isset($p) && $p->profile_type == 10) { ?> selected="selected" <?php }
                                if (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1) { ?> disabled="disabled" <?php } ?>>
                                        Guest
                                    </option>
                                    <option value="11" <?php if (isset($p) && $p->profile_type == 11) { ?> selected="selected" <?php }
                                if (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1) { ?> disabled="disabled" <?php } ?> >
                                        Partner
                                    </option>

                                <?php } ?>


                            </select>
                        </div>
                    </div>
                    <?php // if ($settings->client_option == 0) { ?>
                    
                    <div class="col-md-6" id="driver_div"
                         style="display:<?php if ((isset($p) && $p->profile_type == 5) || (isset($getProfileType->profile_type) && $getProfileType->profile_type != 1)) echo 'block'; else echo "none" ?>;">
                        <div class="form-group">
                            <label class="control-label">Driver Type</label>
                            <select  <?php echo $is_disabled ?> name="driver" class="form-control select_driver req_driver">
                                <option value="">Select Driver Type</option>
                                <option
                                    value="1" <?php if (isset($p) && $p->driver == 1) echo "selected='selected'"; ?>
                                    >BC - BC FTL AB/BC
                                </option>
                                <option value="2"
                                    <?php if (isset($p) && $p->driver == 2) echo "selected='selected'"; ?>>
                                    BCI5 - BC FTL I5
                                </option>
                                <option value="3"
                                    <?php if (isset($p) && $p->driver == 3) echo "selected='selected'"; ?>>
                                    BULK
                                </option>
                                <option value="4"
                                    <?php if (isset($p) && $p->driver == 4) echo "selected='selected'"; ?>>
                                    CLIMATE
                                </option>
                                <option value="5"
                                    <?php if (isset($p) && $p->driver == 5) echo "selected='selected'"; ?>>
                                    FTL - SINGLE DIVISION
                                </option>
                                <option value="6"
                                    <?php if (isset($p) && $p->driver == 6) echo "selected='selected'"; ?>>
                                    FTL - TOYOTA SINGLE HRLY
                                </option>
                                <option value="7"
                                    <?php if (isset($p) && $p->driver == 7) echo "selected='selected'"; ?>>
                                    FTL - TOYOTA SINGLE HWY
                                </option>
                                <option value="8"
                                    <?php if (isset($p) && $p->driver == 8) echo "selected='selected'"; ?>>
                                    LCV - LCV UNITS
                                </option>
                                <option value="9"
                                    <?php if (isset($p) && $p->driver == 9) echo "selected='selected'"; ?>>
                                    LOC - LOCAL
                                </option>
                                <option value="10"
                                    <?php if (isset($p) && $p->driver == 10) echo "selected='selected'"; ?>>
                                    OWNER - OPERATOR
                                </option>
                                <option value="11"
                                    <?php if (isset($p) && $p->driver == 11) echo "selected='selected'"; ?>>
                                    OWNER - DRIVER
                                </option>
                                <option value="12"
                                    <?php if (isset($p) && $p->driver == 12) echo "selected='selected'"; ?>>
                                    SCD - SPECIAL COMMODITIES
                                </option>
                                <option value="13"
                                    <?php if (isset($p) && $p->driver == 13) echo "selected='selected'"; ?>>
                                    SST-SANDRK- OPEN FUEL
                                </option>
                                <option value="14"
                                    <?php if (isset($p) && $p->driver == 14) echo "selected='selected'"; ?>>
                                    SWD-SANDRK
                                </option>
                                <option value="15"
                                    <?php if (isset($p) && $p->driver == 15) echo "selected='selected'"; ?>>
                                    TBL-TRANSBORDER
                                </option>
                                <option value="16"
                                    <?php if (isset($p) && $p->driver == 16) echo "selected='selected'"; ?>>
                                    TEM - TEAM DIVISION
                                </option>
                                <option value="17"
                                    <?php if (isset($p) && $p->driver == 17) echo "selected='selected'"; ?>>
                                    TEM - TOYOTA TEAM
                                </option>
                                <option value="18"
                                    <?php if (isset($p) && $p->driver == 18) echo "selected='selected'"; ?>>
                                    WD - Wind
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php //}?>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input <?php echo $is_disabled ?> name="username" type="text"
                                                              class="form-control uname" <?php if (isset($p->username)) { ?> value="<?php echo $p->username; ?>" <?php } ?> required />
                            <span class="error passerror flashUser"
                                  style="display: none;">Username already exists</span>
                            <span class="error passerror flashUser1"
                                  style="display: none;">Username is required.</span>
                        </div>
                    </div>
                    <div class="clearfix flashUser" style="display: none;">
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input <?php echo $is_disabled ?> required="required" name="email" type="email"
                                                              placeholder="eg. test@domain.com"
                                                              class="form-control un email" <?php if (isset($p->email)) { ?> value="<?php echo $p->email; ?>" <?php } ?>/>
                            <span class="error passerror flashEmail"
                                  style="display: none;">Email already exists</span>
                        </div>
                    </div>
                    <div class="clearfix flashEmail" style="display: none;">
                    </div>
                    

                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input  <?php echo $is_disabled ?> type="password" name="password" id="password" class="form-control"
                                   <?php // if (isset($p->password)){ ?><?php //echo $p->password; ?> <?php //} ?>
                                   <?php if (isset($p->password) && $p->password){//do nothing 
                                   }else{?>required="required"<?php }?>/>
                        </div>
                    </div>
                    <?php if (isset($p->password)){ ?>
                    <input type="hidden" value="<?php $p->password ?>" name="hid_pass" />
                    <?php } ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Re-type Password</label>
                            <input  <?php echo $is_disabled ?> type="password" class="form-control"
                                   id="retype_password" <?php //if (isset($p->password)) { ?> <?php // echo $p->password; ?>  <?php // } ?>/>
                            <span class="error passerror flashPass1"
                                  style="display: none;">Please enter same password</span>
                        </div>
                    </div>
                    

                    <div class="clearfix">
                    </div>
                    <?php if ($settings->client_option == 0) { ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Title</label><BR>
                            <SELECT <?php echo $is_disabled ?> name="title" class="form-control "><?php
                                    
                                    if (isset($p->title)) {
                                        $title = $p->title;
                                    }
                                    else
                                        $title = "";
                                    printoption("Mr.", $title, "Mr.");
                                    printoption("Mrs.", $title, "Mrs.");
                                    printoption("Ms.", $title, "Ms.");
                                ?></SELECT>

                            <!--
                                                                <input < php echo $is_disabled ?> name="title" type="text"
                                                                                                  placeholder="eg. Mr"
                                                                                                  class="form-control req_driver" < php if (isset($p->title)) { ?> value="< php echo $p->title; ?>" < php } ?> /> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="control-label">First Name</label>
                            <input <?php echo $is_disabled ?> name="fname" type="text" required="required"
                                                              placeholder="eg. John"
                                                              class="form-control req_driver" <?php if (isset($p->fname)) { ?> value="<?php echo $p->fname; ?>" <?php } ?>/>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="control-label">Middle Name</label>
                            <input <?php echo $is_disabled ?> name="mname" type="text"
                                                              placeholder="eg. Lee"
                                                              class="form-control" <?php if (isset($p->mname)) { ?> value="<?php echo $p->mname; ?>" <?php } ?>/>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input <?php echo $is_disabled ?> name="lname" type="text" required="required"
                                                              placeholder="eg. Doe"
                                                              class="form-control req_driver" <?php if (isset($p->lname)) { ?> value="<?php echo $p->lname; ?>" <?php } ?>/>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="control-label">Phone Number</label>
                            <input <?php echo $is_disabled ?> name="phone" type="text"
                                                              placeholder="eg. +1 646 580 6284"
                                                              class="form-control req_driver" <?php if (isset($p->phone)) { ?> value="<?php echo $p->phone; ?>" <?php } ?>/>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="control-label">Gender</label>
                            <SELECT <?php echo $is_disabled ?> name="gender" class="form-control "><?php
                                    $gender = "";
                                    if (isset($p->gender)) {
                                        $gender = $p->gender;
                                    }
                                    echo '<!-- selected option is ' . $gender . '-->';
                                    printoption("Select Gender", "");
                                    printoption("Male", $gender, "Male");
                                    printoption("Female", $gender, "Female");
                                ?></SELECT>
                        </div>
                    </div>
                   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">ISB Id</label>
                                <input <?php echo $is_disabled ?>  <?php if (isset($id) && $this->request->session()->read('Profile.id') == $id) echo "disabled='disabled'"; ?>
                                    name="isb_id" type="text"
                                    placeholder="optional"
                                    class="form-control req_rec" <?php if (isset($p->isb_id)) { ?> value="<?php echo $p->isb_id; ?>" <?php } ?>  />
                            </div>
                        </div>
                    

                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">Place of Birth</label>
                            <input <?php echo $is_disabled ?> name="placeofbirth" type="text" required="required"
                                                              placeholder=""
                                                              class="form-control" <?php if (isset($p->placeofbirth)) { ?> value="<?php echo $p->placeofbirth; ?>" <?php } ?>/>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label class="control-label">Date of Birth (YYYY-MM-DD)</label><BR>

                            <div class="row">


                                <div class="col-md-4 no-margin">
                                    <?php

                                        


                                        $currentyear = "0000";
                                        $currentmonth = 0;
                                        $currentday = 0;

                                        if (isset($p->dob)) {
                                            $currentyear = substr($p->dob, 0, 4);
                                            $currentmonth = substr($p->dob, 5, 2);
                                            $currentday = substr($p->dob, -2);
                                        }


                                        echo '<select class="form-control req_driver " NAME="doby" ' . $is_disabled . ' required="required">';

                                        $now = date("Y");
                                        for ($temp = $now; $temp > 1899; $temp -= 1) {
                                            printoption($temp, $currentyear, $temp);
                                        }
                                        echo '</select></div><div class="col-md-4">';


                                        echo '<select  class="form-control req_driver " NAME="dobm" ' . $is_disabled . ' required="required">';
                                        $monthnames = array("Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec");
                                        for ($temp = 1; $temp < 13; $temp += 1) {
                                            if ($temp < 10)
                                                $temp = "0" . $temp;
                                            printoption($temp, $currentmonth, $temp);
                                        }
                                        echo '</select></div><div class="col-md-4">';


                                        echo '<select class="form-control req_driver " name="dobd" ' . $is_disabled . ' required="required">';
                                        for ($temp = 1; $temp < 32; $temp++) {
                                            if ($temp < 10)
                                                $temp = "0" . $temp;
                                            printoption($temp, $currentday, $temp);
                                        }

                                        echo '</select></div>';
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h3 class="block">Address</h3>
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="form-group">
                                <input <?php echo $is_disabled ?> name="street" type="text"
                                                                  placeholder="Street"
                                                                  class="form-control req_driver" <?php if (isset($p->street)) { ?> value="<?php echo $p->street; ?>" <?php } ?>/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <input <?php echo $is_disabled ?> name="city" type="text"
                                                                  placeholder="City"
                                                                  class="form-control req_driver" <?php if (isset($p->city)) { ?> value="<?php echo $p->city; ?>" <?php } ?>/>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php 
                                if(isset($p->province))
                                printprovinces("province", $p->province, $is_disabled, false );
                                else
                                printprovinces("province", "", $is_disabled , false);
                                ?>

                                <!-- old
                                <SELECT  < php echo $is_disabled ?> name="province" class="form-control ">< php
                                        $provinces = array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT");
                                        $province = "";
                                        if (isset($p->province)) {
                                            $province = $p->province;
                                        }
                                        for ($temp = 0; $temp < count($provinces); $temp += 1) {
                                            printoption($provinces[$temp], $province, $provinces[$temp]);
                                        }
                                    ?></SELECT>
                                        <input < php echo $is_disabled ?> name="province" type="text"
                                                                           placeholder="Province"
                                                                           class="form-control req_driver" < php if (isset($p->province)) { ?> value="< php echo $p->province; ?>" < php } ?>/> -->
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <input <?php echo $is_disabled ?>  type="text"
                                                                   placeholder="Postal code"
                                                                   class="form-control req_driver"
                                                                   name="postal"  <?php if (isset($p->postal)) { ?> value="<?php echo $p->postal; ?>" <?php } ?>/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <input <?php echo $is_disabled ?>  type="text"
                                                                   placeholder="Country" value="Canada"
                                                                   class="form-control req_driver"
                                                                   name="country" <?php if (isset($p->country)) { ?> value="<?php echo $p->country; ?>" <?php } ?>/>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <h3 class="block">Driver's License</h3></div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Driver License #</label>
                                <input <?php echo $is_disabled ?> name="driver_license_no" type="text" required="required"
                                                                  class="form-control req_driver" <?php if (isset($p->driver_license_no)) { ?> value="<?php echo $p->driver_license_no; ?>" <?php } ?> />
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Province issued</label>
                                
                                <?php 
                                if(isset($p->driver_province))
                                printprovinces("driver_province", $p->driver_province, $is_disabled, true );
                                else
                                printprovinces("driver_province", "", $is_disabled,  true );
                                 ?>
                                <!-- old
                                <SELECT  < php echo $is_disabled ?> name="driver_province" class="form-control ">< php
                                        $provinces = array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT");
                                        $province = "";
                                        if (isset($p->driver_province)) {
                                            $driver_province = $p->driver_province;
                                        }
                                        for ($temp = 0; $temp < count($provinces); $temp += 1) {
                                            printoption($provinces[$temp], $driver_province, $provinces[$temp]);
                                        }
                                    ?></SELECT> -->

                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Expiry Date</label>
                                <input <?php echo $is_disabled ?> name="expiry_date" type="text"
                                                                  class="form-control req_driver date-picker" <?php if (isset($p->expiry_date)) { ?> value="<?php echo $p->expiry_date; ?>" <?php } ?> />

                            </div>
                        </div>
                        <?php }
                        else
                        {?>
                            <input type="hidden" name="doby" value="0000"/> 
                            <input type="hidden" name="dobm" value="00"/> 
                            <input type="hidden" name="dobd" value="00"/>    
                        <?php
                        }
                        ?>




                        <?php /*  <div class="col-md-12">

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
                                                */ ?>
                        <?php
                            if (!isset($disabled)) {
                                ?>
                                <div class="col-md-12">

                                    <div class="margin-top-10 form-actions">
                                        <a href="javascript:void(0)" class="btn btn-primary"
                                           onclick="return check_username();" id="savepro">
                                            Save Changes
                                        </a>
                                        <button class="btn btn-primary" onclick="$('#profile_drafts').val('1'); $('#save_clientz').attr('novalidate','novalidate');$('#hiddensub').click();">Save As Draft</button>
                                        <input type="submit" style="display: none;" id="hiddensub"/>
                                    </div>
                                    <div class="clearfix"></div>
                                                            <div class="margin-top-10 alert alert-success display-hide flash" style="display: none;">
                                                                <button class="close" data-close="alert"></button>
                                                                Profile saved successfullly
                                                            </div>
                                </div>
                            <?php } ?>


            </form>

            <div class="clearfix"></div>


        </div>


    </div>


</div>
<?php
    if ($this->request->params['action'] == 'edit') {
        ?>


        <!-- <div class="tab-pane" id="subtab_4_2">
                <?php include('avatar.php'); ?>
            </div>



        <div class="tab-pane" id="subtab_4_3">
            <?php include('password.php'); ?>
        </div>-->

    <?php
    } else {
        ?>

        <!-- <div class="tab-pane" id="subtab_4_2">
             <p>Please save info first.</p>
         </div>-->

        <div class="tab-pane" id="subtab_4_3">
            <p>Please save info first.</p>
        </div>

    <?php
    }
?>





</div>
<script>
    function check_username() {
        if ($('#retype_password').val() == $('#password').val()) {
            var client_id = $('.client_profile_id').val();
            if (client_id == "") {
                /*
                 alert('Please Assign atleat one client to the profile.');
                 $('html,body').animate({
                 scrollTop: $('.page-title').offset().top},
                 'slow');
                 return false;
                 */
            }
            var un = $('.uname').val();
            
            $.ajax({
                url: '<?php echo $this->request->webroot;?>profiles/check_user/<?php echo $uid;?>',
                data: 'username=' + $('.uname').val(),
                type: 'post',
                success: function (res) {
                    if (res == '1') {
                        //alert(res);
                        $('.flashUser').show();
                        
                        $('.uname').focus();
                        $('html,body').animate({
                                scrollTop: $('.page-title').offset().top
                            },
                            'slow');
                            
                        return false;
                    }
                    else {
                        $('.flashUser').hide();
                        if($('.email').val()!=''){
                                    var un = $('.email').val();
                                    $.ajax({
                                        url: '<?php echo $this->request->webroot;?>profiles/check_email/<?php echo $uid;?>',
                                        data: 'email=' + $('.email').val(),
                                        type: 'post',
                                        success: function (res) {
                                            if (res == '1') {
                                                $('.email').focus();
                                                $('.flashEmail').show();
                                                $('html,body').animate({
                                scrollTop: $('.page-title').offset().top
                            },
                            'slow');
                                                    
                                                return false;
                                            }
                                            else {
                                                $(this).attr('disabled','disabled');
                                                $('#hiddensub').click();
                                            }
                                        }
                                    });
                        }
                        else
                        $('#hiddensub').click();
                    }
                }
            });
            
            
            
           
        }
        else {
            $('#retype_password').focus();
            $('html,body').animate({
                    scrollTop: $('.page-title').offset().top
                },
                'slow');
            $('.flashPass1').show();
            //$('.flashPass1').fadeOut(7000000);
            return false;
        }

    }
    $(function () {
        $('#save_clientz').submit(function(event){
             event.preventDefault();
             $('#savepro').text("Saving...");
           var strs = $(this).serialize();
           var adds = "<?php echo ($this->request['action']=='add')?'0':$this->request['pass'][0];?>";
           $.ajax({
                url: '<?php echo $this->request->webroot;?>profiles/saveprofile/'+adds,
                data: strs,
                type: 'post',
                success: function (res) {
                        if(res !=0)
                        {
                            $('#savepro').text("Save Changes");
                            $('.flash').show();
                            $('.flash').fadeOut(3500);
                            window.location.href='<?php echo $this->request->webroot;?>profiles/edit/'+res;
                        }
                }

           });
           
           return false;
            
        });
        $('#addmore_id').click(function () {
            $('#more_id_div').append('<div id="append_id"><div class="pad_bot"><a href="" class="btn btn-primary">Browse</a> <a href="javascript:void(0);" id="delete_id_div" class="btn btn-danger">Delete</a></div></div>')
        });

        $('#delete_id_div').live('click', function () {
            $(this).closest('#append_id').remove();
        })

        $('#addmore_trans').click(function () {
            $('#more_trans_div').append('<div id="append_trans"><div class="pad_bot"><a href="" class="btn btn-primary">Browse</a> <a href="javascript:void(0);" id="delete_trans_div" class="btn btn-danger">Delete</a></div></div>')
        });

        $('#delete_trans_div').live('click', function () {
            $(this).closest('#append_trans').remove();
        })

        $('.member_type').change(function () {
            if ($(this).val() == '5') {
                $('.nav-tabs li:not(.active)').each(function () {
                    $(this).hide();
                });
                $('#driver_div').show();
                $('.un').removeProp('required');
                $('#password').removeProp('required');
                $('#retype_password').removeProp('required');
                $('.req_rec').removeProp('required');
                $('.req_driver').prop('required', "required");
            }
            else {
                $('.nav-tabs li:not(.active)').each(function () {
                    $(this).show();
                });
                $('#driver_div').hide();
                $('.req_driver').removeProp('required');
                $('.req_rec').removeProp('required');
                $('.un').prop('required', "required");
                <?php
                if(isset($p->password) && $p->password)
                {
                    //do nth
                }
                else{
                    ?>
                    
                $('#password').prop('required', "required");
                $('#retype_password').prop('required', "required");
                <?php
                }
                 ?>
            }

            if ($(this).val() == '2') {
                $('.req_driver').removeProp('required');
                $('.un').removeProp('required');
                $('.req_rec').prop('required', "required");
            }

        });
    });
</script>

</div>

<!-- </div> END PORTLET-->