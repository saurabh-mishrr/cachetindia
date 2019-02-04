 <?php
	if(!function_exists('getUrlData')){
		function getUrlData($url, $proxy = "", $cacheKey = '', $header = null) {
		   $data = '';
	       $ch = curl_init();  // Initialize cURL.
	       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	       curl_setopt($ch, CURLOPT_PROXY, $proxy);
	       if ($header) {
	           #$header must be an array - added by Saurabh on 05-06-2018
	           curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	       }
	       $xmlRawData = curl_setopt($ch, CURLOPT_URL, $url);     // get the url contents
	       $data = curl_exec($ch); // execute curl request
	       $info = curl_getinfo($ch);
	       if ($info['http_code'] != 200) {
	           $logMsg = "CURL failed for " . $url . " with error " . curl_errno($ch) . " - " . curl_error($ch) . " http code : " . $info['http_code'] . " For cache key" . $cacheKey;
	       }
	       curl_close($ch);   // Close cURL.
	       return $data;
	   }
	}
?>   