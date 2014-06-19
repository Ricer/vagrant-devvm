<?php

/*
  Function resize($filename_original,$filename_resized,$new_w,$new_h)
  creates a resized image
  variables:
  $filename_original    Original filename
  $filename_resized    Filename of the resized image
  $new_w        width of resized image
  $new_h        height of resized image
 */
define('thumbnail_folder', "/images/tdp/");
define('upload_folder', "/images/dp/");
define('thumbnail_w', 200);
define('thumbnail_h', 200);

function getTimestamp(){
    $seconds = microtime(true); // true = float, false = weirdo "0.2342 123456" format 
    return round( ($seconds * 1000) );
}

function resize($filename_original, $filename_resized, $new_w, $new_h) {
    $extension = pathinfo($filename_original, PATHINFO_EXTENSION);
    ini_set("memory_limit", "100M");
    if (preg_match("/jpg|jpeg|JPG|JPEG/", $extension)) {
        $src_img = @imagecreatefromjpeg($filename_original);
    }

    if (preg_match("/png|PNG/", $extension))
        $src_img = @imagecreatefrompng($filename_original);

    if (!$src_img)
        return false;

    $old_w = imageSX($src_img);
    $image_w = $old_w;
    
    $old_h = imageSY($src_img);

    $x_ratio = $new_w / $old_w;
    $y_ratio = $new_h / $old_h;

    if (($old_w <= $new_w) && ($old_h <= $new_h)) {
        $thumb_w = $old_w;
        $thumb_h = $old_h;
    } elseif ($y_ratio <= $x_ratio) {
        $thumb_w = round($old_w * $y_ratio);
        $thumb_h = round($old_h * $y_ratio);
    } else {
        $thumb_w = round($old_w * $x_ratio);
        $thumb_h = round($old_h * $x_ratio);
    }

    $dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
    imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_w, $old_h);

    if (preg_match("/png/", $extension))
        imagepng($dst_img, $filename_resized);
    else
        imagejpeg($dst_img, $filename_resized, 100);

    imagedestroy($dst_img);
    imagedestroy($src_img);

    $image_dimensions[] = $old_w;
    $image_dimensions[] = $old_h;
    return $image_dimensions;
}

class User extends Model{
	public static $types = array(
		1 => 'Passenger',
		3 => 'Driver',
		5 => 'Administrator'
	);
	
	public static $_table_name = 'users';
	public static $_primary_key = 'id';
	
	public static function login($email, $password)
	{
		if ($user = User::find_by_email($email))
		{
			$password = hash('sha512', $password . $user->salt);
			if($user->password == $password)
			{
				return $user;
			}
		}
		return false;
	}
	
	public static function find_by_email($email){
		$selector = array(
			'email' => $email
		);
		return self::find($selector);
	}
	
	public static function find_from_auth($auth)
	{
		$results = self::find_by_sql("SELECT * FROM users WHERE md5(concat(id, firstname, lastname, email)) = '" . self::me($auth) . "'");
		
		return array_shift($results);
	}
	
	public function set_login_cookie()
	{
		setcookie('carpoolauth', md5($this->id . $this->firstname . $this->lastname . $this->email), time() + 60 * 60 * 24 * 31, '/');
	}
	public static function ajax($data,$file){
		
		if ($data['func'] == 'changeProfilePicture') {
	    try {

				$name = $_FILES["profilePicture"]["name"];
				$filename = getTimestamp();
				
				$extension = pathinfo($name, PATHINFO_EXTENSION);
				if (preg_match("/jpg|jpeg|JPG|JPEG/", $extension)) {
				  $filename.=".jpg";
				}else if (preg_match("/png|PNG/", $extension)){
				  $filename.=".png";
				}else{
					return json_encode(array('success' => 0,'data'=>NULL));
				}
				$result=move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] .upload_folder . $filename);
			  if(!$result)
					return json_encode(array('success' => 0,'data'=>NULL));
			  $image_dimensions = resize($_SERVER['DOCUMENT_ROOT'] .upload_folder . $filename, $_SERVER['DOCUMENT_ROOT'] .thumbnail_folder . $filename, thumbnail_w, thumbnail_h);
			    
				$user_id=$data['user_id'];
				$user=User::find(Array('id'=>$user_id));
				$user->profilePicture=thumbnail_folder . $filename;
				$result=User::update($user);
				return json_encode(array('success' => $result ? 1:0,'data'=>$result));

			} catch (Exception $e) {
				return json_encode(array('success' => 0,'data'=>NULL,'error'=>$e->getMessage()));
			}
		}
	}

}
?>
