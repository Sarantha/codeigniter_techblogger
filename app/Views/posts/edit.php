<?php include_once(APPPATH.'Views/layouts/header.php'); ?>
<main role="main">
    <div id="add_post">
        <?= \Config\Services::validation()->listErrors();?>
        <form method="post" action="posts/create" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1">Post Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Post Title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Post Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Choose File</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="thumbnail">
            </div>
            <button type="submit" class="btn btn-primary" name="save_post">Save Post</button>
        </form>
    </div>
</main>
<?php include_once(APPPATH.'/Views/layouts/footer.php'); ?>