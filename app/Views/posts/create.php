<?php include_once(APPPATH.'Views/layouts/header.php'); ?>
<div class="container" style="margin-top:50px;">
    <main role="main">
        <div id="add_post">
            <?= \Config\Services::validation()->listErrors();?>
            <div class="card">
                <div class="card-header">
                    Create New Post
                </div>
                <div class="card-body">
                    <form method="post" action="/post/create" enctype="multipart/form-data">
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
            </div>
        </div>
    </main>
    <?php include_once(APPPATH.'/Views/layouts/footer.php'); ?>
</div>