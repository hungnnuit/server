<?php
	class Idroute {

	    public function id_route()
	    {	
	    	$origin ="cau vuot song than";
	    	$des ="Ben xe mien tay";

	    	$id_route=$this->progress_string($origin).'-'.$this->progress_string($des);
	    	
	    	return $id_route;
	    }

	    public function progress_string($string){
	    	$string =trim(ucwords($string));
	    	$temp= explode(' ', $string);
	    	$result='';
	    	foreach ($temp as $key => $value) {
	    		$result=$result.substr($value,0,1);
	    	}
	    	return $result;
	    }
	}

?>