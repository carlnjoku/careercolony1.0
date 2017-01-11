<?php
class userUpdates
{

private $db;

public function __construct($db)
{
$this->db = $db;
}

/* Users Background Details */
public function userDetails($user_id)
{
$query=mysqli_query($this->db,"SELECT username,email,name,profile_background,profile_background_position  FROM users WHERE user_id='$user_id' ")or die(mysqli_error($this->db));
$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
return $data;
}

/* Intro Tour Check */
public function userBackgroundUpdate($user_id,$actual_image_name)
{
$query=mysqli_query($this->db,"UPDATE users SET profile_background='$actual_image_name' WHERE user_id='$user_id'")or die(mysqli_error($this->db));
return $query;
}

/* Intro Tour Check */
public function userBackgroundPositionUpdate($user_id,$position)
{  
$position=mysqli_real_escape_string($this->db,$position);
$query=mysqli_query($this->db,"UPDATE users SET profile_background_position='$position' WHERE user_id='$user_id'")or die(mysqli_error($this->db));
return $query;
}

}
?>