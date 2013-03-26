<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard | Amanda Admin Template</title>
<link rel="stylesheet" href="/public/css/style.default.css" type="text/css" />
<script type="text/javascript" src="/public/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="/public/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="/public/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="/public/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/public/js/plugins/jquery.smartWizard-2.0.min.js"></script>
<script type="text/javascript" src="/public/js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="/public/js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="/public/js/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="/public/js/custom/general.js"></script>
<script type="text/javascript" src="/public/js/custom/dashboard.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/plugins/excanvas.min.js"></script><![endif]-->
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">

<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">Aman.<span>da</span></h1>
            <span class="slogan">admin template</span>
            
            <div class="search">
            	<form action="#" method="post">
                	<input type="text" name="keyword" id="keyword" value="Enter keyword(s)" />
                    <button class="submitbutton"></button>
                </form>
            </div><!--search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
        	<div class="notification">
                <a class="count" href="/public/css/ajax/notifications.html"><span>9</span></a>
        	</div>
            <div class="userinfo">
            	<img src="/public/css/images/thumbs/avatar.png" alt="" />
                <span>Juan Dela Cruz</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href="#"><img src="/public/css/images/thumbs/avatarbig.png" alt="" /></a>
                    <div class="changetheme">
                    	Change theme: <br />
                    	<a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
                <div class="userdata">
                	<h4>Juan Dela Cruz</h4>
                    <span class="email">youremail@yourdomain.com</span>
                    <ul>
                    	<li><a href="editprofile.html">Edit Profile</a></li>
                        <li><a href="accountsettings.html">Account Settings</a></li>
                        <li><a href="help.html">Help</a></li>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<ul class="headermenu">
        	<li class="current"><a href="dashboard.html"><span class="icon icon-flatscreen"></span>Dashboard</a></li>
            <!--<li><a href="manageblog.html"><span class="icon icon-pencil"></span>Documents</a></li>-->
            <li><a href="messages.html"><span class="icon icon-message"></span>Alerts</a></li>
        </ul>
        
        <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                    <h2>Attention</h2>
					<h4>Item 1</h4>
					<h4>Item 2</h4>
                </div><!--one_half-->
                <!--<div class="one_half last alignright">
                	<h4>Current Rate</h4>
                    <h2>53%</h2>
                </div>--><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->
        
        
    </div><!--header-->
	<div class="vernav2 iconmenu">
    	<ul>
        	<li><a href="#formsub" class="editor">Requests</a>
            	<span class="arrow"></span>
            	<ul id="formsub">
					<li><a href="">Active</a></li>
               		<li><a href="previous.html">Previous</a></li>
                    <li><a href="all.html">All</a></li>
                </ul>
            </li>
			<li><a href="provisions.html" class="gallery">Provisions</a></li>
			<li><a href="#addons" class="addons">Misc</a>
            	<span class="arrow"></span>
            	<ul id="addons">
               		<li><a href="newsfeed.html">Misc item 1</a></li>
                    <li><a href="newsfeed.html">Misc item 2</a></li>
                </ul>
            </li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
		<?php echo $this->load->view($middle); ?>
	</div><!--bodywrapper-->

</body>

</html>