<?php
	require_once 'core/init.php';
	$Result = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mempersiapkan file anda  . . .</title>
</head>
<body>
  <?php
  		 if ($upload->checkPermission('fileid'))
         {
         	if ($upload->checkID2($_GET['fileid']))
            {
            	$Result = $unduh->getFileName($_GET['fileid']);
            	header("Content-disposition: attachment; filename=upload/".$Result['NamaFile']."");
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
</body>
</html>