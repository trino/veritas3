<?php
if(isset($disabled))
$is_disabled = 'disabled="disabled"';
else
$is_disabled = '';
?>
<?php $settings = $this->requestAction('settings/get_settings');?>
<h3 class="page-title">
	<?php echo ucfirst($settings->document);?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""><?php echo "Orders";?>
                        </a>
					</li>
				</ul>
                
                <?php
                if(isset($disabled))
                { ?>
					<a href="javascript:window.print();" class="floatright btn btn-primary">Print Report</a>

					<a href="" class="floatright btn btn-success">Re-Qualify</a>
                <a href="" class="floatright btn btn-info">Add to Task List</a>
                <?php } ?>

			</div>
            <div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="">
						<div class="portlet-title">
                        <?php
                                        $param = $this->request->params['action'];
                                        $tab = 'nodisplay';
                                        ?>
							<div class="caption">
								<i class="fa fa-gift"></i> <?php if($param == 'view')?><?php echo ucfirst($settings->document);?> - <span class="step-title">
								View </span>
							</div>

						</div>
						<div class="portlet-body form">
							<form action="" class="form-horizontal" id="" method="POST">
								<div class="">
									<div class="form-body">
                                        <?php

                                        if($param !='view')
                                        {
                                            $tab = 'tab-pane';
                                            $doc = $this->requestAction('/documents/getDocument');
                                            ?>

										
                                        <?php
                                        }
                                        ?>
                                        
                                        
                                    
                                        <!--<div class="form-group mar-top-10">
                                            label class="col-md-3 control-label">Select <?php echo ucfirst($settings->document);?> Type</label>
                                            <div class="col-md-6">
                                            <select name="doc_type" class="form-control" onchange="showforms(this.value);">
                                                <option value="">Select <?php echo ucfirst($settings->document);?> type</option>
                                                <?php foreach($doc as $d){?>
                                                    <option value="<?php echo $d->form;?>" id="<?php echo $d->Form;?>"><?php echo ucfirst($d->title);?></option>
                                                <?php }?>
                                            </select>
                                            
                                            </div>-->
                                            <?php  include('subpages/home_blocks.php');?>
                                        </div>
                                        <div class="form-group mar-top-10">
                                        <?php
                                                    $users = $this->requestAction("documents/getAllUser");
                                         ?>
                                         
                                            <label class="col-md-3 control-label">Select <?php echo ucfirst($settings->profile);?>
                                            </label>
                                            <div class="col-md-6">
                                            <input type="hidden" name="did" value="<?php echo $did;?>" id="did" />
                                            <input type="hidden" name="sub_doc_id" value="<?php echo $sid;?>" id="sub_id" />
                                        <select class="form-control" name="uploaded_for" id="uploaded_for">
								        <option value="">Select <?php echo ucfirst($settings->profile);?></option>
                                            <?php 
                                                foreach($users as $u)
                                                {
                                                    ?>
                                                    <option value="<?php echo $u->id;?>" <?php if(isset($document) && $document->uploaded_for==$u->id){?> selected="selected"<?php } ?> ><?php echo $u->username; ?></option>
                                                    <?php
                                                }
                                             ?>
            							 </select>
                                         </div>
                                         </div>
										<div class="subform">
								            
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												

                                                <a href="javascript:void(0)" class="btn green cont">Save</a>
												

												<a href="javascript:;" class="btn blue">
												Save As Draft <i class="m-icon-swapright m-icon-white"></i>
												</a>
                                                <div class="margin-top-10 alert alert-success display-hide flashDoc" style="display: none;">
                                                <button class="close" data-close="alert"></button>
                                                Document uploaded successfully
                                                </div>
												
                                                
											</div>
                                            
										</div>
									</div>
                                    </form>
								</div>
							
						</div>
					</div>
				</div>
			</div>
            
            
<script>

    
    client_id = '<?=$cid?>',
    doc_id = '<?=$did?>';
    <?php
    /*
    if($did)
    {
        ?>
        showforms('company_pre_screen_question.php');
        showforms('driver_application.php');
        showforms('driver_evaluation_form.php');
        showforms('document_tab_3.php');
        <?php
    }*/
    ?>
        //showforms(doc_type);
function showforms(form_type)
{
    //alert(form_type);
    var arr_formtype = form_type.split('?');
    var sub_doc_id = arr_formtype[1];
    var s_arr = sub_doc_id.split('=');
    var ftype = arr_formtype[0]; 
    $('#sub_id').val(s_arr[1]);
    //var form_type = $(this).val();
    //alert(form_type);
    //var filename = form_type.replace(/\W/g, '_');
    //var filename = filename.toLowerCase();
    //$('.subform').show();   1
    if(ftype!= ""){
        //alert(form_type);
        $('.subform').load('<?php echo $this->request->webroot;?>documents/subpages/'+form_type,function(){
            //alert(ftype);
        // loading data from db
        // debugger;
        var url = '<?php echo $this->request->webroot;?>documents/getOrderData/'+client_id+'/'+doc_id+'/?document=1',
            param={form_type:ftype};
            //alert(url);
        $.getJSON(url,param,function(res){
            
            if(ftype == "company_pre_screen_question.php"){
                //alert(res);
                assignValue('form_tab1',res);

            } else if(ftype == "driver_application.php"){
                //alert(ftype);
                assignValue('form_tab2',res);

            }else if(ftype == "driver_evaluation_form.php"){
                
                assignValue('form_tab3',res);

            }else if(ftype == "document_tab_3.php"){
                //alert('test');
              $('#form_consent input').each(function(){
               //alert('test2');
                    var $name = $(this).attr('name');
                    //alert($name);
                   $(this).val(res[$name]);
                   /* if(obj[$name])
                    alert(ob[$name]);*/
            
               });

            }
        });
        });
    }
    else
        $('.subform').html("");
}


function assignValue(formID,obj){
    // debugger;
    //alert(formId);
   $('#'+formID).find(':input').each(function(){
        var $name = $(this).attr('name');
        $(this).val(obj[$name]);
        if(obj[$name])
        alert(ob[$name]);

   });
   /*
$.each(obj,function(index,value){
// debugger;
    $('#'+formID).find('input[name="'+index+'"]').val(value);
});*/
}

///////////////////////////////////////////////////////
///////////////////////////////////////////////////////


function subform(form_type)
{
    var filename = form_type.replace(/\W/g, '_');
    var filename = filename.toLowerCase();
    $('.subform').show();   1
    $('.subform').load('<?php echo $this->request->webroot;?>documents/subpages/'+filename);
}
jQuery(document).ready(function() {
    <?php
    if(isset($did) && $did)
    {
        ?>
        $('#sub_doc_click<?php echo $mod->sub_doc_id?>').click();
        <?php
    }
    ?>
    $(document.body).on('click','.cont',function(){
     
    var type=$(".document_type").val();
    alert(type);
    //alert($('#sub_id').val());return;
    var data = {uploaded_for:$('#uploaded_for').val(),type:type,sub_doc_id:$('#sub_id').val()};
    $.ajax({
       //data:'uploaded_for='+$('#uploaded_for').val(),
       data : data,
       type:'post',
       url:'<?php echo $this->request->webroot;?>documents/savedoc/<?php echo $cid;?>/'+doc_id+'/?document='+type, 
       success:function(res) {
        $('#did').val(res);
         // saving data
       
         if(type == "Pre-Screening"){
         var forms = $(".tab-pane.active").prev('.tab-pane').find(':input'),
             url = '<?php echo $this->request->webroot;?>documents/savePrescreening/?document='+type,
             order_id =$('#did').val(),
             cid = '<?php echo $cid;?>';
            savePrescreen(url,order_id,cid,forms);

         } else if(type=="Driver Application") {
                var  order_id =$('#did').val(),
                    cid = '<?php echo $cid;?>',
                    url = '<?php echo $this->request->webroot;?>documents/savedDriverApp/'+order_id+'/'+cid+'/?document='+type;                      
                     savedDriverApp(url,order_id,cid);
         }else if(type=="Road test") {
              var order_id =$('#did').val(),
                    cid = '<?php echo $cid;?>',
                    url = '<?php echo $this->request->webroot;?>documents/savedDriverEvaluation/'+order_id+'/'+cid+'/?document='+type;
                   savedDriverEvaluation(url,order_id,cid);
        } else if(type=="Place MEE Order") {
             
             var order_id =$('#did').val(),
                cid = '<?php echo $cid;?>',
                url = '<?php echo $this->request->webroot;?>documents/savedMeeOrder/'+order_id+'/'+cid+'/?document='+type;
              savedMeeOrder(url,order_id,cid,type);
      }
        $('.flashDoc').show();
        $('.flashDoc').hide(5000);
        //window.location = '<?php echo $this->request->webroot?>documents/index';
       }
    });
    });
   $('#addfiles').click(function(){
            //alert("ssss");
           $('#doc').append('<div style="padding-top:10px;"><a href="#" class="btn btn-success">Browse</a> <a href="javascript:void(0);" class="btn btn-danger" onclick="$(this).parent().remove();">Delete</a><br/></div>');
        });
});

function savePrescreen(url,order_id,cid){
    var param = {
        order_id: order_id,
        cid: cid,
        inputs:$('#form_tab1').serialize()
    };
    $.ajax({
    url:url,
    data: param,
    type:'POST',
    success: function(res){

    }
    });
}

function savedDriverApp(url,order_id,cid){
    var param = $('#form_tab2').serialize()
    $.ajax({
    url:url,
    data: param,
    type:'POST',
    success: function(res){

    }
    });
}
function savedDriverEvaluation(url,order_id,cid){
    var param = $('#form_tab3').serialize();

    $.ajax({
    url:url,
    data: param,
    type:'POST',
    success: function(res){

    }
    });
    }

    function savedMeeOrder(url,order_id,cid,type){
        var param = $('#form_consent').serialize();
        $.ajax({
        url:url,
        data: param,
        type:'POST',
        success: function(res){
            //employment
            var url = '<?php echo $this->request->webroot;?>documents/saveEmployment/'+order_id+'/'+cid+'/?document='+type,
                employment=$('#form_employment').serialize();
                saveEmployment(url,employment);

            //education
            url = '<?php echo $this->request->webroot;?>documents/saveEducation/'+order_id+'/'+cid+'/?document='+type,
                education=$('#form_education').serialize();
                saveEducation(url,education);
        }
        });
    }

    function saveEmployment(url,param){
        $.ajax({
            url:url,
            data:param,
            type:'POST',
            success:function(rea){

            }
        });
    }

    function saveEducation(url,param){
        $.ajax({
            url:url,
            data:param,
            type:'POST',
            success:function(res){
                
            }
        });
    }




jQuery(document).ready(function() {
    
   $('#addfiles').click(function(){
            //alert("ssss");
           $('#doc').append('<div style="padding-top:10px;"><a href="#" class="btn btn-success">Browse</a> <a href="javascript:void(0);" class="btn btn-danger" onclick="$(this).parent().remove();">Delete</a><br/></div>');
        });
});
</script>

<style>
@media print {
    .page-header{display:none;}
    .page-footer,.nav-tabs,.page-title,.page-bar,.theme-panel,.page-sidebar-wrapper,.form-actions,.steps,.caption{display:none!important;}
    .portlet-body,.portlet-title{border-top:1px solid #578EBE;}
    .tabbable-line{border:none!important;}
    
    }
</style>
