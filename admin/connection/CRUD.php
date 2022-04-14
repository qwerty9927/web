<?php
  require('connect.php');
  require('ConnectClass.php');
  $connect = new Connect_Driver();
  $connect->connect();
  switch($_POST['access']){
    case "KHACHHANG":
      if($_POST['title'] == 'create'){
        echo json_encode($connect->insert($_POST['access'], $_POST['info']));
      } else if($_POST['title'] == 'update'){
        echo json_encode($connect->update($_POST['access'], $_POST['info'], "Makh = '{$_POST['Makh']}'"));
      } else {
        echo json_encode($connect->delete($_POST['access'], "Makh = '{$_POST['Makh']}'"));
      }
      break;

    case "NHANVIEN":
      // if($_POST['title'] == 'create'){
      //   $sqlAdd = "INSERT INTO NHANVIEN (Manv, Ten, DiaChi, SDT, MATK) VALUES ('{$_POST['Manv']}', '{$_POST['Hoten']}', '{$_POST['DiaChi']}', '{$_POST['SDT']}', '3')";
      //   $sqlAll = "SELECT * FROM NHANVIEN LIMIT {$_POST['startPoint']}, 10";
      //   echo json_encode(action_Create($sqlAdd, $sqlAll));
      // } else if($_POST['title'] == 'update'){
      //   $sqlUpdate = "UPDATE NHANVIEN 
      //     SET 
      //       Ten = '{$_POST['Hoten']}',
      //       DiaChi = '{$_POST['DiaChi']}',
      //       SDT = '{$_POST['SDT']}'
      //     WHERE Manv = '{$_POST['Manv']}'
      //   ";
      //   $sqlAll = "SELECT * FROM NHANVIEN LIMIT {$_POST['startPoint']}, 10";
      //   echo json_encode(action_Update($sqlUpdate, $sqlAll));
      // } else {
      //   $sqlDelete = "DELETE FROM NHANVIEN WHERE Manv = '{$_POST['Manv']}'";
      //   $sqlAll = "SELECT * FROM NHANVIEN LIMIT {$_POST['startPoint']}, 10";
      //   echo json_encode(action_Delete($sqlDelete, $sqlAll));
      // }
      break;
  }
  $connect->dis_connect();
?>
