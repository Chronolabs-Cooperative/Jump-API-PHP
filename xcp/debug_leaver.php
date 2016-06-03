<?php
// $Id: debug_leaver.php 2.0.0 - xcp 2015-01-13 01:27 wishcraft $
//  ------------------------------------------------------------------------ //
//                        Chronolabs Australia                               //
//                         Copyright (c) 2015                                //
//                    <[ https://xortify.com/xcp/ ]>                         //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the SDPL Source Directive Public Licence           //
//  as published by Chronolabs Australia; either version 2 of the License,   //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Chronolab Australia        //
//  Chronolabs Cooperative:- 10/466 Illawarra Rd, Marrickville, NSW, 2204    //
//  ------------------------------------------------------------------------ //

$mt=time()+microtime();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XCP Leaver Debug</title>
<!--  Fonts  -->
<link href="http://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f9a1c208996c1d"></script>
<script type="text/javascript">
  addthis.layers({
	'theme' : 'transparent',
	'share' : {
	  'position' : 'right',
	  'numPreferredServices' : 6
	}, 
	'follow' : {
	  'services' : [
		{'service': 'facebook', 'id': 'chronolabs'},
		{'service': 'twitter', 'id': 'negativitygear'},
		{'service': 'linkedin', 'id': 'ceoandfounder'},
		{'service': 'google_follow', 'id': '111267413375420332318'}
	  ]
	},  
	'whatsnext' : {},  
	'recommended' : {
	  'title': 'Recommended for you:'
	} 
  });
</script>
<!-- AddThis Smart Layers END -->
<style>
body {
	font-family:Ubuntu, "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:85%em;
	background: #a647b7; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjYTY0N2I3IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2VhZTI0NiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
	background: -moz-linear-gradient(-45deg,  #a647b7 0%, #eae246 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#a647b7), color-stop(100%,#eae246)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(-45deg,  #a647b7 0%,#eae246 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(-45deg,  #a647b7 0%,#eae246 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(-45deg,  #a647b7 0%,#eae246 100%); /* IE10+ */
	background: linear-gradient(135deg,  #a647b7 0%,#eae246 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a647b7', endColorstr='#eae246',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
	text-align:justify;
}
.main {
	border:3px solid #000000;
	border-radius:15px;
	background-color:#feeebe;
	padding:39px 39px 39px 39px;
	margin:64px 64px 64px 64px;
	-webkit-box-shadow: 7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	-moz-box-shadow:    7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	box-shadow:         7px 7px 10px 0px rgba(108, 80, 99, 0.72);
}
h1 {
	font-weight:bold;
	font-size:1.42em;
	background-color:#FFEED9;
	border-radius:15px;
	padding:10px 10px 10px 10px;
	text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);
}
h2 {
	font-weight:500;
	font-size:1.15em;
	text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);
}
blockquote {
	margin-left:25px;
	margin-right:25px;
	font-family:"Courier New", Courier, monospace;
	margin-bottom:25px;
	padding: 25px 25px 25px 25px;
	border:dotted;
	background-color:#fefefe;
	-webkit-box-shadow: 7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	-moz-box-shadow:    7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	box-shadow:         7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	-webkit-border-radius: 14px;
	-moz-border-radius: 14px;
	border-radius: 14px;
	text-shadow: 2px 2px 2px rgba(103, 87, 101, 0.82);
}
p {
	margin-bottom:12px;
}
</style>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
	var icoroite = 9966 * Math.random() + 7755;
	setTimeout(function() {
		jQuery.getJSON( "https://xortify.com/icons/java/invaders/random.json?sessionid=<?php echo session_id(); ?>", function( data ) {
			$.each(data, function( keyey, value ) {
				$( "#" + keyey ).href = value;
			});
		});
	}, icoroite);
</script>
<?php
	if ((!isset($_SESSION['icon-meta-html']) || empty($_SESSION['icon-meta-html'])) && session_id())
		$_SESSION['icon-meta-html'] = file_get_contents("https://xortify.com/icons/meta/invaders/random.html?sessionid=" . session_id());
	if (isset($_SESSION['icon-meta-html']) && !empty($_SESSION['icon-meta-html']))
		echo $_SESSION['icon-meta-html'];
	else
		echo file_get_contents("http://icons.labs.coop/meta/invaders/random.html?sessionid=" . session_id());
?>
<link rel="stylesheet" href="https://xortify.com/css/3/gradientee/stylesheet.css?sessionid=<?php echo session_id(); ?>" type="text/css">
<link rel="stylesheet" href="https://xortify.com/css/3/shadowing/styleheet.css?sessionid=<?php echo session_id(); ?>" type="text/css">
</head>

<body>
<div style="float:left; "><a style="border:hidden;" href="https://xortify.com/xcp/"><img src="https://xortify.com/xcp/XCP-Logo.png" /></a></div>
<?php if (!isset($_POST['charstring'])&&!isset($_POST['seed'])&&!isset($_POST['length'])) { ?>
<form id="form1" name="form1" method="post" action="" target="_blank">
  <label>Seed (0-255)
  <input name="seed" type="text" id="seed" value="128" size="5" maxlength="3" />
  </label>
  <label>Length
  <input name="length" type="text" id="length" value="28" size="5" maxlength="3" />
  </label>
  <label>Characters to test
  <input name="charstring" type="text" id="charstring" value="" size="15" maxlength="11" />
  </label>
  <label>
  <input type="submit" name="Submit" id="Submit" value="Submit" />
  </label>
</form>
<?php } ?>
<div style="clear:both">&nbsp;</div>
<h2>Debug Examples:</h2>
<ol>
  <li>
    Test Base (<a href="debug_base.php">debug_base.php</a>)
  </li>
  <li>
    Test Enumerator (<a href="debug_enumerator.php">debug_enumerator.php</a>)
  </li>
  <li>
    Index (<a href="index.php">index.php</a>)<br />
  </li>
</ol>
<pre>

<?php 
	if (isset($_POST['charstring'])&&isset($_POST['seed'])&&isset($_POST['length']))
	{
		//error_reporting(0);
		class xcp
		{
		
		}
	
		require ('class/xcp.base.php');
		require ('class/xcp.enumerator.php');
		require ('class/xcp.leaver.php');
		
		$xcp_base = new xcp_base((int)$_POST['seed']);
		$enumerator = new xcp_enumerator($xcp_base);
				
		for ($i=1; $i<strlen($_POST['charstring']); $i++)
		{
			$enum_calc = $enumerator->enum_calc(substr($_POST['charstring'],$i,1),$enum_calc);
		}
		
		//error_reporting(0);
		
		$crc = new xcp_leaver($enum_calc, $xcp_base, $_POST['length']);
		echo "Milliseconds: ".(abs((time()+microtime())-$mt)*1000)."\n";
		print_r($crc);
	}
?>

</pre>

</body>
</html>
