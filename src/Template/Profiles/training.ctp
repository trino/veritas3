<style>
    @media print {
        .page-header {
            display: none;
        }

        .page-footer, .chat-form, .nav-tabs, .page-title, .page-bar, .theme-panel, .page-sidebar-wrapper, .more {
            display: none !important;
        }

        .portlet-body, .portlet-title {
            border-top: 1px solid #578EBE;
        }

        .tabbable-line {
            border: none !important;
        }

        a:link:after,
        a:visited:after {
            content: "" !important;
        }

        .actions {
            display: none
        }

        .paging_simple_numbers {
            display: none;
        }
    }

</style>

<?php $settings = $this->requestAction('settings/get_settings'); ?>
<?php $sidebar = $this->requestAction("settings/get_side/" . $this->Session->read('Profile.id')); ?>
<h3 class="page-title">
    Training
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="">Training</a>
        </li>
    </ul>
    <div class="page-toolbar">

    </div>
    <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-graduation-cap"></i>
                    WHMIS
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-2" align="center">
                        <img src="/veritas3/img/training.png">
                    </div>
                    <div class="col-md-10">
                <p>WHMIS is a comprehensive plan for providing information on the safe use of hazardous materials used in Canadian workplaces.</P>

                <p>WHMIS was created in response to the Canadian workers right to know about the safety and health hazards that may be associated with the materials or chemicals that are used in a workplace. Exposure to hazardous materials can cause or contribute to many serious health effects such as effects on the nervous system, kidney or lung damage, sterility, cancer, burns and rashers. Some hazardous materials are safety hazards and can cause fires or explosions.</P>

                <p>WHMIS was developed by a committee from representatives from the government, industry and labor to ensure that the best interests of everyone were considered.</P>

                <p>On October 31, 1998 WHMIS became a federal Canadian Law. The majority of information requirements of WHMIS legislation were incorporated into the Hazardous Products Act and the Hazardous Materials Information Review Act. These apply to all of Canada.</P>
                 </div>
             </div>
                <div class="row">
                    <div class="col-md-12" align="right">

                        <a href="#" class="btn btn-warning"">Enroll</a>
                        <a class="btn btn-info" href="quiz">View</a>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="#" onclick="return confirm('Are you sure you want to delete this test?');" class="btn btn-danger">Delete</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
