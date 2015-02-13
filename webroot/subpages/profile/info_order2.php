<style>div {
        border: 0px solid green;
    }</style>

<?php
    $getProfileType = $this->requestAction('profiles/getProfileType/' . $this->Session->read('Profile.id'));
    $sidebar = $this->requestAction("settings/all_settings/" . $this->request->session()->read('Profile.id') . "/sidebar");

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

    function printoption2($value, $selected = "", $option)
    {
        $tempstr = "";
        if ($option == $selected or $value == $selected) {
            $tempstr = " selected";
        }
        echo '<OPTION VALUE="' . $value . '"' . $tempstr . ">" . $option . "</OPTION>";
    }

    function printoptions($name, $valuearray, $selected = "", $optionarray, $isdisabled = "")
    {
        echo '<SELECT ' . $isdisabled . ' name="' . $name . '" class="form-control member_type required" >';
        for ($temp = 0; $temp < count($valuearray); $temp += 1) {
            printoption2($valuearray[$temp], $selected, $optionarray[$temp]);
        }
        echo '</SELECT>';
    }

    function printprovinces($name, $selected = "", $isdisabled = "")
    {
        printoptions($name, array("", "AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT"), $selected, array("Select Province", "Alberta", "British Columbia", "Manitoba", "New Brunswick", "Newfoundland and Labrador", "Northwest Territories", "Nova Scotia", "Nunavut", "Ontario", "Prince Edward Island", "Quebec", "Saskatchewan", "Yukon Territories"), $isdisabled);

    }

?>

<div>

    <div class="portlet-body">


        <div class="createDriver">


            <div class="portlet box form">

                <input type="hidden" name="document_type" value="add_driver"/>
                <div class="form-group">
                                    <label class="control-label">Select Driver</label>
                                    <select class="form-control" id="selecting_driver">
                                        <option>Select Driver</option>
                                        <?php if(isset($_GET['driver'])){
                                            //$driver = $this->requstAction()
                                            }?>
                                            <option>Driver 1</option>
                                            <option>Driver 2</option>
                                            <option>Driver 3</option>
                                            
                                    </select>

                </div>
                <div class="form-group">
                                    <label class="control-label" id="selecting_client">Select Client</label>
                                    <select class="form-control">
                                        <option>Select Client</option>
                                        <option>Client 1</option>
                                            <option>Client 2</option>
                                            <option>Client 3</option>
                                    </select>

                </div>
                <?php include('subpages/documents/products.php'); ?>

                <div class="clearfix"></div>


            </div>


        </div>


    </div>


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
                $('#driver_div select').addClass('required');
                $('.un').removeProp('required');
                $('#password').removeProp('required');
                $('#retype_password').removeProp('required');
                $('.req_rec').removeProp('required');
                $('.req_driver').prop('required', "required");
            }
            else {
                $('#driver_div select').removeClass('required');
                $('.nav-tabs li:not(.active)').each(function () {
                    $(this).show();
                });
                $('#driver_div').hide();
                $('.req_driver').removeProp('required');
                $('.req_rec').removeProp('required');
                $('.un').prop('required', "required");
            }

            if ($(this).val() == '2') {
                $('.req_driver').removeProp('required');
                $('.un').removeProp('required');
                $('.req_rec').prop('required', "required");
            }

        });
    });
</script>


<!-- END PORTLET-->