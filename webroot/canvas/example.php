        <?php $_GET['num']=1;?>
		<meta name="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0;user-scalable=0;"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
			
		
		<script src="<?php echo $this->request->webroot;?>canvas/jquery.jqscribble.js" type="text/javascript"></script>
		<script src="<?php echo $this->request->webroot;?>canvas/jqscribble.extrabrushes.js" type="text/javascript"></script>
		
		<style>
			.links a {
				padding: 3px 10px;
                background:#007ECC;
                display: inline-block;
                border-radius:4px;
				text-decoration: none;
				color: #FFF;
                
			}
			.column-left {
				display: inline; 
				float: left;
			}
			.column-right {
				display: inline; 
				float: right;
			}
		</style>
	
		<div style="overflow: hidden; margin-bottom: 5px;display:none" class="">
			<div class="column-left links" style="display: none;">
				<strong>BRUSHES:</strong>
				<a href="#" onclick='$("#test").data("jqScribble").update({brush: BasicBrush});'>Basic</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brush: LineBrush});'>Line</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brush: CrossBrush});'>Cross</a>
			</div>
			<div class="column-right links" style="display: none;">
				<strong>COLORS:</strong>
				<a href="#" onclick='$("#test").data("jqScribble").update({brushColor: "rgb(0,0,0)"});'>Black</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brushColor: "rgb(255,0,0)"});'>Red</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brushColor: "rgb(0,255,0)"});'>Green</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brushColor: "rgb(0,0,255)"});'>Blue</a>
			</div>
		</div>
        <div class="col-sm-6" style="width: 400px;">
    		<canvas id="test<?php echo $_GET['num'];?>" style="border: 1px solid silver;border-radius: 5px;"></canvas>
    		<div class="links" style="margin-top: 5px;">
    			<strong style="display: none;">OPTIONS:</strong>
    			<a href="#" onclick='addImage();' style="display: none;">Add Image</a>
    			<a href="javascript:void(0)" onclick='$("#test<?php echo $_GET['num'];?>").data("jqScribble").clear();'>Clear</a> 			
                <br /><br />
                
    		</div>
        </div>
		