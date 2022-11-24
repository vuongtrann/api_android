<?php
//turn off all errro reporting
error_reporting(0);
$masv='22';
$tensv="viu";
//require sinhviendal.php
require_once 'sinhviendal.php';
//message to retrun
$message=array();
$dal=new SinhvienDAL();

switch($_GET["action"]){
    case 'getAll':
        $message=$dal->getAll();
        break;
    case 'insert':
        $masv = $_GET["masv"];
        $tensv = $_GET["tensv"];
        $result = $dal->insert($masv,$tensv);
        $message = ["message"=>json_encode($result)];
        break;
    case 'insertSome':
        $data = $_GET["data"];
        $result = $dal->insertSome($data);
        $message = ["message"=>json_encode($result)];
        break;
    case 'delete':
        $masv = $_GET["masv"];
        $result = $dal->delete($masv);
        $message = ["message"=>json_encode($result)];
        break;
    case 'update':
        $masv = $_GET["masv"];
        $tensv = $_GET["tensv"];
        $result = $dal->update($masv,$tensv);
        $message = ["message"=>json_encode($result)];
        break;
    default:
        $message = ["message"=>"Unknown method".$_GET["action"]];
        break;
}

//The json message
header('Content-type: application/json; charset=utf-8');
//clean the output buffer
ob_clean();

echo json_encode($message);