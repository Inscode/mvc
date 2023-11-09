<?php require APPROOT.'/views/inc/header.php'; ?>
    <?php require APPROOT. '/views/inc/components/navbar.php' ?>
    
    <h1>Create Posts</h1>
    <div class="post-container">
        <center><h2>Create a Post</h2></center>
        <form action="<?php echo URLROOT; ?>/Posts/create" method="post">
            <input type="text" name="title" id="title" placeholder="Title" value="<?php $data['title'] ?>">
            <span class="form-invalid"><?php echo $data['title_err']; ?></span>
            <br>
            <textarea name="body" id="body" placeholder="content" cols="62" rows="10" value="<?php $data['body'] ?>"></textarea>
            <span class="form-invalid"><?php echo $data['body_err']; ?></span>
            <br>
            <input type="submit" value="Post" class="post-btn">

        </form>
    </div>


<?php require APPROOT. '/views/inc/footer.php'; ?>
        
