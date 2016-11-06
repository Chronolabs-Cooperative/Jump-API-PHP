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
		$data .= chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("Z"))) . chr(mt_rand(ord("A"),ord("Z"))) . chr(mt_rand(ord("a"),ord("z"))) . chr(mt_rand(ord("!"),ord("="))) . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z")))  . chr(mt_rand(ord("a"),ord("z"))) ;

global $domain, $protocol, $business, $entity, $contact, $referee, $peerings, $source;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 	$servicename = "Shortened Internet URL's"; 
		$servicecode = "SIU"; ?>
	<meta property="og:url" content="<?php echo (isset($_SERVER["HTTPS"])?"https://":"http://").$_SERVER["HTTP_HOST"]; ?>" />
	<meta property="og:site_name" content="<?php echo $servicename; ?> Open Services API's (With Source-code)"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="rating" content="general" />
	<meta http-equiv="author" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="copyright" content="Chronolabs Cooperative &copy; <?php echo date("Y")-1; ?>-<?php echo date("Y")+1; ?>" />
	<meta http-equiv="generator" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<link rel="icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<link rel="apple-touch-icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<meta property="og:image" content="//labs.partnerconsole.net/execute2/external/reseller-logo"/>
	<link rel="stylesheet" href="/style.css" type="text/css" />
	<link rel="stylesheet" href="//css.labs.coop/3/gradientee/stylesheet.css" type="text/css" />
	<link rel="stylesheet" href="//css.labs.coop/3/shadowing/styleheet.css" type="text/css" />
	<title><?php echo $servicename; ?> (<?php echo $servicecode; ?>) Open API || Chronolabs Cooperative (Sydney, Australia)</title>
	<meta property="og:title" content="<?php echo $servicecode; ?> API"/>
	<meta property="og:type" content="<?php echo strtolower($servicecode); ?>-api"/>
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
			{'service': 'twitter', 'id': 'Cipherhouse'},
			{'service': 'twitter', 'id': 'OpenRend'},
			{'service': 'facebook', 'id': 'Chronolabs'}
		  ]
		},  
		'whatsnext' : {},  
		'recommended' : {
		  'title': 'Recommended for you:'
		} 
	  });
	</script>
	<!-- AddThis Smart Layers END -->
</head>
<body>
<div class="main">
 	<?php if (!empty($GLOBALS['errors']) > 0) { ?>
 	<div id="error" class="error">
    	<h2 style="color: rgb(250,10,20);">Validation(s) Errors have Occured with the API Function called now Executed!</h2>
    	<ol style="color: rgb(250,10,20); font-family: "Api Code Examples", "Courier New", Courier, monospace !important; text-align: center; font-weight: bold; font-size: 129%;"><li><?php echo implode("<li></li>", $GLOBALS['errors']); ?></li></ol>
    </div>
    <?php } ?>
    <h1><?php echo $servicename; ?> (<?php echo $servicecode; ?>) Open API || Chronolabs Cooperative (Sydney, Australia)</h1>
    <p>This is an API Service for creating short URLs from this API!</p>
    <h2>Code API Documentation</h2>
    <p>You can find the phpDocumentor code API documentation at the following path :: <a target="_blank" href="<?php echo $source; ?>docs/" target="_blank"><?php echo $source; ?>docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <h2>Shorten URL Document Output</h2>
    <p>This is done with the <em>url.api</em> extension at the end of the url.</p>
    <blockquote>
		<form action="<?php echo $source; ?>v2/url.api" method="post">
			<label for="response-json">Response formated JSON&nbsp</label><input type="radio" name="response" id="response-json" value="json" checked="checked"/>
			<label for="response-serial">Response formated PHP Serialisation</label><input type="radio" name="response" id="response-serial" value="serial"/>
			<label for="response-xml">Response formated XML</label><input type="radio" name="response" id="response-xml" value="xml"/><br/>
			<label for="url">URL/URI to shorten</label><input type="textbox" name="url" id="url" value="http://" size="36" maxlen="5000"/>
			<label for="custom">Custom Referee Prefer</label><input type="textbox" name="custom" id="custom" value="" size="12" maxlen="128"/>
			<input type="submit" id="submit" Value="Shorten URI/URL" />
		</form>
		Example of Form:-
		<pre>
	&lt;form action=&quot;<?php echo $source; ?>v2/url.api&quot; method=&quot;post&quot;&gt;
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
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
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
	print_r(json_decode(getURIData("<?php echo $source; ?>v2/url.api", 560, 560, 
				 
				 				/* URL Upload return after submission (required) */
								array('response' => 'json', 
				
								/* URL for API Shortening  (required) */
								'url' => '<?php echo $source; ?>/ie/example/uri.html')), true));
?&gt;
		</pre><br/><br/>
    </blockquote>
    <?php 
    	if (strlen(session_id())==0)
    		session_start();
    	if (!isset($_SESSION['footer']['jump']))
    		$_SESSION['footer']['jump'] = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'apis-labs.coop.html');
    	if (!isset($_SESSION['footer']['main']))
    		$_SESSION['footer']['main'] = file_get_contents('http://au.syd.labs.coop/apis-labs.coop.html');
    	echo $_SESSION['footer']['jump'] . $_SESSION['footer']['main'];
        if (mt_rand(-2,10)<2)
                session_destroy();

    ?>	
</div>
</html>
<?php 

