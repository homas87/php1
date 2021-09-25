<?php

//회원가입
require('_conn.php');

$id = $_POST['id'];
$pw = $_POST['pw'];
$pwc = $_POST['pwc'];
$name = $_POST['name'];
$addr = $_POST['address'];


//id가 중복된 경우의 처리
$sql = "SELECT * FROM `user` WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = $result->num_rows; //결과값을 정수로 변환 (결과값이 1개면 1로 변환)
if($row >0) {           //그러니까~ DB에서 user 테이블에 아이디와 비밀번호를 확인후 같으면 1이 나오니 1보다 크면 로그인처리 ㅇㅋ!)
    //로그인처리
    echo "<script>alert('이미 사용중입니다.!');location.href='join.php'</script>";
}




// 패스워드를 잘못 입력 했을 경우의 처리
if($pw != $pwc) {       
    echo "<script>alert('패스워드를 확인해주세요!');location.href='join.php'</script>";
}

// select 조회, insert 삽입, delte 삭제, update 변경/수정
$sql = "INSERT INTO `user`(id, pw , name , address ) VALUE ('$id','$pw','$name','$addr')";
$result = mysqli_query($conn, $sql);


if($result) { 
    //회원 가입 후 로그인처리
    require('_loginok.php');
    echo "<script> alert('회원가입이 완료 되었습니다.!');location.href='index.php'</script>";
}else{
    echo "<script>alert('회원가입 실패!');location.href='join.php'</script>";
}


?>