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
 * @version         $Id: apiconfig.php 1000 2015-06-16 23:11:55Z wishcraft $
 * @subpackage		api
 * @description		Short Link URIs API
 * @link			http://cipher.labs.coop
 * @link			http://sourceoforge.net/projects/chronolabsapis
 */


// function checkFunctionRequirements() - error strings
define('_API_ERROR_FIELD_NOT_SET', 'The field %s must be set and cannot be empty!');
define('_API_ERROR_FIELD_NOT_VALID', 'The field %s must be set to the following ~ %s');

// function checkValidField() - error strings
define('_API_ERROR_FIELD_NOT_ENUMATOR', 'enumator; which is set to the value "%s" that must be instead one of %s');
define('_API_ERROR_FIELD_NOT_WORDS_RANGE', 'word count range which has to be "%s" <= "%s" as well as "%s" >= "%s"');
define('_API_ERROR_FIELD_NOT_WORDS_LESS', 'word count range which has to be "%s" <= "%s"');
define('_API_ERROR_FIELD_NOT_STRING', 'the field has to be consider a string this is not: %s');
define('_API_ERROR_FIELD_NOT_LENGTH_RANGE', 'character count range which has to be "%s" <= "%s" as well as "%s" >= "%s"');
define('_API_ERROR_FIELD_NOT_LENGTH_LESS', 'character count range which has to be "%s" <= "%s"');
define('_API_ERROR_FIELD_NOT_NUMERIC', 'the field has to be consider a numerical number this is not: %s');
define('_API_ERROR_FIELD_NOT_NUMERIC_RANGE', 'numeric range which has to be "%s" <= "%s" as well as "%s" >= "%s"');
define('_API_ERROR_FIELD_NOT_NUMERIC_LESS', 'numeric range which has to be "%s" <= "%s"');
define('_API_ERROR_FIELD_NOT_EMAIL', 'must be a valid email this is not: %s');
define('_API_ERROR_FIELD_NOT_URI', 'must be a valid uri/url this is not: %s');

?>