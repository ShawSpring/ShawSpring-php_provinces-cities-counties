<?php

$region_type = intval($_GET['region_type']);
$parent_id = intval($_GET['parent_id']);

if ($region_type <= 0 || $parent_id <= 0) {
    die(json_encode(["flag" => "false", "msg" => "查询参数错误"]));
}

require "config.php";
$mysqli = new mysqli(HOST,USER,PASSWORD,DB);
if ($mysqli->connect_errno) {
    die(json_encode(["flag" => "false", "msg" => "连接数据库失败"]));
}

$stmt = $mysqli->prepare("SELECT `region_id`,`region_name` from `global_region` where `region_type`=? AND `parent_id`=?");
$stmt->bind_param('ii', $region_type, $parent_id);
if ($stmt->execute()) {
    $res = $stmt->get_result();
    $rows = $res->fetch_all();
    echo json_encode($rows);
} else {
    die(json_encode(["flag" => "false", "msg" => "查询数据库失败"]));

}
