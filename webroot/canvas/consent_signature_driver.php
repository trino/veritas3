        
		<meta name="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0;user-scalable=0;"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
			
		
		<script src="<?php echo $this->request->webroot;?>canvas/jquery.jqscribble.js" type="text/javascript"></script>
		<script src="<?php echo $this->request->webroot;?>canvas/jqscribble.extrabrushes.js" type="text/javascript"></script>
		
		<style>
			.links a {
				padding: 3px 10px;
                background:#007ECC;
                display: inline-block;
                border-radius:4px;
				text-decoration: none;
				color: #FFF;
                
			}
			.column-left {
				display: inline; 
				float: left;
			}
			.column-right {
				display: inline; 
				float: right;
			}
		</style>
	
		
        <div class="col-sm-6" id="sig1">
            <input type="hidden" name="criminal_signature_applicant" id="criminal_signature_applicant" />
            <input type="hidden" class="touched" value="0" />
            <input type="hidden" class="touched_edit1" value="<?php if(isset($consent_detail) && $consent_detail->criminal_signature_applicant){?>1<?php }else{?>0<?php }?>" />
            <label class="control-label">Signature of Applicant</label>
            <?php if($this->request->params['action']!= 'vieworder' && $this->request->params['action']!= 'view'){?>
    		<canvas id="test3" style="border: 1px solid silver;border-radius: 5px;"></canvas>
            <?php }?>
    		<div class="links" style="margin-top: 5px;">
    			<strong style="display: none;">OPTIONS:</strong>
    			<a href="#" onclick='addImage();' style="display: none;">Add Image</a>
    			<a href="javascript:void(0)" onclick='$("#test3").data("jqScribble").clear();'>Clear</a> 			
                <br />
    		</div>
        </div>
        <div class="col-sm-6">
                <?php if(isset($consent_detail) && $consent_detail->criminal_signature_applicant){?><img src="<?php echo $this->request->webroot.'canvas/'.$consent_detail->criminal_signature_applicant;?>" style="max-width: 100%;" /><?php }
                else
                {
                    if(isset($consent_detail))
                    {
                        ?>
                        <p>&nbsp;</p><strong>No signature supplied</strong>
                        <?php
                    }
                }
                ?>                    
        </div>
		<div class="clearfix"></div>