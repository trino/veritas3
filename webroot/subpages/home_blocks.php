<?php //echo die('here');?>
<div class="row">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-copy"></i><?php echo $settings->document; ?>s
			</div>

		</div>

	</div>
	</div>


                <?php 

                $class = array('blue-madison','red','yellow','purple','green', 'red-intense','yellow-saffron','grey-cascade','blue-steel','blue');

                
                $doc = $doc_comp->getDocument();
                
                //
                $i=0;
                if($doc){
                    //echo strtolower($document->document_type);
                    $form_type = "";
                    foreach($doc as $d)
                    {
                        //echo strtolower($d->title);
                        if(isset($document) && strtolower($d->title) == strtolower($document->document_type))
                             $form_type = $d->form;
                        //$prosubdoc = $this->requestAction('/profiles/getProSubDoc/'.$this->Session->read('Profile.id').'/'.$d->id);
                        $prosubdoc = $this->requestAction('/settings/all_settings/0/0/profile/'.$this->Session->read('Profile.id').'/'.$d->id);
                        if($i==11)
                            $i=0;
                        ?>
                        <?php if($prosubdoc['display'] > 1 && $d->display==1)
                        {?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    					<div class="dashboard-stat <?php echo $class[$i]; ?>">
                            <div class="whiteCorner"></div>
    
                            <div class="visual">
    							<i class="fa fa-copy"></i>
    						</div>
    						<div class="details">
    							<div class="number">
                                
                                <?php 
                                if(($this->request->params['controller']!='documents' && $this->request->params['action']!='add') && ($this->request->params['controller']!='documents' && $this->request->params['action']!='edit') && ($this->request->params['controller']!='documents' && $this->request->params['action']!='view')){
                                if($d->orders==0)echo $cnt = $this->requestAction('/documents/get_documentcount/'.$d->id); ?>
    							<?php if($d->orders==1)echo $cnt = $this->requestAction('/orders/get_orderscount/'.$d->table_name); }?>	
    							</div>
    							<div class="desc">
    								 <?php
									 	$title = ucfirst($d->title);
									 	if ($title == "Feedbacks") { $title = "Feedback"; }
									 echo $title; ?>
    							</div>
    						</div>
                            <?php if($this->request['controller']!="Documents"){?>
    						<?php if($d->orders==0){?><a class="more" href="<?php echo $this->request->webroot;?>documents/index?type=<?php echo urlencode($d->title);?>">
    						View more <i class="m-icon-swapright m-icon-white"></i>
    						</a><?php }?>
                            <?php if($d->orders==1){?>
                            <a class="more" href="<?php echo $this->request->webroot;?>documents/orderslist<?php if($d->id <=4 ){?>?table=<?php echo $d->table_name;}?>">
    						View more <i class="m-icon-swapright m-icon-white"></i>
    						</a>
                            <?php }
                            }
                            else{?>
                            <a class="more" id="sub_doc_click<?php echo $d->id;?>" href="javascript:;" onclick="showforms('<?php echo $d->form."?doc_id=".$d->id;?>')">
    						Load <?php echo ucfirst($settings->document); ?><i class="m-icon-swapright m-icon-white"></i>
    						</a>  
                            <?php
                            }?>
    					</div>
                        <div class="dusk"></div>
    
                    </div>
                        <?php
                        }
                        $i++;
                    }
                   
                    
                }
                 ?>
			<!--	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

					<div class="dashboard-stat blue-madison">
                        <div class="whiteCorner"></div>

                        <div class="visual">
							<i class="fa fa-copy"></i>
						</div>
						<div class="details">
							<div class="number">
								 1349
							</div>
							<div class="desc">
								 Pre-Screening
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
                    <div class="dusk"></div>

                </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="whiteCorner"></div>

                        <div class="visual">
							<i class="fa fa-copy"></i>
						</div>
						<div class="details">
							<div class="number">
								 1012
							</div>
							<div class="desc">
								Driver Application
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>                    
                    <div class="dusk"></div>

    </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                    <div class="dashboard-stat red">  <div class="whiteCorner"></div>
						<div class="visual">
							<i class="fa fa-copy"></i>
						</div>
						<div class="details">
							<div class="number">
								 803
							</div>
							<div class="desc">
								<?php //echo ucfirst($settings->client);?>
                                MEE Consent
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
                    <div class="dusk"></div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                    <div class="dashboard-stat green">     <div class="whiteCorner"></div>
						<div class="visual">
							<i class="fa fa-copy"></i>
						</div>
						<div class="details">
							<div class="number">
								 541
							</div>
							<div class="desc">
								<?php //echo ucfirst($settings->profile);?>
                                Driver Evaluation
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
                    <div class="dusk"></div>

                </div>
				
			-->	
			</div>
            