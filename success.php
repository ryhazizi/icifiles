<?php
    require_once 'core/init.php';
    $Result = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>iCiFiles - Upload Your Files</title>
	 <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get();?>assets/css/font.css">
	 <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get();?>assets/css/style.css">
</head>
<body>
  <?php

      if ($upload->checkPermission('fileid'))
      {
        if ($upload->checkID2($_GET['fileid']))
        {
           $Result = $upload->getData($_GET['fileid']);
        }
        else
        {
           header("location: 404.html");
        }
      }
      else
      {
         header("location: 404.html");
      }

  ?>
  <div id="header"><strong>iCiFiles</strong> - Upload Your Files</div>
   <div class="box2">
   	 <div class="box2 content2" align="center">
   	 	 <h3>File anda berhasil di upload.</h3>
        <br/>
         Halo <strong><?php echo $Result['NamaLengkap']; ?></strong> file anda <strong><?php echo $upload->getFileName($Result['NamaFile']); ?></strong> berhasil di upload di sistem kami,<br/>
          anda dapat membagikan file anda kepada siapa saja menggunakan link yang ada dibawah ini.
           <br/>
              <br/>
                 <input type="text" name="" class="box2 inputtext" value="<?php echo $baseurl->get().'unduh.php?fileid='.$_GET['fileid'].'';?>" style="text-align: center;">
                <br/>
               <br/>
           </div>
        </div>
     </div>
   <div id="footer" align="center">
      <strong>iCiFiles</strong> v1.0
   </div>
</body>
</html>