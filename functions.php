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
 * @copyright       Chronolabs Cooperative http://labs.coop
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         salty
 * @since           2.0.1
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         $Id: functions.php 1000 2015-06-16 23:11:55Z wishcraft $
 * @subpackage		functions
 * @description		Short Link URIs API
 * @link			http://cipher.labs.coop
 * @link			http://sourceoforge.net/projects/chronolabsapis
 */

require_once __DIR__ . DIRECTORY_SEPARATOR . 'xcp' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'xcp.class.php';

if (!function_exists("whitelistGetIP")) {

	/* function whitelistGetIPAddy()
	 *
	* 	provides an associative array of whitelisted IP Addresses
	* @author 		Simon Roberts (Chronolabs) simon@labs.coop
	*
	* @return 		array
	*/
	function whitelistGetIPAddy() {
		return array_merge(whitelistGetNetBIOSIP(), file(dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'whitelist.txt'));
	}
}

if (!function_exists("whitelistGetNetBIOSIP")) {

	/* function whitelistGetNetBIOSIP()
	 *
	* 	provides an associative array of whitelisted IP Addresses base on TLD and NetBIOS Addresses
	* @author 		Simon Roberts (Chronolabs) simon@labs.coop
	*
	* @return 		array
	*/
	function whitelistGetNetBIOSIP() {
		$ret = array();
		foreach(file(dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'whitelist-domains.txt') as $domain) {
			$ip = gethostbyname($domain);
			$ret[$ip] = $ip;
		}
		return $ret;
	}
}

if (!function_exists("whitelistGetIP")) {

	/* function whitelistGetIP()
	 *
	* 	get the True IPv4/IPv6 address of the client using the API
	* @author 		Simon Roberts (Chronolabs) simon@labs.coop
	*
	* @param		$asString	boolean		Whether to return an address or network long integer
	*
	* @return 		mixed
	*/
	function whitelistGetIP($asString = true){
		// Gets the proxy ip sent by the user
		$proxy_ip = '';
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$proxy_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else
		if (!empty($_SERVER['HTTP_X_FORWARDED'])) {
			$proxy_ip = $_SERVER['HTTP_X_FORWARDED'];
		} else
		if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
			$proxy_ip = $_SERVER['HTTP_FORWARDED_FOR'];
		} else
		if (!empty($_SERVER['HTTP_FORWARDED'])) {
			$proxy_ip = $_SERVER['HTTP_FORWARDED'];
		} else
		if (!empty($_SERVER['HTTP_VIA'])) {
			$proxy_ip = $_SERVER['HTTP_VIA'];
		} else
		if (!empty($_SERVER['HTTP_X_COMING_FROM'])) {
			$proxy_ip = $_SERVER['HTTP_X_COMING_FROM'];
		} else
		if (!empty($_SERVER['HTTP_COMING_FROM'])) {
			$proxy_ip = $_SERVER['HTTP_COMING_FROM'];
		}
		if (!empty($proxy_ip) && $is_ip = preg_match('/^([0-9]{1,3}.){3,3}[0-9]{1,3}/', $proxy_ip, $regs) && count($regs) > 0)  {
			$the_IP = $regs[0];
		} else {
			$the_IP = $_SERVER['REMOTE_ADDR'];
		}
			
		$the_IP = ($asString) ? $the_IP : ip2long($the_IP);
		return $the_IP;
	}
}


/**
 * 
 * @param unknown_type $url
 * @return multitype:number unknown |multitype:string number
 */
function jumpShortenURL($url = '')
{	
	$hostname = array_reverse(explode('.', $_SERVER['HTTP_HOST']));
	if (!is_dir(API_PATH_IO_REFEREE))
		mkdirSecure(API_PATH_IO_REFEREE, 0777);
	if (!is_file($file = API_PATH_IO_REFEREE  . DIRECTORY_SEPARATOR . 'urls-pointeers.json'))
		$jumps = array();
	else 
		$jumps = json_decode(file_get_contents($file), true);
	if (isset($_REQUEST['custom'])&&!empty($_REQUEST['custom']))
		$referee = trim($_REQUEST['custom'];
	else
		$referee = '';
	while(testForShortenURL($referee)==true || empty($referee))
	{
		if (!isset($jumps[md5($url)]))
		{
			set_time_limit(120);
			$crc = new xcp($url, mt_rand(1,253), mt_rand(4,7));
			$referee = $crc->calc($url);
		}
	}
 	$jumps[md5($url)] = array("created" => microtime(true), "short" => 'http://'.basename(__DIR__).'/'.$referee, "domain" => (isset($_SERVER['HTTPS'])?'https://':'http://').$referee.'.'.basename(__DIR__), 'url' => $url, 'referee' => $referee);
        writeRawFile($file, json_encode($jumps));
	return $jumps[md5($url)];
}


/**
 * 
 * @param unknown_type $url
 * @return multitype:number unknown |multitype:string number
 */
function jumpFromShortenURL($hash = '')
{	
	$hostname = array_reverse(explode('.', $_SERVER['HTTP_HOST']));
	if (!is_dir(API_PATH_IO_REFEREE))
		mkdirSecure(API_PATH_IO_REFEREE, 0777);
	if (!is_file($file = API_PATH_IO_REFEREE  . DIRECTORY_SEPARATOR . 'urls-pointeers.json'))
		$jumps = array();
	else 
		$jumps = json_decode(file_get_contents($file), true);
	foreach($jumps as $finger => $values)
	{
		if (strtolower($values['referee']) == strtolower($hash))
		{
			if (!isset($jumps[$finger]['hits']))
				$jumps[$finger]['hits'] = 1;
			else
				$jumps[$finger]['hits']++;
			$jumps[$finger]['last'] = microtime(true);
			writeRawFile($file, json_encode($jumps));
			
			// Redirect to ensourced URI
			header( "HTTP/1.1 301 Moved Permanently" );
			header("Location: ".$values['url']);
			exit(0);
		} else {
			
		}
	}
}

/**
 * 
 * @param unknown_type $url
 * @return multitype:number unknown |multitype:string number
 */
function testForShortenURL($hash = '')
{       
        $hostname = array_reverse(explode('.', $_SERVER['HTTP_HOST']));
        if (!is_dir(API_PATH_IO_REFEREE))
                mkdirSecure(API_PATH_IO_REFEREE, 0777);
        if (!is_file($file = API_PATH_IO_REFEREE  . DIRECTORY_SEPARATOR . 'urls-pointeers.json'))
                $jumps = array();
        else 
                $jumps = json_decode(file_get_contents($file), true);
        foreach($jumps as $finger => $values)
        {
                if (strtolower($values['referee']) == strtolower($hash))
                {
                        if (!isset($jumps[$finger]['hits']))
                                $jumps[$finger]['hits'] = 1;
                        else
                                $jumps[$finger]['hits']++;
                        $jumps[$finger]['last'] = microtime(true);
                        writeRawFile($file, json_encode($jumps)); 
                        return true;
                        exit(0);
                } else {
                        
                }
        }
	return false;
}



?>
