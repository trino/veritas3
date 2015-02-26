<style>
    div {
        border: 0px solid green;
    }
</style>

<?php
    function getcheckboxes($name, $amount){
        $tempstr="";
        for ($temp = 0; $temp < $amount; $temp += 1) {//there are 7 checkboxes to check
            if (strlen($tempstr) > 0) {
                $tempstr .= "+','";
            }
            $tempstr .= "+Number($('#" . $name . $temp . "').prop('checked'))";
        }
        return $tempstr;
    }
    $tempstr=getcheckboxes("form", 7);

    if (isset($_GET['driver'])) {
        $driver = $_GET['driver'];
    } else {
        $driver = 0;
    }

    if (isset($_GET['client'])) {
        $client = $_GET['client'];
    } else {
        $client = 0;
    }

    $dr_cl = $doc_comp->getDriverClient($driver, $client);

    $counting = 0;
    $drcl_c = $dr_cl['client'];
    foreach ($drcl_c as $drclc) {
        $counting++;
    }

    function GET($name, $default = "")
    {
        if (isset($_GET[$name])) {
            return $_GET[$name];
        }
        return $default;
    }

    $ordertype = strtoupper(GET("ordertype"));

    function printbutton($type, $webroot, $index, $tempstr="")
    {
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
            case 1: ?>
                <a href="javascript:void(0);" class="btn btn-danger placenow"
                   onclick="if(!check_div())return false;var div = $('#divisionsel').val();if(!isNaN(parseFloat(div)) && isFinite(div)){var division = div;}else var division = '0';if($('.selecting_client').val())window.location='<?php echo $webroot; ?>orders/addorder/'+$('.selecting_client').val()+'/?driver='+$('.selecting_driver').val()+'&division='+division;else{$('.clientsel .select2-choice').attr('style','border:1px solid red;');$('html,body').animate({scrollTop: $('.select2-choice').offset().top},'slow');}">Place
                    MEE Order <i class="m-icon-swapright m-icon-white"></i></a>

                <?php
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
                ?>

                <a class="btn red button-next proceed"
                   onclick="if(!check_div())return false;var div = $('#divisionsel').val();if(!isNaN(parseFloat(div)) && isFinite(div)){var division = div;}else var division = '0';window.location='<?php echo $webroot; ?>orders/addorder/'+$('.selecting_client').val()+'/?driver='+$('.selecting_driver').val()+'&division='+division+'&forms='<?=$tempstr;?>">
                    Order Products <i class="m-icon-swapright m-icon-white"></i>
                </a>

            <?php
        }
    }

?>

<div class="portlet-body">
    <div class="createDriver">
        <div class="portlet box form-horizontal">

            <?php
                if ($driver && !$client && $counting == 0) {
                    echo '<div class="alert alert-danger"><strong>Error!</strong> This driver is not assigned to a client. <A href="' . $this->request->webroot . 'profiles/edit/' . $driver . '">Click here to assign them to one</A></div>';
                }
            ?>



            <input type="hidden" name="document_type" value="add_driver"/>

            <div class="form-group clientsel">

                <div class="col-md-3 control-label"><?php echo ucfirst($settings->client); ?> </div>
                <div class="col-md-6">

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
                        <select id="selecting_client" class="form-control input-xlarge select2me"
                                onoldchange="reload(-1);"
                        data-placeholder="Select <?php echo ucfirst($settings->client) . '" ';
                        if ($client) { ?><?php } ?>>
                        <option>None Selected</option><?php
                    } else { ?>

                    <select id="selecting_client" class="form-control input-xlarge select2me"
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

                    <input class="selecting_client" type="hidden"
                           value="<?php if ($client) echo $client; else if ($counting == 1) echo $client_id; ?>"/>
                </div>
            </div>
            <div class="divisionsel form-group">
                <?php if ($counting == 1) $cl_count = 1; else {
                    $cl_count = 0;
                } ?>
            </div>


            <div class="form-group ">

                <div class="col-md-3 control-label">Driver</div>
                <div class="col-md-6">


                    <?php //echo count($dr_cl['driver']);?>
                    <select class="form-control input-xlarge select2me" data-placeholder="Create New Driver"
                            id="selecting_driver" <?php if ($driver){ ?>disabled="disabled"<?php } ?>>
                        <option <? if ($driver == '0') {
                            echo 'selected';
                        } ?>>Create New Driver
                        </option>
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
                        } elseif ($counting == 1 and isset($driver_id)) {
                            echo $driver_id;
                        } ?>"/>

                </div>
            </div>


            <div class="row">
                <div class="col-md-offset-3 col-md-9">


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
                    <div class="col-md-offset-3 col-md-9">

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


<script>
    function check_div() {
        var checker = 0;
        $('.divisionsel select').each(function () {
            checker++;
        });
        if (checker > 0) {
            //alert($('.divisionsel select').val());
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
                    success: function (response) {
                        $('.divisionsel').html(response);
                    }
                });
            }
        }
        $('#selecting_driver').change(function () {
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
                url: '<?php echo $this->request->webroot;?>orders/getClientByDriver/' + driver,
                success: function (res) {
                    if (res == 'Error')
                        window.location = "<?php echo $this->request->webroot;?>profiles/edit/" + driver + "?clientflash";
                    var div = $('#divisionsel').val();
                    if (!isNaN(parseFloat(div)) && isFinite(div)) {
                        var division = div;
                    }
                    else
                        var division = '0';
                    $('#selecting_client').html(res);
                    $('.selecting_driver').val($('#selecting_driver').val());

                    $('.proceed').attr('href', '<?php echo $this->request->webroot;?>orders/addorder/' + $('.selecting_client').val() + '?driver=' + $('.selecting_driver').val() + '&division=' + division + '&forms=' + <?= $tempstr; ?> );

                }
            });
            <?php
        }
        ?>
        });


        $('#selecting_client').change(function () {
            $('.select2-choice').removeAttr('style');
            var client = $('#selecting_client').val();
            if (!isNaN(parseFloat(client)) && isFinite(client)) {
                $('.selecting_client').val(client);
                //alert(client);
                $.ajax({
                    url: '<?php echo $this->request->webroot;?>clients/divisionDropDown/' + client,
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
                url: '<?php echo $this->request->webroot;?>orders/getDriverByClient/' + client,
                success: function (res) {
                    var div = $('#divisionsel').val();
                    if (!isNaN(parseFloat(div)) && isFinite(div)) {
                        var division = div;
                    }
                    else
                        var division = '0';
                    $('#selecting_driver').html(res);
                    $('.selecting_client').val($('#selecting_client').val());

                    $('.proceed').attr('href', '<?php echo $this->request->webroot;?>orders/addorder/' + $('.selecting_client').val() + '?driver=' + $('.selecting_driver').val() + '&division=' + division + '&forms=' + <?= $tempstr; ?> );

                }
            });
            <?php
       }
       ?>
        });
    });
</script>


<div class="row margin-bottom-20">
    <?php
        $offset = "";
        if ($ordertype == "" || $ordertype == "MEE") {
            if ($ordertype != "") {
                $offset = " col-md-offset-3";
            }
            ?>
            <div class="col-md-7<?= $offset ?>">
                <div class="pricing pricing-active hover-effect">
                    <div class="pricing-head pricing-head-active">
                        <h3>Place MEE Order <span>
											The all in one package </span>
                        </h3>
                        <h4><i>$</i>999<i>.99</i>
											<span>
											One Time Payment </span>
                        </h4>
                    </div>
                    <ul class="pricing-content list-unstyled">

                        <li>
                            <input checked disabled="disabled" type="checkbox" name="prem_nat" value=""></span>
                            <i class="fa fa-file-text-o"></i> Premium National Criminal Record Check
                        </li>

                        <li>
                            <input checked disabled="disabled" type="checkbox" name="dri_abs" value=""></span>
                            <i class="fa fa-file-text-o"></i> Driver's Record Abstract (MVR)
                        </li>

                        <li>
                            <input checked disabled="disabled" type="checkbox" name="CVOR" value=""></span>
                            <i class="fa fa-file-text-o"></i> CVOR
                        </li>

                        <li>
                            <input checked disabled="disabled" type="checkbox" name="prem_nat" value=""></span>
                            <i class="fa fa-file-text-o"></i> Pre-employment Screening Program Report
                        </li>

                        <li>
                            <input checked disabled="disabled" type="checkbox" name="prem_nat" value=""></span>
                            <i class="fa fa-file-text-o"></i> Transclick
                        </li>

                        <li>
                            <input checked disabled="disabled" type="checkbox" name="prem_nat" value=""></span>
                            <i class="fa fa-file-text-o"></i> Certifications
                        </li>

                        <li>
                            <input checked disabled="disabled" type="checkbox" name="prem_nat" value=""></span>
                            <i class="fa fa-file-text-o"></i> Letter of Experience
                        </li>


                    </ul>
                    <div class="pricing-footer">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
                        </p>
                        <?php printbutton($ordertype, $this->request->webroot, 3, $tempstr); ?>

                    </div>
                </div>
            </div>
        <?php }

        $offset = "";
        if ($ordertype == "" || $ordertype == "CART") {
            if ($ordertype != "") {
                $offset = " col-md-offset-3";
            }

            ?>
            <div class="col-md-7<?= $offset; ?>">
                <div class="pricing hover-effect">
                    <div class="pricing-head">
                        <h3>A La Carte / Re-qualify <span>
											Officia deserunt mollitia </span>
                        </h3>
                        <h4><i>$</i>999<i>.99+</i>
											<span>
											(Starting At) </span>
                        </h4>
                    </div>
                    <ul class="pricing-content list-unstyled">

                        <li>
                            <input checked type="checkbox" name="prem_nat" id="form0" value="1"></span>
                            <i class="fa fa-file-text-o"></i> Premium National Criminal Record Check
                        </li>

                        <li>
                            <input checked type="checkbox" name="dri_abs" id="form1" value="1"></span>
                            <i class="fa fa-file-text-o"></i> Driver's Record Abstract (MVR)
                        </li>

                        <li>
                            <input checked type="checkbox" name="CVOR" id="form2" value="1"></span>
                            <i class="fa fa-file-text-o"></i> CVOR
                        </li>

                        <li>
                            <input checked type="checkbox" name="prem_nat" id="form3" value="1"></span>
                            <i class="fa fa-file-text-o"></i> Pre-employment Screening Program Report
                        </li>

                        <li>
                            <input checked type="checkbox" name="prem_nat" id="form4" value="1"></span>
                            <i class="fa fa-file-text-o"></i> Transclick
                        </li>

                        <li>
                            <input checked type="checkbox" name="prem_nat" id="form5" value="1"></span>
                            <i class="fa fa-file-text-o"></i> Certifications
                        </li>

                        <li>
                            <input checked type="checkbox" name="prem_nat" id="form6" value="1"></span>
                            <i class="fa fa-file-text-o"></i> Letter of Experience
                        </li>

                    </ul>
                    <div class="pricing-footer">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing.
                        </p>
                        <?php printbutton($ordertype, $this->request->webroot, 4, $tempstr); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <!--//End Pricing -->
</div>
