<h3 class="page-title">
			To Do <small>(Reminders)</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Todo</a>
                        <i class="fa fa-angle-right"></i>
					</li>
                    <li>
						<a href=""><?php if(isset($event)){echo "Edit";}else{echo "Add";}?></a>
					</li>
				</ul>
                

			</div>

<div class="row">
<div class="col-md-10">
<div data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
	<form action="" class="form-horizontal" method="post">
		<!-- TASK HEAD -->
		<div class="form">

			<!-- TASK TITLE -->
			<div class="form-group">
				<div class="col-md-12">
					<input type="text" name="title" class="form-control todo-taskbody-tasktitle" placeholder="Task Title..." value="<?php if(isset($event))echo $event->title;?>" />
				</div>
			</div>
			<!-- TASK DESC -->
			<div class="form-group">
				<div class="col-md-12">
					<textarea class="form-control todo-taskbody-taskdesc" name="description" rows="8" placeholder="Task Description..."><?php if(isset($event))echo $event->description;?></textarea>
				</div>
			</div>
			<!-- END TASK DESC -->
			<!-- TASK DUE DATE -->
			<div class="form-group">
				<div class="col-md-12">
					<div class="input-icon">
						<i class="fa fa-calendar"></i>
						<input type="text" name="date" class="form-control todo-taskbody-due date form_datetime" placeholder="Due Date..." value="<?php if(isset($event))echo date('d F Y - H:m',strtotime($event->date));?>"/>
					</div>
				</div>
			</div>
			
			<div class="form-actions right todo-form-actions">
				<button class="btn btn-circle btn-sm green-haze" type="submit" name="submit">Save Changes</button>
			
			</div>
		</div>
		</div>
	</form>
</div>
</div>