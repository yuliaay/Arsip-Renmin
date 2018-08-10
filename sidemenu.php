<?php
 
require_once "core/init.php";
if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}
?>

<style type="text/css">
  
  #sdmn {
    position: absoute;
  }

  #side-menu {
  background-color: #2f4050;
  padding:0px;

  height: 100%;
}
</style>
  
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
          <h1 class="hidden-xs hidden-sm">Navigation</h1>
          <ul>
            <li class="link active">
              <a href="index.php">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Dasboard</span>
              </a>
            </li>

            <?php if($_SESSION['status'] == 0): ?>

	            <li class="link">
	              <a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
	                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
	                <span class="hidden-sm hidden-xs">Data Master</span>
	                <span class="label label-success pull-right hidden-sm hidden-xs"></span>
	              </a>
	              <ul class="collapse collapseable" id="collapse-post">
	                <li><a href="lihatDataUser.php">Data user</a></li>
	                <li><a href="articles.php"> Lihat Data</a></li>
	              </ul>
	            </li>

            <?php endif; ?>

              <?php if($_SESSION['status'] == 0 || $_SESSION['status'] == 1 || $_SESSION['status'] == 3 || $_SESSION['status'] == 2): ?>

	            <li class="link">
	              <a href="#collapse-tatanaskah" data-toggle="collapse" aria-controls="collapse-comments">
	                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
	                <span class="hidden-sm hidden-xs">Tata Naskah Dinas</span>
	                <span class="label label-success pull-right hidden-sm hidden-xs"></span>
	              </a>
	              <ul class="collapse collapseable" id="collapse-tatanaskah">
	                <li><a href="inputSuratMasuk.php">Surat
	                <span class="label label-success pull-right hidden-sm hidden-xs"></span>
	                </a>
	                </li>
	                <li><a href="lihatSuratMasuk.php">Nota Dinas
	                <span class="label label-warning pull-right hidden-sm hidden-xs"></span>
	                </a>
	                </li>
	                <li><a href="lihatSuratMasuk.php">Surat Telegram
	                <span class="label label-warning pull-right hidden-sm hidden-xs"></span>
	                </a>
	                </li>
	                <li><a href="lihatSuratMasuk.php">Surat Perintah
	                <span class="label label-warning pull-right hidden-sm hidden-xs"></span>
	                </a>
	                </li>
	              </ul>
	            </li>

	            <?php endif; ?>

            <?php if($_SESSION['status'] == 0 || $_SESSION['status'] == 1 || $_SESSION['status'] == 3): ?>

 				<li class="link">
	              <a href="#collapse-arsip" data-toggle="collapse" aria-controls="collapse-comments">
	                <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
	                <span class="hidden-sm hidden-xs">Arsip Surat</span>
	                <span class="label label-success pull-right hidden-sm hidden-xs"></span>
	              </a>
	              <ul class="collapse collapseable" id="collapse-arsip">
	                <li><a href="lihatSuratMasuk.php">Surat Masuk
	                <span class="label label-success pull-right hidden-sm hidden-xs"></span>
	                </a>
	                </li>
	                <li><a href="lihatSuratKeluar.php">Surat Keluar
	                <span class="label label-warning pull-right hidden-sm hidden-xs"></span>
	                </a>
	                </li>
	                <li><a href="lihatAgenda.php">Agenda
	                <span class="label label-warning pull-right hidden-sm hidden-xs"></span>
	                </a>
	                </li>
	              </ul>
	            </li>


        	<?php endif; ?>
            

            <?php if($_SESSION['status'] == 0 || $_SESSION['status'] == 2 || $_SESSION['status'] == 4 || $_SESSION['status'] == 1): ?>

            	<li class="link">
	              <a href="lihatDataDisposisi.php">
	                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
	                <span class="hidden-sm hidden-xs">Disposisi</span>
	                <span class="label label-success pull-right hidden-sm hidden-xs"></span>
	              </a>
	           <!--   <ul class="collapse collapseable" id="collapse-disposisi">
	              	<?php if($_SESSION['status'] == 0 || $_SESSION['status'] == 2 || $_SESSION['status'] == 4 || $_SESSION['status'] == 1): ?>
	                <li><a href="lihatDataDisposisi.php"> Disposisi Pimpinan </a></li>
	                <?php endif; ?>
	                <?php if($_SESSION['status'] == 0 || $_SESSION['status'] == 3 || $_SESSION['status'] == 1 || $_SESSION['status'] == 2): ?>
	                <li><a href="lihatdisposisi_staff.php"> Disposisi Staff </a></li>
	                <?php endif; ?>
	              </ul> -->
	            </li>

	        <?php endif; ?>


	        <?php if($_SESSION['status'] == 2
		        	|| $_SESSION['status'] == 4): ?>

            <li class="link">
              <a href="#collapse-laporan" data-toggle="collapse" aria-controls="collapse-laporan">
                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Laporan</span>
                <span class="label label-success pull-right hidden-sm hidden-xs"></span>
                <ul class="collapse collapseable" id="collapse-laporan">
                <li><a href="lihatSuratMasuk.php">Surat Masuk
                <span class="label label-success pull-right hidden-sm hidden-xs"></span>
                </a>
                </li>
                <li><a href="lihatSuratKeluar.php">Surat Keluar
                <span class="label label-warning pull-right hidden-sm hidden-xs"></span>
                </a>
                </li>
                <li><a href="lihatAgenda.php">Agenda
                <span class="label label-warning pull-right hidden-sm hidden-xs"></span>
                </a>
                </li>
              </ul>
              </a>
            </li> 
          
           <?php endif;  ?>

            <li class="link settings-btn">
	         <a href="setting.php">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Setting</span>
              </a>
            </li>
          </ul>
        </div>

   