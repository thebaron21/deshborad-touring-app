<?php
include "template/hand.php";
include "logic/Connect.php";
$con = new GetConnection();
$connect = $con->getConnect();

$states = $connect->query("SELECT * FROM states");
$countState = $states->num_rows;
$regionAS = $connect->query("SELECT * FROM regions WHERE type='as'");
$asConut = $regionAS->num_rows;

$regionAY = $connect->query("SELECT * FROM regions WHERE type='ay'");
$ayConut = $regionAY->num_rows;

echo '<link rel="stylesheet" href="assets/css/dash.css">
<section class="dash">
    <div class="card">
        <h1>عدد الولايات</h1>
        <p>
        
        ' . $countState .'        
        </p>
    </div>
    <div class="card">
        <h1>عدد المناطق السياحية</h1>
        <p>
        '.$asConut.'
        </p>
    </div>
    <div class="card">
        <h1>عدد المناطق الأثرية</h1>
        <p>'. $ayConut .'</p>
    </div>
</section>
';


include "template/footer.php";
?>