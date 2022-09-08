<?php

include "template/hand.php";
include "logic/Upload.php";
include "Logic/Connect.php";
include "template/dialog.php";
$con = new GetConnection();
$connect = $con->getConnect();

if(isset($_POST["name"])){
    $name = $_POST["name"];
    $obj = new UploadFile("storage/regions/", 'imageF');
    $urlImage =  $obj->getPathImage();
    $content = $_POST["content"];
    $type = $_POST["type"];
    $state  = $_POST["state"];
    echo "<pre>";
    print_r($_POST);
    echo "<pre>";
    $result = $connect->query("INSERT INTO regions(name,image,content,type,state_id) 
    VALUES ('$name','$urlImage','$content','$type', $state)");
    if( $result ){
        echo '<div class="message">تم إضافة بنجح</div>';
    }
}

if( isset($_POST["iddelete"]) ){
    $id = $_POST["iddelete"];
    $result = $connect->query("DELETE FROM regions WHERE id = $id");
    if(  $result ){ 
        echo '<div class="message"> تم حذف بنجاح </div>';
    }
}

?>
<button class="show-edit btn btn-blue" style="margin:10px;text-align:center;">إضافة</button>


<table>
    <tr>
        <th>
            الخيارات
        </th>
        <th> الولاية</th>
        <th>الصورة</th>
        <th>تفاصيل</th>
        <th>الإسم</th>
        <th>#id</th>
    </tr>
   
   <?php

    $result = $connect->query("SELECT * FROM regions");
    if( $result->num_rows > 0){
        while(($row = $result->fetch_assoc())){
            $re = $connect->query("SELECT * FROM states WHERE
                id  = " . $row["state_id"] ." LIMIT 1
            ");
            $state = $re->fetch_assoc();
            $stateName = $state["name"];
            echo '
            <tr>
            <td class="option-btn">
                
                <form action="regions.php" method="POST" style="display: inline">
                        <input type="hidden" name="iddelete" value="'. $row["id"] .'"/>
                        <input type="submit" value="حذف" class="btn btn-red"/>
                </form>
                <a href="edit-region.php?id='.$row['id'].'" class="btn btn-green">تعديل</a>
            </td>
            <td> '. $stateName .'
            <td>
                <image src='. $row["image"] .' style="width: 50px;height: 50px;"
                />
            </td>
            <td>'. $row["content"] .'</td>
            <td>'. $row["name"] .'</td>
            <td>'. $row["id"] .'</td>             
        </tr>
            ';
        }
    }
   ?>
</table>


<?php
include "template/footer.php";

?>
