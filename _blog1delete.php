<?php
require('_conn.php');
$no = $_GET['no'];


// select 조회, insert 삽입, delete 삭제, update 변경/수정

// $sql = "UPDATE `user` SET `del_flg` = 1 WHERE `no`=$no";

// DB에 남기고 삭제
// $sql = "UPDATE `user` SET `del_flg` = 1 WHERE `no`=\"$_SESSION['no']\"";
// 완전삭제
$sql = "DELETE FROM `blog1` WHERE `no`='$no'";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('글 삭제가 완료 되었습니다.');location.href='blog.php'</script>";

}

?>
