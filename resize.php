<?php

foreach ($_FILES as $kk => $vv) {
  if (is_uploaded_file($_FILES[$kk]["tmp_name"])) {
	if (move_uploaded_file ($_FILES[$kk]["tmp_name"], realpath(dirname(__FILE__))."/images/" . $kk.".png")) {
	chmod(realpath(dirname(__FILE__))."/images/" . $kk.".png", 0644);
	echo realpath(dirname(__FILE__))."/images/"  . $kk.".png" . "をアップロードしました。";
    $url = realpath(dirname(__FILE__))."/images/"  . $kk.".png";

      if (preg_match('/_images_/',$kk)) {
        $h_name_row =  explode("_images_", $kk);
        $h_name = $h_name_row[0];
            $width = $_POST[$h_name."_width"];
            $height = $_POST[$h_name."_height"];

            // 元画像のファイルサイズを取得
            list($original_image_w, $original_image_h) = getimagesize($url);
 
            // サイズを指定して、背景用画像を生成
            $canvas = imagecreatetruecolor($width, $height);

            // ファイル名から、画像インスタンスを生成
            $image = imagecreatefromjpeg($url);


            // 背景画像に、画像をコピーする
            imagecopyresampled($canvas,  // 背景画像
            $image,   // コピー元画像
              0,        // 背景画像の x 座標
              0,       // 背景画像の y 座標
              0,        // コピー元の x 座標
              0,        // コピー元の y 座標
              $width,   // 背景画像の幅
              $height,  // 背景画像の高さ
              $original_image_w, // コピー元画像ファイルの幅
              $original_image_h  // コピー元画像ファイルの高さ
            );

            // 画像を出力する
            imagejpeg($canvas,           // 背景画像
                           realpath(dirname(__FILE__))."/images/"  . $kk.".png",           // 出力するファイル名（省略すると画面に表示する）
                           100           // 画像精度（この例だと100%で作成）
            );

            // メモリを開放する
            imagedestroy($canvas);
        }
    } else {
	  //echo "ファイルをアップロードできません。";
    }
  } else {
	//echo "ファイルが選択されていません。";
  }
}


?>


