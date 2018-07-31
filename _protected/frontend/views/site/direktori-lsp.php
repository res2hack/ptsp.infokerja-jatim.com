<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Direktori LSP Jatim';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<div class="container-fluid">

<div class="row no-gutter">
  <div class="col-xs-12">
    <div class="block-title">
      <h3><a href="#">DATA LSP</a></h3>
    </div>
      
    <div class="block-content" >    
      <ul class="article-list">
      <?php 
      foreach ($model as $list){
        echo "<li>";
        echo "<a href='".Url::to(['site/direktori-lsp/','id'=>$list['id']])."'>".$list['nama']."</a>";
        echo "</li>";
			}
      ?>
      </ul>
    </div>
  </div>

</div>
	</div>
</div>
