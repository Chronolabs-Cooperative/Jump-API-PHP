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

	error_reporting(E_ALL);
	ini_set('display_errors', true);
if (!function_exists("getIP")) {
    
    /* function whitelistGetIP()
     *
     * 	get the True IPv4/IPv6 address of the client using the API
     * @author 		Simon Roberts (Chronolabs) simon@labs.coop
     *
     * @param		boolean		$asString	Whether to return an address or network long integer
     *
     * @return 		mixed
     */
    function getIP($asString = true){
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

	$data = array('time' => time(), 'ip' => getIP(true), 'www-path' => basename(__DIR__), 'server' => $_SERVER, 'get' => $_GET, 'post' => $_POST);
	
	$response = (isset($_REQUEST['response'])?$_REQUEST['response']:'json');
	if (function_exists("http_response_code"))
	    if (isset($data['code']) && !empty($data['code'])) {
	        http_response_code($data['code']);
	        unset($data['code']);
	    } else {
	        http_response_code(201);;
	    }
	    
	// Send Responses
	switch ($response) 
	{
		case 'php':
		    header('Content-type: application/php');
		    die("<?php\n\nreturn " . var_export($data) . ";\n\n?>");
		    break;
		case 'json':
			header('Content-type: application/json');
			die(json_encode($data));
			break;
		case 'serial':
			header('Content-type: text/html');
			die(serialize($data));
			break;
		case 'xml':
			header('Content-type: application/xml');
			$dom = new XmlDomConstruct('1.0', 'utf-8');
			$dom->fromMixed(array('root'=>$data));
 			die($dom->saveXML());
			break;
	}
?>		
