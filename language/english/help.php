<?php
/**
 * Chronolabs REST Short Link URIs API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://au.syd.labs.coop
 * @license         Academic + GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         api
 * @since           2.2.1
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         2.2.1
 * @subpackage		shortening-url
 * @description		Short Link URIs API
 * @link			http://internetfounder.wordpress.com
 * @link			http://sourceoforge.net/projects/chronolabsapis/files/jump.labs.coop
 * @link			https://github.com/Chronolabs-Cooperative/Jump-API-PHP
 */

if (strlen($theip = whitelistGetIP(true))==0)
	$theip = "127.0.0.1";

$data = '';
for($t=mt_rand(0, 10); $t<mt_rand(22,45); $t++)
	while(mt_rand(0,45)<= 39)
		$data .= chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z"))) . chr(mt_rand(ord("A"),ord("Z"))) . chr(mt_rand(ord("a"),ord("z"))) . chr(mt_rand(ord("0"),ord("9"))) . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z"))) ;

global $domain, $protocol, $business, $entity, $contact, $referee, $peerings, $source;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta property="og:url" content="<?php echo API_URL; ?>/" />
	<meta property="og:site_name" content="Jump Short URL API"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="rating" content="general" />
	<meta http-equiv="author" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="copyright" content="Chronolabs Cooperative &copy; <?php echo date("Y")-1; ?>-<?php echo date("Y")+1; ?>" />
	<meta http-equiv="generator" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?php echo API_URL; ?>/assets/images/logo_350x350.png">
	<link rel="icon" href="<?php echo API_URL; ?>/assets/images/logo_350x350.png">
	<link rel="apple-touch-icon" href="<?php echo API_URL; ?>/assets/images/logo_350x350.png">
	<meta property="og:image" content="<?php echo API_URL; ?>/assets/images/logo_350x350.png">
	<title>Jump Short URL API || Chronolabs Cooperative (Sydney, Australia)</title>
	<meta property="og:title" content="Jump Short URL API"/>
	<meta property="og:type" content="jump-api"/>
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
			{'service': 'twitter', 'id': 'ChronolabsCoop'},
			{'service': 'twitter', 'id': 'SimonXaies'},
			{'service': 'twitter', 'id': 'VCF5Project'},
			{'service': 'twitter', 'id': 'DistancesID'},
			{'service': 'twitter', 'id': '8BitInsitute'},
			{'service': 'facebook', 'id': 'ChronolabsCoop'}
		  ]
		},  
		'whatsnext' : {},  
		'recommended' : {
		  'title': 'Recommended for you:'
		} 
	  });
	</script>
	<!-- AddThis Smart Layers END -->
	</script>
	
    <!-- AddThis Smart Layers END -->
    <link rel="stylesheet" href="<?php echo API_URL; ?>/assets/css/style.css" type="text/css" />
    <!-- Custom Fonts -->
    <link href="<?php echo API_URL; ?>/assets/media/Labtop/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Labtop Bold/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Labtop Bold Italic/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Labtop Italic/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Labtop Superwide Boldish/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Labtop Thin/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Labtop Unicase/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/LHF Matthews Thin/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Life BT Bold/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Life BT Bold Italic/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Prestige Elite/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Prestige Elite Bold/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo API_URL; ?>/assets/media/Prestige Elite Normal/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo API_URL; ?>/assets/css/gradients.php" type="text/css" />
    <link rel="stylesheet" href="<?php echo API_URL; ?>/assets/css/shadowing.php" type="text/css" />
    	
</head>
<body>
<div class="main">
 	<?php if (!empty($GLOBALS['errors']) > 0) { ?>
 	<div id="error" class="error">
    	<h2 style="color: rgb(250,10,20);">Validation(s) Errors have Occured with the API Function called now Executed!</h2>
    	<ol style="color: rgb(250,10,20); font-family: "Api Code Examples", "Courier New", Courier, monospace !important; text-align: center; font-weight: bold; font-size: 129%;"><li><?php echo implode("<li></li>", $GLOBALS['errors']); ?></li></ol>
    </div>
    <?php } ?>
    <h1 class="headerone">Jump Short URL API || Chronolabs Cooperative (Sydney, Australia)</h1>
    <p class="paragraph">This is an API Service for creating short URLs from this API!</p>
    <h2 class="headertwo">Code API Documentation</h2>
    <p class="paragraph">You can find the phpDocumentor code API documentation at the following path :: <a target="_blank" href="<?php echo API_URL; ?>/docs/" target="_blank"><?php echo API_URL; ?>/docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <h2 class="headertwo">API Traffic Statistics</h2>
    <p class="paragraph">You can find AWStats with the API traffic statistic updated every 20 minutes at the following path :: <a target="_blank" href="<?php echo API_URL; ?>/awstats/awstats.pl" target="_blank"><?php echo API_URL; ?>/awstats/awstats.pl</a>.</p>
    <h2 class="headertwo">Shorten URL Document Output</h2>
    <p class="paragraph">This is done with the <em>url.api</em> extension at the end of the url.</p>
    <blockquote class="blockquote">
		<form action="<?php echo API_URL; ?>/v2/url.api" method="post">
			<label for="response-raw">Response formated RAW&nbsp</label><input type="radio" name="response" id="response-raw" value="raw" />
			<label for="response-php">Response formated PHP&nbsp</label><input type="radio" name="response" id="response-php" value="php" />
			<label for="response-json">Response formated JSON&nbsp</label><input type="radio" name="response" id="response-json" value="json" checked="checked"/>
			<label for="response-serial">Response formated PHP Serialisation</label><input type="radio" name="response" id="response-serial" value="serial"/>
			<label for="response-xml">Response formated XML</label><input type="radio" name="response" id="response-xml" value="xml"/><br/>
			<label for="url">URL/URI to shorten</label><input type="textbox" name="url" id="url" value="http://" size="36" maxlen="5000"/>
			<label for="custom">Custom Referee Prefer</label><input type="textbox" name="custom" id="custom" value="" size="12" maxlen="128"/>
			<input type="submit" id="submit" Value="Shorten URI/URL" />
		</form>
		Example of Form:-
		<pre class="preblock">
	&lt;form action=&quot;<?php echo API_URL; ?>/v2/url.api&quot; method=&quot;post&quot;&gt;
		&lt;label for=&quot;response-raw&quot;&gt;Response formated RAW&nbsp&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-raw&quot; value=&quot;raw&quot; /&gt;
		&lt;label for=&quot;response-php&quot;&gt;Response formated PHP&nbsp&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-php&quot; value=&quot;php&quot; /&gt;
		&lt;label for=&quot;response-json&quot;&gt;Response formated JSON&nbsp&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-json&quot; value=&quot;json&quot; checked=&quot;checked&quot;/&gt;
		&lt;label for=&quot;response-serial&quot;&gt;Response formated PHP Serialisation&nbsp&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-serial&quot; value=&quot;serial&quot;/&gt;
		&lt;label for=&quot;response-xml&quot;&gt;Response formated XML&nbsp&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-xml&quot; value=&quot;xml&quot;/&gt;&lt;br/&gt;
		&lt;label for=&quot;url&quot;&gt;URL/URI to shorten&lt;/label&gt;&lt;input type=&quot;textbox&quot; name=&quot;url&quot; id=&quot;url&quot; value=&quot;http://&quot; size=&quot;36&quot; maxlen=&quot;5000&quot;/&gt;
                &lt;label for=&quot;custom&quot;&gt;Custom Referee Prefer&lt;/label&gt;&lt;input type=&quot;textbox&quot; name=&quot;custom&quot; id=&quot;custom&quot; value=&quot;&quot; size=&quot;12&quot; maxlen=&quot;128&quot;/&gt;
		&lt;input type&quot;submit&quot; id=&quot;submit&quot; Value=&quot;Shorten URI/URL&quot; /&gt;
	&lt;/form&gt;
		</pre>
		<br/><br/>
		PHP function required for cURL the form:-
		<pre class="preblock" style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;?php
	if (!function_exists("getURIData")) {
	
		/* function getURIData() cURL Routine
		 * 
		 * @author 		Simon Roberts (labs.coop) wishcraft@users.sourceforge.net
		 * @return 		string
		 */
		function getURIData($uri = '', $timeout = 25, $connectout = 25, $post_data = array())
		{
			if (!function_exists("curl_init"))
			{
				return file_get_contents($uri);
			}
			if (!$btt = curl_init($uri)) {
				return false;
			}
			curl_setopt($btt, CURLOPT_HEADER, 0);
			curl_setopt($btt, CURLOPT_POST, (count($posts)==0?false:true));
			if (count($posts)!=0)
				curl_setopt($btt, CURLOPT_POSTFIELDS, http_build_query($post_data));
			curl_setopt($btt, CURLOPT_CONNECTTIMEOUT, $connectout);
			curl_setopt($btt, CURLOPT_TIMEOUT, $timeout);
			curl_setopt($btt, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($btt, CURLOPT_VERBOSE, false);
			curl_setopt($btt, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($btt, CURLOPT_SSL_VERIFYPEER, false);
			$data = curl_exec($btt);
			curl_close($btt);
			return $data;
		}
	}
?&gt;
		</pre><br/><br/>
        PHP function in use as per required for cURL:-
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;?php
	// output the passed array from submission form
	print_r(json_decode(getURIData("<?php echo API_URL; ?>/v2/url.api", 560, 560, 
				 
				 				/* URL Upload return after submission (required) */
								array('response' => 'json', 
				
								/* URL for API Shortening  (required) */
								'url' => '<?php echo API_URL; ?>/ie/example/uri.html')), true));
?&gt;
		</pre><br/><br/>
    </blockquote>
    <div style="clear: both;">&nbsp;</div>
    <div style="clear: both;">&nbsp;</div>
    <?php $services = explode("\n", file_get_contents("https://raw.githubusercontent.com/Chronolabs-Cooperative/Jump-API-PHP/master/services.txt")); ?>
    <h2 class="headertwo">Shortening URL Services Operate on the following URLs</h2>
	<p class="paragraph">The following URL can be used to Shortening a URL, they are the following domains with this API on it:-
		<div style="margin-bottom: 13px; margin: 14px auto; width: 100%; clear: both; height: auto;"">
			  <ul>
<?php foreach($services as $hostname) { if (!empty($hostname)) { ?>			  
					<li style="float: left; width: 16%; clear:none; font-size: 122%;"><a href="//<?php echo $hostname; ?>"><?php echo $hostname; ?></a></li>
<?php } } ?>					
			  </ul>
		</div>
	</p>
	<div style="clear: both;">&nbsp;</div>
    <?php 
    	readfile(__DIR__ . DIRECTORY_SEPARATOR . 'apis-labs.coop.html');
    ?>	
</div>
</html>
<?php 

