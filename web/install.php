<?php
include_once 'head.php';
include_once 'header.php';
include_once 'config.php';

$conn = mysqli_connect($servername, $dbusername, $dbpassword);
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "CREATE DATABASE DNMP";
if (mysqli_query($conn, $sql)) {
    echo "数据库创建成功";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
$sql = "CREATE TABLE servers (
    id int(11) NOT NULL,
    hostname text CHARACTER SET utf8mb4 NOT NULL,
    ipv4 text CHARACTER SET utf8mb4 NOT NULL,
    ipv6 text CHARACTER SET utf8mb4,
    nginx varchar(3) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '0/1',
    phpfpm varchar(3) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '0/1',
    mysql varchar(3) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '0/1',
    proxy varchar(3) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '0/1'
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "创建数据表错误: " . $conn->error;
}

$sql = "CREATE TABLE settings (
    id int(11) NOT NULL,
    name text NOT NULL,
    data text NOT NULL,
    data2 text
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "创建数据表错误: " . $conn->error;
}

$sql = "CREATE TABLE status (
    username varchar(20) CHARACTER SET utf8mb4 NOT NULL,
    name varchar(20) CHARACTER SET utf8mb4 NOT NULL,
    type varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'UNKOWN',
    host varchar(30) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'UNKOWN',
    location varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'UNKOWN',
    password varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT '1234'
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "创建数据表错误: " . $conn->error;
}

$sql = "INSERT INTO settings (id, name, data, data2) VALUES
(1, 'usercookie', '".md5('adminadmin'.$salt)."', ''),
(13, 'secret', '0', NULL)";
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "创建数据表错误: " . $conn->error;
}

$conn->close();
echo "安装完成";
?>