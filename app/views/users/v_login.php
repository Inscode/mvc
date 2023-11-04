<?php require APPROOT.'/views/inc/header.php'; ?>
    <?php require APPROOT. '/views/inc/components/navbar.php' ?>
    <div class="form-container">
        <div class="form-header">
            <h1><center>User Login</center></h1> 
            <p><b>Please fill the credentials to login</b></p>
        </div>
        <form action="" method="post">

            <!-- email -->
            <div class="form-input-title">Email</div>
            <input type="text" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
            <span class="form-invalid"> <?php echo $data['email_err']; ?></span>

            <!-- password -->
            <div class="form-input-title">Password</div>
            <input type="password" name="password" id="password" class="password" value="<?php echo $data['password']; ?>" >
            <span class="form-invalid" ><?php echo $data['password_err']; ?></span>

            <br>

            <input type="submit" value="Login" class="form-btn">


        
        </form>
    </div>


<?php require APPROOT. '/views/inc/footer.php'; ?>
        
