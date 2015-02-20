 <?php 
	$GLOBALS['webroot'] = $webroot= $this->request->webroot;
  function listfiles($client_docs, $dir, $method=true){
	$webroot=$GLOBALS['webroot'] ;
   if($method) {//old layout ?>
   
   
   <div class="form-group col-md-12">
		<label class="control-label" id="attach_label">Attach Files : </label>

		<div class="row">
			<!-- <a href="#" class="btn btn-primary">Browse</a> -->
			<?php
				if (isset($client_docs) && count($client_docs) > 0) {
					$allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
					foreach ($client_docs as $k => $cd):

						?>
						<div class="col-md-4" align="center">
							<?php
								$e = explode(".", $cd->file);
								$ext = end($e);
								if (in_array($ext, $allowed)) {
									?>
									<img src="<?php echo $webroot . $dir . $cd->file; ?>" style="max-width: 200px;max-height: 200px;"/>

								<?php
								} else
									echo "<a href='" .$webroot . $dir . $cd->file."' target='_blank' class='uploaded'>".$cd->file."</a>";
							?><BR>
							<a href="<?php echo $webroot . $dir . $cd->file ?>" download="<?= $cd->file ?>" class="btn btn-info">Download</a>
							<span>
							<a href="javascript:void(0);"
							   title="<?php echo $cd->file;?>&<?php echo $cd->id;?>"
							   class="btn btn-danger img_delete">Delete</a>
                               </span>
							<input type="hidden" name="client_doc[]" value="<?php echo $cd->file;?>" class="moredocs"/>
						</div>
					<?php
					endforeach;
				} ?>

		</div>
	</div>
   

<?php } else { //metronic method ?>
   
   
	<div class="form-group col-md-12">
		<label class="control-label" id="attach_label">Attach Files</label>

		<div class="row mix-grid">
			<!-- <a href="#" class="btn btn-primary">Browse</a> -->

			<?php
				if (isset($client_docs) && count($client_docs) > 0) {
					$allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
					foreach ($client_docs as $k => $cd):
							$e = explode(".", $cd->file);
							$ext = end($e);
							if (in_array($ext, $allowed)) {?>
						
						
						<div class="col-md-4 col-sm-4 mix category_1 mix_all" style="display: block; opacity: 1;" align="center">
							<div class="mix-inner"  style="min-height: 200px;">
								<img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/jobs/<?php echo $cd->file; ?>" alt="">
								<div class="mix-details">
									<h4>Image name</h4>
									<a class="mix-preview fancybox-button" onclick="$(this).parent().parent().parent().remove()" href="javascript:void(0);" data-rel="fancybox-button">
										<i class="fa fa-trash"></i>
									</a>
									<input type="hidden" name="client_doc[]" value="<?php echo $cd->file;?>" class="moredocs"/>
								</div>
							</div>
						
						<?php
						   } else {
									echo "<a href='".$this->request->webroot."img/jobs/".$cd->file."' target='_blank' class='uploaded'>".$cd->file."</a>";
							} ?>																	                                                                    
						</div>
					<?php
					endforeach;
				} ?>

		</div>
	</div>
	
<?php }} ?>