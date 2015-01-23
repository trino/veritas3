<?php
$getProfileType = $this->requestAction('profiles/getProfileType/'.$this->Session->read('Profile.id'));
?>
<ul class="nav nav-tabs">
    <li class="active">
        <a href="#subtab_4_1" data-toggle="tab">Info</a>
    </li>
    <!--<li class="">
        <a href="#subtab_4_2" data-toggle="tab">Picture</a>
    </li>-->
    <?php
        if($this->request['action']=='edit')
        {
            ?>
           
    <li>
        <a href="#subtab_4_3" data-toggle="tab">Password</a>
    </li>
     <?php
        }
     ?>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="subtab_4_1">
        <div class="row">


            <div class="col-md-12">


                <div class="portlet box form">
                   



                        <form role="form" action="" method="post">

                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <input <?php echo $is_disabled ?> name="username" type="text"
                                                                      class="form-control un" <?php if (isset($p->username)) { ?> value="<?php echo $p->username; ?>" <?php } ?> required="required" />
                                </div>
                            </div>

                                <div class="col-md-6">
                                    <div class="form-group">                                    
                                    <label class="control-label">Email</label>
                                        <input <?php echo $is_disabled ?> name="email" type="text"
                                                                          placeholder="eg. test@domain.com"
                                                                          class="form-control un" <?php if (isset($p->email)) { ?> value="<?php echo $p->email; ?>" <?php } ?>/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                <label class="control-label">Profile Type</label>


                                    <select name="profile_type" <?php if(isset($id) && $this->request->session()->read('Profile.id')==$id) echo "disabled='disabled'"; ?>
                                            class="form-control member_type" required='required' >
                                        <option value="">Select</option>
                                        <?php
                                         
                                         if ($this->request->session()->read('Profile.super'))
                                         {
                                         ?>
                                        <option value="1" <?php if ($p->profile_type == 1) { ?> selected="selected" <?php } ?>>
                                            Admin
                                        </option>
                                        <?php }?>
                                        <option
                                            value="2" <?php if ($p->profile_type == 2) { ?> selected="selected" <?php }
                                             if($getProfileType->profile_type == 2)
                                             {
                                                ?> disabled="disabled"
                                                <?php
                                             } ?>>
                                            Recruiter
                                        </option>
                                        <option
                                            value="3" <?php if ($p->profile_type == 3) { ?> selected="selected" <?php }
                                            if($getProfileType->profile_type == 2)
                                             {
                                                ?> disabled="disabled"
                                                <?php
                                             }
                                             ?>>
                                            External
                                        </option>
                                        <option
                                            value="4" <?php if ($p->profile_type == 4) { ?> selected="selected" <?php }
                                            if($getProfileType->profile_type == 2)
                                             {
                                                ?> disabled="disabled"
                                                <?php
                                             }
                                             ?>>
                                            Safety
                                        </option>
                                        <option
                                            value="5" <?php if ($p->profile_type == 5) { ?> selected="selected" <?php } ?>>
                                            Driver
                                        </option>
                                        <option
                                            value="6" <?php if ($p->profile_type == 6) { ?> selected="selected" <?php }
                                            if($getProfileType->profile_type == 2)
                                             {
                                                ?> disabled="disabled"
                                                <?php
                                             }
                                             ?>>
                                            Contact
                                        </option>

                                        <option
                                            value="7" <?php if ($p->profile_type == 7) { ?> selected="selected" <?php }
                                            if($getProfileType->profile_type == 2)
                                            {
                                                ?> disabled="disabled"
                                            <?php
                                            }
                                        ?>>
                                            Owner Operator
                                        </option>

                                        <option
                                            value="8" <?php if ($p->profile_type ==8) { ?> selected="selected" <?php }
                                            if($getProfileType->profile_type == 2)
                                            {
                                                ?> disabled="disabled"
                                            <?php
                                            }
                                        ?>>
                                            Owner Driver
                                        </option>
                                    </select>
                                </div>
                                </div>



                                <div class="col-md-6" id="driver_div" style="display:<?php if(isset($p)&& $p->profile_type != 5)echo 'none';?>;">
                                    <div class="form-group">
                                        <label class="control-label">Driver Type</label>

                                    <select name="driver" class="form-control select_driver">
                                        <option value="">Select Driver Type</option>
                                     <option value="1" <?php if($p->driver==1)echo "selected='slected'";?> class="req_driver">BC - BC FTL AB/BC</option>
                                        <option value="2" <?php if($p->driver==2)echo "selected='slected'";?>class="req_driver">BCI5 - BC FTL I5</option>
                                        <option value="3" <?php if($p->driver==3)echo "selected='slected'";?>class="req_driver">BULK</option>
                                        <option value="4" <?php if($p->driver==4)echo "selected='slected'";?>class="req_driver">CLIMATE</option>
                                        <option value="5" <?php if($p->driver==5)echo "selected='slected'";?>class="req_driver">FTL - SINGLE DIVISION</option>
                                        <option value="6" <?php if($p->driver==6)echo "selected='slected'";?>class="req_driver">FTL - TOYOTA SINGLE HRLY</option>
                                        <option value="7" <?php if($p->driver==7)echo "selected='slected'";?>class="req_driver">FTL - TOYOTA SINGLE HWY</option>
                                        <option value="8" <?php if($p->driver==8)echo "selected='slected'";?>class="req_driver">LCV - LCV UNITS</option>
                                        <option value="9" <?php if($p->driver==9)echo "selected='slected'";?>class="req_driver">LOC - LOCAL</option>
                                        <option value="" class="req_driver">OWNER - OPERATOR</option>
                                        <option value="" class="req_driver">OWNER - DRIVER</option>
                                        <option value="10" <?php if($p->driver==10)echo "selected='slected'";?>class="req_driver">SCD - SPECIAL COMMODITIES</option>
                                        <option value="11" <?php if($p->driver==11)echo "selected='slected'";?>class="req_driver">SST-SANDRK- OPEN FUEL</option>
                                        <option value="12" <?php if($p->driver==12)echo "selected='slected'";?>class="req_driver">SWD-SANDRK</option>
                                        <option value="13" <?php if($p->driver==13)echo "selected='slected'";?>class="req_driver">TBL-TRANSBORDER</option>
                                        <option value="14" <?php if($p->driver==14)echo "selected='slected'";?>class="req_driver">TEM - TEAM DIVISION</option>
                                        <option value="15" <?php if($p->driver==15)echo "selected='slected'";?>class="req_driver">TEM - TOYOTA TEAM</option>
                                        <option value="16" <?php if($p->driver==16)echo "selected='slected'";?>class="req_driver">WD - Wind</option>
                                    </select>
                                </div>
                                </div>
                                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Title</label><BR>
                            <SELECT <?php echo $is_disabled ?> name="title" class="form-control member_type" ><?php
                                    $title = "";
                                    if (isset($p->title)) { $title = $p->title;}
                                    printoption("Mr.", $title, "Mr");
                                    printoption("Mrs.", $title, "Mrs");
                                    printoption("Ms.", $title, "Ms");
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
                                    <input <?php echo $is_disabled ?> name="fname" type="text"
                                                                      placeholder="eg. John"
                                                                      class="form-control req_driver" <?php if (isset($p->fname)) { ?> value="<?php echo $p->fname; ?>" <?php } ?>/>
                                </div>
                            </div>



                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="control-label">Middle Name</label>
                            <input <?php echo $is_disabled ?> name="mname" type="text"
                                                              placeholder="eg. Lee"
                                                              class="form-control req_driver" <?php if (isset($p->mname)) { ?> value="<?php echo $p->mname; ?>" <?php } ?>/>
                        </div>
                    </div>





                </div>

                            <div class="row">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Last Name</label>
                                        <input <?php echo $is_disabled ?> name="lname" type="text"
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

                            </div>

                            <div class="row">


                            <div class="col-md-4">
                                <div class="form-group">




                                    <label class="control-label">Date of Birth</label>
                                    <input <?php echo $is_disabled ?> name="dob" type="text"
                                                                      placeholder="eg. 1975-12-31"
                                                                      class="form-control req_driver date-picker" <?php if (isset($p->dob)) { ?> value="<?php echo $p->dob; ?>" <?php } ?>/>
                                </div>


                                <div class="form-group">

                                    <label class="control-label">Date of Birth (Year, Month, Day)</label><BR>
                                    <?php
                                        function printoption($option, $selected, $value=""){
                                            $tempstr = "";
                                            if ($option == $selected) { $tempstr = " selected";}
                                            if (strlen($value) > 0) { $value = " value='" . $value . "'";}
                                            echo '<OPTION' . $value . $selected . ">" . $option . "</OPTION>";
                                        }

                                        $currentyear = "0000";
                                        $currentmonth = 0;
                                        $currentday = 0;
                                        if (isset($p->dob)) {
                                            $currentyear = substr($p->dob, 0, 4);
                                            $currentmonth = substr($p->dob, 5, 2);
                                            $currentday = substr($p->dob, -2);
                                        }
                                        echo '<SELECT class="form-control req_driver date-picker" NAME="doby" ' . $is_disabled  . '>';
                                        $now = date("Y");
                                        for ($temp=$now; $temp>1899; $temp-=1){
                                            printoption($temp, $currentyear, $temp);
                                        }
                                        echo '</SELECT> <SELECT  class="form-control req_driver date-picker" NAME="dobm" ' . $is_disabled  . '>';
                                        $monthnames = array("Jan", "Feb", "Mar", "Apr","May","June","July","Aug","Sept","Oct","Nov","Dec");
                                        for($temp=1; $temp<13; $temp+=1){
                                            printoption($temp, $currentmonth, $temp);
                                        }
                                        echo '</SELECT> <Select  class="form-control req_driver date-picker" name="dobd" ' . $is_disabled  . '><?php';
                                        for($temp=1; $temp<32; $temp+=1){
                                            printoption($temp, $currentday, $temp);
                                        }
                                    ?></Select>
                                </div>


                            </div>


                            <div class="col-md-4">
                                <div class="form-group">

                                    <label class="control-label">Gender</label><BR>
                                    <SELECT <?php echo $is_disabled ?> name="gender" class="form-control member_type" ><?php
                                            $gender = "";
                                            if (isset($p->gender)) { $gender = $p->gender;}
                                            printoption("M", $gender, "M");
                                            printoption("F", $gender, "F");
                                    ?></SELECT>

<!--
                                    <input < php echo $is_disabled ?> name="gender" type="text"
                                                                      placeholder="eg. M"
                                                                      class="form-control req_driver" < php if (isset($p->gender)) { ?> value="< php echo $p->gender; ?>" < php } ?>/> -->
                                </div>
                            </div>
                            </div>


                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3 class="block">Address</h3>
                                     </div>
                            </div>
                            </div>
                            <div class="row">


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

                            </div>




                            <div class="row">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <SELECT name="province" class="form-control member_type" ><?php
                                            $provinces = array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT"    );
                                            $province = "";
                                            if (isset($p->province)) { $province = $p->province;}
                                            for ($temp=0; $temp<count($provinces); $temp+=1){
                                                printoption($provinces[$temp], $province, $provinces[$temp]);
                                            }
                                        ?></SELECT>
<!--
                                        <input <?php echo $is_disabled ?> name="province" type="text"
                                                                           placeholder="Province"
                                                                           class="form-control req_driver" < php if (isset($p->province)) { ?> value="< php echo $p->province; ?>" < php } ?>/> -->
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                    <input <?php echo $is_disabled ?>  type="text"
                                                                       placeholder="Postal code"
                                                                       class="form-control req_driver" name="postal"  <?php if (isset($p->postal)) { ?> value="<?php echo $p->postal; ?>" <?php } ?>/>
                                </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                    <input <?php echo $is_disabled ?>  type="text"
                                                                       placeholder="Country" value="Canada"
                                                                       class="form-control req_driver" name="country" <?php if (isset($p->country)) { ?> value="<?php echo $p->country; ?>" <?php } ?>/>
                                </div>
                                </div>



                            </div>

                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h3 class="block">Driver's License</h3>                            </div>
                                </div>
                            </div>







                            <div class="row">


                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="control-label">Driver License #</label>
                                    <input <?php echo $is_disabled ?> name="driver_license_no" type="text"
                                                                      class="form-control req_driver" <?php if (isset($p->driver_license_no)) { ?> value="<?php echo $p->driver_license_no; ?>" <?php } ?> />
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="control-label">Province (Driver's License was issued)</label>
                                    <input <?php echo $is_disabled ?> name="driver_province" type="text"
                                                                      class="form-control req_driver" <?php if (isset($p->driver_province)) { ?> value="<?php echo $p->driver_province; ?>" <?php } ?> />
                                </div>



                                        <?php



                                            function printoption2($option, $selected){
                                                $tempstr = "";
                                                if ($option == $selected) { $tempstr = " selected";}
                                                echo '<OPTION' . $tempstr . ">" . $option . "</OPTION>";
                                            }
                                            function printoptions2($name, $array, $selected){
                                                echo '<SELECT name="' . $name . '" class="form-control member_type" >';
                                                for ($temp=0; $temp<count($array); $temp+=1){
                                                    printoption2($array[$temp], $selected);
                                                }
                                                echo '</SELECT>';
                                            }
                                            printoptions2("province", array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT"),$p->billing_province);
                                        ?>


                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Expiry Date</label>
                                        <input <?php echo $is_disabled ?> name="expiry_date" type="text"
                                                                          class="form-control req_driver date-picker" <?php if (isset($p->expiry_date)) { ?> value="<?php echo $p->expiry_date; ?>" <?php } ?> />

                                    </div></div>
                            </div>





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
                                    <div class="margiv-top-10 form-actions">
                                        <button type="submit" class="btn btn-primary">
                                            Save Changes
                                        </button>
                                        <a href="#" class="btn default">
                                            Cancel </a>
                                    </div>
                                <?php } ?>
                        </form>

                        <div class="clearfix"></div>


                    </div>

            </div>


        </div>
    </div>

    <?php
        if ($this->request->params['action'] == 'edit') {
            ?>


           <!-- <div class="tab-pane" id="subtab_4_2">
                <?php include('avatar.php');?>
            </div>-->



            <div class="tab-pane" id="subtab_4_3">
                <?php include('password.php');?>
            </div>

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
    $(function () {

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
                $('.req_driver').attr('required','required');
                $('.un').removeAttr('required');
            }
            else {
                $('.nav-tabs li:not(.active)').each(function () {
                    $(this).show();
                });
                $('#driver_div').hide();
                $('.req_driver').removeAttr('required');
                $('.un').attr('required','required');
            }

        });
    });
</script>