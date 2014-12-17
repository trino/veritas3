
<?php $block =$this->requestAction("settings/get_blocks");?>



<div class="tiles">
     <?php if($block->meeting==1){?>
    <div class="tile bg-red-sunglo">

        <div class="tile-body">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Meetings
            </div>
            <div class="number">

            </div>
        </div>


    </div>
    <?php }?>
    <?php if($block->gps==1){?>
    <div class="tile selected bg-yellow-saffron">
        <div class="corner">
        </div>
        <div class="tile-body">
            <i class="fa fa-globe"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                GPS
            </div>
            <div class="number">

            </div>
        </div>
    </div>
     <?php }?>
    <?php if($block->orders==1){?>
    <div class="tile bg-purple-studio">
        <div class="tile-body">
            <i class="fa fa-shopping-cart"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Orders
            </div>
            <div class="number">
                1214
            </div>
        </div>
    </div>
     <?php }?>







    <a href="<?php echo $this->request->webroot;?>documents/add">

    <div class="tile bg-red-sunglo">
        <div class="tile-body">
            <i class="fa fa-copy"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Submit Order
            </div>
            <div class="number">

            </div>
        </div>
    </div>
</a>


    <?php if($block->feedback==1){?>
    <div class="tile bg-green-meadow">
        <div class="tile-body">
            <i class="fa fa-comments"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Feedback
            </div>
            <div class="number">
                34
            </div>
        </div>
    </div>

     <?php }?>
    <?php if($block->report==1){?>
    <div class="tile bg-green">
        <div class="tile-body">
            <i class="fa fa-bar-chart-o"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Reports
            </div>
            <div class="number">
            </div>
        </div>
    </div>
     <?php }?>
    <?php if($block->doc==1){?>
    <div class="tile bg-blue-steel">
        <div class="tile-body">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                <?php echo ucfirst($settings->document);?>
            </div>
            <div class="number">
                124
            </div>
        </div>
    </div>

 <?php }?>
    <?php if($block->setting==1){?>
    <div class="tile bg-yellow-lemon selected">
        <div class="corner">
        </div>
        <div class="check">
        </div>
        <div class="tile-body">
            <i class="fa fa-cogs"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Settings
            </div>
        </div>
    </div>
     <?php }?>










    <?php if($block->conference==1){?>
    <div class="tile bg-red-sunglo">
        <div class="tile-body">
            <i class="fa fa-plane"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Conference
            </div>
            <div class="number">

            </div>
        </div>
    </div>
     <?php }?>
    <?php if($block->stat==1){?>
      <a href="<?php echo $this->request->webroot;?>documents/stats">
      <div class="tile bg-green">
        <div class="tile-body">
            <i class="fa fa-user"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Recruiter Stats
            </div>
            <div class="number">

            </div>
        </div>
    </div>
    </a>
     <?php }?>
    <?php if($block->todo==1){?>
    <a href="<?php echo $this->request->webroot;?>todo">
      <div class="tile bg-blue">
        <div class="tile-body">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Todo
            </div>
            <div class="number">
34
            </div>
        </div>
    </div>
    </a>
     <?php }?>
    
</div>