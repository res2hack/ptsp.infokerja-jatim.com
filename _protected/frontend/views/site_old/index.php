<?php

/* @var $this yii\web\View */
$this->title = Yii::t('app', Yii::$app->name);
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-12">

                    <fieldset class="form-group position-relative">
                      <input type="text" class="form-control form-control-xl input-xl" id="iconLeft1" placeholder="Ketik Lowongan Yang Anda Inginkan">
                      <div class="form-control-position">
                        <i class="ft-search danger font-medium-4"></i>
                      </div>
                    </fieldset>

            </div>
				</div>
        <div class="row">
						<div class="col-12">
              <div class="card">
                <div class="card-header card-head-inverse bg-dark">
                  <h4 class="card-title text-white"><strong>JABATAN</strong></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
											<button type="button" class="btn btn-sm btn-white text-dark"><a href="#">Lihat Semua</a></button>
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
									<div class="row">
									<div class="col-4">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-primary float-right">4</span>
												Cras justo odio
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-info float-right">2</span>
												Dapibus ac facilisis in
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-warning float-right">1</span>
												Morbi leo risus
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-success float-right">3</span>
												Porta ac consectetur ac
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-danger float-right">8</span>
												Vestibulum at eros
											</li>
										</ul>
									</div>
									<div class="col-4">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-primary float-right">4</span>
												Cras justo odio
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-info float-right">2</span>
												Dapibus ac facilisis in
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-warning float-right">1</span>
												Morbi leo risus
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-success float-right">3</span>
												Porta ac consectetur ac
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-danger float-right">8</span>
												Vestibulum at eros
											</li>
										</ul>
									</div>
									<div class="col-4">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-primary float-right">4</span>
												Cras justo odio
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-info float-right">2</span>
												Dapibus ac facilisis in
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-warning float-right">1</span>
												Morbi leo risus
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-success float-right">3</span>
												Porta ac consectetur ac
											</li>
											<li class="list-group-item">
												<span class="badge badge-default badge-pill bg-danger float-right">8</span>
												Vestibulum at eros
											</li>
										</ul>
									</div>
									</div>
									</div>
                </div>
              </div>
            </div>
				

        <div class="row">
            <div class="col-12">
              <div class="card mb-1">
                <div class="card-header card-head-inverse bg-dark">
                  <h1 class="card-title text-white"><strong>LOWONGAN KERJA</strong></h1>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
											<button type="button" class="btn btn-sm btn-white text-dark"><a href="#">Lihat Semua</a></button>
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
						<?php 
							foreach ($lowongan_terbaru as $list){
						?>
						<div class="col-12">
             <div class="card mb-1">
                <div class="card-header">
                  <h4 class="card-title"><?= $list['title'] ?></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <p>Oat cake ice cream candy chocolate cake chocolate cake cotton
                      candy dragée apple pie. Brownie carrot cake candy canes bonbon
                      fruitcake topping halvah. Cake sweet roll cake cheesecake cookie
                      chocolate cake liquorice. Apple pie sugar plum powder donut
                      soufflé.
                    </p>
                    <div class="card-footer text-muted mt-2">
                      <span>updated 3 hours ago</span>
											<span class="float-right primary">View More <i class="ft-arrow-right"></i></span>
											</br>
                      <span>
                        <span class="badge bg-teal">Technology</span>
                        <span class="badge badge-warning">Mobile</span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
							<?php } ?>
						<div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Footer Within Body</h4>
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
                    <p>Oat cake ice cream candy chocolate cake chocolate cake cotton
                      candy dragée apple pie. Brownie carrot cake candy canes bonbon
                      fruitcake topping halvah. Cake sweet roll cake cheesecake cookie
                      chocolate cake liquorice. Apple pie sugar plum powder donut
                      soufflé.
                    </p>
                    <div class="card-footer text-muted mt-2">
                      <span>updated 3 hours ago</span>
											<span class="float-right primary">View More <i class="ft-arrow-right"></i></span>
											</br>
                      <span>
                        <span class="badge bg-teal">Technology</span>
                        <span class="badge badge-warning">Mobile</span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>


        </div>

    </div>
</div>

