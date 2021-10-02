<?php
require('_conn.php');    //DB불러오기

// 회원 정보 받아오기 세션으로 부터

$no = $_SESSION['no'];
$name = $_POST['name'];
$pw = $_POST['pw'];
$pwc = $_POST['pwc'];
$addr = $_POST['address'];
// $id = $_SESSION['id'];


//패스워드를 잘못 입력할 경우의 처리
if($pw != $pwc){
    echo "<script>alert('패스워드를 확인해주세요');location.href='userchange.php'</script>";
}
$sql = "UPDATE `user` SET `name`='$name', `pw`='$pw', `address`='$addr' WHERE `no`=$no"; 
$result = mysqli_query($conn, $sql);

if($result){
    $sql = "SELECT * FROM `user` WHERE no='$no'";
    $result = mysqli_query($conn, $sql);
    foreach($result as $user){
        $_SESSION['no'] = $user['no'];          
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['address'] = $user['address'];
    }
    
// echo "<script>alert('회원정보가 변경 되었습니다.');location.href='user.php'</script>";
echo "<script>alert('회원 정보가 수정 되었습니다.');location.href='user.php'</script>";
}

?>