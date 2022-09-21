<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
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

<!-- <div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="userguide3/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div> -->

<script type="text/javascript">
var jmlBaris = 0;
</script>

<div id="container">
	<h1>Input Data Penjualan</h1>

	<div id="body">
		<!-- <p>The page you are looking at is being generated dynamically by CodeIgniter.</p> -->

		<!-- <p>If you would like to edit this page you'll find it located at:</p> -->
		<!-- <code>application/views/welcome_message.php</code> -->

		<!-- <p>The corresponding controller for this page is found at:</p> -->
		<!-- <code>application/controllers/Welcome.php</code> -->

		<!-- <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="userguide3/">User Guide</a>.</p> -->
		<form class="" action="<?= site_url('penjualan/create_action') ?>" method="post">
		<table>
			<tbody>
				<tr>
					<td>No. Nota</td>
					<td>:</td>
					<td> <input type="text" name="no_nota" value="<?= $no_nota ?>"> </td>
				</tr>
				<tr>
					<td>Tgl.</td>
					<td>:</td>
					<td> <input type="text" name="tgl" value="<?= $tgl ?>"> </td>
				</tr>
				<tr>
					<td>Daftar Barang</td>
					<td>:</td>
					<td>
						<table border="1">
							<thead>
								<tr>
									<th>Nama Barang</th>
									<th>Qty.</th>
									<th>Harga</th>
									<th>Sub Total</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody id="tableBarang">
								<?php if ($this->uri->segment(2) == 'create') { ?>
									<?php
									/**
									 * proses tambah penjualan
									 */
									?>
									<tr id="tr0">
										<td>
											<select class="" name="barang_id[]">
												<option value="">-</option>
												<?php foreach($dataBarang as $row) { ?>
												<option value="<?= $row->id ?>"><?= $row->nama ?></option>
												<?php } ?>
											</select>
										</td>
										<td> <input id="qty0" type="text" name="qty[]" value="0" onblur="calculate(0)" onkeyup="calculate(0)"> </td>
										<td> <input id="harga0" type="text" name="harga[]" value="0" onblur="calculate(0)" onkeyup="calculate(0)"> </td>
										<td> <input class="sub_total" id="sub_total0" type="text" name="sub_total[]" value="0" readonly> </td>
										<td>&nbsp;</td>
									</tr>
									<script type="text/javascript">
									++jmlBaris;
									</script>
								<?php } else { ?>
									<?php
									/**
									 * proses update penjualan
									 */
									?>
									<?php $jmlBaris = 0 ?>
									<?php foreach($dataDetail as $rowDetail) { ?>
										<tr id="tr<?= $jmlBaris ?>">
											<td>
												<select class="" name="barang_id[]">
													<option value="">-</option>
													<?php foreach($dataBarang as $rowBarang) { ?>
													<option value="<?= $rowBarang->id ?>" <?= $rowBarang->id == $rowDetail->barang_id ? 'selected' : '' ?>><?= $rowBarang->nama ?></option>
													<?php } ?>
												</select>
											</td>
											<td> <input id="qty<?= $jmlBaris ?>" type="text" name="qty[]" value="<?= $rowDetail->qty ?>" onblur="calculate(<?= $jmlBaris ?>)" onkeyup="calculate(<?= $jmlBaris ?>)"> </td>
											<td> <input id="harga<?= $jmlBaris ?>" type="text" name="harga[]" value="<?= $rowDetail->harga ?>" onblur="calculate(<?= $jmlBaris ?>)" onkeyup="calculate(<?= $jmlBaris ?>)"> </td>
											<td> <input class="sub_total" id="sub_total<?= $jmlBaris ?>" type="text" name="sub_total[]" value="<?= $rowDetail->sub_total ?>" readonly> </td>
											<?php if ($jmlBaris == 0) { ?>
												<td>&nbsp;</td>
											<?php } else { ?>
												<td> <button type="button" name="button" onclick="hapus_barang(<?= $jmlBaris ?>)">Hapus Barang</button> </td>
											<?php } ?>
										</tr>
										<?php ++$jmlBaris ?>
										<script type="text/javascript">
										++jmlBaris;
										</script>
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><button type="button" name="button" onclick="tambah_barang()">Tambah Barang</button></td>
				</tr>
				<tr>
					<td>Total</td>
					<td>:</td>
					<td> <input id="total" type="text" name="total" value="<?= $total ?>" readonly> </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<button type="submit" name="button">Simpan</button>
						<button type="button" name="button" onclick="javascript: window.location.href='<?= site_url('penjualan') ?>'">Batal</button>
					</td>
				</tr>
			</tbody>
		</table>
		</form>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<script type="text/javascript">

function tambah_barang() {
	$('#tableBarang').append(
		`
		<tr id="tr`+jmlBaris+`">
			<td>
				<select class="" name="barang_id[]">
					<option value="">-</option>
					<?php foreach($dataBarang as $row) { ?>
					<option value="<?= $row->id ?>"><?= $row->nama ?></option>
					<?php } ?>
				</select>
			</td>
			<td> <input id="qty`+jmlBaris+`" type="text" name="qty[]" value="0" onblur="calculate(`+jmlBaris+`)" onkeyup="calculate(`+jmlBaris+`)"> </td>
			<td> <input id="harga`+jmlBaris+`" type="text" name="harga[]" value="0" onblur="calculate(`+jmlBaris+`)" onkeyup="calculate(`+jmlBaris+`)"> </td>
			<td> <input class="sub_total" id="sub_total`+jmlBaris+`" type="text" name="sub_total[]" value="0" readonly> </td>
			<td> <button type="button" name="button" onclick="hapus_barang(`+jmlBaris+`)">Hapus Barang</button> </td>
		</tr>
		`
	);
	++jmlBaris;
}

function hapus_barang(noBaris) {
	$('#tr' + noBaris).remove();
    // --jmlBaris;
    calculate();
}

function calculate(noBaris = 0) {
	var qty = document.getElementById('qty'+noBaris);
    var harga = document.getElementById('harga'+noBaris);
    var sub_total = document.getElementById('sub_total'+noBaris);
    var total = document.getElementById('total');

    sub_total.value = parseFloat(qty.value) * parseFloat(harga.value);

    var m_total = 0;
    $('.sub_total').each(function() {
        m_total += parseFloat($(this).val());
    });
    total.value = m_total;
}

</script>

</body>
</html>
