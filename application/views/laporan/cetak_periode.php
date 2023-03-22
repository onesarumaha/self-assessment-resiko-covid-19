<?php
    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];
    $dt3 = $_POST["status"];
?>

<?php
$koneksi = new mysqli("localhost","root","","skripsi6");
  $sql = $koneksi->query("SELECT * FROM form_pertanyaan WHERE '$dt3' AND tgl BETWEEN '$dt1' AND '$dt2' AND  ");
  
  // $koneksi = new mysqli("localhost","root","","skripsi6");
  // $sql = $koneksi->query("SELECT * FROM form_pertanyaan WHERE tgl BETWEEN '$dt1' AND '$dt2' ");
 

?>


   <title>Laporan Periode</title>
<body>
<center>
<h1>Laporan Periode</h1>
<label>PT. Uni Net Media Sakti</label> <br>
<label> Periode : <?php $a=$dt1; echo date("d-M-Y", strtotime($a))?> s/d <?php $b=$dt2; echo date("d-M-Y", strtotime($b))?> </label>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
          <th>No</th>
          <th style="width: 200px" class="text-center">Tanggal / Waktu</th>
          <th style="width: 200px" class="text-center">Nama Karyawan</th>
          <th style="width: 200px" class="text-center">Jabatan</th>
          <th style="width: 200px" class="text-center">Poin</th>
          <th style="width: 170px" class="text-center">Status</th>
      </tr>
    </thead>
    <tbody>
        <?php

        if(isset($_POST["periode"])){
           
            $sql_tampil = "SELECT * FROM form_pertanyaan
            JOIN status ON status.id_status = form_pertanyaan.id_status
            JOIN users ON users.id_user = form_pertanyaan.id_user
            WHERE tgl BETWEEN '$dt1' AND '$dt2' AND isi_status='$dt3' 
            ORDER BY tgl ASC";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td style="text-align: center;"><?php echo $no; ?></td>
            <td style="text-align: center;"><?= date("d M Y", strtotime( $data['tgl']))?></td>
            <td style="text-align: center;"><?= $data['nama_lengkap']; ?></td>
            <td style="text-align: center;"><?= $data['jabatan']; ?></td>
            <td style="text-align: center;"><?= $data['poin']; ?></td>
            <td style="text-align: center;"><?= $data['isi_status']; ?></td>
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>

  </table>
</center>

 <script type="text/javascript">
      window.print();
    </script>