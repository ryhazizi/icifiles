<?php
	
	class Validation {

		private $Mysqli, $param;

		public function __construct()
        {
           $this->Mysqli = Database::getInstance();
        }

		public function empty($param)
	    {
	       if (!$param)
		   {
		   	  return TRUE;
		   }	
	    }

	    public function empty_field($param)
	    {
	       if (!$param)
		   {
		   	  return TRUE;
		   }	
	    }

		public function regex_name($param)
		{
			if (preg_match("/^[a-zA-Z ]*$/", $param))
			{
			   return "TRUE";
			}
			else
			{
			   return "FALSE";
			}
		}

		public function regex_description($param)
		{
			if (preg_match("/^[a-zA-Z-0-9 ]*$/", $param))
		    {
		       return "TRUE";
		    }
		    else
		    {
		       return "FALSE";
		    }
		}

		public function regex_email($param)
		{
			if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $param))
			{
				return "TRUE";
			}
			else
			{
				return "FALSE";
			}
		}

		public function amount_character($param)
		{
			if (strlen($param) < 4)
			{
				return "Short";
			}
			else if (strlen($param) > 30)
			{
				return "Long";
			}
		}

     }

 ?>