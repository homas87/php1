<?php
require('_conn.php');

$id = $_POST['id'];
$pw = $_POST['pw'];

// select 조회, insert 삽입, delte 삭제, update 변경/수정
$sql = "SELECT * FROM `user` WHERE id='$id' AND pw='$pw' AND del_flg=0";
$result = mysqli_query($conn, $sql);
$row = $result->num_rows; //결과값을 정수로 변환 (결과값이 1개면 1로 변환)
if($row >0) {           //그러니까~ DB에서 user 테이블에 아이디와 비밀번호를 확인후 같으면 1이 나오니 1보다 크면 로그인처리 ㅇㅋ!)
    //로그인처리
    require('_loginok.php');
    echo "<script>alert('로그인 되었습니다.');location.href='index.php'</script>";
}else{
    echo "<script>alert('로그인 실패! 아이디, 비밀번호를 확인해주세요');location.href='login.php'</script>";
}
?>
