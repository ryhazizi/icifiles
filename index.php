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
      if ($upload->start("keyomrtXhfqh1"))
      {
         $File = array
                 (
                  "Nama"            => $_FILES['File']['name'],
                  "NamaBaru"        => $fileid->create().'-'.$_FILES['File']['name'], 
                  "Ukuran"          => $_FILES['File']['size'],
                  "Ekstensi"        => $upload->getExtension($_FILES['File']['name']),
                  "LokasiSementara" => $_FILES['File']['tmp_name'],
                  "Waktu"           => date('d-m-y')
                 );

         if ($validation->empty($File['Nama']))
         {
             echo "<script>sweetAlert('Kesalahan', 'File yang ingin di upload masih kosong.', 'error');</script>";
         }
         else if ($upload->checkExtension($File['Ekstensi']))
         {
            if ($upload->checkSize($File['Ukuran']))
            {
               echo "<script>sweetAlert('Kesalahan', 'File yang di upload tidak boleh lebih dari 50 MB.', 'error');</script>";      
            }
            else
            {
               if ($upload->file($File['LokasiSementara'], $File['NamaBaru'], $File['Waktu']))
               {
                  if ($upload->insertFileData($upload->getFileID($File['NamaBaru']), $File['NamaBaru'], $File['Waktu']))
                  {
                      header("location: ".$baseurl->get()."next.php?fileid=".$upload->getFileID($File['NamaBaru'])."");       
                  }
               }
            } 
         } 
         else
         {
             echo "<script>sweetAlert('Kesalahan', 'Ekstensi file yang di upload tidak terdaftar di sistem.', 'error');</script>";
         }
     }
  ?>
  <div id="header"><strong>iCiFiles</strong> - Upload Your Files</div>
   <div class="box">
   	 <div class="box content" align="center">
      <form name="Form-Upload-iCiFiles" method="POST" enctype="multipart/form-data">
        <input type="file" name="File">
        <br/>
        <label class="box upload button">
          <button type="submit" class="box upload btn" name="keyomrtXhfqh1">Upload</button>
        </label>
       </form>
   	  </div>
       <br/>
       <div style="text-align: center;">
        Untuk informasi lebih lanjut silahkan membaca informasi tersebut pada <a href="bantuan.html">halaman bantuan</a>.<br/>Apabila ada pertanyaan lain bisa menghubungi melalui <a href="mailto:ryhaz07@gmail.com">email</a>.     
   	   </div>
     </div>
   <div id="footer--index">
      <strong>iCiFiles</strong> v1.0
   </div>
</body>
</html>