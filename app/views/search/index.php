<?php $self->setHeaderTitle("Search"); ?>
<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h1 style="text-align: center;">Search Wikipedia</h1>
    <?= RForm::openForm("search/index", array('class' => 'form','method'=>'GET')) ?>
    <div class="input-group">
        <?= RForm::input(array("name" => "query", "placeholder" => "Search", "class" => "form-control")) ?>
        <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
    <?= RForm::endForm() ?>
</div>
<div class="col-lg-2"></div>