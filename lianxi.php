<?php
$name=$_POST['name'];
$file=$_FILES['file'];
print_r($_FILES);
$filesize=1024*1024*20;
if ($filesize<$_FILES['file']['size']){
    echo "too big";
    die();
}else{
    echo "fin";
    echo "<br>";
}
$arr=["image/jpeg","image/jpg","image/png"];
if (in_array($file['type'],$arr)){
    echo "fin2","<br>";
}else{
    echo "out";
    die();
}
$path="./img/".date("Y-m-d");
if (!file_exists($path)){
    mkdir($path,0777,true);
    echo "create";
}else{
    echo "had it","<br>";
}
$mix=substr($_FILES['file']['name'],strrpos($file['name'],'.'));
echo $mix;
$filename=$path."/".rand(1,999999).$mix;
if (move_uploaded_file($_FILES['file']['tmp_name'],$filename)){
    echo "ok","<br>";
    echo $filename;
}else{
    echo "fail";
}
$con=mysqli_connect("127.0.0.1",'root','root','1808a');
$sql="insert into lianxi value (null,'$name','$filename')";
echo $sql;
if(mysqli_query($con,$sql)){
    echo "<script>alert('ok');location.href='search.php'</script>";
}else{
    echo "<script>alert('out');</script>";

}
?>
