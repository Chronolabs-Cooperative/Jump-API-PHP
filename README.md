## Chronolabs Cooperative presents

# Jump URL Shortened API

## Author: Simon Antony Roberts (c) 2019 <wishcraft@users.sourceforge.net>

### Version: 2.1.9

### Demo: http://jump.snails.email

 * This is also distributed under acedemic licencing as well as general public licence 3.0 (GPL3)

## Shortening API Installation
You have to take the files from this respository and mount them in a path which is the subpath or path of the url base level used to access the service, say you are accessing 2.snails.email then the files would natively on ubuntu run in /var/www/2.snails.email/...

It is very imporant you resolve this domain with the path folder for it containing the path of the URL being access to use this service!

## Cpanel Installation
cpanel all you have to do is make a subdomain like go.eqtherapies.com or even l.eqtherapies.com and drop the files in they should run straight of the bat with just any minor adjustments being on constant.php or apiconfig.php...

You will also in your cpanel or domain zone depending where you setting this up have to make the wildcard as a cname goto the domain subject so say you shortlink URL is l.eqtherapies.com then you would make the cname *.l.eqtherapies.com point to l.eqtherapies.com it just shorten them in three options one is just as a subdomain...

### PHP Calling Example (With php-curl)
This PHP example with the function used to use php-curl with post header variables as well as none ssl authentication erroring will be timeless in your own code, I wrote it myself!
     
     	/**
     	 * Functions as Defined Later Used in Routine
     	 * 
     	 */
     	if (!function_exists("getURIData")) {
     	
     		/* function getURIData()
     		 * cURL Routine for passing $_POST Variable and retreiving URL
     		 * 
     		 * @author Simon Roberts (Chronolabs Cooperative) simon@staff.snails.email
     		 *
     		 * @param $url string
     		 * @param $timeout integer
     		 * @param $connectout integer
     		 * @param $posts array
     		 * 
     		 * @return string
     		 */
     		function getURIData($uri = '', $timeout = 65, $connectout = 65, $posts = array())
     		{
     			if (!function_exists("curl_init"))
     			{
     				die("You need to install cURL: $ sudo apt-get install php-curl");
     			}
     			if (!$btt = curl_init($uri)) {
     				return false;
     			}
     			curl_setopt($btt, CURLOPT_HEADER, 0);
     			curl_setopt($btt, CURLOPT_POST, (count($posts)==0?false:true));
     			if (count($posts)!=0)
     				curl_setopt($btt, CURLOPT_POSTFIELDS, http_build_query($posts));
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
     
     	/**
     	 * Calling out to URL Script Command Line ~ Processing
     	 * 
     	 */

     $json = json_decode(getURIData('http://jump.snails.email/v2/url.api', 45, 45, 
                         array('response'=>'json', 
                               'url'=>'http://cipher.snails.email/?s=openrend'))
     								, true);

## Source for Education Exercise with this package
You will be able to email Prof. Matthew Roberts <matthew.roberts@mq.edu.au> who is an IT teacher and lecture as a teacher of any University, Multiversity or Secondary school for excerises and examples for this open source package to use as a teaching tool.
     
