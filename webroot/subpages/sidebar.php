<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<!--<div class="sidebar-toggler">
					</div>-->
					<!-- END SIDEBAR TOGGLER BUTTON -->
                    <?php $logo1 = $this->requestAction('Logos/getlogo/1');?>
                    <center><img src="<?php echo $this->request->webroot.'img/logos/'.$logo1;?>" class="secondary_logo"  /></center>
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
				<li class="<?php echo($this->request['controller']=='Profiles' && $this->request['action']!='logo')?'active open':'';?>">
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">Profiles</span>
                    <?php echo($this->request['controller']=='Profiles')?'<span class="selected"></span>':'';?>
                    
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li <?php echo($this->request['controller']=='Profiles' && $this->request['action']=='index')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>profiles">
							<i class="icon-list"></i>
							List Profiles</a>
						</li>
						<li <?php echo($this->request['controller']=='Profiles' && $this->request['action']=='add')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>profiles/add">
							<i class="icon-plus"></i>
							Create User Profile</a>
						</li>
						
					</ul>
				</li>
                	<li class="<?php echo($this->request['controller']=='Clients' && $this->request['action']!='quickcontact')?'active open':'';?>">
					<a href="javascript:;">
					<i class="icon-globe"></i>
					<span class="title">Clients</span>
                    <?php echo($this->request['controller']=='Clients')?'<span class="selected"></span>':'';?>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li <?php echo($this->request['controller']=='Clients' && $this->request['action']=='index')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>clients">
							<i class="icon-list"></i>
							List Clients</a>
						</li>
						<li <?php echo($this->request['controller']=='Clients' && $this->request['action']=='add')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>clients/add">
							<i class="icon-plus"></i>
							Add new Client</a>
						</li>
                        <!--<li>
							<a href="<?php echo WEB_ROOT;?>clients/add">
							<i class="icon-basket"></i>
							Assign Client to user</a>
						</li>-->
						
					</ul>
				</li>
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
				<li class="<?php echo($this->request['controller']=='Documents')?'active open':'';?>">
					<a href="javascript:;">
					<i class="icon-notebook"></i>
					<span class="title">Documents</span>
					<?php echo($this->request['controller']=='Documents')?'<span class="selected"></span>':'';?>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='index')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>documents/index">
                            <i class="icon-list"></i>
							List Documents</a>
						</li>
                        <li <?php echo($this->request['controller']=='Documents' && $this->request['action']=='add')?'class="active"':'';?>>
							<a href="<?php echo WEB_ROOT;?>documents/add">
                            <i class="icon-plus"></i>
							Submit Document</a>
						</li>
						
												
					</ul>
				</li>

               
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