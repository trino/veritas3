<style>
    div {
        border: 0px solid green;
    }
</style>

<?php
    if (isset($_GET['driver']))
        $driver = $_GET['driver'];
    else
        $driver = 0;

    if (isset($_GET['client']))
        $client = $_GET['client'];
    else
        $client = 0;

    $dr_cl = $this->requestAction('/documents/getDriverClient/' . $driver . '/' . $client);
?>







<div>
    <div class="portlet-body">
        <div class="createDriver">
            <div class="portlet box form-horizontal">
                <input type="hidden" name="document_type" value="add_driver"/>

                <div class="form-group">

                    <div class="col-md-3 control-label">Select <?php echo ucfirst($settings->client); ?> </div>
                    <div class="col-md-6">


                            <?php
                                $counting = 0;
                                $drcl_c = $dr_cl['client'];
                                foreach ($drcl_c as $drclc) {
                                    $counting++;
                                }
                                if ($counting > 1) { ?>
                                    <select id="selecting_client" class="form-control input-xlarge select2me"
                                data-placeholder="Select <?php echo ucfirst($settings->client) . '" '; if ($client){ ?>disabled="disabled"<?php } ?>>
                            <option>None Selected</option><?php
                                } else { ?>

                                        <select id="selecting_client" class="form-control input-xlarge select2me"
                                                data-placeholder="Select <?php echo ucfirst($settings->client); ?>" disabled>
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


                <div class="form-group ">

                    <div class="col-md-3 control-label">Select Driver</div>
                    <div class="col-md-6">


                        <?php //echo count($dr_cl['driver']);?>
                        <select class="form-control input-xlarge select2me" data-placeholder="Create New Driver"
                                id="selecting_driver" <?php if ($driver){ ?>disabled="disabled"<?php } ?>>
                            <option>Create New Driver</option>
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
                                            <?php if ($dr->id == $driver || $counting == 1){ ?>selected="selected"<?php } ?>><?php echo $dr->fname . ' ' . $dr->mname . ' ' . $dr->lname ?></option>
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
                        <a href="javascript:void(0);" class="btn btn-danger"
                           onclick="window.location='<?php echo $this->request->webroot; ?>documents/addorder/'+$('.selecting_client').val()+'/?driver='+$('.selecting_driver').val()">Place
                            MEE Order <i class="m-icon-swapright m-icon-white"></i></a>&nbsp;&nbsp; or &nbsp;&nbsp;<a
                            href="javascript:void(0);"
                            class="btn btn-info"
                            onclick="$('.alacarte').show();">A La Carte <i class="m-icon-swapright m-icon-white"></i></a>
                    </div>
                </div>



                <p>&nbsp;</p>



                <div class="alacarte" style="display: none;">
                    <?php include('subpages/documents/products.php'); ?>
                    <div class="clearfix"></div>




                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">

                            <a class="btn red button-next proceed"
                               onclick="window.location='<?php echo $this->request->webroot; ?>documents/addorder/'+$('.selecting_client').val()+'/?driver='+$('.selecting_driver').val()">
                                Order Products <i class="m-icon-swapright m-icon-white"></i>
                            </a>                        </div>
                    </div>
                    <div class="clearfix"></div>



                </div>





            </div>
        </div>
    </div>


</div>

<script>

    $(function () {
        <?php
        if(!$client)
        {
            ?>

        $('#selecting_driver').change(function () {
            var driver = $('#selecting_driver').val();
            $.ajax({
                url: '<?php echo $this->request->webroot;?>documents/getClientByDriver/' + driver,
                success: function (res) {
                    $('#selecting_client').html(res);
                    $('.selecting_driver').val($('#selecting_driver').val());
                    $('.proceed').attr('href', '<?php echo $this->request->webroot;?>documents/addorder/' + $('.selecting_client').val() + '?driver=' + $('.selecting_driver').val());
                }
            });
        });
        <?php
        } 
        ?>

        <?php
        if(!$driver)
        {
            ?>

        $('#selecting_client').change(function () {
            var client = $('#selecting_client').val();
            $.ajax({
                url: '<?php echo $this->request->webroot;?>documents/getDriverByClient/' + client,
                success: function (res) {
                    $('#selecting_driver').html(res);
                    $('.selecting_client').val($('#selecting_client').val());
                    $('.proceed').attr('href', '<?php echo $this->request->webroot;?>documents/addorder/' + $('.selecting_client').val() + '?driver=' + $('.selecting_driver').val());
                }
            });
        });

        <?php          
        }
        ?>
    });
</script>