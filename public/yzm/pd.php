<?php
session_start();
	if($_SESSION["CHECKCODE"] == $_POST['code']){
		echo 'ok';
	}else{
		echo 'no';
	}