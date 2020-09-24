<?php
	session_start();
	$_CONFIG['HASH_KEY'] = 'mO.B24}fC6l{Zww.lY^.=4o,S4R3tWVM}at^TTlbe&%j+Z$XNy{MT7Qq^S.QmN0#';
	
	function xhr()
	{
		return $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
	} 
	
	function recaptcha_verify($p_response)
	{
		$private_key = '6Ld1CjgUAAAAAE2Kwp8TC648rcj4M_tkPTNBVAR4';
		$response = json_decode(curl_post('https://www.google.com/recaptcha/api/siteverify', array('secret' => $private_key, 'response' => $p_response, 'remoteip' => $_SERVER['REMOTE_ADDR'])));
		return $response->success;
	}


	function curl_file_get_contents($url)
	{
		$curl = curl_init();
		$userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
		
		curl_setopt($curl,CURLOPT_URL,$url); //The URL to fetch. This can also be set when initializing a session with curl_init().
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE); //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
		curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,5); //The number of seconds to wait while trying to connect.	
		
		curl_setopt($curl, CURLOPT_USERAGENT, $userAgent); //The contents of the "User-Agent: " header to be used in a HTTP request.
		curl_setopt($curl, CURLOPT_FAILONERROR, TRUE); //To fail silently if the HTTP code returned is greater than or equal to 400.
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE); //To follow any "Location: " header that the server sends as part of the HTTP header.
		curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE); //To automatically set the Referer: field in requests where it follows a Location: redirect.
		curl_setopt($curl, CURLOPT_TIMEOUT, 10); //The maximum number of seconds to allow cURL functions to execute.	
		
		$contents = curl_exec($curl);
		curl_close($curl);
		return $contents;
	}
	
	function curl_post($p_url, $p_data)
	{
		if ($p_url == '' || !is_array($p_data) || count($p_data) <= 0)
			return false;
			
		$curl = curl_init();
		
		curl_setopt($curl,CURLOPT_URL, $p_url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, http_build_query($p_data));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		return $response;
	}
	
	function alert($p_key, $p_class = '', $p_clear = false) {
		if (is_array($_SESSION[$p_key]) && count($_SESSION[$p_key])==0)
			return;
	
		print '<div class="alert'.($p_class? ' ' . $p_class : '') . '" ' . (($_SESSION[$p_key] == '') ? ' style="display:none;"' : '').'>' 
				. (is_array($_SESSION[$p_key]) ? "<p>" . implode($_SESSION[$p_key], "</p>\n<p>") . "</p>" : $_SESSION[$p_key])
				. '</div>' . "\n";
		if ($p_clear) 
		{
			unset($_SESSION[$p_key]);
		}
	}
	
	function go_to($p_url, $p_response_code='301') 
	{
		exit(header('Location: ' . $p_url, true, $p_response_code));
	}
	
	function atrim($a)
	{
		if (is_array($a)) 
			foreach ($a as $key => $val)
				$a[$key] = atrim($val);
		else
			$a = trim($a);
			
		return $a;
	}
	
	function valid($p_value, $p_type) 
	{
		switch($p_type)
		{
			case 'alpha-numeric':	return preg_match( "/^[A-Za-z\d]+$/", $p_value );
			case 'decimal':			return preg_match( "/^\d*([.]?\d+){0,1}$/", $p_value );
			case 'decimal2':		return preg_match( "/^[+\-]?(?:\d+(?:\.\d*)?|\.\d+)$/", $p_value );
			case 'email':			return preg_match( "/^[a-zA-Z\+\d._-]+@([a-zA-Z\d.-]+)+$/", $p_value );
			case 'integer': 		return (strval(intval($p_value)) == strval($p_value) ? true : false);
			case 'postal-code':		return preg_match( "/(^([a-zA-Z]\d){3}$/", $p_value );
			case 'zip':	 			return preg_match( "/(^\d{5}$)|(^\d{5}-\d{4}$)/", $p_value );
			case 'year':			return preg_match( "/^(19|20)\d{2}$/", $p_value );
			case 'name':			return preg_match( "/^[A-Za-z .-]*$/", $p_value );
			case 'date':			return ((preg_match("/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/", $p_value, $date_parsed)) && (checkdate($date_parsed[1], $date_parsed[2], $date_parsed[3])));
			case 'time':			return preg_match( "/^(([0-1]{0,1}[0-9]|[2][0-4]))(:([0-5][0-9]))?(:([0-5][0-9]))?(\s?(AM|am|PM|pm)?)$/", $p_value );
			case 'price':			return preg_match( "/^[$]?]{0,1}([1-9]{1}[\d]{0,2}(\,[\d]{3})*(\.[\d]{0,2})?|[1-9]{1}[\d]{0,}(\.[\d]{0,2})?|0(\.[\d]{0,2})?|(\.[\d]{1,2})?)$/", $p_value );
			case 'phone':			return preg_match( "/((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,3})|(\(?\d{2,3}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}/", $p_value );
			default:				die("The rule, $p_type,  wasn't found");
		}
	}
	
	function valid_id($p_id)
	{
		return (valid($p_id, 'integer') && $p_id > 0);
	}
	
	function get_hash($p_val) 
	{
		global $_CONFIG;
		return md5($p_val.$_CONFIG['HASH_KEY']);
	}

	function strip_url()
	{
		$remove = array();
		if (func_num_args() > 0)
			$remove = func_get_args();
			
		$url = querystring($_SERVER['REQUEST_URI'], $remove);
		if ($url != $_SERVER['REQUEST_URI'])
			go_to($url);
	} 

	function querystring($p_url, $remove='', $insert='', $anchor='', $escape_ampersands = false) 
	{
		$url = explode_url($p_url);
	
		if (is_array($remove) && is_array($url['query']))
			foreach ($remove as $key)
				if (array_key_exists($key, $url['query']))
					$url['query'][$key] = '';
		
		if (is_array($insert))
			foreach($insert as $key => $val)
				$url['query'][$key] = $val;
		
		return ($anchor ? preg_replace('|#.*(\??)|U', '${1}', implode_url($url, $escape_ampersands)).'#'.$anchor : implode_url($url, $escape_ampersands));
	}
	
	function explode_url($p_url) 
	{
		$u = explode('?', $p_url);
		$url['location'] = $u[0];
		$q = ($u[1]?explode('&', $u[1]):'');
		if (is_array($q))
			for ($i=0; $i<count($q); $i++) {
				$var = explode('=', $q[$i]);
				$url['query'][$var[0]] = $var[1];
			}
		return $url;
	}
	
	function implode_url($url, $escape_ampersands = false) 
	{
		$amp = ($escape_ampersands ? '&amp;' : '&');
		$first = true;
		
		$p_url = $url['location'];
		if (is_array($url['query']))
		{
			foreach ($url['query'] as $key => $val)
			{
				if ($val !== '')
				{
					$query .= (!$first ? $amp : '') . $key.'='.$val;
					$first = false;
				}
			}
		}
		return rtrim($p_url.($query?'?'.$query:''), " ");
	}

	function substr_append($p_str, $p_start, $p_length='', $p_pad='...', &$padded='')
	{
		$padded = false;
		$str = mb_substr(preg_replace("|\s+|m", " ", strip_tags(html_entity_decode(str_replace(array('&nbsp;', '<'), array('', ' <'), $p_str), ENT_COMPAT, 'utf-8'))), $p_start, $p_length, 'utf-8');
		if ($p_length > 0 && strlen($p_str) > $p_length)
		{
			$str .= $p_pad;
			$padded = true;
		}
		return htmlentities($str, ENT_COMPAT, 'utf-8');
	}
	
	// Form token manager
	if (!isset($_SESSION['tokens']) || !is_array($_SESSION['tokens']))
		$_SESSION['tokens'] = array();
		
	purge_old_tokens();
	
	function generate_token($p_form = 'default')
	{
		if (!is_array($_SESSION['tokens'][$p_form]))
			$_SESSION['tokens'][$p_form] = array();
	
		$current_time = microtime(true);
		$token = get_hash($current_time.session_id());
		$_SESSION['tokens'][$p_form][(string) $current_time] = $token;
		
		return $token;
	}
	
	// Purge any unsubmitted tokens that are still around after 15 minutes 
	function purge_old_tokens()
	{
		$threshold = microtime(true) - 900;	// 15 minutes ago
		if (is_array($_SESSION['tokens']))
		{
			foreach($_SESSION['tokens'] as $form_name => $token_list)
			{
				if (is_array($token_list))
				{
					foreach($token_list as $ts => $token)
						if ($ts < $threshold)
							unset($_SESSION['tokens'][$form_name][$ts]);
				}
			}
		}
	}
	
	function valid_token($p_token, $p_form = 'default')
	{
		$ts = ($_SESSION['tokens'][$p_form] ? array_search($p_token, $_SESSION['tokens'][$p_form]) : false);
		if ($ts)
		{
			unset($_SESSION['tokens'][$p_form][$ts]);
			return true;
		}
		return false;
	}
	
	
?>