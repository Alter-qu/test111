<?php
$con=mysqli_connect("127.0.0.1",'root','root','1808a');
$query=mysqli_query($con,"select * from lianxi");
$row=mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
<div>
    <table>
        <tr>
            <td>姓名</td>
            <td>照片</td>
        </tr>
        <?php
        foreach ($row as $k=>$v){
            ?>
            <tr>
                <td><?php echo $v['name'] ?></td>
                <td><img style="width: 80px;height: 50px" src="<?php echo $v['img'] ?>"></td>
            </tr>
        <?php
        }
        ?>

    </table>
</div>
