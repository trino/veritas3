<!-- BEGIN PORTLET-->
<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-briefcase"></i>Display
        </div>
    </div>
    <div class="portlet-body">

        <?php
 //echo $this->Session->read('Profile.admin');
if($this->Session->read('Profile.admin') && $this->Session->read('Profile.id')== $this->request['pass'][0]  )
    $is_disabled1 = '';
else
    $is_disabled1 = 'disabled="disabled"';
    

?>
<form action="<?php echo $this->request->webroot; ?>settings/change_text"
                                          role="form" method="post">
                                        <div class="form-group" id="notli">
<div class="row">

                                            <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="control-label">Client</label>
                                                <input type="text" name="client" class="form-control"
                                                       value="<?php echo $settings->client; ?>"/>
                                            </div>
                                            </div>


                                            <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="control-label">Document</label>
                                                <input type="text" name="document" class="form-control"
                                                       value="<?php echo $settings->document; ?>"/>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="row">

                                            <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="control-label">Profile</label>
                                                <input type="text" name="profile" class="form-control"
                                                       value="<?php echo $settings->profile; ?>"/>
                                            </div>
                                            </div>


                                            <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="control-label">MEE</label>
                                                <input type="text" name="mee" class="form-control"
                                                       value="<?php echo $settings->mee; ?>"/>
                                            </div>
                                            </div>
                                            </div>



                                            <!--<select class="form-control" onchange="change_text(this.value)">
                                                <option value="">Select User/Profile</option>
                                                <option value="1">Profile/Client</option>
                                                <option value="2">User/Job</option>
                                            </select>-->

                                        </div>
                                        <div class="margin-top-10">
                                            <input type="submit" class="btn btn-primary" value="Submit"/>
                                            <a href="#" class="btn default">
                                                Cancel </a>
                                        </div>
                                    </form>

                                    
                                    <p>&nbsp;</p>
                                                
                                    
                                    <script>
                                    $(function(){
                                       $('#save_display').click(function(){
                                        $('#save_display').text('Saving..');
                                            var str = $('#displayform input').serialize();
                                            $.ajax({
                                               url:'<?php echo $this->request->webroot;?>profiles/displaySubdocs/<?php echo $id;?>',
                                               data:str,
                                               type:'post',
                                               success:function(res)
                                               {
                                                $('.flash').show();
                                                $('.flash').fadeOut(7000);
                                                $('#save_display').text(' Save Changes ');
                                               } 
                                            })
                                       }); 
                                    });
                                    </script>
    </DIV>
</DIV>
<!-- END PORTLET-->