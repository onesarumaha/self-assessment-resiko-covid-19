
<title><?php echo $title; ?></title>
  <center><div>
    <h1><?php echo $title; ?></h1>
    <label><i></i></label>
    <label>PT. Uni Net Media Sakti</label><br>
    <label><?php echo date('l, d M Y'); ?></label>
  </div></center>
  <hr>

<center>
<table border="1" cellspacing="0">
  <thead>
    <tr>
  	<th>No</th>
		<th style="width: 200px" class="text-center">Tanggal / Waktu</th>
		<th style="width: 200px" class="text-center">Nama Karyawan</th>
		<th style="width: 200px" class="text-center">Jabatan</th>
		<th style="width: 50px" class="text-center">Poin</th>
		<th class="text-center">Status</th>
    </tr>
  </thead>

  <tbody>
    <?php 
    $no = 1;
    foreach($laporan as $row) : ?>
    <tr>
      	<td style="text-align: center;"><?php echo $no++; ?></td>
      	<td style="text-align: center;"><?= date(" d M Y", strtotime( $row['tgl']))?></td> 
      	<td style="text-align: center;"><?=  $row['nama_lengkap']; ?></td>
		<td style="text-align: center;"><?=  $row['jabatan']; ?></td>
		<td style="text-align: center;"><?=  $row['poin']; ?></td>
		<td style="text-align: center;"><?=  $row['isi_status']; ?></td>

    </tr>
    <?php endforeach; ?>
    
      </tbody>

    <div class="container">
      <br>

    </div>
    </table>
  </center>

    <script type="text/javascript">
      window.print();
    </script>

