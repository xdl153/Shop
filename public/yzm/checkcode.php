<?php
/**
* �û���֤����֤�ļ�
* @Author:Zjmainstay
* @version : 1.0
* @creatdate: 2013-10-4
*/
session_start();
echo json_encode(array('status'=>(int)($_SESSION["CHECKCODE"] == $_POST['code'])));
exit;