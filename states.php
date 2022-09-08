<?php
include "Logic/Connect.php";
include  "template/hand.php";
include "logic/Upload.php";

$con = new GetConnection();
$connect = $con->getConnect();



if (isset($_POST["name"])) {
    $obj = new UploadFile("storage/states/", 'imageF');
    $urlImage = $obj->getPathImage();
    $name = $_POST["name"];

    $result = $connect->query("INSERT INTO states (id,name,image) VALUES (NULL,'$name','$urlImage')");
    echo '<div class="message"> تم إضافة بنجاح </div>';
}

if (isset($_POST["delete"])) {
    $id = $_POST["delete"];
    $query = "DELETE FROM states WHERE id =$id";
    $result = $connect->query($query);
    echo '<div class="message">تم حذف بنجاح</div>';
}




?>

<div class="row-insert-data" style="
    height: 40px;
    background: #00bcd41c;
    text-align: right;
    line-height: 38px;
">
    <form action="states.php" method="post" enctype="multipart/form-data">
        <input type="file" name="imageF" id="image" style="
    /* border: none; */
">
        <input type="text" name="name" id="name" placeholder="اسم الولاية" style="
    border: none;
    border-radius: 3px;
    padding: 6px 10px;
    text-align: right;
    color: #333;
    width: 30%;
">
        <input type="submit" value="حفظ" style="
                            padding: 4px 28px;
                            font-size: 17.5px;
                            background-color: #00bcd4;
                            color: white;
                            border: none;
                            margin: 5px;
                        ">
    </form>
</div>

<?php



echo '    <table>
        <tr>
            <th>
                العمليات
            </th>
            <th>
                الصورة
            </th>
            <th>
                الاسم
            </th>
            <th>
                رقم
            </th>            
        </tr>
        ';

$result = $connect->query("SELECT * FROM states");
if ($result->num_rows > 0) {
    while (($row = $result->fetch_assoc()) != null) {
        echo '<tr>
            <td>
            <form action="states.php" method="post">
        ';

        echo '<input  type="hidden" name="delete" value= ' . $row["id"] . '>';
        echo '
             <input class="btn btn-red" type="submit" value="Del">
            </form>

         </td>
                        <td> 
                            <img src="'. $row["image"]  .'"  
                            style="width: 50px;height: 50px;"
                            />
                        </td>
                        <td>' . $row["name"] . '</td>
                        <td>' . $row["id"] . '</td>
                    <tr>
                ';
    }
}


echo '</table>';


include  "template/footer.php";

?>