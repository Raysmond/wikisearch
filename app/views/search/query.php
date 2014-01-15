<div class="col-lg-7">
    <?= RForm::openForm("search/index", array('class' => 'form', 'method' => 'GET')) ?>
    <div class="input-group">
        <?= RForm::input(array("name" => "query", "value" => isset($query) ? $query : "", "placeholder" => "Search", "class" => "form-control")) ?>
        <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
    <?= RForm::endForm() ?>
</div>
<div class="clearfix"></div>
<div>
    <?php
    if (!isset($result->error)) {
        if (!empty($result)) {
            echo '<ul class="result-list">';
            foreach ($result->pages as $page) {
                echo '<li>';
                $link = "http://en.wikipedia.org/wiki/" . str_replace(" ", "_", $page->title);
                echo RHtml::link($page->title, $page->title, $link, array('class' => 'result-item', "target" => "_blank"));
                echo '</li>';
            }
            echo '</li>';
        }
    }
    ?>
</div>