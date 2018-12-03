<?php
//ホテルごとのリサイズ値をセットしておく
$hotel_name["booking"]["width"]="1200";
$hotel_name["booking"]["height"]="1200";

$hotel_name["airbnb"]["width"]="560";
$hotel_name["airbnb"]["height"]="500";

$hotel_name["jaran"]["width"]="100";
$hotel_name["jaran"]["height"]="100";

$hotel_name["EXPEDIA"]["width"]="1000";
$hotel_name["EXPEDIA"]["height"]="1000";

$hotel_name["tripadvior"]["width"]="500";
$hotel_name["tripadvior"]["height"]="500";

?>
<!doctype html>
<html>
<head>
<style>
h2,h3{
margin:0;
padding:0
}
</style>
<meta charset="utf-8">
<title>なんでもリサイザー</title>
</head>
<body style="text-align:center">
<h1>5秒で作れる写真リサイザー</h1>
<form action="resize.php" method="post" enctype="multipart/form-data">
<?php foreach($hotel_name as $hotelname => $param) { ?>
  <div class="hotel" style="border:4px solid #eee; margin-bottom:20px; display:inline-block; width:45%;">
    <h2 style="background-color:black; color:#FFFFFF;"><?= $hotelname ?></h2>
    <input type="hidden" name="<?= "hotelname_".$hotelname ?>" value="<?= "hotelname_".$hotelname ?>">
    <?php foreach($param as $key => $val) { ?> 
      <div class="wh" style="display:inline-block;">
        <h3><?= $key ?></h3>
        <input type="text" name="<?= $hotelname."_".$key ?>" value="<?= $val ?>">
      </div>
    <?php } ?>
      <div class="wh" style="display:inline-block;">
        <h3>画像</h3>
        <input type="file" name="<?= $hotelname."_images_1" ?>">
        <input type="file" name="<?= $hotelname."_images_2" ?>">
        <input type="file" name="<?= $hotelname."_images_3" ?>">
        <input type="file" name="<?= $hotelname."_images_4" ?>">
        <input type="file" name="<?= $hotelname."_images_5" ?>">
      </div>
      
  </div>
<?php } ?>
<div>
<input type="submit" value="do resize">
<div>
</form>


</body>
</html>

