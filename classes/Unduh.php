<?php

	class Unduh {
		 private $Mysqli, $param;

         public function __construct()
         {
         	 $this->Mysqli = Database::getInstance();
	     }

	     public function checkPermission($param)
	     {
	         if (isset($_GET[$param]))
	         {
	          	return TRUE;
	         } 
	         else
	         { 
	         	return FALSE;
	         }
	     }

	     public function checkID($param)
	     {
	      	 if ($this->Mysqli->checkID2($param))
	      	 {
	      	 	return TRUE;
	      	 }
	      	 else
	      	 {
	      	 	return FALSE;
	      	 }
	     }

	     public function getFileName($param)
	     {
	      	 return $this->Mysqli->getData($param);
	     }
	     
	}