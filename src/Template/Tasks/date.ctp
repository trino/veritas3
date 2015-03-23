<link href="<?php echo $this->request->webroot;?>assets/admin/pages/css/inbox.css" rel="stylesheet" type="text/css"/>
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
						<a href="<?php echo $this->request->webroot;?>tasks/calender">Tasks</a>
                        <i class="fa fa-angle-right"></i>
					</li>
                    <li>
                        <a href="">Date (<?php echo $this->request['pass'][0];?>)</a>
                    </li>
				</ul>
                

			</div>
<<<<<<< HEAD
            
            <div class="row inbox">
				<div class="col-md-2">
					<ul class="inbox-nav margin-bottom-10">
						<li class="compose-btn">
							<a href="<?=$this->request->webroot;?>tasks/add?date=<?= $this->request['pass'][0]; ?>" id="event_add" data-title="Add Task" class="btn green">
							<i class="fa fa-edit"></i> Add Task </a>
						</li>
						<li class="inbox active">
							<a href="javascript:;" class="btn" data-title="Tasks">
							Tasks  </a>
							<b></b>
						</li>
						
					</ul>
				</div>
				<div class="col-md-10">
					<div class="inbox-header">
						<h1 class="pull-left">Tasks</h1>
						<!--<form class="form-inline pull-right" action="index.html">
							<div class="input-group input-medium">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
								<button type="submit" class="btn green"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>-->
					</div>
					<div class="inbox-loading">
						 Loading...
					</div>
					<div class="inbox-content">
                          <?php 
                            if(count($events)>0){
                                ?>
                            <table class="table table-striped table-advance table-hover">
                
                 <?php
                            foreach($events as $event){?>
                            <tr>
                                <td class="view-message hidden-xs"> <a href="<?php echo $this->request->webroot;?>tasks/view/<?php echo $event->id;?>"><?php echo $event->title;?></a></td>
                                <td class="view-message "><?php echo $event->description;?></td>
                                <td class="view-message "><span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($this->request['pass'][0]));?> </span></td>
                            </tr>
							
                        <?php }
                        ?>
                        </table>
                        <?php
                        }
                        else
                            echo "No tasks for today.";
                        ?>
					</div>
				</div>
			</div>
    
=======
            <div class="row">
                                    <div class="col-md-12">
											<div class="scroller" style="max-height: 600px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
												<div class="todo-tasklist">
                                                <?php 
                                                    if(count($events)>0){
                                                    foreach($events as $event){?>
													<a href="<?php echo $this->request->webroot;?>tasks/view/<?php echo $event->id;?>">
                                                    <div class="todo-tasklist-item todo-tasklist-item-border-green">
														
														<div class="todo-tasklist-item-title">
															 <?php echo $event->title;?>
														</div>
														<div class="todo-tasklist-item-text">
															<?php echo $event->description;?>
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($this->request['pass'][0]));?> </span>
															<!--<span class="todo-tasklist-badge badge badge-roundless">Urgent</span>-->
														</div>
													</div></a>
                                                <?php }
                                                }
                                                else
                                                    echo "No tasks for today.";
                                                ?>
                                                    <BR> <BR><a href="<?=$this->request->webroot;?>tasks/add?date=<?= $this->request['pass'][0]; ?>" id="event_add" type="button" class="btn red">Add Task </a>

                                                    <!--<a href="<?php echo $this->request->webroot;?>todo/view/1">
													<div class="todo-tasklist-item todo-tasklist-item-border-red">
														<img class="todo-userpic pull-left" src="<?php echo $this->request->webroot;?>img/uploads/male.png" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Homepage Alignments to adjust
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum dolor sit amet, consectetuer dolore dolor sit amet.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($this->request['pass'][0]));?> </span>
															<span class="todo-tasklist-badge badge badge-roundless">Important</span>
														</div>
													</div></a>
                                                    <a href="<?php echo $this->request->webroot;?>todo/view/1">
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
														<img class="todo-userpic pull-left" src="<?php echo $this->request->webroot;?>img/uploads/male.png" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Slider Redesign
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($this->request['pass'][0]));?> </span>
															<span class="todo-tasklist-badge badge badge-roundless">Important</span>&nbsp;
														</div>
													</div></a>
                                                    <a href="<?php echo $this->request->webroot;?>todo/view/1">
													<div class="todo-tasklist-item todo-tasklist-item-border-blue">
														<img class="todo-userpic pull-left" src="<?php echo $this->request->webroot;?>img/uploads/male.png" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Contact Us Map Location changes
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum amet, consectetuer dolore dolor sit amet.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($this->request['pass'][0]));?> </span>
															<span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp; <span class="todo-tasklist-badge badge badge-roundless">Test</span>
														</div>
													</div></a>
                                                    <a href="<?php echo $this->request->webroot;?>todo/view/1">
													<div class="todo-tasklist-item todo-tasklist-item-border-purple">
														<img class="todo-userpic pull-left" src="<?php echo $this->request->webroot;?>img/uploads/male.png" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Projects list new Forms
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum dolor sit amet, consectetuer dolore psum dolor sit.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($this->request['pass'][0]));?> </span>
														</div>
													</div></a>
                                                    <a href="<?php echo $this->request->webroot;?>todo/view/1">
													<div class="todo-tasklist-item todo-tasklist-item-border-yellow">
														<img class="todo-userpic pull-left" src="<?php echo $this->request->webroot;?>img/uploads/male.png" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 New Search Keywords
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum dolor sit amet, consectetuer sit amet ipsum dolor, consectetuer ipsum consectetuer sit amet dolore.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($this->request['pass'][0]));?> </span>
															<span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp;
														</div>
													</div></a>-->
                                                    
                                                    
												</div>
											</div>
										</div>
                        </div>
>>>>>>> e7dac407bfa285fdabb0de3b3c6ac1db46ac1dbc
