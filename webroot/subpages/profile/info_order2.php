<style>
    div {
        border: 0px solid green;
    }
</style>

<?php
    $intable = true;
    $cols = 8;

    function getcheckboxes($name, $amount) {
        $tempstr = "";
        for ($temp = 0; $temp < $amount; $temp += 1) {
            if (strlen($tempstr) > 0) {
                $tempstr .= "+','";
            }
            $tempstr .= "+Number($('#" . $name . $temp . "').prop('checked'))";
        }
        return $tempstr;
    }

    $tempstr = getcheckboxes("form", 7) . "+',0'";
    $tempstr2 = getcheckboxes("formb", 7) . "+',0'";

    $driver = 0;
    if (isset($_GET['driver'])) {
        $driver = $_GET['driver'];
    }

    $client = 0;
    if (isset($_GET['client'])) {
        $client = $_GET['client'];
    }

    $dr_cl = $doc_comp->getDriverClient($driver, $client);

    $counting = 0;
    $drcl_c = $dr_cl['client'];
    foreach ($drcl_c as $drclc) {
        $counting++;
    }

    function GET($name, $default = "")    {
        if (isset($_GET[$name])) {
            return $_GET[$name];
        }
        return $default;
    }

    $ordertype = strtoupper(GET("ordertype"));
    if (strlen($ordertype) == 0) {
        $intable = false;
        $cols = 6;
    } else {
        $ordertype = substr($ordertype, 0, 3);
    }

    function printbutton($type, $webroot, $index, $tempstr = "")    {
        if (strlen($type) > 0) {
            switch ($index) {
                case 3:
                    $index = 1;
                    break;
                case 4:
                    $index = 5;
                    break;
            }
        }
        switch ($index) {
            case 1:
                if ($type == 'QUA') {
                    ?>
                    <a href="javascript:void(0);" class="btn btn-danger  btn-lg placenow"
                       onclick="if(!check_div())return false;if($('.selecting_driver').val()==''){alert('Please select driver to requalify.');return false;}var div = $('#divisionsel').val();if(!isNaN(parseFloat(div)) && isFinite(div)){var division = div;}else var division = '0';if($('.selecting_client').val())window.location='<?php echo $webroot; ?>orders/addorder/'+$('.selecting_client').val()+'/?driver='+$('.selecting_driver').val()+'&division='+division+'&order_type=Requalification&forms='<?= $tempstr; ?>;else{$('#s2id_selecting_client .select2-choice').attr('style','border:1px solid red;');$('html,body').animate({scrollTop: $('#s2id_selecting_client .select2-choice').offset().top},'slow');}">Continue <i class="m-icon-swapright m-icon-white"></i></a>
                <?php
                } else {
                    if ($type == 'MEE') {
                        $o_type = 'Order MEE';
                    } else {
                        $o_type = 'Order Products';
                    }
                    ?>
                    <a href="javascript:void(0);" class="btn btn-danger btn-lg placenow"
                       onclick="if(!check_div())return false;var div = $('#divisionsel').val();if(!isNaN(parseFloat(div)) && isFinite(div)){var division = div;}else var division = '0';if($('.selecting_client').val())window.location='<?php echo $webroot; ?>orders/addorder/'+$('.selecting_client').val()+'/?driver='+$('.selecting_driver').val()+'&division='+division+'&order_type=<?php echo urlencode($o_type); ?>';else{$('#s2id_selecting_client .select2-choice').attr('style','border:1px solid red;');$('html,body').animate({scrollTop: $('#s2id_selecting_client .select2-choice').offset().top},'slow');}">Continue
                        <i class="m-icon-swapright m-icon-white"></i></a>

                <?php
                }
                break;
            case 2: ?>
                <a href="javascript:void(0);" class="btn btn-info"
                   onclick="$('.alacarte').show(200);$('.placenow').attr('disabled','');">A La Carte
                    <i class="m-icon-swapright m-icon-white"></i></a>
                <?php
                break;
            case 3:
                echo '<a href="#" class="btn red-flamingo"> Place Order <i class="m-icon-swapright m-icon-white"></i></a>';
                break;
            case 4:
                echo '<a href="#" class="btn yellow-crusta">Place Order <i class="m-icon-swapright m-icon-white"></i></a>';
                break;
            case 5:
                if ($type == 'MEE') {
                    $o_type = 'Order MEE';
                } else {
                    $o_type = 'Order Products';
                }
                ?>

                <a class=" btn btn-danger   btn-lg  button-next proceed"
                   onclick="if(!check_div())return false;var div = $('#divisionsel').val();if(!isNaN(parseFloat(div)) && isFinite(div)){var division = div;}else var division = '0';if($('.selecting_client').val())window.location='<?php echo $webroot; ?>orders/addorder/'+$('.selecting_client').val()+'/?driver='+$('.selecting_driver').val()+'&division='+division+'&order_type=<?php echo urlencode($o_type);?>&forms='<?= $tempstr; ?>;else{$('#s2id_selecting_client .select2-choice').attr('style','border:1px solid red;');$('html,body').animate({scrollTop: $('#s2id_selecting_client .select2-choice').offset().top},'slow');}">
                    Continue <i class="m-icon-swapright m-icon-white"></i>
                </a>

            <?php
        }
    }

    function printform($counting, $settings, $client, $dr_cl, $driver, $intable = false){//pass the variables exactly as given, then specifiy if it's in a table or not
    echo '<input type="hidden" name="document_type" value="add_driver"/>';
    echo '<div class="form-group clientsel">';
    $dodiv = false;
    if ($intable) {
        echo '<div class="row" style="margin-top: 15px;">';
        $size = "large";
    } else {
        $size = "xlarge";
    }
    $size="ignore";

    echo '<div class="col-xs-3 control-label" align="right" style="margin-top: 6px;">' . ucfirst($settings->client) . '</div><div class="col-xs-6">';


    $dodiv = true;?>

<script type="text/javascript">
    function reload(value) {
        var container = document.getElementById("selecting_driver");
        var was = container.value;
        container.value = value;  //THIS IS NOT WORKING!!!
        //this should set the select dropdown to "Create a Driver"
    }
</script>

<?php

    if ($counting > 1) { ?>
        <select id="selecting_client" class="form-control input-<?= $size ?> select2me"
        onoldchange="reload(-1);"
        data-placeholder="Select <?php echo ucfirst($settings->client) . '" ';
        if ($client) { ?><?php } ?>>
                        <option>None Selected</option><?php
    } else { ?>

                    <select id="selecting_client" class="form-control input-<?= $size; ?> select2me"
                            data-placeholder="Select <?php echo ucfirst($settings->client); ?>">
                        <?php
    }
    foreach ($dr_cl['client'] as $dr) {
        $client_id = $dr->id;
        ?>
        <option value="<?php echo $dr->id; ?>"
                <?php if ($dr->id == $client || $counting == 1){ ?>selected="selected"<?php } ?>><?php echo $dr->company_name; ?></option>
    <?php
    }
?>
</select>

<input class="selecting_client" type="hidden" value="<?php if ($client) echo $client; else if ($counting == 1) echo $client_id; ?>"/>
</div></div>

<?php if ($intable) {
    echo '</div>';
} ?>

<div class="divisionsel form-group">
    <?php if ($counting == 1) $cl_count = 1; else {
        $cl_count = 0;
    } ?>
</div>

<?php if ($intable) {
    echo '<div class="row" style="margin-top: 15px;margin-bottom: 15px;">';
} ?>

<div class="form-group ">

    <?php
        echo '<div class="col-xs-3 control-label"  align="right" style="margin-top: 6px;">Driver</div><div class="col-xs-6" >';
    ?>

    <select class="form-control input-<?= $size ?> select2me"
            <?php if (!isset($_GET['ordertype']) || (isset($_GET['ordertype']) && $_GET['ordertype'] != "QUA")){ ?>data-placeholder="Create New Driver"<?php }?>
            id="selecting_driver" <?php if ($driver){ ?>disabled="disabled"<?php } ?>>
        <?php if (!isset($_GET['ordertype']) || (isset($_GET['ordertype']) && $_GET['ordertype'] != "QUA")) { ?>
        <option <? if ($driver == '0') {
            echo 'selected';
        } ?>>Create New Driver
            </option><?php } else {
            ?>
            <option <? if ($driver == '0') {
                echo 'selected';
            } ?>>Select Driver
            </option>
        <?php
        }
        ?>
        <?php
            $counting = 0;
            $drcl_d = $dr_cl['driver'];
            foreach ($drcl_d as $drcld) {

                $counting++;
            }

            foreach ($dr_cl['driver'] as $dr) {

                $driver_id = $dr->id;
                ?>
                <option value="<?php echo $dr->id; ?>"
                        <?php if ($dr->id == $driver || $counting == 1 && $driver != '0'){ ?>selected="selected"<?php } ?>><?php echo $dr->fname . ' ' . $dr->mname . ' ' . $dr->lname ?></option>
            <?php
            }
        ?>
    </select>

    <input class="selecting_driver" type="hidden" value="<?php
        if ($driver) {
            echo $driver;
        }
        echo '"/></div></div>';
        if ($intable) {
            echo "</div>";
        }
        } ?>



<div class=" portlet-body" >
    <div class="createDriver">
        <div class="portlet box form-horizontal">

            <?php
                if ($driver && !$client && $counting == 0) {
                    echo '<div class="alert alert-danger"><strong>Error!</strong> This driver is not assigned to a client. <A href="' . $this->request->webroot . 'profiles/edit/' . $driver . '">Click here to assign them to one</A></div>';
                }
            ?>

            <?php if (!$intable) {
                printform($counting, $settings, $client, $dr_cl, $driver);
            } ?>



            <div class="">
                <div class="col-xs-offset-3 col-xs-9">


                    <?php
                        if ($ordertype == "") {
                            printbutton($ordertype, $this->request->webroot, 1, $tempstr);
                            echo "&nbsp;&nbsp; or &nbsp;&nbsp";
                            printbutton($ordertype, $this->request->webroot, 2, $tempstr);
                        }
                    ?>


                </div>
            </div>


            <div class="alacarte" style="display: none;">
                <?php include('subpages/documents/products.php'); ?>
                <div class="clearfix"></div>


                <div class="row">
                    <div class="col-xs-offset-3 col-xs-9">

                        <?php printbutton($ordertype, $this->request->webroot, 5, $tempstr); ?>

                        <a class="btn grey button-next proceed"
                           onclick="$('.alacarte').toggle(200);$('.placenow').removeAttr('disabled');">
                            Cancel</i>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>


            </div>


        </div>
    </div>


</div>

<div class="row">
    <?php
        $offset = $cols;
        if ($ordertype == "" || $ordertype == "MEE") {
            if ($ordertype != "") {
                $offset .= " col-xs-offset-2";
            }
            ?>
            <div class="col-xs-<?= $offset ?>">

                <div class="pricing-red  hover-effect">
                    <div class="pricing-red-head pricing-head-active">
                        <h3>Order MEE <span>
											The all in one package </span>
                        </h3>
                        <h4><!--i>$</i>999<i>.99</i>
											<span>
											One Time Payment </span-->
                        </h4>
                    </div>

                    <?php if ($intable) {
                        printform($counting, $settings, $client, $dr_cl, $driver, true);
                    } ?>

                    <ul class="pricing-red-content list-unstyled">

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Premium National Criminal Record Check</div>
                            <div class="col-xs-2"><input checked disabled="disabled" type="checkbox" name="prem_nat" value=""/></div>
                            <div class="clearfix"></div>
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Driver's Record Abstract (MVR)</div>
                            <div class="col-xs-2"><input checked disabled="disabled" type="checkbox" name="dri_abs" value=""></div>
                            
                            <div class="clearfix"></div>
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> CVOR</div>
                            <div class="col-xs-2"><input checked disabled="disabled" type="checkbox" name="CVOR" value=""></div>
                            <div class="clearfix"></div>
                            
                        </li>

                        <li>
                        
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Pre-employment Screening Program Report</div>
                            <div class="col-xs-2"><input checked disabled="disabled" type="checkbox" name="prem_nat" value=""></div>
                            <div class="clearfix"></div>
                            
                            
                        </li>
                        

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Transclick</div>
                            <div class="col-xs-2"><input checked disabled="disabled" type="checkbox" name="prem_nat" value=""></div>
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Certifications</div>
                            <div class="col-xs-2"><input checked disabled="disabled" type="checkbox" name="prem_nat" value=""></div>
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Letter of Experience</div>
                            <div class="col-xs-2"><input checked disabled="disabled" type="checkbox" name="prem_nat" value=""></div>
                            <div class="clearfix"></div>                           
                            
                        </li>
                        
                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Check DL</div>
                            <div class="col-xs-2"><input checked disabled="disabled" type="checkbox" name="check_dl" value=""></div>
                            <div class="clearfix"></div>
                            
                            
                        </li>

                    </ul>
                    <div class="pricing-footer">
                        <p>
                        <hr/>
                        </p>
                        <?php printbutton($ordertype, $this->request->webroot, 3, $tempstr); ?>

                    </div>
                </div>
            </div>
        <?php }

        $offset = $cols;
        if ($ordertype == "" || $ordertype == "CAR") {
            if ($ordertype != "") {
                $offset .= " col-xs-offset-2";
            }

            ?>
            <div class="col-xs-<?= $offset; ?>">
                <div class="pricing hover-effect">
                    <div class="pricing-head">
                        <h3>Order Products <span>
											Place an Order A La Carte </span>
                        </h3>
                        <h4><!--i>$</i>999<i>.99+</i>
											<span>
											(Starting At) </span-->
                        </h4>
                    </div>

                    <?php if ($intable) {
                        printform($counting, $settings, $client, $dr_cl, $driver, true);
                    } ?>

                    <ul class="pricing-content list-unstyled">
                        <li>
                            
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Premium National Criminal Record Check</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="form0" value="1"/></div>
                            <div class="clearfix"></div>
                        </li>
                        
                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Driver's Record Abstract (MVR)</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="dri_abs" id="form1" value="1"></div>
                            
                            <div class="clearfix"></div>
                        </li>

                        
                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> CVOR</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="CVOR" id="form2" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Pre-employment Screening Program Report</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="form3" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>
                        

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Transclick</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="form4" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Certifications</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="form5" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Letter of Experience</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="form6" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>
                        
                        <!--li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Check DL</div>
                            <div class="col-xs-2"><input id="form7" value="1" checked type="checkbox" name="check_dl" value=""></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li-->

                    </ul>
                    <div class="pricing-footer">
                        <p>
                        <hr/>
                        </p>
                        <?php printbutton($ordertype, $this->request->webroot, 4, $tempstr); ?>
                    </div>
                </div>
            </div>
        <?php }

        $offset = $cols;
        if ($ordertype == "QUA") {
            if ($ordertype != "") {
                $offset .= " col-xs-offset-2";
            }
            ?>

            <div class="col-xs-<?= $offset ?>">
                <div class="pricing-blue hover-effect">
                    <div class="pricing-blue-head pricing-head-active">
                        <h3>Requalify<span>
											Requalify existing drivers </span>
                        </h3>
                        <h4><!--i>$</i>999<i>.99</i>
											<span>
											One Time Payment </span-->
                        </h4>
                    </div>

                    <?php if ($intable) {
                        printform($counting, $settings, $client, $dr_cl, $driver, true);
                    } ?>

                    <ul class="pricing-blue-content list-unstyled">

                        <li>
                            
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Premium National Criminal Record Check</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="formb0" value="1"/></div>
                            <div class="clearfix"></div>
                        </li>
                        
                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Driver's Record Abstract (MVR)</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="dri_abs" id="formb1" value="1"></div>
                            
                            <div class="clearfix"></div>
                        </li>

                        
                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> CVOR</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="CVOR" id="formb2" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Pre-employment Screening Program Report</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="formb3" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>
                        

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Transclick</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="formb4" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Certifications</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="formb5" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Letter of Experience</div>
                            <div class="col-xs-2"><input checked type="checkbox" name="prem_nat" id="formb6" value="1"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li>
                        <!--li>
                            <div class="col-xs-10"><i class="fa fa-file-text-o"></i> Check DL</div>
                            <div class="col-xs-2"><input id="formb7" value="1" checked type="checkbox" name="check_dl"></div>
                            
                            <div class="clearfix"></div>
                            
                            
                        </li-->


                    </ul>
                    <div class="pricing-footer">
                        <p>
                        <hr/>
                        </p>
                        <?php printbutton($ordertype, $this->request->webroot, 3, $tempstr2); ?>

                    </div>
                </div>
            </div>
        <?php } ?>
    <!--//End Pricing -->
</div>

<script>
    function check_div() {
        var checker = 0;
        $('.divisionsel select').each(function () {
            checker++;
        });
        if (checker > 0) {

            if (!$('.divisionsel select').val()) {
                $('.divisionsel select').attr('style', 'border:1px solid red;');
                return false;
            }
            return true;
        }
        else
            return true;

    }
    $(function () {
        $('#divisionsel').live('change', function () {
            $(this).removeAttr('style');
        });
        if ($('.selecting_client').val()) {
            var client = $('#selecting_client').val();
            if (!isNaN(parseFloat(client)) && isFinite(client)) {
                $('.selecting_client').val(client);
                //alert(client);
                $.ajax({
                    url: '<?php echo $this->request->webroot;?>clients/divisionDropDown/' + client,
                    data: {istable: '<?= $intable; ?>'},
                    success: function (response) {
                        $('.divisionsel').html(response);
                    }
                });
            }
        }
        $('#selecting_driver').change(function () {
            $('#s2id_selecting_driver .select2-chosen-2').removeAttr('style');
            var driver = $('#selecting_driver').val();
            //alert(driver);
            if (!isNaN(parseFloat(driver)) && isFinite(driver)) {
                $('.selecting_driver').val(driver);


            }
            else {
                $('.selecting_driver').val('');
                return false;
            }
        });
        /*$('#selecting_driver').change(function () {
         var driver = $('#selecting_driver').val();
         //alert(driver);
         if (!isNaN(parseFloat(driver)) && isFinite(driver)) {
         $('.selecting_driver').val(driver);

         }
         else {
         $('.selecting_driver').val('');
         return false;
         }
        <?php
    if(!$client)
    {
        ?>
         $.ajax({
         url: '
        <?php echo $this->request->webroot;?>orders/getClientByDriver/' + driver,
         success: function (res) {
         if (res == 'Error')
         window.location = "
        <?php echo $this->request->webroot;?>profiles/edit/" + driver + "?clientflash";
         var div = $('#divisionsel').val();
         if (!isNaN(parseFloat(div)) && isFinite(div)) {
         var division = div;
         }
         else
         var division = '0';
         $('#selecting_client').html(res);
         $('.selecting_driver').val($('#selecting_driver').val());

         $('.proceed').attr('href', '
        <?php echo $this->request->webroot;?>orders/addorder/' + $('.selecting_client').val() + '?driver=' + $('.selecting_driver').val() + '&division=' + division + '&forms=' +
        <?= $tempstr; ?> );

         }
         });
        <?php
    }
    ?>
         });*/


        $('#selecting_client').change(function () {
            $('s2id_selecting_client .select2-choice').removeAttr('style');
            <?php
            if(!isset($_GET['ordertype']) || (isset($_GET['ordertype']) && $_GET['ordertype']!='QUA'))
            {
                ?>

            $('#s2id_selecting_driver .select2-chosen').html('Create New Driver');
            <?php
            }
            else
            {?>
            $('#s2id_selecting_driver .select2-chosen').html('Select Driver');
            <?php
            }
            ?>
            var client = $('#selecting_client').val();
            if (!isNaN(parseFloat(client)) && isFinite(client)) {
                $('.selecting_client').val(client);
                //alert(client);
                $.ajax({
                    url: '<?php echo $this->request->webroot;?>clients/divisionDropDown/' + client,
                    data: {istable: '<?= $intable; ?>'},
                    success: function (response) {
                        $('.divisionsel').html(response);
                    }
                });
            }
            else {
                $('.selecting_client').val('');
                return false;
            }

            <?php

        if(!$driver)
        {
            ?>
            $.ajax({
                url: '<?php echo $this->request->webroot;?>orders/getDriverByClient/' + client + '?ordertype=<?php if(isset($_GET['ordertype']))echo $_GET['ordertype']?>',
                success: function (res) {
                    var div = $('#divisionsel').val();
                    if (!isNaN(parseFloat(div)) && isFinite(div)) {
                        var division = div;
                    }
                    else
                        var division = '0';
                    $('#selecting_driver').html(res);
                    $('.selecting_client').val($('#selecting_client').val());

                    //$('.proceed').attr('href', '<?php echo $this->request->webroot;?>orders/addorder/' + $('.selecting_client').val() + '?driver=' + $('.selecting_driver').val() + '&division=' + division + '&forms=' + <?= $tempstr; ?>);

                }
            });
            <?php
       }
       ?>
            $('#s2id_selecting_driver .select2-chosen-2').removeAttr('style');
        });
    });
</script>



