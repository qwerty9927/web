<?php
  require('ConnectClass.php');
  $connect = new Connect_Driver();
  $connect->connect();
  $arrGlobal = array();

  if($_POST['title'] == 'search'){
    $arrGlobal = search();
  } else if($_POST['title'] == 'nextCode'){
    echo nextCode();
    return;
  }
  echo json_encode($arrGlobal);
  $connect->dis_connect();

  function search(){
    global $connect;
    $sql = "";
    $arrSearch = array();
    if($_POST['access'] == 'KHACHHANG'){
      $sql = "SELECT * FROM KHACHHANG WHERE 
        Makh LIKE '{$_POST['searchParameter']}%' OR
        Ten LIKE '{$_POST['searchParameter']}%' OR
        SDT LIKE '{$_POST['searchParameter']}%' LIMIT {$_POST['startPoint']}, 10"
      ;
      $sqlCount = "SELECT COUNT(*) as quantity FROM KHACHHANG WHERE 
        Makh LIKE '{$_POST['searchParameter']}%' OR
        Ten LIKE '{$_POST['searchParameter']}%' OR
        SDT LIKE '{$_POST['searchParameter']}%'"
      ;
      $count = $connect->select($sqlCount);
      $value =  $connect->select($sql);
      $arrTemp = array(
        "count" => $count[0]['quantity'],
        "value" => $value,
      );
      return $arrTemp;
    } else if($_POST['access'] == 'NHANVIEN'){
      $sql = " SELECT * FROM NHANVIEN WHERE
        Manv LIKE '{$_POST['searchParameter']}%' OR
        Ten LIKE '{$_POST['searchParameter']}%' OR
        SDT LIKE '{$_POST['searchParameter']}%'"
      ;
    }
  }

  function nextCode(){
    global $connect;
    $sql = "SELECT * FROM {$_POST['access']} ORDER BY {$_POST['field']} DESC LIMIT 1";
    return $connect->select($sql)[0]['Makh'] + 1;
  }
?>
