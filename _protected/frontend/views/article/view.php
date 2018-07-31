<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	h3 {font-size:1rem; font-weight:bold}
</style>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?>

    <div class="pull-right">

    <?php if (Yii::$app->user->can('adminArticle')): ?>

        <?= Html::a(Yii::t('app', 'Back'), ['admin'], ['class' => 'btn btn-warning']) ?>

    <?php endif ?>

    <?php if (Yii::$app->user->can('updateArticle', ['model' => $model])): ?>

        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    <?php endif ?>

    <?php if (Yii::$app->user->can('deleteArticle')): ?>

        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this article?'),
                'method' => 'post',
            ],
        ]) ?>

    <?php endif ?>
    
    </div>

    </h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            // [
            //     'label' => Yii::t('app', 'Author'),
            //     'value' => $model->authorName,
            // ],
            'title',
            'summary:ntext',
            'content:html',
            // [
            //     'label' => Yii::t('app', 'Status'),
            //     'value' => $model->statusName,
            // ],
            [
                'label' => Yii::t('app', 'Category'),
                'value' => $model->categoryName,
            ],
            'created_at:dateTime',
            //'updated_at:dateTime',
        ],
    ]) ?>

</div>
<div class="col-12">
 <div class="card mb-1">
		<div class="card-header">
			<h1 class="card-title"><?= $model->title ?></h1>
			<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
			<div class="heading-elements">
				<ul class="list-inline mb-0">
					<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
					<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
					<li><a data-action="close"><i class="ft-x"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="card-content collapse show">
			<div class="card-body">
		<div class="row">
<div class="col-md-6 col-sm-12">
				<?= $model->content; ?>
				</div>
<div class="col-md-6 col-sm-12">
				
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="map-col-wraper">
				<h2 class="job-ads-h2"><span class="icon-location"></span>LOKASI KERJA
				<a type="button" id="view_larger_map" class="btn btn-link map-button text-right" target="_blank" href="https://www.mapquest.com/?le=t&amp;q=-6.956793,107.597704&amp;center=-6.956793,107.597704&amp;zoom=14&amp;maptype=map"><span class="visible-lg visible-md">Lihat di Peta / Arahan							<span class="icon-positive-disc"></span></span><span class="visible-sm">Lihat Lokasi di Peta yang Lebih Besar							<span class="icon-positive-disc"></span></span><span class="visible-xs"><span class="icon-positive-disc"></span></span></a>
									</h2>
									 <div class="map-wrapper" style="display:none;">
												<img class="map_demo" data-original="https://open.mapquestapi.com/staticmap/v4/getmap?size=460,460&amp;type=map&amp;pois=mcenter,-6.956793,107.597704|&amp;zoom=14&amp;center=-6.956793,107.597704&amp;imagetype=GIF&amp;key=Fmjtd%7Cluur25ur21%2Cbs%3Do5-9w75qr" src="https://open.mapquestapi.com/staticmap/v4/getmap?size=460,460&amp;type=map&amp;pois=mcenter,-6.956793,107.597704|&amp;zoom=14&amp;center=-6.956793,107.597704&amp;imagetype=GIF&amp;key=Fmjtd%7Cluur25ur21%2Cbs%3Do5-9w75qr">
											</div>
												<h3 class="text-info job-ads-location-details">
					<span class="icon-building-o icon-poi"></span>Alamat				</h3>
				<p id="address" class="add-detail-p">Jalan Singgasana Raya no 35, Bandung, West Java, Indonesia</p>
			</div>
		</div>
		
		
		</div>
		<div class="row">
<div class="col-md-6 col-sm-12">
<div class="col-lg-12 col-md-12 col-sm-12">
			<h2 class="job-ads-h2"><span class="icon-list-alt"></span>
						GAMBARAN PERUSAHAAN			            </h2>
                        <div class="col-lg-6 col-md-6 col-sm-12">
			     <h3 id="average_processing_time" class="desc_subject align-left">
					Waktu Proses Lamaran <span class="icon-question-mark icon_question" id="average_processing_time_info" data-toggle="tooltip" data-original-title="<button type='button' id='average_processing_time_button' class='close popover-close-btn hidden-lg'></button><b>Apa artinya?</b></br></br>Ini adalah rata-rata waktu (berdasarkan data) yang diperlukan perusahaan ini untuk membuat evaluasi dan memproses lamaran."></span>
				</h3>

				<p id="fast_average_processing_time" class="align-normal">
										Lebih dari 2 minggu					
									</p>
			</div>
            																		<div class="col-lg-6 col-md-6 col-sm-12">
				<h3 class="desc_subject">Industri</h3>
				<p id="company_industry">Umum &amp; Grosir</p>
			</div>
												<div class="col-lg-6 col-md-6 col-sm-12">
				<h3 class="desc_subject">Nomor Telepon</h3>
				<p id="company_contact">62-22-5435982</p>
			</div>
												<div class="col-lg-6 col-md-6 col-sm-12">
				<h3 class="desc_subject">Ukuran Perusahaan</h3>
				<p id="company_size">1- 50 pekerja</p>
			</div>
						 				<div class="col-lg-6 col-md-6 col-sm-12">
					<h3 class="desc_subject">Waktu Bekerja</h3>
					<p id="work_environment_waktu_bekerja">
						Waktu regular, Senin - Jumat					</p>
				</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
					<h3 class="desc_subject">Gaya Berpakaian</h3>
					<p id="work_environment_gaya_berpakaian">
						Bisnis (contoh: Kemeja)					</p>
				</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
					<h3 class="desc_subject">Tunjangan</h3>
					<p id="work_environment_tunjangan">
						Tunjangan Lainnya					</p>
				</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
					<h3 class="desc_subject">Bahasa yang Digunakan</h3>
					<p id="work_environment_bahasa_yang_digunakan">
						Indonesian and English					</p>
				</div>
			 		</div>
					
			</div>
				<div class="col-md-6 col-sm-12">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 class="job-ads-h2" id="overview"><span class="icon-building-o"></span> INFORMASI PERUSAHAAN</h2>
			<div id="company_overview_all" class="company-overview wrap-text">
								<p id="company_overview" class="cmpy_desc_p"></p><div style="text-align:justify">
<div>“PT Maxi Indonesia Mandiri adalah perusahaan yang bergerak di bidang agen mesin Mayer &amp; Cie (Circular Knitting Machine), MHM (Screen Printing Machine), dan Stoll (Flat Knitting Machine) berlokasi di Bandung dan saat ini sedang mencari Winning Team yang memiliki jiwa Semangat tinggi dan Dinamis. Disinilah merupakan Tempat yang tepat untuk mengembangkan Karir dan Hasil yang sesuai dengan Kinerja Anda.”</div>

<div>&nbsp;</div>
</div>

<div>&nbsp;</div><p></p>
							</div>
		</div>			
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrap-text">
			<h2 class="job-ads-h2"><span class="icon-bookmark"></span> MENGAPA BERGABUNG DENGAN KAMI?</h2>
			<div id="why_join_us_all" class="wrap-text">
			<p id="why_join_us" class="cmpy_desc_p"></p><div>Berinpirasi untuk menjual atau memberikan servis mesin-mesin yang berkelas nomor satu dunia?</div>

<div>Kami merupakan agen tunggal dari mesin-mesin Jerman dan Eropa yang ternama dan terpercaya.</div>

<div>Pelayanan yang sempurna adalah misi kami !</div>

<div>&nbsp;</div><p></p>
			</div>
		</div>
		
			</div>
				
				</div>
				
				
				
			</div>
		</div>
	</div>
</div>
