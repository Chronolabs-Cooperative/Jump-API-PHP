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

if (strlen($theip = getIP(true))==0)
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
	<link rel="shortcut icon" href="<?php echo API_URL; ?>/icon.png">
	<link rel="icon" href="<?php echo API_URL; ?>/favicon.ico">
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
    <h1 class="headerone">Jump Short URL API | <?php echo API_HOSTNAME; ?> | Chronolabs Cooperative (Sydney, Australia)</h1>
    <p class="paragraph">This is an API Service for creating short URLs from this API!</p>
    <h2 class="headertwo">Code API Documentation</h2>
    <p class="paragraph">You can find the phpDocumentor code API documentation at the following path :: <a target="_blank" href="<?php echo API_URL; ?>/docs/" target="_blank"><?php echo API_URL; ?>/docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <h2 class="headertwo">API Traffic Statistics</h2>
    <p class="paragraph">You can find AWStats with the API traffic statistic updated every 20 minutes at the following path :: <a target="_blank" href="<?php echo API_URL; ?>:1831/awstats/awstats.pl" target="_blank"><?php echo API_URL; ?>:1831/awstats/awstats.pl</a>.</p>
    <h2 class="headertwo">Shorten URL Document Output</h2>
    <p class="paragraph">This is done with the <em>url.api</em> extension at the end of the url.</p>
    <blockquote class="blockquote" style="height: auto !important;">
    	<p style="min-width: 100%; clear: both; height: auto !important;">
		<form action="<?php echo API_URL; ?>/url.api" method="post" style="height: 366px !important;">
			<div style="min-width: 100%; clear: both;">
    			<label for="response-raw">Response formated RAW&nbsp</label><input type="radio" name="response" id="response-raw" value="raw" />
    			<label for="response-php">Response formated PHP&nbsp</label><input type="radio" name="response" id="response-php" value="php" />
    			<label for="response-json">Response formated JSON&nbsp</label><input type="radio" name="response" id="response-json" value="json" checked="checked"/>
    			<label for="response-serial">Response formated PHP Serialisation</label><input type="radio" name="response" id="response-serial" value="serial"/>
    			<label for="response-xml">Response formated XML</label><input type="radio" name="response" id="response-xml" value="xml"/><br/>
    		</div>
    		<div style="min-width: 100%; clear: both;">
    			<div style="float: left; width: auto;">
        			<label for="url">&nbsp;URL/URI to shorten&nbsp;&nbsp;</label><input type="textbox" name="url" id="url" value="http://" size="36" maxlen="5000"/>
        			<label for="custom">&nbsp;Custom Short Reference Preference&nbsp;&nbsp;</label><input type="textbox" name="custom" id="custom" value="" size="12"/><br/>
        		</div>
        		<div style="float: left; width: auto;">
        			<label for="username">Username on '<?php echo parse_url(API_DEPLOYMENT_URL, PHP_URL_HOST); ?>'&nbsp;&nbsp;</label><input type="textbox" name="username" id="username" value="" size="24" maxlen="64"/>
        			<label for="email">Your/Telephanist Contact Email&nbsp;&nbsp;</label><input type="textbox" name="email" id="email" value="" size="24" maxlen="200"/>
        		</div>
			</div>
			<div style="min-width: 100%; clear: both; margin-top: 13px;">
				<div style="float: left; width: auto; margin-right: 11px;">
    				<div style="float: left; width: auto; clear: none; margin-right: 7px; padding-top: 22px;">
    					<div style="width: auto; clear: both; padding: 4px;"><label for="callback-hits">Call Back URL for Hits&nbsp;&nbsp;</label><input style="width: auto; clear: none; padding: 2px;" type="textbox" name="callback-hits" id="callback-hits" value="" maxlen="200" /></div>
    					<div style="width: auto; clear: both; padding: 4px;"><label for="callback-stats">Call Back URL for Statistics&nbsp;&nbsp;</label><input style="width: auto; clear: none; padding: 2px;" type="textbox" name="callback-stats" id="callback-stats" value="" maxlen="200" /></div>
    					<div style="width: auto; clear: both; padding: 4px;"><label for="callback-reports">Call Back URL for Reports&nbsp;&nbsp;</label><input style="width: auto; clear: none; padding: 2px;" type="textbox" name="callback-reports" id="callback-reports" value="" maxlen="200" /></div>
    					<div style="width: auto; clear: both; padding: 4px;"><label for="callback-expires">Call Back URL for Expiry&nbsp;&nbsp;</label><input style="width: auto; clear: none; padding: 2px;" type="textbox" name="callback-expires" id="callback-expires" value="" maxlen="200" /></div>
    				</div>
    				<div style="float: left; width: auto;">
    					<div style='width: auto; padding: 2px;  margin-right: 29px; margin-top: 19px;'>
        					<div style='word-wrap: break-word !important; font-size: 0.75em !important; margin-right: 11px; clear: both; width: 190px;'>Emails to be included in the alias, you can add/remove addresses later, email address has to be comma seperated in the following format: email@alias.snail.email, "Dr. Who Nobody" &lt;email@alias.snail.email&gt;</div>
        					<div style='float: left; clear: both; width: auto;'><label for="emails">Email Alias Contacts:<br /><br /></label></div>
        				</div>
    				</div>
    			</div>
				<div style='float: left; width: auto; margin-left: 9px; margin-top: 19px;'>
					<textarea name="emails" id="emails" style="height: 100% !important; width: 100% !important;" rows='10' cols='49'></textarea>
				</div>
			</div>
			<div style='width: auto; float: right;'><input type="submit" id="submit" Value="Shorten URI/URL" /></div>
		</form>
		</p>
		
		Example of Form:-
		<pre class="preblock" style="margin: 14px; padding: 12px; border: 2px solid #ee43a4; background: #feefcb !important; font-weight: 400; overflow: scroll; height: 375px; overflow: scroll; height: 375px;">
	&lt;form action=&quot;<?php echo API_URL; ?>/url.api&quot; method=&quot;post&quot; style=&quot;height: 366px !important;&quot;&gt;
			&lt;div style=&quot;min-width: 100%; clear: both;&quot;&gt;
    			&lt;label for=&quot;response-raw&quot;&gt;Response formated RAW&nbsp&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-raw&quot; value=&quot;raw&quot; /&gt;
    			&lt;label for=&quot;response-php&quot;&gt;Response formated PHP&nbsp&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-php&quot; value=&quot;php&quot; /&gt;
    			&lt;label for=&quot;response-json&quot;&gt;Response formated JSON&nbsp&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-json&quot; value=&quot;json&quot; checked=&quot;checked&quot;/&gt;
    			&lt;label for=&quot;response-serial&quot;&gt;Response formated PHP Serialisation&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-serial&quot; value=&quot;serial&quot;/&gt;
    			&lt;label for=&quot;response-xml&quot;&gt;Response formated XML&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;response&quot; id=&quot;response-xml&quot; value=&quot;xml&quot;/&gt;&lt;br/&gt;
    		&lt;/div&gt;
    		&lt;div style=&quot;min-width: 100%; clear: both;&quot;&gt;
    			&lt;div style=&quot;float: left; width: auto;&quot;&gt;
        			&lt;label for=&quot;url&quot;&gt;&nbsp;URL/URI to shorten&nbsp;&nbsp;&lt;/label&gt;&lt;input type=&quot;textbox&quot; name=&quot;url&quot; id=&quot;url&quot; value=&quot;http://&quot; size=&quot;36&quot; maxlen=&quot;5000&quot;/&gt;
        			&lt;label for=&quot;custom&quot;&gt;&nbsp;Custom Short Reference Preference&nbsp;&nbsp;&lt;/label&gt;&lt;input type=&quot;textbox&quot; name=&quot;custom&quot; id=&quot;custom&quot; value=&quot;&quot; size=&quot;12&quot;/&gt;&lt;br/&gt;
        		&lt;/div&gt;
        		&lt;div style=&quot;float: left; width: auto;&quot;&gt;
        			&lt;label for=&quot;username&quot;&gt;Username on '<?php echo parse_url(API_DEPLOYMENT_URL, PHP_URL_HOST); ?>'&nbsp;&nbsp;&lt;/label&gt;&lt;input type=&quot;textbox&quot; name=&quot;username&quot; id=&quot;username&quot; value=&quot;&quot; size=&quot;24&quot; maxlen=&quot;64&quot;/&gt;
        			&lt;label for=&quot;email&quot;&gt;Your/Telephanist Contact Email&nbsp;&nbsp;&lt;/label&gt;&lt;input type=&quot;textbox&quot; name=&quot;email&quot; id=&quot;email&quot; value=&quot;&quot; size=&quot;24&quot; maxlen=&quot;200&quot;/&gt;
        		&lt;/div&gt;
			&lt;/div&gt;
			&lt;div style=&quot;min-width: 100%; clear: both; margin-top: 13px;&quot;&gt;
				&lt;div style=&quot;float: left; width: auto; margin-right: 11px;&quot;&gt;
    				&lt;div style=&quot;float: left; width: auto; clear: none; margin-right: 7px; padding-top: 22px;&quot;&gt;
    					&lt;div style=&quot;width: auto; clear: both; padding: 4px;&quot;&gt;&lt;label for=&quot;callback-hits&quot;&gt;Call Back URL for Hits&nbsp;&nbsp;&lt;/label&gt;&lt;input style=&quot;width: auto; clear: none; padding: 2px;&quot; type=&quot;textbox&quot; name=&quot;callback-hits&quot; id=&quot;callback-hits&quot; value=&quot;&quot; maxlen=&quot;200&quot; /&gt;&lt;/div&gt;
    					&lt;div style=&quot;width: auto; clear: both; padding: 4px;&quot;&gt;&lt;label for=&quot;callback-stats&quot;&gt;Call Back URL for Statistics&nbsp;&nbsp;&lt;/label&gt;&lt;input style=&quot;width: auto; clear: none; padding: 2px;&quot; type=&quot;textbox&quot; name=&quot;callback-stats&quot; id=&quot;callback-stats&quot; value=&quot;&quot; maxlen=&quot;200&quot; /&gt;&lt;/div&gt;
    					&lt;div style=&quot;width: auto; clear: both; padding: 4px;&quot;&gt;&lt;label for=&quot;callback-reports&quot;&gt;Call Back URL for Reports&nbsp;&nbsp;&lt;/label&gt;&lt;input style=&quot;width: auto; clear: none; padding: 2px;&quot; type=&quot;textbox&quot; name=&quot;callback-reports&quot; id=&quot;callback-reports&quot; value=&quot;&quot; maxlen=&quot;200&quot; /&gt;&lt;/div&gt;
    					&lt;div style=&quot;width: auto; clear: both; padding: 4px;&quot;&gt;&lt;label for=&quot;callback-expires&quot;&gt;Call Back URL for Expiry&nbsp;&nbsp;&lt;/label&gt;&lt;input style=&quot;width: auto; clear: none; padding: 2px;&quot; type=&quot;textbox&quot; name=&quot;callback-expires&quot; id=&quot;callback-expires&quot; value=&quot;&quot; maxlen=&quot;200&quot; /&gt;&lt;/div&gt;
    				&lt;/div&gt;
    				&lt;div style=&quot;float: left; width: auto;&quot;&gt;
    					&lt;div style='width: auto; padding: 2px;  margin-right: 29px; margin-top: 19px;'&gt;
        					&lt;div style='word-wrap: break-word !important; font-size: 0.75em !important; margin-right: 11px; clear: both; width: 190px;'&gt;Emails to be included in the alias, you can add/remove addresses later, email address has to be comma seperated in the following format: email@alias.snail.email, &quot;Dr. Who Nobody&quot; &lt;email@alias.snail.email&gt;&lt;/div&gt;
        					&lt;div style='float: left; clear: both; width: auto;'&gt;&lt;label for=&quot;emails&quot;&gt;Email Alias Contacts:&lt;br /&gt;&lt;br /&gt;&lt;/label&gt;&lt;/div&gt;
        				&lt;/div&gt;
    				&lt;/div&gt;
    			&lt;/div&gt;
				&lt;div style='float: left; width: auto; margin-left: 9px; margin-top: 19px;'&gt;
					&lt;textarea name=&quot;emails&quot; id=&quot;emails&quot; style=&quot;height: 100% !important; width: 100% !important;&quot; rows='10' cols='49'&gt;&lt;/textarea&gt;
				&lt;/div&gt;
			&lt;/div&gt;
			&lt;div style='width: auto; float: right;'&gt;&lt;input type=&quot;submit&quot; id=&quot;submit&quot; Value=&quot;Shorten URI/URL&quot; /&gt;&lt;/div&gt;
		&lt;/form&gt;
		</pre>
		<br/><br/>
		PHP function required for cURL the form:-
		<pre class="preblock" style="margin: 14px; padding: 12px; border: 2px solid #ee43a4; background: #feefcb !important;  overflow: scroll; height: 375px;">
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
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4; background: #feefcb !important;  overflow: scroll; height: 225px;">
&lt;?php
	// output the passed array from submission form
	print_r(json_decode(getURIData("<?php echo API_URL; ?>/url.api", 560, 560, 
				 
				 				/* URL Upload return after submission (required) */
								array('response' => 'json', 
				
								/* URL for API Shortening  (required) */
								'url' => '<?php echo API_URL; ?>/ie/example/uri.html')), true));
?&gt;
		</pre><br/><br/>
    </blockquote>
    <div style="clear: both;">&nbsp;</div>
    <div style="clear: both;">&nbsp;</div>
    <?php $services = explode("\n", file_get_contents(API_DEPLOYMENT_JUMPAPI_HOSTNAMES)); ?>
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

