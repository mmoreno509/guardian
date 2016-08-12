<?php
	
function flash($title = null, $message = null)
{
	$flash = app(\App\Http\Flash::class);
	if(func_num_args() == 0)
		return $flash;
	return $flash->info($title, $message);
}

function url_match($link, $url = null)
{
	if(is_null($url)) $url = url()->current();
	$queryStart = strpos($url, '?');
	if($queryStart !== false)
		$url = substr($url, 0, $queryStart);
	return ends_with($url, $link);
}