<?php
function printlogos($logos1, $webroot, $index){ //* replaces the logo enumerators *//
foreach ($logos1 as $logo) {
    $img = "image" . $index; ?>
    <div class="col-md-4 margin-top-20">
        <div class="form-group" style="height:100px"><Center>
            <input type="radio" value="<?php echo $logo->id; ?>" name="logo" <?php echo ($logo->active == '1') ? "checked='checked'" : ""; ?> id="<?php echo $img ?>"/>
            <label for="<?php echo $img ?>"><img style="max-width:90%;max-height:100px;" src="<?php echo $webroot; ?>img/logos/<?php echo $logo->logo; ?>" /></label>
            </Center></div>
    </div>
    <?php
    $index+=1;
} return $index;} ?>


<!-- BEGIN PORTLET-->
<div class="portlet box green-haze">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-briefcase"></i>Logos
        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#subtab_1_1" data-toggle="tab">Primary Logo</a>
                                            </li>
                                            <li>
                                                <a href="#subtab_1_2" data-toggle="tab">Secondary Logo</a>
                                            </li>
                                            <li>
                                                <a href="#subtab_1_3" data-toggle="tab">Login Logo</a>
                                            </li>

                                        </ul>
                                    </div>
    <div class="portlet-body solid blue"> <!-- blue is needed to make the white logos stand out -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="subtab_1_1">
                                            <div > <!--class="portlet solid blue" -->

                                                <div class="portlet-body">

                                                    <form action="<?php echo $this->request->webroot; ?>logos" method="post" class="form-inline" role="form" id="logoform">

                                                        <?php $index = printlogos($logos, $this->request->webroot, 0);?>

                                                        <div class="clearfix"></div>
                                                        <div class="margin-top-10 alert alert-success display-hide flash" style="display: none;">
                                                            <button class="close" data-close="alert"></button>
                                                            Data saved successfully
                                                        </div>
                                                        <a href="javascript:void(0)" id="addnewlogo" class="primary btn btn-primary">Add New Logo</a>
                                                        <a href='javascript:;' class="btn btn-success" id="submit">Submit</a>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="subtab_1_2">
                                            <div > <!--class="portlet solid blue" -->

                                                <div class="portlet-body">

                                                    <form action="<?php echo $this->request->webroot; ?>logos/secondary"
                                                          method="post" class="form-inline" role="form" id="logoform1">

                                                        <?php $index = printlogos($logos1, $this->request->webroot, $index);?>

                                                        <div class="clearfix"></div>
                                                            <div class="margin-top-10 alert alert-success display-hide flash" style="display: none;">
                                                                <button class="close" data-close="alert"></button>
                                                                Data saved successfully
                                                            </div>
                                                        <a href="javascript:void(0)" id="addnewlogo1" class="secondary btn btn-primary">Add New Logo</a>    
                                                        <a href='javascript:;' class="btn btn-success" id="submit1">Submit</a>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="subtab_1_3">
                                            <div > <!--class="portlet solid blue" -->

                                                <div class="portlet-body">

                                                    <form action="<?php echo $this->request->webroot; ?>logos/login"
                                                          method="post" class="form-inline" role="form" id="logoform2">

                                                        <?php $index = printlogos($logos2, $this->request->webroot, $index);?>

                                                        <div class="clearfix"></div>
                                                            <div class="margin-top-10 alert alert-success display-hide flash" style="display: none;">
                                                                <button class="close" data-close="alert"></button>
                                                                Data saved successfully
                                                            </div>
                                                        <a href="javascript:void(0)" id="addnewlogo2" class="loginlogo btn btn-primary">Add New Logo</a>
                                                        <a href='javascript:;' class="btn btn-success" id="submit2">Submit</a>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    
<script>
function initiate_ajax_upload2(button_id){
var button = $('#'+button_id), interval;
new AjaxUpload(button,{
    action: "<?php echo $this->request->webroot;?>logos/upload/"+button_id,
    name: 'myfile',
    onSubmit : function(file, ext){
        button.text('Uploading');
        this.disable();
        interval = window.setInterval(function(){
            var text = button.text();
            if (text.length < 13){
                button.text(text + '.');
            } else {
                button.text('Uploading');
            }
        }, 200);
    },
    onComplete: function(file, res){
        button.html('Add New Logo');
            window.clearInterval(interval);
            this.enable();
            if(res){
                var response = JSON.parse(res)
            if(response['type'] == '0' || response['type'] == 0){
            $("#logoform").prepend('<div class="col-md-4 margin-top-20">'+
            '<div class="form-group" style="height:100px;overflow:hidden;">'+
            '<input type="radio" value="'+response["id"]+'" name="logo"/>'+
            '<img style="width:200px;" src="<?php echo $this->request->webroot; ?>img/logos/'+response["image"]+'" />'+
            '</div>'+
            '</div>');
            }
            else
            if(response['type'] == '1' || response['type'] == 1)
            {
               var out = '<div class="col-md-4 margin-top-20">'+
                         '<div class="form-group" style="height:100px;overflow:hidden;">'+
                         '<input type="radio" value="'+response["id"]+'" name="logo"/>'+
                         '<img style="max-width:90%;" src="<?php echo $this->request->webroot; ?>img/logos/'+response["image"]+'"/>'+
                         '</div></div>'; 
                $("#logoform1").prepend(out);
            }
            else
            if(response['type'] == '2' || response['type'] == 2)
            {
               var out = '<div class="col-md-4 margin-top-20">'+
                         '<div class="form-group" style="height:100px;overflow:hidden;">'+
                         '<input type="radio" value="'+response["id"]+'" name="logo"/>'+
                         '<img style="max-width:90%;" src="<?php echo $this->request->webroot; ?>img/logos/'+response["image"]+'"/>'+
                         '</div></div>'; 
                $("#logoform2").prepend(out);
            }
            }
            //$('#client_img').val(response);
            //$('.flashimg').show();
            }
    });
}
$(function(){
    initiate_ajax_upload2('addnewlogo');
    initiate_ajax_upload2('addnewlogo1');
    initiate_ajax_upload2('addnewlogo2');
    $('#submit1').click(function(){
    $('#submit1').text('Saving..');
        var str = $('#logoform1 input').serialize();
        $.ajax({
           url:'<?php echo $this->request->webroot;?>logos/ajaxlogo1',
           data:str,
           type:'post',
           success:function(res)
           {
            $('.flash').show();
            $('.flash').fadeOut(7000);
            $('#submit1').text(' Save Changes ');
           } 
        })
   }); 
    $('#submit2').click(function(){
    $('#submit2').text('Saving..');
        var str = $('#logoform2 input').serialize();
        $.ajax({
           url:'<?php echo $this->request->webroot;?>logos/ajaxlogo2',
           data:str,
           type:'post',
           success:function(res)
           {
            $('.flash').show();
            $('.flash').fadeOut(7000);
            $('#submit2').text(' Save Changes ');
           } 
        })
   }); 
    $('#submit').click(function(){
    $('#submit').text('Saving..');
        var str = $('#logoform input').serialize();
        $.ajax({
           url:'<?php echo $this->request->webroot;?>logos/ajaxlogo',
           data:str,
           type:'post',
           success:function(res)
           {
            $('.flash').show();
            $('.flash').fadeOut(7000);
            $('#submit').text(' Save Changes ');
           } 
        })
   }); 

});

</script></div>
</DIV>
<!-- END PORTLET-->