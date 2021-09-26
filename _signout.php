<?php
require('_conn.php');
$no = $_SESSION['no'];


// select 조회, insert 삽입, delete 삭제, update 변경/수정

$sql = "UPDATE `user` SET `del_flg` = 1 WHERE `no`=$no";

// DB에 남기고 삭제
// $sql = "UPDATE `user` SET `del_flg` = 1 WHERE `no`=\"$_SESSION['no']\"";
// 완전삭제
// $sql = "DELETE FROM `user` WHERE `no`=\"$_SESSION['no']\"";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('회원 탈퇴가 완료되었습니다. 안녕히 가십시오.');locaion.href='index.php'</script>";
    require('_logout.php');
}

?>
