
<?php include_once(APPPATH.'Views/layouts/header.php'); ?>

<div class="container" style="margin-top:50px;">
    <div class="row">
            <?php foreach ($data as $row): ?>
                <div class="card" style="padding:20px;">
                    <div class="card-header">
                        <h2><?= $row->title ?></h2>
                    </div>
                    <div class="form-group" style="padding-top:40px;">
                        <strong><p><?= $row->body ?></p></strong>
                    </div>
                </div>
            <?php endforeach; ?>

    </div>
</div>