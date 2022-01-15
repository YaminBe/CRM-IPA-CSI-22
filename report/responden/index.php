<?php 
include '../../env.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Print -<?= time() ?> </title>
    <link rel="stylesheet" href="../../public/assets/preview/960.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../../public/assets/preview/screen.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../public/assets/preview/print-preview.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../../public/assets/preview/print.css" type="text/css" media="print" />
          <link rel="shortcut icon" href="../../public/assets/img/logo/logo.webp" />
        <script src="../../public/assets/preview/jquery.tools.min.js"></script>
    <script src="../../public/assets/preview/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">@media print{footer{page-break-after:always}}</style>

        <link href="../../public/assets/preview/surat.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
      $(function()
      {
        $("#feature > div").scrollable({interval: 2000}).autoscroll();

        $('#aside').prepend('<a class="print-preview">Cetak </a>');
        $('a.print-preview').printPreview();

        //$(document).bind('keydown', function(e) {
        var code = 80;
        //if (code == 80 && !$('#print-modal').length) {
        $.printPreview.loadPrintPreview();
        //return false;
        //}
        //});
      });
    </script>
  </head>
  <body>
  	
 <table width="100%" cellpadding="3" cellspacing="0" border="1" style="border-collapse: collapse;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Responden</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Pendidikan</th>
                    <th scope="col">Pekerjaan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                  $listResponden = mysqli_query($con,"SELECT customer.nama,customer.jk,tm_education.education_level,tm_job.job_name
                  	FROM skors
                   JOIN customer ON skors.user_id=customer.id
                   JOIN tm_education ON customer.education_id=tm_education.id
                   JOIN tm_job ON customer.job_id=tm_job.id
                    GROUP BY skors.user_id ORDER BY skors.id ASC ");
                  $jmlResponden = mysqli_num_rows($listResponden);
                  foreach ($listResponden as $a) {
                  ?>
                  <tr>
                  <th scope="row"> <?= $i++ ?>. </th>
                  <td><?= $a['nama'] ?></td>
                  <td align="center"><?= $a['jk'] ?></td>
                  <td><?= $a['education_level'] ?></td>
                  <td><?= $a['job_name'] ?></td>
                  </tr>
                  <?php
                  }

                  ?>

                </tbody>
              </table>
              <footer></footer>

			<h5 class="card-title">Jumlah Responden Menurut Jenis Kelamin</h5>
		 <table width="100%" border="1" style="border-collapse: collapse;">
			<thead>
			<tr>
			<th scope="col">Jenis Kelamin</th>
			<th scope="col">Jumlah (Responden)</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$listResponden = mysqli_query($con,"SELECT customer.nama,customer.jk FROM skors JOIN customer ON skors.user_id=customer.id GROUP BY customer.jk ORDER BY skors.id ASC ");
			foreach ($listResponden as $jk) {
				$jg = mysqli_num_rows(mysqli_query($con,"SELECT * FROM skors JOIN customer ON skors.user_id=customer.id WHERE customer.jk='$jk[jk]'  GROUP BY user_id"));
			    ?>
			<tr>
			<td><?= $jk['jk'] ?> <?php if ( $jk['jk']=='P') { echo '( Perempuan )';}else{ echo '( Laki-laki )'; } ?> </td>
			<td align="center"><?= $jg ?></td>
			</tr>
			    <?php
			}
			?>
			<tr>
			<td>Total</td>
			<td align="center"><?= $jmlResponden ?></td>
			</tr>


			</tbody>
			</table>

			<h5 class="card-title">Jumlah Responden Menurut Tingkat Pendidikan</h5>
		 <table width="100%" border="1" style="border-collapse: collapse;">
					<thead>
					<tr>
					<th scope="col">Pendidikan</th>
					<th scope="col">Jumlah (Responden)</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$listRespondenPendidikan = mysqli_query($con,"SELECT tm_education.id,tm_education.education_level FROM skors
					JOIN customer ON skors.user_id=customer.id
					JOIN tm_education ON customer.job_id=tm_education.id
					GROUP BY tm_education.id ORDER BY skors.id ASC ");
					foreach ($listRespondenPendidikan as $p) {
					$je = mysqli_num_rows(mysqli_query($con,"SELECT * FROM skors JOIN customer ON skors.user_id=customer.id WHERE customer.education_id='$p[id]'  GROUP BY user_id"));
					?>
					<tr>
					<td> <?= $p['education_level'] ?> </td>
					<td align="center"> <?= $je ?> </td>
					</tr>
					<?php
					}

					?>
					<tr>
					<td>Total</td>
					<td align="center"><?= $jmlResponden ?></td>
					</tr>
					</tbody>
					</table>

			<h5 class="card-title">Jumlah Responden Menurut Pekerjaan</h5>
			 <table width="100%" border="1" style="border-collapse: collapse;">
					<thead>
					<tr>
					<th scope="col">Pekerjaan</th>
					<th scope="col">Jumlah (Responden)</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$listRespondenPekerjaan = mysqli_query($con,"SELECT tm_job.id,tm_job.job_name
					FROM skors
					JOIN customer ON skors.user_id=customer.id
					JOIN tm_job ON customer.job_id=tm_job.id
					GROUP BY tm_job.id ORDER BY skors.id ASC ");
					foreach ($listRespondenPekerjaan as $j) {
					$jj = mysqli_num_rows(mysqli_query($con,"SELECT * FROM skors JOIN customer ON skors.user_id=customer.id WHERE customer.job_id='$j[id]'  GROUP BY user_id"));
					?>
					<tr>
					<td> <?= $j['job_name'] ?> </td>
					<td align="center"> <?= $jj ?> </td>
					</tr>
					<?php
					}

					
					?>
					<tr>
					<td>Total</td>
					<td align="center"><?= $jmlResponden ?></td>
					</tr>
					</tbody>
					</table>


 </body>
 </html>





