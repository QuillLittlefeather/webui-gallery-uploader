<?
if (!$_SESSION[ADMINID]) 
{
	header("Location: Index.php?page=Home");
	Exit();
}
else
?>

<?php
 
/**
* Image Uploader by Kristoper Saban
* 
* 
*/

$upload_image_limit = 1; // Do not change Value will break uploader
$upload_dir			= "images/gallery/"; // LOCATION OF GALLERY PHOTOS DO NOT CHANGE
$enable_thumbnails	= 1 ; // DO NOT CHANGE AS THUMBNAILS ARE NEEDED ///set 0 to disable thumbnail creation
$max_image_size		= 1024000 ; // max image size in bytes, default 1MB

	
function make_thumbnails($updir, $img){

	$thumbnail_width	= 160;
	$thumbnail_height	= 160;
	$thumb_preword		= "thumb_";

	$arr_image_details	= GetImageSize("$updir"."$img");
	$original_width		= $arr_image_details[0];
	$original_height	= $arr_image_details[1];

	if( $original_width > $original_height ){
		$new_width	= $thumbnail_width;
		$new_height	= intval($original_height*$new_width/$original_width);
	} else {
		$new_height	= $thumbnail_height;
		$new_width	= intval($original_width*$new_height/$original_height);
	}

	$dest_x = intval(($thumbnail_width - $new_width) / 2);
	$dest_y = intval(($thumbnail_height - $new_height) / 2);



	if($arr_image_details[2]==1) { $imgt = "ImageGIF"; $imgcreatefrom = "ImageCreateFromGIF";  }
	if($arr_image_details[2]==2) { $imgt = "ImageJPEG"; $imgcreatefrom = "ImageCreateFromJPEG";  }
	if($arr_image_details[2]==3) { $imgt = "ImagePNG"; $imgcreatefrom = "ImageCreateFromPNG";  }


	if( $imgt ) { 
		$old_image	= $imgcreatefrom("$updir"."$img");
		$new_image	= imagecreatetruecolor($thumbnail_width, $thumbnail_height);
		imageCopyResized($new_image,$old_image,$dest_x, 		
		$dest_y,0,0,$new_width,$new_height,$original_width,$original_height);
		$imgt($new_image,"$updir"."$thumb_preword"."$img");
	}

}










	
		foreach($_FILES as $k => $v){ 

			$img_type = "";

			### $htmo .= "$k => $v<hr />"; 	### print_r($_FILES);

			if( !$_FILES[$k]['error'] && preg_match("#^image/#i", $_FILES[$k]['type']) && $_FILES[$k]['size'] < $max_image_size ){

				$img_type = ($_FILES[$k]['type'] == "image/jpeg") ? ".jpg" : $img_type ;
				$img_type = ($_FILES[$k]['type'] == "image/gif") ? ".gif" : $img_type ;
				$img_type = ($_FILES[$k]['type'] == "image/png") ? ".png" : $img_type ;

				$img_rname = $_FILES[$k]['name'];
				$img_path = $upload_dir.$img_rname;

				copy( $_FILES[$k]['tmp_name'], $img_path ); 
				if($enable_thumbnails) make_thumbnails($upload_dir, $img_rname);
				$feedback .= "Image and thumbnail created $img_rname<br />";

			}
		}

//MYSQL DATABASE CONNECTOR CHANGE (HOST,USERNAME,PASSWORD,WEBUI DATABASE) BELOw

mysql_connect("host", "username", "password");
mysql_select_db("webui database here");
mysql_query("INSERT INTO wi_gallery    (picture,picturethumbnail,active,rank)VALUES('$img_rname','thumb_$img_rname','1','1')");




	while($i++ < $upload_image_limit){
		$form_img .= '<label>Image '.$i.': </label> <input type="file" name="uplimg'.$i.'"><br />';
	}

	$htmo .= '
		<p>'.$feedback.'</p>
		
<form method="post" enctype="multipart/form-data">
			'.$form_img.' <br />
			<input type="submit" value="Upload Image" style="margin-left: 50px;" />
			
		</form>
		';	

	echo $htmo;




