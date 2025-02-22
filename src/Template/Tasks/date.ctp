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
                                <td class="view-message "><a href="<?php echo $this->request->webroot;?>tasks/view/<?php echo $event->id;?>"><?php echo $event->description;?></a></td>
                                <td class="view-message "><a href="<?php echo $this->request->webroot;?>tasks/view/<?php echo $event->id;?>"><span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo date('d M Y H:i',strtotime($event->date));?> </span></a></td>
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
    
