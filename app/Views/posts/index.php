<style>
.limited-text{
    white-space: nowrap;
    width: 1000px;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
<?php include_once(APPPATH.'Views/layouts/header.php'); ?>

<div class="container" style="margin-top:50px;">
<h1 style="margin-top:50px;" >All Posts</h1>
    <form class="form-inline mt-6 mt-md-0" method="get" action="/posts/search">
            <input class="form-control mr-sm-2" style="width:90%;align:center;" type="search" name="s" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <hr>
    <div class="row" >
        <?php foreach($posts as $post_item): ?>
        <div class="col-md-12 card" style="margin-top:50px;">
            <h2><?= $post_item['title']?></h2>
            <p class="limited-text" maxlength="20"><?=$post_item['body']?></p>
            <p>
                <a class="btn btn-sm btn-primary" href="<?= '/posts/'.$post_item['id']; ?>" role="button">Read More &raquo;</a>
            <!--    <a class="btn btn-sm btn-secondary" href="<?= '/posts/'.$post_item['id'].'/edit'?>" role="button">Edit Post &raquo;</a>
                <a class="btn btn-sm btn-danger" href="<?= '/posts/'.$post_item['id'].'/delete'?>" role="button">Delete Post &raquo;</a>
               -->             
            </p>
        </div>
        <?php endforeach; ?>
        <hr>
    </div>
</div>