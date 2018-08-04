<?php

if(isset($_POST['submit'])){
  $nomor = htmlspecialchars($_POST['nomor']);
  $tgl_surat = htmlspecialchars($_POST['tgl_surat']);
  $asal_surat = htmlspecialchars($_POST['asal_surat']);
  $tgl_terima = htmlspecialchars($_POST['tgl_terima']);
  $perihal = htmlspecialchars($_POST['perihal']);
  $giat = htmlspecialchars($_POST['giat']);
  $tgl_giat = htmlspecialchars($_POST['tgl_giat']);
  $tempat = htmlspecialchars($_POST['tempat']);
  $pakaian = htmlspecialchars($_POST['pakaian']);

  //upload gambar 
  $file_agenda = upload();

  }



if(!empty(trim($nomor)) && !empty(trim($perihal))){
 
  if(tambah_agenda($nomor, $tgl_surat, $asal_surat, $tgl_terima, $perihal, $giat, $tgl_giat, $tempat, $pakaian)){ 
    echo "
      <script>
          alert('Data berhasil ditambahkan');
          document.location.href = 'lihatAgenda.php';
       </script>
      ";
  }else { 
      echo "
      <script>
          alert('Ada masalah saat menambahkan data');
          
       </script>
      ";
  }
}else{ 
      echo "
      <script>
          alert('nomor surat dan perihal wajib diisi');
          
       </script>
      ";

  }
}


function upload_agenda() {
  $namaFile = $_FILE ['file_agenda']['name'];
  $ukuranFile = $_FILE ['file_agenda']['size'];
  $error = $_FILE ['file_agenda']['error'];
  $tmpName = $_FILE['file_agenda']['error'];

  //cek apakah tidak ada gambar yang diupload
  //if($error === 4){
    //echo "<script> 
      //    alert('pilih gambar terlebih dahulu');
      //</script>";
  //return false;
 // }

  //cek ekstensi file
  $ekstensiFileValid = ['jpg', 'jpeg', 'png', 'pdf'];
  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));
    if(!in_array($ekstensiFile, $ekstensiFileValid)){
      echo "
      <script>
          alert('Format file tidak sesuai, silahkan upload file dalam bentuk jpg/pdf'); 
       </script>
      ";
      return false;
    }

    //cek jika ukurannya terlalu besar 
    if($ukuranFile > 1000000){
       echo "
      <script>
          alert('Ukuran file terlalu besar (Maks. 3 MB)'); 
       </script>
      ";
      return false;
    }

    //lolos pengecekan, gambar siap diupload  
    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;
    move_uploaded_file($tmpName), 'file_upload/file_agenda' . $namaFileBaru;
    return $namaFileBaru;
  }

?>

