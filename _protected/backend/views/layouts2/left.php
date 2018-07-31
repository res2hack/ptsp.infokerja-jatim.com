<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= \Yii::$app->user->identity->email; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
										['label' => 'SPR', 'icon' => 'file-code-o', 'url' => ['/admin/sip'],],
										['label' => 'Perusahaan', 'icon' => 'dashboard', 'url' => ['/admin/perusahaan'],],
										['label' => 'Direktori Disnaker', 'icon' => 'dashboard', 'url' => ['/admin/direktori-disnaker'],],
										['label' => 'Direktori P3MI', 'icon' => 'dashboard', 'url' => ['/admin/direktori-p3mi'],],
										['label' => 'Direktori BLK', 'icon' => 'dashboard', 'url' => ['/admin/direktori-blk'],],
										['label' => 'Ayo ke PTSP', 'icon' => 'dashboard', 'url' => ['/admin/ayo-ke-ptsp/update'],],
										['label' => 'Pro Empowerment', 'icon' => 'dashboard', 'url' => ['/admin/prodesmigratif/update'],],
										['label' => 'Pengumuman', 'icon' => 'dashboard', 'url' => ['/admin/berita'],],
										['label' => 'Daftar Jadi PMI', 'icon' => 'dashboard', 'url' => ['/admin/daftar-jadi-pmi/update'],],
										['label' => 'Info KBRI', 'icon' => 'dashboard', 'url' => ['/admin/direktori-kbri'],],
										['label' => 'Syarat Jadi PMI', 'icon' => 'dashboard', 'url' => ['/admin/syarat-jadi-pmi/update'],],
										['label' => 'Konsultasi', 'icon' => 'dashboard', 'url' => ['/admin/konsultasi'],],
										['label' => 'Info LSP', 'icon' => 'dashboard', 'url' => ['/admin/direktori-lsp'],],
										['label' => 'Skema Kerja PMI', 'icon' => 'dashboard', 'url' => ['/admin/skema-kerja-pmi/update'],],
										['label' => 'Asuransi', 'icon' => 'dashboard', 'url' => ['/admin/asuransi/update'],],
										['label' => 'Game & Video', 'icon' => 'dashboard', 'url' => ['/admin/game/update'],],
										['label' => 'Info Text', 'icon' => 'dashboard', 'url' => ['/admin/textinfo'],],
										['label' => 'Negara Tujuan', 'icon' => 'dashboard', 'url' => ['/admin/negara_tujuan'],],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Logout', 'url' => ['/admin/site/logout'], 'data-method'=>'post'],                ],
            ]
        ) ?>

    </section>

</aside>
