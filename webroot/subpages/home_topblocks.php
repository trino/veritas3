<?php $block = $this->requestAction("settings/all_settings/".$this->Session->read('Profile.id')."/blocks");
      $sidebar = $this->requestAction("settings/all_settings/".$this->Session->read('Profile.id')."/sidebar");
      //$order_url = $this->requestAction("settings/getclienturl/".$this->Session->read('Profile.id')."/order");
      $order_url = 'documents/productSelection';
      $document_url = $this->requestAction("settings/getclienturl/".$this->Session->read('Profile.id')."/document");
        
?>

<div class="tiles">

    <?php if ($block->addadriver == 1 && $sidebar->profile_create ==1) { ?>

    
        <a class="tile bg-red-sunglo" href="<?php echo $this->request->webroot; ?>profiles/add" style="display: block;">

            <div class="tile-body">
                <i class="fa fa-user"></i>
            </div>
            
            
            <div class="tile-object">
                
                   <div class="name"> Add an <?=$settings->profile;?></div>
                
                <div class="number">

                </div>
            </div>
            

        </a>
        
    <?php } ?>
    <?php if ($block->searchdriver == 1 && $sidebar->profile_list ==1) { ?>
    
        <a href="<?php echo $this->request->webroot; ?>profiles" class="tile  bg-yellow-saffron" style="display: block;">

            <div class="tile-body">
                <i class="fa fa-search"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Search <?=$settings->profile;?>
                </div>
                <div class="number">

                </div>
            </div>
        
        </a>
    <?php } ?>

    <?php if ($block->submitorder == 1 && $sidebar->orders_create ==1) { ?>
    
        <a href="<?php echo $this->request->webroot.$order_url;?>" class="tile bg-purple-studio" style="display: block;">
            <div class="tile-body">
                <i class="fa fa-files-o"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Create Order
                </div>
                <div class="number">

                </div>
            </div>
        
        </a>
    <?php } ?>


    <?php if ($block->orderhistory == 1 && $sidebar->orders_list ==1) { ?>
        

        <a href="<?php echo $this->request->webroot; ?>documents/orderslist" style="display: block;" class="tile bg-green-meadow">

            <div class="tile-body">
                <i class="fa fa-history"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Order History
                </div>
                <!--div class="number">
                    93
                </div-->
            </div>
        
</a>
    <?php } ?>



    <?php if ($block->schedule == 1) { ?>
    <!--<div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="dd-mm-yyyy">-->
        
        <a  href="<?php echo $this->request->webroot;?>todo/calender" class="tile bg-grey-cascade" style="display: block;">
          
            <div class="tile-body">
                <i class="fa fa-calendar"></i>
            </div>
        
            <div class="tile-object">
                <div class="name">
                    Schedule
                </div>
                <div class="number">

                </div>
            </div>
         </a>   
        
        
    <?php } ?>



    <?php /*if ($block->tasks == 1) { ?>
        
        <a class="tile bg-blue-steel" href="<?php echo $this->request->webroot;?>todo/date/<?php echo date('Y-m-d');?>" style="display: block;">
            <div class="tile-body">
                <i class="fa fa-tasks"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Tasks
                </div>
                <div class="number">
                    34
                </div>
            </div>
        
        </a>

    <?php }*/?>



    <?php if ($block->feedback == 1 && $sidebar->feedback == 1) { ?>
    
        <a href="<?php echo $this->request->webroot.$document_url;?>" class="tile bg-green-meadow">
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
        
    </a>
    <?php } ?>

    <?php if ($block->analytics == 1) { ?>
        <a href="<?php echo $this->request->webroot;?>documents/analytics" class="tile bg-green" style="display: block;">
            <div class="tile-body">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Analytics
                </div>
                <div class="number">
                </div>
            </div>
        </a>
    <?php } ?>



    <?php /* if ($block->masterjob == 1) { ?>
        <div class="tile bg-red-intense">
            <div class="tile-body">
                <i class="fa fa-globe"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Master <?php echo ucfirst($settings->client); ?>
                </div>
                <div class="number">

                </div>
            </div>
        </div>

    <?php }*/ ?>



</div>
<script>
$(function(){
    
    $('.date-picker1').datepicker({
        
    })
    //Listen for the change even on the input
    .change(dateChanged)
    .on('changeDate', dateChanged);
});

function dateChanged(ev) {
    datez = (ev.date.valueOf())/1000;
    //alert(ev.date.valueOf());
    $(this).datepicker('hide');
    window.location.href="<?php echo $this->request->webroot;?>todo/date/"+datez;
}
</script>
