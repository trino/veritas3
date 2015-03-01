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
                //debug($doc);
                //
                $i=0;
                if($doc){
                    //echo strtolower($document->document_type);
                    $form_type = "";
                    $titles = array();
                    foreach($doc as $d)
                    {
                        //echo strtolower($d->title);
                        if(isset($document) && strtolower($d->title) == strtolower($document->document_type))
                             $form_type = $d->form;
                        //$prosubdoc = $this->requestAction('/profiles/getProSubDoc/'.$this->Session->read('Profile.id').'/'.$d->id);
                        $prosubdoc = $this->requestAction('/settings/all_settings/0/0/profile/'.$this->Session->read('Profile.id').'/'.$d->id);
                        if(isset($cid))
                        $csubdoc = $this->requestAction('/settings/all_settings/0/0/client/'.$cid.'/'.$d->id);
                        
                        //echo $d->id.":".$csubdoc['display']."-".$prosubdoc['display']."-".$d->display.",";
                        if($i==11)
                            $i=0;
                        ?>
                        <?php if($prosubdoc['display'] > 1 && $d->display == 1 && ( !isset($csubdoc)  || (isset($csubdoc) && $csubdoc['display'] == 1)))
                        {?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">

    					<div class="dashboard-stat <?php echo $class[$i]; ?>">
                            <div class="whiteCorner"></div>
    
                            <div class="visual">
    							<i class="fa fa-copy"></i>
    						</div>
    						<div class="details">
    							<div class="number">
                                <?php 
                                if(($this->request->params['controller']!='documents' && $this->request->params['action']!='add') && ($this->request->params['controller']!='documents' && $this->request->params['action']!='edit') && ($this->request->params['controller']!='documents' && $this->request->params['action']!='view')){
                                echo $cnt = $this->requestAction('/orders/get_orderscount/'.$d->table_name); ?>
    							<?php /*if($d->orders==1)echo $cnt = $this->requestAction('/orders/get_orderscount/'.$d->table_name);*/ }?>	
    							</div>
    							<div class="desc">
    								 <?php
									 	$title = ucfirst($d->title);
									 	if ($title == "Feedbacks") { $title = "Feedback"; }
                                        
                                         $titles[strtolower(trim($title))] = 1;
                                        echo $title;
									  ?>
    							</div>
    						</div>
                            <?php if($this->request['controller']!="Documents"){?>
    						<a class="more" href="<?php echo $this->request->webroot;?>documents/index?type=<?php echo urlencode($d->title);?>">
    						View more <i class="m-icon-swapright m-icon-white"></i>
    						</a>
                            <!--
                            <a class="more" href="<?php echo $this->request->webroot;?>orders/orderslist<?php if($d->id <=4 ){?>?table=<?php echo $d->table_name;}?>">
    						View more <i class="m-icon-swapright m-icon-white"></i>
    						</a>-->
                            <?php
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

                    if ($this->request->controller == "Documents" && $this->request->action == "view") {
                        $documenttype = $this->viewVars['mod']->document_type;
                        if (!isset($titles[strtolower(trim($documenttype))])) {
                            echo '<div class="col-md-12">';
                            echo '<div class="clearfix"></div><div class="alert alert-danger"><strong>Error!</strong> You no longer have permission to view this document type (' . $documenttype . ')</div>';
                            echo '</div>';
                        }
                    }
                 ?>


<!--					<div class="dashboard-stat blue-madison">
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
            