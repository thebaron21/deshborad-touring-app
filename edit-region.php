<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<style>
        .message{
    padding: 10px;
    background-color: #bfededb3;
    margin: 10px;
    border-radius: 3px;
    color: teal;
    font-family: ui-monospace;
    font-weight: 900;
    text-align: right;
    padding-right: 19px;
}
    </style>
<!-- Html Hidden Form -->
<div class="show">
    <!-- Form Show Data -->
    <div class="show-data">
        <style>
            .field {
                display: block;
                background-color: #e7e4e4;
                border: none;
                padding: 10px 5px;
                width: 23%;
                border-radius: 4px;
                border: 1px solid #ddd;
                margin: 8px auto;
            }
        </style>

        

            <?php


            include "logic/Connect.php";

            $con = new GetConnection();
            $connect = $con->getConnect();
            // Update Data
            

            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                if( isset($_POST['name']) ){
                    $name = $_POST["name"];
                    $content = $_POST["content"];
                    $type = $_POST["type"];
                    $result = $connect->query("UPDATE regions SET name='$name' , content='$content',type='$type' 
                        WHERE id = $id;
                    ");
                    if($result){
                        echo '<div class="message">تم التحديث بنجاح</div>';
                    }
                }


                $region = $connect->query("SELECT * FROM regions WHERE id = $id LIMIT 1");
                $result = $region->fetch_assoc();

                echo '<h1
                    style="
                    text-align: center;
                    background-color: #03a9f47d;
                    margin: 0px;
                    padding: 10px;
                    border-radius: 3px;
                    border: 1px solid #00bcd4;
                    "
                >'.$result['name'].'</h1>';

                echo '
                <form action="edit-region.php?id='. $id .'" method="post" enctype="multipart/form-data">
                <input type="text" value="' . $result["name"] . '" name="name" id="name" class="field">
             <input type="file" name="imageF" id="image" class="field">
             <textarea name="content" id="" cols="30" rows="10" ' . $result["content"] . '  class="field"></textarea>
             <select name="type" id="" style="
             width: 23%;
    text-align: right;
    border: 1px solid #ddd;
    background: #e7e4e4;
    padding: 3px;
    border-radius: 3px;
    padding: 10px 0px;
    display: block;
    margin: 16px auto;


                ">';
                    if( $result["type"]  == "as"){
                        echo '
                            <option selected=selected value="as">سياحية</option>
                            <option value="ay">أثرية</option>
                        ';
                    }else{
                        echo '
                            <option selected value="ay">أثرية</option>
                            <option  value="as">سياحية</option>
                        ';
                    }
                
                echo '                
                 
             </select>
             <input type="submit" class="btn btn-blue" value="إضافة" style="
             display: block;
             width: 128px;
             margin-bottom: 10px;
             margin: 0px auto;
             border: 1px solid #ddd;
             height: 30px;
             color: black;
                ">';
            }
            ?>
        </form>
    </div>
    <!-- Form Edit Data -->

</div>