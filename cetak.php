<?php
    require 'fungsi.php';

    if(isset($_GET['kodef'])){
        $kodef = $_GET['kodef'];

        $ambilnamapelanggan = mysqli_query($conn,"select * from faktur f, pelanggan pl where f.id_pelanggan = pl.id_pelanggan and f.kode_faktur = '$kodef'");
        $namapel = mysqli_fetch_array($ambilnamapelanggan);
        $namapelanggan = $namapel['nama_pelanggan'];
    }else{
        header('location: transaksi.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/x-icon" href="assets/logoluciabakery.ico" />
	<title>Cetak</title>
</head>
<body>

	<?php
		$faktur = mysqli_query($conn,"select * from faktur f, pegawai p where f.nip = p.nip and kode_faktur='$kodef' ");
		$get = mysqli_fetch_array($faktur);
			$kode_faktur = $get['kode_faktur'];
		    $tanggal = $get['tanggal'];
            $nama_pegawai = $get['nama_pegawai'];
            $total = $get['total'];
            $jumlah_bayar = $get['jumlah_bayar'];
            $id_tipe_pembayaran = $get['id_tipe_pembayaran'];
            $kembalian = $get['kembalian'];

    ?>

	<div style="width: 500px; margin: auto;">
		<br>
		<center>
			<img class="masthead-avatar" src="assets/img/luciabakery.png" width="100px"/><br>
			<?php echo "Lucia Bakery" ?><br>
			<?php echo "Jl. Makanenak No. 007 Osaka, Jepang" ?><br>
			<?php echo "088888282737" ?><br><br>
			<table width="100%">
				<tr>
					<td><?php echo $kode_faktur ?></td>
					<td align="right"><?php echo $tanggal ?></td>
				</tr>
			</table>
			<hr>
			<table width="100%">
				<tr>
					<td width="50%"></td>
					<td width="3%"></td>
					<td width="10%" align="right"></td>
					<td align="right" width="17%"><?php echo $nama_pegawai ?></td>
				</tr>
				<?php
					$get = mysqli_query($conn,"select * from transaksi t, jajan j where t.kode_jajan = j.kode_jajan and kode_faktur='$kodef'");
                    while($tr=mysqli_fetch_array($get)){
					$nama_jajan = $tr['nama_jajan'];
                    $harga_jajan = $tr['harga_jajan'];
                    $kuantitas = $tr['kuantitas'];
                    $subtotal = $tr['sub_total'];
				?>
					<tr>
						<td><?php echo $nama_jajan ?></td>
						<td></td>
						<td align="right"><?php echo $kuantitas ?></td>
						<td align="right"><?php echo "Rp.". number_format($harga_jajan) ?></td>
					</tr>
				<?php
					} 
				?>
			</table>
			<hr>
			<table width="100%">
				<tr>
					<td width="76%" align="right">
						Total Harga
					</td>
					<td width="23%" align="right">
						<?php echo "Rp.". number_format($total) ?>
					</td>
				</tr>
			</table>
			<hr>
			<table width="100%">
				<tr>
					<td width="76%" align="right">
						Total
					</td>
					<td width="23%" align="right">
						<?php echo "Rp.". number_format($total) ?>
					</td>
				</tr>
				<tr>
					<td width="76%" align="right">
						Bayar
					</td>
					<td width="23%" align="right">
						<?php echo "Rp.". number_format($jumlah_bayar) ?>
					</td>
				</tr>
				<tr>
					<td width="76%" align="right">
						Kembalian
					</td>
					<td width="23%" align="right">
						<?php echo "Rp.". number_format($kembalian) ?>
					</td>
				</tr>
			</table>
			<br>
			Terima Kasih<br>
			<?php echo "Lucia Bakery" ?>
		</center>
	</div>
	<script>
		window.print()
	</script>
</body>
</html>