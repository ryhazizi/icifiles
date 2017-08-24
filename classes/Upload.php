<?php

	class Upload 
	{
		  private $Mysqli, $param, $data;

          public function __construct()
          {
         	 $this->Mysqli = Database::getInstance();
	      }

	      public function start($param)
	      {
	          if (isset($_POST[$param]))
	          {
	          	return TRUE;
	          } 
	      }

	      public function getExtension($param)
	      {
	      	$data = explode('.', $param);
	      	return strtolower(end($data));
	      }

	      public function AllowedExtension()
	      {
	      	$data = array 
	      	        (  "txt",
	      		       "rar",
	      		       "zip",
	      		       "doc",
	      		       "docx",
	      		       "xlr",
	      		       "xls",
	      		       "xlsx",
	      		       "pptx",
	      		       "ppt",
	      		       "pdf",
	      		       "psd",
	      		       "srt",
	      		       "ttf",
	      		       "mp3",
	      		       "mp4",
	      		       "3gp",
	      		       "avi",
	      		       "mkv",
	      		       "svg",
	      		       "ai",
	      		       "jpg",
	      		       "png",
	      		       "gif"
	      		    );
	      	return $data;
	      }

	      public function checkExtension($param)
	      {
	      	 foreach ($this->AllowedExtension() as $key => $value) {
	      	 	if ($value == $param) {
	      	 		return TRUE;
	      	 	}
	      	 }
	      }

	      public function checkSize($param)
	      {
	      	 if ($param > 52428800)
	      	 {
	      	 	return TRUE;
	      	 }
	      }

	      public function getFileID($param)
	      {
	      	 return substr_replace($param, "", 15);
	      }

	      public function file($tmp, $newFilename)
	      {
	      	 if (move_uploaded_file($tmp, "upload/".$newFilename.""))
	      	 {
	      	 	return TRUE;
	      	 }
	      }

	      public function insertFileData($fileid, $newFilename, $date)
	      {
	      	 return $this->Mysqli->insertFileData($fileid, "", "", $newFilename, "", $date, "0", "Tidak Aktif");
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
	      	 if ($this->Mysqli->checkID($param))
	      	 {
	      	 	return TRUE;
	      	 }
	      	 else
	      	 {
	      	 	return FALSE;
	      	 }
	      }

	      public function checkID2($param)
	      {
	      	 if ($this->Mysqli->checkID2($param))
	      	 {
	      	 	return TRUE;
	      	 }
	      	 else
	      	 {
	      	 	return $data;
	      	 }
	      }


	      public function submitform($param)
	      {
	          if (isset($_POST[$param]))
	          {
	          	return TRUE;
	          } 
	      }

	      public function updateData($NamaLengkap, $Email, $DeskripsiFile, $Fileid)
	      {
	      	  return $this->Mysqli->updateData($NamaLengkap, $Email, $DeskripsiFile, "Aktif", $Fileid);
	      }

	      public function getData($param)
	      {
	      	 return $this->Mysqli->getData($param);
	      }

	      public function getFileName($param)
	      {
	      	 return substr_replace($param, '', 0, 16);
	      }



     }
?>