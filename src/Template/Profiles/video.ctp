<H3 class="page-title"><?php echo $_GET["title"]; ?></H3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/veritas3">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <LI>
            <a href="<?=$this->request->webroot;?>profiles/training">Training</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="">Video Player</a>
        </li>
    </ul>
</div>
<P>Please be patient, it may take a few minutes to load.</P>
<div align="center"><video width="640" height="480" controls="controls">
    <source src="<?php echo $_GET["url"]; ?>" type="video/mp4">
    Your browser does not support the video tag.
</video></div>
