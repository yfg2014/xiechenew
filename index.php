<?php

$request = @$_SERVER['REQUEST_URI'];
$old = true;
if (!$request) {
	$old = false;
}
if ($request) {
	if ($request === '/') {
		$old = false;
	}
	if ( $request === '/index.php' ) {
		$old = false;
	}
	if (mb_strpos($request, '/shopservice')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/carservice')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/index')=== 0 && !mb_strpos($request, '.php')) {
		$old = false;
	}
	if (mb_strpos($request, '/ask')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/coupon')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/member')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/myhome')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/public')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/Public')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/shiguche')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/case')=== 0) {
		$old = false;
	}
	if (mb_strpos($request, '/appnew')=== 0) {
		$old = false;
	}
	
	
}
if ($old) {
	require 'old_index.php';
}else{
	require 'new_index.php';
}