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
   <script src="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.css">
</head>
<body>
  <?php

      if ($upload->checkPermission('fileid'))
      {
        if ($upload->checkID($_GET['fileid']))
        {
           if ($upload->submitform('keyxWna6Muuvi'))
           {
              $Data  = array 
                       (
                         "NamaLengkap"    => $_POST['NamaLengkap'],
                         "Email"          => $_POST['Email'],
                         "DeskripsiFile"  => $_POST['DeskripsiFile']
                       );

              if ($validation->empty_field($Data['NamaLengkap']) == "TRUE")
              {
                 echo "<script>sweetAlert('Kesalahan', 'Nama lengkap masih kosong.', 'warning');</script>"; 
              }
              else if ($validation->empty_field($Data['Email']) == "TRUE")
              {
                 echo "<script>sweetAlert('Kesalahan', 'Email masih kosong.', 'warning');</script>"; 
              }
              else if ($validation->empty_field($Data['DeskripsiFile']) == "TRUE")
              {
                 echo "<script>sweetAlert('Kesalahan', 'Deskripsi file masih kosong.', 'warning');</script>"; 
              }
              else if ($validation->regex_name($Data['NamaLengkap']) == "FALSE")
              {
                 echo "<script>sweetAlert('Kesalahan', 'Nama lengkap hanya boleh berisi huruf dan spasi.', 'warning');</script>";
              }
              else if ($validation->regex_email($Data['Email']) == "FALSE")
              {
                 echo "<script>sweetAlert('Kesalahan', 'Format email anda salah. Contoh format yang benar : example@email.com .', 'warning');</script>";
              }
              else if ($validation->regex_description($Data['DeskripsiFile']) == "FALSE")
              {
                 echo "<script>sweetAlert('Kesalahan', 'Deskripsi file hanya boleh berisi huruf, angka dan spasi.', 'warning');</script>";  
              }
              else if ($validation->amount_character($Data['NamaLengkap']) == "Short")
              {
                  echo "<script>sweetAlert('Kesalahan', 'Nama lengkap minimal lebih dari 4 huruf.', 'warning');</script>";
              }
              else if ($validation->amount_character($Data['NamaLengkap']) == "Long")
              {
                  echo "<script>sweetAlert('Kesalahan', 'Nama lengkap tidak boleh lebih dari 30 huruf.', 'warning');</script>";
              }
              else if ($validation->amount_character($Data['NamaLengkap']) == "Short")
              {
                  echo "<script>sweetAlert('Kesalahan', 'Nama lengkap minimal lebih dari 4 huruf.', 'warning');</script>";
              }
              else if ($validation->amount_character($Data['NamaLengkap']) == "Long")
              {
                  echo "<script>sweetAlert('Kesalahan', 'Nama lengkap tidak boleh lebih dari 30 huruf.', 'warning');</script>";
              }
              else if ($validation->amount_character($Data['Email']) == "Short")
              {
                  echo "<script>sweetAlert('Kesalahan', 'Email minimal lebih dari 4 huruf atau angka.', 'warning');</script>";
              }
              else if ($validation->amount_character($Data['Email']) == "Long")
              {
                  echo "<script>sweetAlert('Kesalahan', 'Email tidak boleh lebih dari 30 huruf atau angka.', 'warning');</script>";
              }
              else if ($validation->amount_character($Data['DeskripsiFile']) == "Short")
              {
                  echo "<script>sweetAlert('Kesalahan', 'Deskripsi file minimal lebih dari 4 huruf atau angka.', 'warning');</script>";
              }
              else if ($validation->amount_character($Data['DeskripsiFile']) == "Long")
              {
                  echo "<script>sweetAlert('Kesalahan', 'Deskripsi file tidak boleh lebih dari 30 huruf atau angka.', 'warning');</script>";
              }
              else
              {
                if ($upload->updateData($Data['NamaLengkap'], $Data['Email'], $Data['DeskripsiFile'], $_GET['fileid']))
                {
                   header("location: ".$baseurl->get()."success.php?fileid=".$_GET['fileid']."");
                }
              }
           }
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
   	 	 <h3>1 langkah lagi file anda akan berhasil di upload.</h3>
        <br/>
         Isi formulir dengan data yang benar dibawah ini maka file anda sudah terupload di sistem kami, <br/> dan anda bisa membagikan file yang sudah di upload untuk siapa saja.
          <br/>
           <br/>
           <form name="Form update data" method="POST">
            <input type="text" class="box2 inputtext" placeholder="Nama Lengkap" name="NamaLengkap">
              <input type="email" class="box2 inputtext" placeholder="Email" name="Email">
                <input type="text" class="box2 inputtext" placeholder="Deskripsi File" name="DeskripsiFile">
                <br/>
               <br/>
              <button type="submit" class="box2 submitBtn" name="keyxWna6Muuvi">Selesai</button>
            </form>
           </div>
        </div>
     </div>
   <div id="footer" align="center">
      <strong>iCiFiles</strong> v1.0
   </div>
</body>
</html>