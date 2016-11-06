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

require_once __DIR__ . DIRECTORY_SEPARATOR . 'xcp' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'xcp.class.php';


if (!function_exists("checkDisplayHelp")) {

	/**
	 * checkDisplayHelp ~ checks if help will need to be displayed
	 * 
	 * @param string $action
	 * @return boolean
	 */
	function checkDisplayHelp($action = '')
	{
		global $errors;
		apiLoadLanguage('errors', _API_LANGUAGE_DEFAULT);
		$errors = array();
		if (!empty($action))
			checkFunctionRequirements(basename(__DIR__), $action);
		return (!empty($errors)?false:true);
	}
}


if (!function_exists("checkFunctionRequirements")) {

	/**
	 * checkFunctionRequirements ~ checks the requirements of an API Function for a form
	 * 
	 * @param string $base
	 * @param string $func
	 * @return boolean
	 */
	function checkFunctionRequirements($base = 'salty', $func = '')
	{
		global $errors;
		if (file_exists($file = API_PATH_IO_FUNCTIONS . DIRECTORY_SEPARATOR . "$base-$func.diz"))
		{
			foreach(file($file) as $fields)
			{
				$parts = explode("||", $fields);
				if (isset($parts[2]) && $parts[2] == 'required')
				{
					switch ($parts[1])
					{
						default:
							if (!isset($_REQUEST[$parts[0]]) && empty($_REQUEST[$parts[0]]))
								$errors[$parts[0]] = sprintf(_API_ERROR_FIELD_NOT_SET, '$_' . sprintf('REQUEST["%s"]', $parts[0]));
							elseif (isset($parts[3]) && checkValidField($_REQUEST[$parts[0]], str_replace(array("\n","\r","\t", " "), "", $parts[3]), str_replace(array("\n","\r","\t", " "), "", (isset($parts[4])?$parts[4]:"")), str_replace(array("\n","\r","\t", " "), "", (isset($parts[5])?$parts[5]:"")), $parts[0]))
								$errors[$parts[0]] = sprintf(_API_ERROR_FIELD_NOT_VALID, '$_' . sprintf('REQUEST["%s"]', $parts[0]), $errors[$parts[0]]);
							break;
						case "get":
							if (!isset($_GET[$parts[0]]) && empty($_GET[$parts[0]]))
								$errors[$parts[0]] = sprintf(_API_ERROR_FIELD_NOT_SET, '$_' . sprintf('GET["%s"]', $parts[0]));		
							elseif (isset($parts[3]) && checkValidField($_GET[$parts[0]], str_replace(array("\n","\r","\t", " "), "", $parts[3]), str_replace(array("\n","\r","\t", " "), "", (isset($parts[4])?$parts[4]:"")), str_replace(array("\n","\r","\t", " "), "", (isset($parts[5])?$parts[5]:"")), $parts[0]))
								$errors[$parts[0]] = sprintf(_API_ERROR_FIELD_NOT_VALID, '$_' . sprintf('GET["%s"]', $parts[0]), $errors[$parts[0]]);
							break;
						case "post":
							if (!isset($_POST[$parts[0]]) && empty($_POST[$parts[0]]))
								$errors[$parts[0]] = sprintf(_API_ERROR_FIELD_NOT_SET, '$_' . sprintf('POST["%s"]', $parts[0]));		
							elseif (isset($parts[3]) && checkValidField($_POST[$parts[0]], str_replace(array("\n","\r","\t", " "), "", $parts[3]), str_replace(array("\n","\r","\t", " "), "", (isset($parts[4])?$parts[4]:"")), str_replace(array("\n","\r","\t", " "), "", (isset($parts[5])?$parts[5]:"")), $parts[0]))
								$errors[$parts[0]] = sprintf(_API_ERROR_FIELD_NOT_VALID, '$_' . sprintf('POST["%s"]', $parts[0]), $errors[$parts[0]]);
							break;
							
					}
				} else {
					switch ($parts[1])
					{
						default:
							if (isset($_REQUEST[$parts[0]]) && isset($parts[3]) && checkValidField($_REQUEST[$parts[0]], str_replace(array("\n","\r","\t", " "), "", $parts[3]), str_replace(array("\n","\r","\t", " "), "", (isset($parts[4])?$parts[4]:"")), str_replace(array("\n","\r","\t", " "), "", (isset($parts[5])?$parts[5]:"")), $parts[0]))
								$errors[$parts[0]] = sprintf(_API_ERROR_FIELD_NOT_VALID, '$_' . sprintf('REQUEST["%s"]', $parts[0]), $errors[$parts[0]]);
							break;
						case "get":
							if (isset($_GET[$parts[0]]) && isset($parts[3]) &&  checkValidField($_GET[$parts[0]], str_replace(array("\n","\r","\t", " "), "", $parts[3]), str_replace(array("\n","\r","\t", " "), "", (isset($parts[4])?$parts[4]:"")), str_replace(array("\n","\r","\t", " "), "", (isset($parts[5])?$parts[5]:"")), $parts[0]))
								$errors[$parts[0]] = sprintf(_API_ERROR_FIELD_NOT_VALID, '$_' . sprintf('GET["%s"]', $parts[0]), $errors[$parts[0]]);
							break;
						case "post":
							if (isset($_POST[$parts[0]]) && isset($parts[3]) &&  checkValidField($_POST[$parts[0]], str_replace(array("\n","\r","\t", " "), "", $parts[3]), str_replace(array("\n","\r","\t", " "), "", (isset($parts[4])?$parts[4]:"")), str_replace(array("\n","\r","\t", " "), "", (isset($parts[5])?$parts[5]:"")), $parts[0]))
								$errors[$parts[0]] = sprintf(_API_ERROR_FIELD_NOT_VALID, '$_' . sprintf('POST["%s"]', $parts[0]), $errors[$parts[0]]);
							break;
								
					}
				}
				if (empty($errors[$parts[0]]) || is_array($errors[$parts[0]]))
					unset($errors[$parts[0]]);
			}
		}
		return (!empty($errors)?true:false);
	}
}



if (!function_exists("checkValidField")) {

	/**
	 * checkValidField ~ Validates a value of a field for API Form from scipted .diz files
	 * 
	 * @param string $value
	 * @param string $type
	 * @param string $typal
	 * @param string $sizes
	 * @param string $field
	 * @return boolean
	 */
	function checkValidField($value = '', $type = '', $typal = '', $sizes = '', $field = '')
	{
		global $errors;
		$errors[$field] = '';
		$pass = true;
		if (strpos($typal, "-"))
		{
			$parts = explode("-", $typal);
			$minimal = $parts[0];
			$maximum = $parts[1];
		}
		if (strpos($sizes, "-"))
		{
			$parts = explode("-", $sizes);
			$minimal = $parts[0];
			$maximum = $parts[1];
		}
		switch ($type)
		{
			case "enumerator":
				if (!in_array($value, explode("|", $typal)))
					$errors[$field] = sprintf(_API_ERROR_FIELD_NOT_ENUMATOR, $value, "'" . implode("', '", explode("|", $typal)) . "'");
				break;
			case "words":
				if (count($words = explode(" ", $value)))
				{
					if (strpos($typal, "-") != 0)
						if (count($words)>=$minimal || count($words)<=$maximum )	
							$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_WORDS_RANGE, $maximum, count($words), $minimal,  count($words));
					elseif(count($words)<=$typal)
						$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_WORDS_LESS, $typal, count($words));
				}
				break;
			case "string":
				if (!is_string($value))
					$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_STRING, $value);
				elseif (!empty($typal))
				{
					if (strpos($typal, "-") != 0)
						if (strlen($value)>=$minimal || strlen($value)<=$maximum )
							$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_LENGTH_RANGE, $maximum, strlen($value), $minimal,  strlen($value));
					elseif(strlen($value)<=$typal)
						$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_LENGTH_LESS, $typal, strlen($value));
				}
				break;
			case "number":
				if (!is_numeric($value))
					$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_NUMERIC, $value);
				elseif (!empty($typal))
				{
					if (strpos($typal, "-") != 0)
						if ((float)($value)>=(float)$minimal || (float)($value)<=(float)$maximum )
						$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_NUMERIC_RANGE, (float)$maximum, (float)($value), (float)$minimal,  (float)($value));
					elseif((float)($value)>=(float)$typal)
						$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_NUMERIC_GREATER, (float)$typal, (float)($value));
				}
				break;	
			case "email":
				if (!checkEmail($value))
					$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_EMAIL, $value);
				break;
			case "uri":
				if (substr($value,0,4)!="http")
					$errors[$field] =  sprintf(_API_ERROR_FIELD_NOT_, $value);
				break;
		}	
		if (empty($errors[$field]))
			unset($errors[$field]);
		return !isset($errors[$field])?false:true;
	}
}


if (!function_exists("apiLoadLanguage")) {

	/**
	 * apiLoadLanguage ~ loads a language files
	 * 
	 * @param unknown_type $definition
	 * @param unknown_type $language
	 * @return boolean
	 */
	function apiLoadLanguage($definition = 'help', $language = 'english')
	{
		if (!empty($language)) $language = _API_LANGUAGE_DEFAULT;
		if (file_exists($file = __DIR__ . DIRECTORY_SEPARATOR . 'language' . DIRECTORY_SEPARATOR . $language . DIRECTORY_SEPARATOR . "$definition.php"))
		{
			return include_once($file);
		}
		return false;
	}
}


if (!function_exists("getURIData")) {

	/**
	 * getURIData() ~ get data from a URI/URL
	 * 
	 * @param string $uri
	 * @param array $posts
	 * @param getURIData $headers
	 * @param integer $timeout
	 * @param integer $connectout
	 * @return string
	 */
	function getURIData($uri = '', $posts = array(), $headers = array(), $timeout = 36, $connectout = 44)
	{
		if (!function_exists("curl_init"))
		{
			return file_get_contents($uri);
		}
		if (!$btt = curl_init($uri)) {
			return false;
		}
		if (count($headers)) {
			curl_setopt($btt, CURLOPT_HEADER, true);
			curl_setopt($btt, CURLOPT_HEADERS, $headers);
		} else
			curl_setopt($btt, CURLOPT_HEADER, 0);
		if (count($posts)) {
			curl_setopt($btt, CURLOPT_POST, true);
			curl_setopt($btt, CURLOPT_POSTFIELDS, http_build_query($posts));
		} else
			curl_setopt($btt, CURLOPT_POST, 0);
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



if (!function_exists("readRawFile")) {
	
	/**
	 * Return the contents of this File as a string.
	 *
	 * @param string $file
	 * @param string $bytes where to start
	 * @param string $mode
	 * @param boolean $force If true then the file will be re-opened even if its already opened, otherwise it won't
	 * @return mixed string on success, false on failure
	 * @access public
	 */
	function readRawFile($file = '', $bytes = false, $mode = 'rb', $force = false)
	{
		$success = false;
		if ($bytes === false) {
			$success = file_get_contents($file);
		} elseif ($fhandle = fopen($file, $mode)) {
			if (is_int($bytes)) {
				$success = fread($fhandle, $bytes);
			} else {
				$data = '';
				while (! feof($fhandle)) {
					$data .= fgets($fhandle, 4096);
				}
				$success = trim($data);
			}
			fclose($fhandle);
		}
		return $success;
	}
}

if (!function_exists("writeRawFile")) {
	/**
	 * 
	 * @param string $file
	 * @param string $data
	 */
	function writeRawFile($file = '', $data = '')
	{
		if (!is_dir(dirname($file)))
			mkdir(dirname($file), 0777, true);
		if (is_file($file))
			unlink($file);
		$ff = fopen($file, 'w');
		fwrite($ff, $data, strlen($data));
		return fclose($ff);
	}
}

if (!function_exists("mkdirSecure")) {
	/**
	 *
	 * @param unknown_type $path
	 * @param unknown_type $perm
	 * @param unknown_type $secure
	 */
	function mkdirSecure($path = '', $perm = 0777, $secure = true)
	{
		if (!is_dir($path))
		{
			mkdir($path, $perm, true);
			if ($secure == true)
			{
				writeRawFile($path . DIRECTORY_SEPARATOR . '.htaccess', "<Files ~ \"^.*$\">\n\tdeny from all\n</Files>");
			}
			return true;
		}
		return false;
	}
}

if (!function_exists("writeCache")) {
	/**
	 * Write data for key into cache
	 *
	 * @param string $key Identifier for the data
	 * @param mixed $data Data to be cached
	 * @param mixed $duration How long to cache the data, in seconds
	 * @return boolean True if the data was succesfully cached, false on failure
	 * @access public
	 */
	function writeCache($key, $data = array(), $duration = 3600)
	{
		if (!isset($data)) {
			return false;
		}
	
		if (!empty($key))
			$key .= substr(md5($_SERVER["HTTP_HOST"]), 3, 7) . '--' . $key;
		else
			return false;
		
		if ($duration == null) {
			$duration = 3600;
		}
		$windows = false;
		$lineBreak = "\n";
	
		if (substr(PHP_OS, 0, 3) == "WIN") {
			$lineBreak = "\r\n";
			$windows = true;
		}
		$expires = time() + $duration;
		$contents = $expires . $lineBreak . "return " . var_export($data, true) . ";" . $lineBreak;
		return  writeRawFile(API_PATH_IO_CACHE . DIRECTORY_SEPARATOR . $key . '.php');
	}
}

if (!function_exists("readCache")) {
	/**
	 * Read a key from the cache
	 *
	 * @param string $key Identifier for the data
	 * @return mixed The cached data, or false if the data doesn't exist, has expired, or if there was an error fetching it
	 * @access public
	 */
	function readCache($key)
	{
		if (!empty($key))
			$key .= substr(md5($_SERVER["HTTP_HOST"]), 3, 7) . '--' . $key;
		else
			return false;
	
		$cachetime = readRawFile(API_PATH_IO_CACHE . DIRECTORY_SEPARATOR . $key . '.php', 11);
		if ($cachetime !== false && intval($cachetime) < time()) {
			return false;
		}
		$data = readRawFile(API_PATH_IO_CACHE . DIRECTORY_SEPARATOR . $key . '.php', true);
		if (!empty($data))
			$data = eval($data);
		return $data;
	}
}

if (!function_exists("checkEmail")) {
	/**
	 * checkEmail()
	 *
	 * @param mixed $email
	 * @return bool|mixed
	 */
	function checkEmail($email)
	{
		if (!$email || !preg_match('/^[^@]{1,64}@[^@]{1,255}$/', $email)) {
			return false;
		}
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/\=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/\=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
				return false;
			}
		}
		if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) {
			$domain_array = explode(".", $email_array[1]);
			if (sizeof($domain_array) < 2) {
				return false; // Not enough parts to domain
			}
			for ($i = 0; $i < sizeof($domain_array); $i++) {
				if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
					return false;
				}
			}
		}
		return $email;
	}
}

if (!function_exists("getBaseDomain")) {
	/**
	 * getBaseDomain
	 * 
	 * @param string $url
	 * @return string|unknown
	 */
	function getBaseDomain($url)
	{
		
		static $strata, $fallout, $stratas;
		
		if (empty($strata))
		{
			if (!$strata = readCache('internets_stratas'))
			{
				if (empty($stratas))
					$stratas = file(API_FILE_IO_STRATA);
				shuffle($stratas);
				$attempts = 0;
				while(empty($strata) || $attempts < (count($strata) * 1.65))
				{
					$attempts++;
					$strata = array_keys(unserialize(getURIData($stratas[mt_rand(0, count($stratas)-1)] ."/v1/strata/serial.api")));
				}
				if (!empty($strata))
					writeCache('internets_stratas', $strata, 3600*24*mt(3.75,11));
			}
		}
		if (empty($fallout))
		{
			if (!$fallout = readCache('internets_fallouts'))
			{
				if (empty($stratas))
					$stratas = file(API_FILE_IO_STRATA);
				shuffle($stratas);
				$attempts = 0;
				while(empty($fallout) || $attempts < (count($strata) * 1.65))
				{
					$attempts++;
					$fallout = array_keys(unserialize(getURIData($stratas[mt_rand(0, count($stratas)-1)] ."/v1/fallout/serial.api")));
				}
				if (!empty($fallout))
					writeCache('internets_fallouts', $fallout, 3600*24*mt(3.75,11));
			}
		}
		
		// Get Full Hostname
		$url = strtolower($url);
		$hostname = parse_url($url, PHP_URL_HOST);
		if (!filter_var($hostname, FILTER_VALIDATE_IP) === true) 
			return $hostname;
	
		// break up domain, reverse
		$elements = explode('.', $hostname);
		$elements = array_reverse($elements);
		
		// Returns Base Domain
		if (in_array($elements[0], $fallout) && in_array($elements[1], $strata))
			return $elements[2] . '.' . $elements[1] . '.' . $elements[0];
		elseif (in_array($elements[0], $fallout) || in_array($elements[0], $strata))
			return $elements[1] . '.' . $elements[0];
		
		// Nothing Found
		return $hostname;
	}
}


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
 	$jumps[md5($url)] = array("created" => microtime(true), "last" => microtime(true), 'inactive' = (API_DROP_DAYS_INACTIVE * (3600 * 24)), "short" => 'http://'.basename(__DIR__).'/'.$referee, "domain" => (isset($_SERVER['HTTPS'])?'https://':'http://').$referee.'.'.basename(__DIR__), 'url' => $url, 'referee' => $referee);
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
		if (isset($values['last']) && isset($values['inactive']))
			if ($values['last'] < microtime(true) - $values['inactive'])
				unset($jumps[$finger]);
	}
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
	writeRawFile($file, json_encode($jumps)); 

	// Redirect to ensourced URI
	header( "HTTP/1.1 301 Moved Permanently" );
	header("Location: ".API_PROTOCOL . API_HOSTNAME);
	exit(0);
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
		if (isset($values['last']) && isset($values['inactive']))
			if ($values['last'] < microtime(true) - $values['inactive'])
				unset($jumps[$finger]);
	}
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
	writeRawFile($file, json_encode($jumps)); 
	return false;
}



if (!class_exists("XmlDomConstruct")) {
	/**
	 * class XmlDomConstruct
	 *
	 * 	Extends the DOMDocument to implement personal (utility) methods.
	 *
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 */
	class XmlDomConstruct extends DOMDocument {

		/**
		 * Constructs elements and texts from an array or string.
		 * The array can contain an element's name in the index part
		 * and an element's text in the value part.
		 *
		 * It can also creates an xml with the same element tagName on the same
		 * level.
		 *
		 * ex:
		 * <nodes>
		 *   <node>text</node>
		 *   <node>
		 *     <field>hello</field>
		 *     <field>world</field>
		 *   </node>
		 * </nodes>
		 *
		 * Array should then look like:
		 *
		 * Array (
		 *   "nodes" => Array (
		 *     "node" => Array (
		 *       0 => "text"
		 *       1 => Array (
		 *         "field" => Array (
		 *           0 => "hello"
		 *           1 => "world"
		 *         )
		 *       )
		 *     )
		 *   )
		 * )
		 *
		 * @param mixed $mixed An array or string.
		 *
		 * @param DOMElement[optional] $domElement Then element
		 * from where the array will be construct to.
		 *
		 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
		 *
		 */
		public function fromMixed($mixed, DOMElement $domElement = null) {

			$domElement = is_null($domElement) ? $this : $domElement;

			if (is_array($mixed)) {
				foreach( $mixed as $index => $mixedElement ) {

					if ( is_int($index) ) {
						if ( $index == 0 ) {
							$node = $domElement;
						} else {
							$node = $this->createElement($domElement->tagName);
							$domElement->parentNode->appendChild($node);
						}
					}

					else {
						$node = $this->createElement($index);
						$domElement->appendChild($node);
					}

					$this->fromMixed($mixedElement, $node);

				}
			} else {
				$domElement->appendChild($this->createTextNode($mixed));
			}

		}
			
	}
}

?>