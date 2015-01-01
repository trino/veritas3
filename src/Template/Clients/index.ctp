<?php $settings = $this->requestAction('settings/get_settings');?>
<?php $sidebar =$this->requestAction("settings/get_side/".$this->Session->read('Profile.id'));?>
<h3 class="page-title">
			<?php echo ucfirst($settings->client);?>s
			</h3>
    <div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""><?php echo ucfirst($settings->client);?></a>
					</li>
				</ul>
			<a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
			</div>
<?php include('subpages/clients/listing.php');?>