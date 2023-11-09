<?php require APPROOT.'/views/inc/header.php'; ?>
    <?php require APPROOT. '/views/inc/components/navbar.php' ?>
    
    <h1>Posts Edit</h1>
    <div class="post-container">
        <center><h2>Edit the post</h2></center>
        <form action="<?php echo URLROOT; ?>/Posts/edit/<?php echo $data['post_id'] ?>" method="post">
            <input type="text" name="title" id="title" placeholder="Title" value="<?php echo $data['title'] ?>">
            <span class="form-invalid"><?php echo $data['title_err']; ?></span>
            <br>
            <textarea name="body" id="body" placeholder="content" cols="62" rows="10" value=""><?php echo $data['body'] ?></textarea>
            <span class="form-invalid"><?php echo $data['body_err']; ?></span>
            <br>
            <input type="submit" value="Edit" class="post-btn">

        </form>
    </div>


<?php require APPROOT. '/views/inc/footer.php'; ?>
        
