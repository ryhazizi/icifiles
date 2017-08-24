<?php
/*
   $nama = "ryan.zip";
   $x = explode('.', $nama);
   $ekstensi = strtolower(end($x));
   echo $ekstensi;


   
 */
//echo str_replace('-', '', $y);
  // echo date('d-m-y');
   $y = "011724972843065-icifiles.zip";
echo substr_replace($y, '', 0, 16);

/*
   if ($ekstensi == "rar")
   {
   	echo "false";
   }
   else
   {
   	echo "true";
   }

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
                      "exe",
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


            foreach ($data as $key => $value) {
               if ($value ==  "jpg")
               {
                  echo "string";
               }
            }

            */