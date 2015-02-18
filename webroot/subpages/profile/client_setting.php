<div class="portlet-body">
    <div class="tab-content">
        <div class="tab-pane active" id="subtabz_2_1">
            <form action="#" method="post" id="clientform">
                <input type="hidden" name="form" value="<?php echo $uid; ?>"/>
                <input type="hidden" name="side[user_id]" value="<?php echo $uid; ?>"/>
                <table class=" ">
                    <tr>
                        <td class="vtop">
                            Version For:
                        </td>
                        <td>
                            <label class="uniform-inline">
                                <input <?php echo $is_disabled ?> type="radio"
                                                                  name="client_option"
                                                                  value="0"  <?php if (isset($settings) && $settings->client_option == 0) echo "checked"; ?> />
                                ISB MEE </label>
                            <label class="uniform-inline">
                                <input <?php echo $is_disabled ?> type="radio"
                                                                  name="client_option"
                                                                  value="1"  <?php if (isset($settings) && $settings->client_option == 1) echo "checked"; ?>/>
                                Event Audit </label>
                        </td>
                    </tr>
                </table>
                <?php
                    if (!isset($disabled)) {
                        ?>
                        <div class="res"></div>
                        <div class="margin-top-10 alert alert-success display-hide flashx" style="display: none;">
                            <button class="close" data-close="alert"></button>
                            Data saved successfully
                        </div>
                        <P></P>
                        <div class="margin-top-10">
                            <input type="button" name="submit" class="btn btn-primary" id="save_client"
                                   value="Save Changes"/>

                        </div>
                    <?php
                    }
                ?>
            </form>
        </div>
        <div class="tab-pane" id="subtabz_2_3">
            <?php include('subpages/profile/other_display.php'); ?>
        </div>
    </div>

    <script>
        $(function () {
            $('#save_client').click(function () {
                $('#save_client').text('Saving..');
                var str = $('#clientform input').serialize();
                $.ajax({
                    url: '<?php echo $this->request->webroot; ?>settings/change_clients/<?php echo $id;?>',
                    data: str,
                    type: 'post',
                    success: function (res) {
                        //alert(res);
                        //$('.res').text(res);
                        $('.flashx').show();
                        $('.flashx').fadeOut(7000);
                        $('#save_client').text(' Save Changes ');
                    }
                })
            });
        });
    </script>

</div>