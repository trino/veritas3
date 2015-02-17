<style>div {
        border: 0px solid green;
    }</style>
    
    <?php
    if(isset($_GET['driver']))
    $driver = $_GET['driver'];
    else
    $driver = 0;
    
    if(isset($_GET['client']))
    $client = $_GET['client'];
    else
    $client = 0;
    
    $dr_cl = $this->requestAction('/documents/getDriverClient/'.$driver.'/'.$client);
    
    
    
    ?>

<div>

    <div class="portlet-body">


        <div class="createDriver">


            <div class="portlet box form">

                <input type="hidden" name="document_type" value="add_driver"/>
                <div class="form-group">
                                    
                                    <select id="selecting_client" class="form-control input-xlarge select2me" data-placeholder="Select Client" <?php if($client){?>disabled="disabled"<?php }?>>
                                        <option>Select Client</option>
                                        <?php
                                       if(count($dr_cl['client'])==1)
                                       $counting = 1;
                                       else
                                       $counting = 0;
                                       foreach($dr_cl['client'] as $dr)
                                       {
                                        $client_id = $dr->id;
                                        ?>
                                        <option value="<?php echo $dr->id;?>" <?php if($dr->id == $client || $counting==1){?>selected="selected"<?php } ?>><?php echo $dr->company_name;?></option>
                                        <?php
                                       }
                                       ?>
                                    </select>
                                    <input class="selecting_client" type="hidden" value="<?php if($client)echo $client;else if($counting==1 and isset($client_id))echo $client_id;?>" />

                </div>
                <div class="form-group">
                                    
                                    <?php //var_dump($dr_cl['driver']);?>
                                    <select class="form-control input-xlarge select2me" data-placeholder="Create Driver" id="selecting_driver" <?php if($driver){?>disabled="disabled"<?php }?>>
                                        <option>Create Driver</option>
                                       <?php
                                       if(count($dr_cl['driver'])==1) {
                                           $counting = 1;
                                       } else {
                                           $counting = 0;
                                       }

                                       foreach($dr_cl['driver'] as $dr) {
                                        $driver_id = $dr->id;
                                        ?>
                                        <option value="<?php echo $dr->id;?>" <?php if($dr->id == $driver || $counting==1){?>selected="selected"<?php } ?>><?php echo $dr->fname.' '.$dr->mname.' '.$dr->lname?></option>
                                        <?php
                                       }
                                       
                                       ?>
                                            
                                            
                                            
                                    </select>
                                    <?php //echo $counting;?>
                                    <input class="selecting_driver" type="hidden" value="<?php
                                    if ($driver) {
                                        echo $driver;
                                    } elseif ($counting==1 and isset($driver_id)) {
                                        echo $driver_id;
                                    }?>" />

                </div>
                <a href="javascript:void(0);" class="btn btn-info" onclick="window.location='<?php echo $this->request->webroot;?>documents/addorder/'+$('.selecting_client').val()+'/?driver='+$('.selecting_driver').val()">Place MEE Order</a> or <a href="javascript:void(0);" class="btn btn-primary" onclick="$('.alacarte').show();">A La Carte</a> <p>&nbsp;</p>
                <div class="alacarte" style="display: none;"> 
                    <?php include('subpages/documents/products.php'); ?>
                    <div class="clearfix"></div>
                    <a class="btn blue button-next proceed"
                                       onclick="window.location='<?php echo $this->request->webroot;?>documents/addorder/'+$('.selecting_client').val()+'/?driver='+$('.selecting_driver').val()">
                                        Proceed <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                    <p>&nbsp;</p><p>&nbsp;</p>
                </div>
                <div class="clearfix"></div>


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
            
        $('#selecting_driver').change(function(){
            var driver = $('#selecting_driver').val();
            $.ajax({
               url:'<?php echo $this->request->webroot;?>documents/getClientByDriver/'+driver,
               success:function(res){
                $('#selecting_client').html(res);
                $('.selecting_driver').val($('#selecting_driver').val());
                $('.proceed').attr('href','<?php echo $this->request->webroot;?>documents/addorder/'+$('.selecting_client').val()+'?driver='+$('.selecting_driver').val());
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
            
        $('#selecting_client').change(function(){
            var client = $('#selecting_client').val();
            $.ajax({
               url:'<?php echo $this->request->webroot;?>documents/getDriverByClient/'+client,
               success:function(res){
                $('#selecting_driver').html(res);
                $('.selecting_client').val($('#selecting_client').val());
                $('.proceed').attr('href','<?php echo $this->request->webroot;?>documents/addorder/'+$('.selecting_client').val()+'?driver='+$('.selecting_driver').val());
               } 
            });
        });
        
        <?php          
            
            
        }
        ?>
    });
</script>


<!-- END PORTLET-->