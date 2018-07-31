<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Direktori Disnaker Jatim';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<div class="container-fluid">

	<div class="row no-gutter">
		<div class="col-xs-12 col-sm-6">
			<div class="block-title">
				<h3>DETAIL LOWONGAN</h3>
			</div>
				
			<div class="block-content" >
				<table class="table table-striped">
					<tbody>
						<tr>
							<td>NO SIP</td>
							<td>:</td>
							<td><?= $model['no_sip']; ?></td>
						</tr>
						<tr>
							<td>JABATAN</td>
							<td>:</td>
							<td><?= $model['jabatan']; ?></td>
						</tr>
						<tr>
							<td>FORMAL / NON FORMAL</td>
							<td>:</td>
							<td><?= ($model['sts_formal']==1?"FORMAL":"NON-FORMAL"); ?></td>
						</tr>
						<tr>
							<td>NEGARA TUJUAN</td>
							<td>:</td>
							<td><?= $model['negara']; ?></td>
						</tr>
						<tr>
							<td>AGENCY</td>
							<td>:</td>
							<td><?= $model['agency']; ?></td>
						</tr>
						<tr>
							<td>JUMLAH L</td>
							<td>:</td>
							<td><?= $model['jumlah_l']; ?></td>
						</tr>
						<tr>
							<td>JUMLAH P</td>
							<td>:</td>
							<td><?= $model['jumlah_p']; ?></td>
						</tr>
						<tr>
							<td>JUMLAH L/P</td>
							<td>:</td>
							<td><?= $model['jumlah_lp']; ?></td>
						</tr>
						<tr>
							<td>BERLAKU HINGGA</td>
							<td>:</td>
							<td><?= $model['tgl_ijin_akhir']; ?></td>
						</tr>
						<tr>
							<td colspan=3><?= $model['ket']; ?></td>
						</tr>
					</tbody>
				</table>

			</div>
			<a href="<?php echo Url::to(['pencaker/create-from-loker','loker_id'=>$model['id']]); ?>" class="btn btn-primary btn-block btn-lg" role="button">LAMAR LOWONGAN</a>
		</div>
<div class="col-xs-12 col-sm-6">
			<div class="block-title">
				<h3>DATA PJTKI</h3>
			</div>
				
			<div class="block-content" >
				<table class="table table-striped">
					<tbody>
						<tr>
							<td>NAMA PERUSAHAAN</td>
							<td>:</td>
							<td><?= $model['perusahaan']; ?></td>
						</tr>
						<tr>
							<td>ALAMAT</td>
							<td>:</td>
							<td><?= $model['alamat']; ?></td>
						</tr>
						<tr>
							<td>KONTAK</td>
							<td>:</td>
							<td><?= $model['contact_nama']." (".$model['contact_telp'].")"; ?></td>
						</tr>
						<tr>
							<td>EMAIL</td>
							<td>:</td>
							<td><?= $model['email']; ?></td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

</div>
