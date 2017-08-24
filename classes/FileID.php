<?php

	class FileID {

		  public function create()
          {
             $Data         = "0123456789876543210";
             $Random       = substr(str_shuffle($Data),0,15); 
             return $Random;
          }
	}