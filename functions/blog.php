<?php

$pdo = new PDO("mysql:host=localhost;dbname=arsip_renmin", 'root', '');

function escape($data){
	global $link;
	return mysqli_real_escape_string($link,$data);
}

function tambah_surat_masuk($no_surat, $tgl_surat, $asal_surat, $tgl_terima, $isi_surat, $jenis_surat, $no_agenda, $disposisi, $tgl_ekspedisi ,$uploader, $file_surat_masuk){
	$isi_surat = escape($isi_surat);
	$disposisi = escape($disposisi);
	
	$query = "INSERT INTO surat_masuk (no_surat, tgl_surat, asal_surat, tgl_terima, isi_surat, jenis_surat, no_agenda, disposisi, tgl_ekspedisi, uploader, file_surat_masuk) VALUES ('$no_surat', '$tgl_surat', '$asal_surat', '$tgl_terima', '$isi_surat', '$jenis_surat', '$no_agenda', '$disposisi', '$tgl_ekspedisi','$uploader', '$file_surat_masuk')";
	return run($query);
}

//function tambah_disposisi_atasan($id_surat, $id_user, $tujuan, $isi, $batas_waktu, $catatan) {
  //$id_surat = escape($id_surat);

 // $query = "INSERT INTO disposisi (id_surat, id_user, kpd_yth, isi_disposisi, batas_waktu, catatan, status) VALUES ('$id_surat', '$id_user', '$tujuan', '$isi', '$batas_waktu', '$catatan', '1')";
 // return run($query);
//}

function tambah_dispss ($isi, $batas_waktu){
   $query = "INSERT INTO dispss (isi_disposisi, batas_waktu) VALUES ('$isi', '$batas_waktu')";
  return run($query);
}

function update_dispss ($catatan, $id){
   $query = "UPDATE dispss SET cttn='$catatan' WHERE id_dspss='$id'";
  return run($query);
}

function tambah_dispss_share ($id_surat, $kpd_yth){
   $query = "INSERT INTO share_dspss (id_surat,  kpd_yth, sttus) VALUES ('$id_surat', '$kpd_yth', '0')";
  return run($query);
}

//function tambah_disposisi_staff($id, $isi_dss) {
//  $query = "INSERT INTO disposisi_staff (id_disposisi, isi_disposisi2) VALUES ('$id','$isi_dss')";
//  return run($query);
//}

function tambah_dispss_share_staff ($kpd_yth2,  $id){
   $query = "UPDATE share_dspss SET  kpd_yth2='$kpd_yth2', sttus='1' WHERE id_disposisi='$id'";
  return run($query);
}

function tambah_surat_keluar($no_surat, $tgl_surat, $tujuan,  $isi_surat, $jenis_surat, $no_agenda, $keterangan, $uploader, $file_surat_keluar){
	$isi_surat = escape($isi_surat);
	$keterangan = escape($keterangan);
	
	$q1 = "INSERT INTO surat_keluar (no_surat, tgl_surat, tujuan, isi_surat, jenis_surat, no_agenda, keterangan, uploader, file_surat_keluar) VALUES ('$no_surat', '$tgl_surat', '$tujuan', '$isi_surat', '$jenis_surat', '$no_agenda', '$keterangan','$uploader', '$file_surat_keluar')";
	return run($q1);
}

function tambah_user($username, $password, $nama,  $status, $nipnrp, $pangkat, $jabatan){
	$username = escape($username);
	$password = escape($password);
	
	$query = "INSERT INTO users (username, password, nama, status, nipnrp, pangkat, jabatan) VALUES ('$username', '$password', '$nama', '$status', '$nipnrp', '$pangkat', '$jabatan')";
	return run($query);
}

function tambah_agenda($nomor, $tgl_surat, $asal_surat, $tgl_terima, $perihal, $giat, $tgl_giat, $tempat, $pakaian, $uploader, $file_agenda){
	$isi_surat = escape($perihal);
	$disposisi = escape($giat);
	
	$query = "INSERT INTO agenda (nomor, tgl_surat, asal_surat, tgl_terima, perihal, giat, tgl_giat, tempat, pakaian, uploader, file_agenda) VALUES ('$nomor', '$tgl_surat', '$asal_surat', '$tgl_terima', '$perihal', '$giat', '$tgl_giat', '$tempat', '$pakaian', '$uploader', '$file_agenda')";
	return run($query);
}

function tambah_notifikasi_sk(){
  $query = "INSERT INTO notifications (title, read_n) values ('Surat Keluar','1')";
  return run($query);
}

function tambah_notifikasi_sm(){
  $query = "INSERT INTO notifications (title, read_n) values ('Surat Masuk','1')";
  return run($query);
}

function tambah_notifikasi_ag(){
  $query = "INSERT INTO notifications (title, read_n) values ('Agenda','1')";
  return run($query);
}

function run($query){
	global $link; 

	if(mysqli_query($link, $query)) return true;
	else return false; 
}

function result($query){
global $link; 
 if($result = mysqli_query($link, $query) or die ('gagal menampilkan data')){
 	return $result;
  }

}

function tampilkan_surat_masuk(){
	$query = "SELECT * FROM surat_masuk ORDER BY id DESC";
	return result($query);
}

function tampilkan_surat_keluar(){
	$query = "SELECT * FROM surat_keluar ORDER BY id DESC";
	return result($query);
}

function tampilkan_agenda(){
	$query = "SELECT * FROM agenda ORDER BY id DESC";
	return result($query);
}

function hapus_data_agenda($id){
	$query = "DELETE FROM agenda WHERE id=$id";
	return run($query);
}

function hapus_surat_masuk($id){
	$query = "DELETE FROM surat_masuk WHERE id=$id";
	return run($query);
}

function hapus_surat_keluar($id){
	$query = "DELETE FROM surat_keluar WHERE id=$id";
	return run($query);
}

function hapus_user($id){
	$query = "DELETE FROM users WHERE id=$id";
	return run($query);
}

function tampilkan_perid_suratmasuk($id){
	$query = "SELECT * FROM surat_masuk WHERE id=$id";
	return result($query);
}

function tampilkan_user(){
	$query = "SELECT * FROM users";
	return result($query);
}

function tampilkan_perid_user($id){
	$query = "SELECT * FROM users WHERE id=$id";
	return result($query);
}

function tampilkan_td_id($id){
$query = "SELECT * FROM share_dspss, dispss, users, surat_masuk WHERE share_dspss.id_disposisi = dispss.id_dspss AND share_dspss.kpd_yth2 = users.id AND share_dspss.id_surat = surat_masuk.id AND id_disposisi='$id'";
  return result($query);
}

function tampilkan_dd_id($id){
$query = "SELECT * FROM share_dspss, dispss, users, surat_masuk WHERE share_dspss.id_disposisi = dispss.id_dspss AND share_dspss.kpd_yth = users.id AND share_dspss.id_surat = surat_masuk.id AND id_disposisi='$id'";
  return result($query);
}

function tampilkan_disposisi_atasan(){
  $query = "SELECT * FROM share_dspss, dispss, users WHERE share_dspss.kpd_yth = users.id AND share_dspss.id_disposisi = dispss.id_dspss  ORDER BY id DESC";
  return result($query);
  }

function tampilkan_disposisi_staff(){
  $query = "SELECT * FROM disposisi_staff, users WHERE disposisi_staff.kpd_yth2 = users.id ";
  return result($query);
  }


function tampilkan_perid_suratkeluar($id){
	$query = "SELECT * FROM surat_keluar WHERE id=$id";
	return result($query);
}

function tampilkan_perid_agenda($id){
	$query = "SELECT * FROM agenda WHERE id=$id";
	return result($query);
}

function hasil_cari_agenda($cari){
 
 	$query = "SELECT * FROM agenda WHERE asal_surat LIKE '%$cari%' OR perihal LIKE '%$cari%' OR giat LIKE '%$cari%' OR tempat LIKE '%$cari%' OR pakaian LIKE '%$cari%'";
	return result($query);
 }


function cari_agenda_tgl($tgl_surat_mulai, $tgl_surat_selesai){
 	$query = "SELECT * FROM agenda WHERE tgl_surat BETWEEN '$tgl_surat_mulai' AND '$tgl_surat_selesai'";
	return result($query);
 }

 function cari_sm_tgl($tgl_surat_mulai, $tgl_surat_selesai){
 	$query = "SELECT * FROM surat_masuk WHERE tgl_terima BETWEEN '$tgl_surat_mulai' AND '$tgl_surat_selesai'";
	return result($query);
 }

  function cari_sk_tgl($tgl_surat_mulai, $tgl_surat_selesai){
 	$query = "SELECT * FROM surat_keluar WHERE tgl_surat BETWEEN '$tgl_surat_mulai' AND '$tgl_surat_selesai'";
	return result($query);
 }

 function hasil_cari_surat_keluar($cari){
 	$query = "SELECT * FROM surat_keluar WHERE jenis_surat LIKE '%$cari%' OR tujuan LIKE '%$cari%' OR isi_surat LIKE '%$cari%'";
	return result($query);

 }

  function hasil_cari_surat_masuk($cari){
 	$query = "SELECT * FROM surat_masuk WHERE disposisi LIKE '%$cari%' OR asal_surat LIKE '%$cari%' OR isi_surat LIKE '%$cari%' OR jenis_surat LIKE '%$cari%'";
	return result($query);
 }


function edit_data_agenda($nomor, $tgl_surat, $asal_surat, $tgl_terima, $perihal, $giat, $tgl_giat, $tempat, $pakaian, $id){
	$query = "UPDATE agenda SET 
		nomor='$nomor', 
		tgl_surat='$tgl_surat', 
		asal_surat='$asal_surat', 
		tgl_terima='$tgl_terima', 
		perihal='$perihal', 
		giat='$giat', 
		tgl_giat='$tgl_giat', 
		tempat='$tempat', 
		pakaian='$pakaian' WHERE
		id=$id";
	return run($query);
}	


function edit_surat_masuk($no_surat, $tgl_surat, $asal_surat, $tgl_terima, $isi_surat, $jenis_surat, $no_agenda, $disposisi, $tgl_ekspedisi, $id){
	$query = "UPDATE surat_masuk SET 
		
		no_surat='$no_surat', 
		tgl_surat='$tgl_surat', 
		asal_surat='$asal_surat', 
		tgl_terima='$tgl_terima', 
		isi_surat='$isi_surat', 
		jenis_surat='$jenis_surat', 
		no_agenda='$no_agenda', 
		disposisi='$disposisi', 
		tgl_ekspedisi='$tgl_ekspedisi' WHERE
		id=$id";
	return run($query);
}


function edit_surat_keluar($no_surat, $tgl_surat, $tujuan, $isi_surat, $jenis_surat, $no_agenda, $keterangan, $id){
	$query = "UPDATE surat_keluar SET 
		no_surat='$no_surat', 
		tgl_surat='$tgl_surat', 
		tujuan='$tujuan', 
		isi_surat='$isi_surat', 
		jenis_surat='$jenis_surat', 
		no_agenda='$no_agenda', 
		keterangan='$keterangan' WHERE
		id=$id";
	return run($query);
}


function edit_data_user($username, $password, $nama, $status, $nipnrp, $pangkat, $jabatan, $id){
	$query = "UPDATE users SET 
		username='$username', 
		password='$password', 
		nama='$nama', 
		status='$status', 
		nipnrp='$nipnrp', 
		pangkat='$pangkat', 
		jabatan='$jabatan' WHERE
		id=$id";
	return run($query);
}

function upload_agenda() {
  $namaFile = @$_FILE ['file_agenda']['name'];
  $ukuranFile = @$_FILE ['file_agenda']['size'];
  $error = @$_FILE ['file_agenda']['error'];
  $tmpName = @$_FILE['file_agenda']['tmp_name'];
  //cek apakah tidak ada gambar yang diupload
  //if($error === 4){
    //echo "<script> 
      //    alert('pilih gambar terlebih dahulu');
      //</script>";
  //return false;
 // }

  $ekstensiFileValid = ['jpg', 'jpeg', 'png', 'pdf'];
  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));
    if(in_array($ekstensiFile, $ekstensiFileValid)){
      echo "
      <script>
          alert('Format file tidak sesuai, silahkan upload file dalam bentuk jpg/pdf'); 
       </script>
      ";
      return false;
    }

    //cek jika ukurannya terlalu besar 
    if($ukuranFile > 3000000){
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
    move_uploaded_file($tmpName, 'ArsipRenmin/file_upload/file_agenda' . $namaFileBaru);
    return $namaFileBaru;
  }

function upload_surat_masuk() {
  $namaFile = @$_FILE ['file_surat_masuk']['name'];
  $ukuranFile = @$_FILE ['file_surat_masuk']['size'];
  $error = @$_FILE ['file_surat_masuk']['error'];
  $tmpName = @$_FILE['file_surat_masuk']['tmp_name'];

  //cek apakah tidak ada gambar yang diupload
  //if($error === 4){
    //echo "<script> 
      //    alert('pilih gambar terlebih dahulu');
      //</script>";
  //return false;
 // }

  $ekstensiFileValid = ['jpg', 'jpeg', 'png', 'pdf'];
  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));
    if(in_array($ekstensiFile, $ekstensiFileValid)){
      echo "
      <script>
          alert('Format file tidak sesuai, silahkan upload file dalam bentuk jpg/pdf'); 
       </script>
      ";
      return false;
    }

    //cek jika ukurannya terlalu besar 
    if($ukuranFile > 3000000){
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
    move_uploaded_file($tmpName, 'ArsipRenmin/file_upload/file_surat_masuk' . $namaFileBaru);
    return $namaFileBaru;
  }


function upload_surat_keluar() {
  $namaFile = @$_FILE ['file_surat_keluar']['name'];
  $ukuranFile = @$_FILE ['file_surat_keluar']['size'];
  $error = @$_FILE ['file_surat_keluar']['error'];
  $tmpName = @$_FILE['file_surat_keluar']['tmp_name'];

  //cek apakah tidak ada gambar yang diupload
  //if($error === 4){
    //echo "<script> 
      //    alert('pilih gambar terlebih dahulu');
      //</script>";
  //return false;
 // }

  $ekstensiFileValid = ['jpg', 'jpeg', 'png', 'pdf', 'JPG', 'JPEG', 'PDF', 'doc'];
  $ekstensiFile = pathinfo('$namaFile', PATHINFO_EXTENSION);
    if(!in_array($ekstensiFile, $ekstensiFileValid)){
      echo "
      <script>
          alert('Format file tidak sesuai, silahkan upload file dalam bentuk jpg/pdf'); 
       </script>
      ";
      return false;
    }

    //cek jika ukurannya terlalu besar 
    if($ukuranFile > 3000000){
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

    move_uploaded_file($tmpName, '../file_upload/file_surat_keluar/' . $namaFileBaru);
    return $namaFileBaru;
  }


?>