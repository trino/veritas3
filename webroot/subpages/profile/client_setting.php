<!-- BEGIN PORTLET-->
<div class="portlet box green-haze">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-briefcase"></i>Client Setting
        </div>
    </div>
    <div class="portlet-body">
                                    
                                        <form action="#" method="post" id="clientform">
                                            <input type="hidden" name="form" value="<?php echo $uid;?>" />
                                            <input type="hidden" name="side[user_id]" value="<?php echo $uid;?>" />
                                             <table class=" ">
                                            <tr>
                                                <td class="vtop">
                                                    Options For :
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[client_option]"
                                                                                          value="0"  <?php if (isset($sidebar) && $sidebar->client_option == 0) echo "checked"; ?> />
                                                        ISB MEE </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[client_option]"
                                                                                          value="1"  <?php if (isset($sidebar) && $sidebar->client_option == 1) echo "checked"; ?>/>
                                                        Event Audit </label>
                                                 </td>
                                            </tr>
                                            </table>
                                             <?php
                                        if (!isset($disabled)) {
                                            ?>
                                            <div class="res"></div>
                                            <div class="margin-top-10 alert alert-success display-hide flash" style="display: none;">
                                                            <button class="close" data-close="alert"></button>
                                                            Data saved successfully
                                                        </div>
                                            <P></P><div class="margin-top-10">
                                                <input type="button" name="submit" class="btn btn-primary" id="save_client"
                                                       value="Save Changes"/>

                                            </div>
                                        <?php
                                        }
                                        ?>
                                            </form>

<script>
$(function(){
     $('#save_client').click(function(){
                $('#save_client').text('Saving..');
                    var str = $('#clientform input').serialize();
                    $.ajax({
                       url:'<?php echo $this->request->webroot; ?>profiles/blocks/client',
                       data:str,
                       type:'post',
                       success:function(res)
                       {
                            //alert(res);
                            $('.res').text(res);
                            $('.flash').show();
                            $('.flash').fadeOut(7000);
                            $('#save_client').text(' Save Changes ');
                       } 
                    })
               });
});
</script>

</DIV></DIV><!-- END PORTLET-->