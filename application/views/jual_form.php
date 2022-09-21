<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<script src="<?php echo base_url() ?>/jquery.min.js"></script>
</head>
<body>

	<script type="text/javascript">
	var jumlah_baris = 0;
	</script>

<div id="container">
	<h1>Tambah Data Penjualan</h1>

	<div id="body">
		<!-- <p>The page you are looking at is being generated dynamically by CodeIgniter.</p> -->

		<!-- <p>If you would like to edit this page you'll find it located at:</p> -->
		<!-- <code>application/views/welcome_message.php</code> -->

		<!-- <p>The corresponding controller for this page is found at:</p> -->
		<!-- <code>application/controllers/Welcome.php</code> -->

		<!-- <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="userguide3/">User Guide</a>.</p> -->

		<form class="" action="<?= site_url('jual/create_action') ?>" method="post">

		<table>
			<tbody>
				<tr>
					<td>No. Nota</td>
					<td>:</td>
					<td> <input type="text" name="nomor_nota" value="<?= $nomor_nota ?>"> </td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td> <input type="text" name="tanggal" value="<?= $tanggal ?>"> </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Barang</td>
					<td>:</td>
					<td>
						<table border="1">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Sub Total</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody id="tabel_barang">
								<tr id="tr_0">
									<td>
										<select class="" name="id_barang[]">
											<option value="">-</option>
											<?php foreach($barang as $row_barang) { ?>
												<option value="<?= $row_barang->id_barang ?>"><?= $row_barang->nama ?></option>
											<?php } ?>
										</select>
									</td>
									<td> <input id="jumlah_0" type="text" name="jumlah[]" value="0" onblur="calculate(0)" onkeyup="calculate(0)"> </td>
									<td> <input id="harga_0" type="text" name="harga[]" value="0" onblur="calculate(0)" onkeyup="calculate(0)"> </td>
									<td> <input class="sub_total" id="sub_total_0" type="text" name="sub_total[]" value="0" readonly> </td>
									<td>&nbsp;</td>
								</tr>
								<script type="text/javascript">
								++jumlah_baris;
								</script>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td> <button type="button" name="button" onclick="tambah_barang()">Tambah Barang</button> </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Total</td>
					<td>:</td>
					<td> <input id="total" type="text" name="total" value="<?= $total ?>" readonly> </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<button type="submit" name="button">Simpan Data</button>
						<button type="button" name="button" onclick="javascript: window.location.href='<?= site_url('jual') ?>'">Batal</button>
					</td>
				</tr>
			</tbody>
		</table>

		</form>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<script type="text/javascript">

function calculate(nomor_baris = 0)
{
	var jumlah = document.getElementById('jumlah_'+nomor_baris);
    var harga = document.getElementById('harga_'+nomor_baris);
    var sub_total = document.getElementById('sub_total_'+nomor_baris);
    var total = document.getElementById('total');

    sub_total.value = parseFloat(jumlah.value) * parseFloat(harga.value);

    var grand_total = 0;
    $('.sub_total').each(function() {
        grand_total += parseFloat($(this).val());
    });
    total.value = grand_total;
}

function tambah_barang() {
	$('#tabel_barang').append(
		`
		<tr id="tr_`+jumlah_baris+`">
			<td>
				<select class="" name="id_barang[]">
					<option value="">-</option>
					<?php foreach($barang as $row_barang) { ?>
						<option value="<?= $row_barang->id_barang ?>"><?= $row_barang->nama ?></option>
					<?php } ?>
				</select>
			</td>
			<td> <input id="jumlah_`+jumlah_baris+`" type="text" name="jumlah[]" value="0" onblur="calculate(`+jumlah_baris+`)" onkeyup="calculate(`+jumlah_baris+`)"> </td>
			<td> <input id="harga_`+jumlah_baris+`" type="text" name="harga[]" value="0" onblur="calculate(`+jumlah_baris+`)" onkeyup="calculate(`+jumlah_baris+`)"> </td>
			<td> <input class="sub_total" id="sub_total_`+jumlah_baris+`" type="text" name="sub_total[]" value="0" readonly> </td>
			<td> <button type="button" name="button" onclick="hapus_barang(`+jumlah_baris+`)">Hapus Barang</button> </td>
		</tr>
		`
	);
	++jumlah_baris;
}

function hapus_barang(nomor_baris) {
	$('#tr_' + nomor_baris).remove();
    calculate();
}

</script>

</body>
</html>
