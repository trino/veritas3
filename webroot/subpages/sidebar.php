<?php $sidebar =$this->requestAction("settings/all_settings/".$this->Session->read('Profile.id')."/sidebar");
        $order_url = $this->requestAction("settings/getclienturl/".$this->Session->read('Profile.id')."/order");
      $document_url = $this->requestAction("settings/getclienturl/".$this->Session->read('Profile.id')."/document"); ?>

<div class="page-sidebar-wrapper">

		<div class="page-sidebar navbar-collapse collapse">
			<ul id="mainbar" class="<?php echo $settings->sidebar;?>" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<!--<div class="sidebar-toggler">
					</div>-->
					<!-- END SIDEBAR TOGGLER BUTTON -->
                    <?php $logo1 = $this->requestAction('Logos/getlogo/1');?>
					<div class="whitecenterdiv">A service division of</div>

                    <img src="<?php echo $this->request->webroot.'img/logos/'.$logo1;?>" class="secondary_logo"  />
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="<?php echo $this->request->webroot.'documents';?>" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start <?php echo($this->request['controller']=='Dashboard')?'active open':'';?>">
					<a href="<?php echo WEB_ROOT;?>">
					<i class="icon-home"></i>
					<span class="title">Dashboard </span>
					<span class="selected"></span>
					
					</a>
					
				</li>
                
                 <?php if($sidebar->client==1){?>

                	<li class="<?php echo($this->request['controller']=='Clients' && $this->request['action']!='quickcontact')?'active open':'';?>">
					<a href="javascript:;">
					<i class="icon-globe"></i>
					<span class="title"><?php echo ucfirst($settings->client);?>s</span>
                    <?php echo($this->request['controller']=='Clients')?'<span class="selected"></span>':'';?>
					<span class="arrow "></span>
					</a>
                    <?php if($sidebar->client_list==1 || $sidebar->client_create==1){?>
					<ul class="sub-menu">
                        <?php if($sidebar->client_list==1){?>
						<li <?php echo($this->request['controller']=='Clients' && $this->request['action']=='index')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>clients">
							<i class="icon-list"></i>
							List <?php echo ucfirst($settings->client);?>s</a>
						</li>
                        <?php
                        }
                        if($sidebar->client_create==1){?>
                        
						<li <?php echo($this->request['controller']=='Clients' && $this->request['action']=='add')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>clients/add">
							<i class="icon-plus"></i>
							Add new <?php echo ucfirst($settings->client);?></a>
						</li>
                        
                            <?php
                        }
                        ?>
                        <!--<li>
							<a href="<?php echo WEB_ROOT;?>clients/add">
							<i class="icon-basket"></i>
							Assign Client to user</a>
						</li>-->
						
					</ul>
                    <?php }?>
				</li>
                <?php }?>
                <?php if($sidebar->profile==1){?>
                    <li class="<?php echo($this->request['controller']=='Profiles' && $this->request['action']!='logo'&& $this->request['action']!='todo')?'active open':'';?>">
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title"><?php echo ucfirst($settings->profile);?>s</span>
                    <?php echo($this->request['controller']=='Profiles' )?'<span class="selected"></span>':'';?>
                    
					<span class="arrow "></span>
					</a>
                    <?php if($sidebar->profile_list==1 || $sidebar->profile_create==1){?>
					<ul class="sub-menu">
                        <?php if($sidebar->profile_list==1){?>
						<li <?php echo($this->request['controller']=='Profiles' && $this->request['action']=='index')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>profiles">
							<i class="icon-list"></i>
							List <?php echo ucfirst($settings->profile);?>s</a>
						</li>
                        <?php }?>
                        <?php if($sidebar->profile_create==1){?>
						<li <?php echo($this->request['controller']=='Profiles' && $this->request['action']=='add')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>profiles/add">
							<i class="icon-plus"></i>
							Create <?php echo ucfirst($settings->profile);?></a>
						</li>
                        <?php }?>
						
					</ul> 
                    <?php }?>
				</li>
                <?php } ?>
                <!--<li class="start <?php echo($this->request['controller']=='Logos')?'active open':'';?>">
					<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">Logo Manager </span>
					<span class="selected"></span>
					</a>
                    <ul class="sub-menu">
						<li <?php echo($this->request['controller']=='Logos' && $this->request['action']=='index')?'class="active"':'';?>>
							<a href="<?php echo $this->request->webroot;?>Logos">
							<i class="icon-home"></i>
							Primary logo</a>
						</li>
						<li <?php echo($this->request['controller']=='Profiles' && $this->request['action']=='secondary')?'class="active"':'';?>>
							<a href="<?php echo $this->request->webroot;?>Logos/secondary">
							<i class="icon-basket"></i>
							Secondary logo</a>
						</li>
                        
						
					</ul>
					
				</li>-->
                 <?php if($sidebar->document==1){

                     ?>
				<li class="<?php echo(($this->request['controller']=='Documents' && ($this->request['action']=="index" || $this->request['action']=="add") ) && !isset($_GET['draft']))?'active open':'';?>">
					<a href="javascript:;">
					<i class="icon-notebook"></i>
					<span class="title"><?php echo ucfirst($settings->document);?>s</span>
					<?php echo($this->request['controller']=='Documents')?'<span class="selected"></span>':'';?>
					<span class="arrow "></span>
					</a>
                    <?php if($sidebar->document_list==1 || $sidebar->document_create==1){?>
					<ul class="sub-menu">
                        <?php if($sidebar->document_list==1){?>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='index' && !isset($_GET['draft']))?'class="active"':'';?>>
							<a href="<?php echo $this->request->webroot;?>documents/index">
                            <i class="icon-list"></i>
							List <?php echo ucfirst($settings->document);?>s</a>
						</li>
                        <?php }?>
                        <?php if($sidebar->document_create==1){?>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='add' && !isset($_GET['draft']))?'class="active"':'';?>>
							<a href="<?php echo $this->request->webroot.$document_url;?>">
                            <i class="icon-plus"></i>
							Create <?php echo ucfirst($settings->document);?></a>
						</li>
						<?php } ?>
                       

                        <?php /*
                        if($sidebar->document_create==1){?>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='order')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>documents/addorder/1">
                            <i class="icon-plus"></i> 
							Submit Orders</a>
						</li>
						<?php }?>
                        <?php if($sidebar->document_create==1){?>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='add')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>documents/add/1">
                            <i class="icon-plus"></i>
							Submit <?php echo ucfirst($settings->document);?></a>
						</li>
						<?php } */
                     ?>
												
					</ul>
                    <?php }  ?>
				</li>
                <?php  } ?>
                <!--<li class="<?php echo($this->request['action']=='stats')?'active open':'';?>">
                <a href="<?php echo $this->request->webroot;?>documents/stats">
                <i class="icon-list"></i>
				<span class="title">Stats By Recruiter</span>
                <span class="selected"></span>
                </a>
                </li>
                
                <li class="<?php echo($this->request['controller']=='Todo')?'active open':'';?>">
                <a href="javascript:;">
                <i class="icon-calendar"></i>
				<span class="title">Todo (Reminders)</span>
                <span class="selected"></span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo $this->request->webroot;?>todo/view/1">
                        <i class="icon-clock"></i>
                        Slider Redesign
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->request->webroot;?>todo/view/1">
                        <i class="icon-clock"></i>
                        Slider Redesign
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->request->webroot;?>todo/view/1">
                        <i class="icon-clock"></i>
                        Slider Redesign
                        </a>
                    </li>
                </ul>

                </li>-->

                </li>
                <?php if($sidebar->orders==1){?>
                <li class="<?php echo(($this->request['action']=='orderslist' || $this->request['action']=='addorder') && !isset($_GET['draft']))?'active open':'';?>">
                <a href="<?php echo $this->request->webroot;?>documents/orderslist">
                <i class="icon-notebook"></i>
				<span class="title">Orders</span>
                <span class="selected"></span>
                </a>
                <?php if($sidebar->orders_list==1 || $sidebar->orders_create==1){?>
					<ul class="sub-menu">
                        <?php if($sidebar->orders_list==1){?>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='orderslist' && !isset($_GET['draft']))?'class="active"':'';?>>
							<a href="<?php echo $this->request->webroot;?>documents/orderslist">
                            <i class="icon-list"></i>
							List Order</a>
						</li>
                        <?php }?>
                        <?php if($sidebar->orders_create==1){?>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='addorder' && !isset($_GET['draft']))?'class="active"':'';?>>
							<a href="<?php echo $this->request->webroot.$order_url;?>">
                            <i class="icon-plus"></i>
							Create Order</a>
						</li>
						<?php } ?>
                     </ul>
                    <?php }  ?>
                </li>
                <?php }?>
                <?php if($sidebar->messages==1){?>
                <li class="<?php echo($this->request['controller']=='Messages')?'active open':'';?>">
                <a href="<?php echo $this->request->webroot;?>Messages">
                <i class="icon-envelope"></i>
				<span class="title">Messages</span>
                <span class="selected"></span>
                </a>
                </li>
                <?php
                }
                
                if($sidebar->drafts==1){
                ?>
                
                <li class="<?php echo(isset($_GET['draft']))?'active open':'';?>">
                <a href="javascript:;">
                <i class="icon-note"></i>
				<span class="title">Draft</span>
                <span class="selected"></span>
                </a>
                
					<ul class="sub-menu">
                        
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='index')?'class="active"':'';?>>
							<a href="<?php echo $this->request->webroot;?>documents/index?draft">
                            <i class="icon-list"></i>
							 <?php echo ucfirst($settings->document);?>s</a>
						</li>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='orderslist')?'class="active"':'';?>>
                            <a href="<?php echo $this->request->webroot;?>documents/orderslist?draft">
                                <i class="icon-list"></i> Orders</a>
                        </li>
                       

                        <?php /*
                        if($sidebar->document_create==1){?>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='order')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>documents/addorder/1">
                            <i class="icon-plus"></i> 
							Submit Orders</a>
						</li>
						<?php }?>
                        <?php if($sidebar->document_create==1){?>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='add')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>documents/add/1">
                            <i class="icon-plus"></i>
							Submit <?php echo ucfirst($settings->document);?></a>
						</li>
						<?php } */
                     ?>
												
					</ul>
                   
                </li>
                <?php
                }
                ?>
               
				<!--
                <li class="<?php echo($this->request['controller']=='Pages' && $this->request['action']=='cms' )?'active open':'';?> last">
                    <a href="javascript:;">
					<i class="icon-rocket"></i>
					<span class="title">Pages</span>
                    <span class="selected"></span>
					<span class="arrow "></span>
					</a>
                    <ul class="sub-menu">
						<li>
							<a href="<?php echo $this->request->webroot;?>pages/cms/help">
							<i class="icon-home"></i>
							Help</a>
						</li>
						<li>
							<a href="<?php echo $this->request->webroot;?>pages/cms/privacy-code">
							<i class="icon-home"></i>
							Privacy code</a>
						</li>
                        <li>
							<a href="<?php echo $this->request->webroot;?>pages/cms/product-example">
							<i class="icon-home"></i>
							Product example</a>
						</li>
                        <li>
							<a href="<?php echo $this->request->webroot;?>pages/cms/terms">
							<i class="icon-home"></i>
							Terms</a>
						</li>
                        <li>
							<a href="<?php echo $this->request->webroot;?>pages/cms/faq">
							<i class="icon-home"></i>
							FAQ</a>
						</li>
						
					</ul>
                </li>-->
                <!--<li class="last">
					<img src="<?php echo $this->request->webroot;?>img/logos/ISBWhite.png" />
               </li>-->

				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>