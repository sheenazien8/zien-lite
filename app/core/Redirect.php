<?php
class Redirect {
	public static function to($location){
		header("location: $location");
	}
	public function back()
	{
		header("location: ../");
	}
}

?>