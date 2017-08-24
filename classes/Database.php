<?php

	class Database 
  {

		    private $Server     = "localhost";
		    private $Username   = "root";
	  	  private $Password   = "";
	  	  private $Database   = "icifiles";
		    private $Mysqli;    
	  	  private static $INSTANCE = null;
   		  private $sql, $param, $data, $prepare;

		    public function __construct()
	   	  {
		       $this->Mysqli = new mysqli($this->Server, $this->Username, $this->Password, $this->Database);
		    }

		    public static function getInstance()
	    	{
    	     if (!isset(self::$INSTANCE))
    	     {
              self::$INSTANCE = new Database();
           }
             return self::$INSTANCE;
        }

        public function checkID($param)
        {
           if ($sql = $this->Mysqli->query("SELECT * FROM Upload WHERE FileID='$param'"))
           {
              $data = $sql->fetch_assoc();
              if ($data['FileID'] == $param)
              {
                if ($data['StatusFile'] == "Tidak Aktif")
                {
                  return TRUE;
                }
                else
                {
                  return FALSE;
                }
              }
              else
              {
                 return FALSE;
              }
           }
           else
           {
               return FALSE;
           }
        }

        public function checkID2($param)
        {
           if ($sql = $this->Mysqli->query("SELECT * FROM Upload WHERE FileID='$param'"))
           {
              $data = $sql->fetch_assoc();
              if ($data['FileID'] == $param)
              {
                if ($data['StatusFile'] == "Aktif")
                {
                  return TRUE;
                }
                else
                {
                  return FALSE;
                }
              }
              else
              {
                 return FALSE;
              }
           }
           else
           {
               return FALSE;
           }

       }

        public function insertFileData($fileid, $namalengkap, $email, $newFileName, $deskripsifile, $date, $unduh, $statusfile)
        {
           $prepare = $this->Mysqli->prepare("INSERT INTO Upload (FileID, NamaLengkap, Email, NamaFile, DeskripsiFile, Waktu, Unduh, StatusFile) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
           $prepare->bind_param('ssssssss', $fileid, $namalengkap, $email, $newFileName, $deskripsifile, $date, $unduh, $statusfile);
           if ($prepare->execute())
           {
              return TRUE;
           }
        }

        public function updateData($NamaLengkap, $Email, $DeskripsiFile, $StatusFile, $Fileid)
        {
          $prepare = $this->Mysqli->prepare("UPDATE Upload SET NamaLengkap=?, Email=?, DeskripsiFile=?, StatusFile=? WHERE FileID=?");
          $prepare->bind_param('sssss', $NamaLengkap, $Email, $DeskripsiFile, $StatusFile, $Fileid);
          if ($prepare->execute())
          {
             return TRUE;
          }
          
        }

        public function getData($param)
        {
          return $this->Mysqli->query("SELECT * FROM Upload WHERE FileID='$param'")->fetch_assoc();
        }
  }

?>