<?php
  require('connect.php');
  $conn = connect("cuahang");
  $arrGlobal = array();

  if($_POST['title'] == 'paging'){
    $arrGlobal = paging();
  } else if($_POST['title'] == 'search'){
    $arrGlobal = search();
  } else if($_POST['title'] == 'nextCode'){
    echo nextCode();
    return;
  }
  echo json_encode($arrGlobal);
  close_connect($conn);

  function search(){
    global $conn;
    $sql = "";
    $arrSearch = array();
    $temp = $_POST['searchParameter'] == "" ? "LIMIT 10" : "";
    if($_POST['access'] == 'KHACHHANG'){
      $sql = " SELECT * FROM KHACHHANG WHERE 
        Makh LIKE '{$_POST['searchParameter']}%' OR
        Ten LIKE '{$_POST['searchParameter']}%' OR
        SDT LIKE '{$_POST['searchParameter']}%'".$temp
      ;
    } else if($_POST['access'] == 'NHANVIEN'){
      $sql = " SELECT * FROM NHANVIEN WHERE
        Manv LIKE '{$_POST['searchParameter']}%' OR
        Ten LIKE '{$_POST['searchParameter']}%' OR
        SDT LIKE '{$_POST['searchParameter']}%'".$temp
      ;
    }
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      array_push($arrSearch, $row);
    }
    return $arrSearch;
  }

  function paging(){
    global $conn;
    $arrPage = array();
    $sql = "SELECT * FROM {$_POST['access']} LIMIT {$_POST['startPoint']}, 10";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      array_push($arrPage, $row);
    }
    return $arrPage;
  }

  function nextCode(){
    global $conn;
    $sql = "SELECT * FROM {$_POST['access']} ORDER BY Makh DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);        
    return mysqli_fetch_array($result, MYSQLI_ASSOC)['Makh'] + 1;
  }
?>