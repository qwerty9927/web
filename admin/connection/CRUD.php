<?php
  require('connect.php');
  $conn = connect("cuahang");
  switch($_POST['access']){
    case "KHACHHANG":
      if($_POST['title'] == 'create'){
        $sqlAdd = "INSERT INTO KHACHHANG (Makh, Ten, DiaChi, SDT, MATK) VALUES ('{$_POST['Makh']}', '{$_POST['Hoten']}', '{$_POST['DiaChi']}', '{$_POST['SDT']}', '3')";
        $sqlAll = "SELECT * FROM KHACHHANG LIMIT {$_POST['startPoint']}, 10";
        echo json_encode(action_Create($sqlAdd, $sqlAll));
      } else if($_POST['title'] == 'update'){
        $sqlUpdate = "UPDATE KHACHHANG 
          SET 
            Ten = '{$_POST['Hoten']}',
            DiaChi = '{$_POST['DiaChi']}',
            SDT = '{$_POST['SDT']}'
          WHERE Makh = '{$_POST['Makh']}'
        ";
        $sqlAll = "SELECT * FROM KHACHHANG LIMIT {$_POST['startPoint']}, 10";
        echo json_encode(action_Update($sqlUpdate, $sqlAll));
      } else {
        $sqlDelete = "DELETE FROM KHACHHANG WHERE Makh = '{$_POST['Makh']}'";
        $sqlAll = "SELECT * FROM KHACHHANG LIMIT {$_POST['startPoint']}, 10";
        echo json_encode(action_Delete($sqlDelete, $sqlAll));
      }
      break;

    case "NHANVIEN":
      if($_POST['title'] == 'create'){
        $sqlAdd = "INSERT INTO NHANVIEN (Manv, Ten, DiaChi, SDT, MATK) VALUES ('{$_POST['Manv']}', '{$_POST['Hoten']}', '{$_POST['DiaChi']}', '{$_POST['SDT']}', '3')";
        $sqlAll = "SELECT * FROM NHANVIEN LIMIT {$_POST['startPoint']}, 10";
        echo json_encode(action_Create($sqlAdd, $sqlAll));
      } else if($_POST['title'] == 'update'){
        $sqlUpdate = "UPDATE NHANVIEN 
          SET 
            Ten = '{$_POST['Hoten']}',
            DiaChi = '{$_POST['DiaChi']}',
            SDT = '{$_POST['SDT']}'
          WHERE Manv = '{$_POST['Manv']}'
        ";
        $sqlAll = "SELECT * FROM NHANVIEN LIMIT {$_POST['startPoint']}, 10";
        echo json_encode(action_Update($sqlUpdate, $sqlAll));
      } else {
        $sqlDelete = "DELETE FROM NHANVIEN WHERE Manv = '{$_POST['Manv']}'";
        $sqlAll = "SELECT * FROM NHANVIEN LIMIT {$_POST['startPoint']}, 10";
        echo json_encode(action_Delete($sqlDelete, $sqlAll));
      }
      break;
  }
  close_connect($conn);

  function action_Create($sqlAdd, $sqlAll){
    global $conn;
    $arrOfAll = array();
    if(mysqli_query($conn, $sqlAdd)){
      $resultAll = mysqli_query($conn, $sqlAll);
      while($row = mysqli_fetch_array($resultAll, MYSQLI_ASSOC)){
        array_push($arrOfAll, $row);
      }
      return $arrOfAll;
    } else {
      return false;
    }
  }

  function action_Update($sqlUpdate, $sqlAll){
    global $conn;
    $arrOfAll = array();
    if(mysqli_query($conn, $sqlUpdate)){
      $resultAll = mysqli_query($conn, $sqlAll);
      while($row = mysqli_fetch_array($resultAll, MYSQLI_ASSOC)){
        array_push($arrOfAll, $row);
      }
      return $arrOfAll;
    } else {
      return false;
    }
  }
  
  function action_Delete($sqlDelete, $sqlAll){
    global $conn;
    $arrOfAll = array();
    if(mysqli_query($conn, $sqlDelete)){
      $resultAll = mysqli_query($conn, $sqlAll);
      while($row = mysqli_fetch_array($resultAll, MYSQLI_ASSOC)){
        array_push($arrOfAll, $row);
      }
      return $arrOfAll;
    } else {
      return false;
    }
  }
?>
