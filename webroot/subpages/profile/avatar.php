<p>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    </p>
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img id="profilepic" 
                                                    <?php if($p->image){?>
                                                    src="<?php echo $this->request->webroot; ?>img/profile/<?php echo $p->image; ?>"
                                                    <?php
                                                     } 
                                                     else {?>
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                    <?php } ?>
                                                    alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            
                                            <div>
																
                                               <a href="javascript:void(0);" id="browseimg" class="btn btn-primary">Browse</a>
                                            </div>
                                            <div class="margin-top-10 alert alert-success display-hide flashimg" style="display: none;">
                                                            <button class="close" data-close="alert"></button>
                                                            Image saved successfully
                                            </div>
                                        </div>


                                    </div>
                                </form>
            <script>
                $(function(){
                   initiate_ajax_upload('browseimg'); 
                });
                function initiate_ajax_upload(button_id){
                var button = $('#'+button_id), interval;
                new AjaxUpload(button,{
                    action: base_url+"profiles/upload_img/<?php if(isset($id))echo $id;?>",                      
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
                    onComplete: function(file, response){
                        button.text('Browse');
                            window.clearInterval(interval);
                            this.enable();
                            $("#profilepic").attr("src",'<?php echo $this->request->webroot;?>img/profile/'+response);
                            $("#ppicture").attr("src",'<?php echo $this->request->webroot;?>img/profile/'+response);
                            $('.flashimg').show();
                            }                        		
                    });                
            }
           </script>