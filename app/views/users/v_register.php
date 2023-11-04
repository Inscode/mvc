<?php require APPROOT.'/views/inc/header.php'; ?>
    <?php require APPROOT. '/views/inc/components/navbar.php' ?>
    <div class="form-container">
        <div class="form-header">
            <h1><center>User Sign Up</center></h1> 
            <p><b>Please fill the form to register</b></p>
        </div>
        <form action="<?php echo URLROOT ?>/Users/register" method="post">

             <!-- name -->
            <div class="form-input-title">Name</div>
            <input type="text" name="name" id="name" class="name" value="<?php echo $data['name'];?>">
            <span class="form-invalid"> <?php echo $data['name_err']; ?></span>

            <!-- email -->
            <div class="form-input-title">Email</div>
            <input type="text" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
            <span class="form-invalid"><?php echo $data['email_err']; ?></span>

            <!-- password -->
            <div class="form-input-title">Password</div>
            <input type="password" name="password" id="password" class="password" value="<?php echo $data['password'];?>">
            <span class="form-invalid"><?php echo $data['password_err']; ?></span>

            <!-- confirm password -->
            <div class="form-input-title">Confirm Password</div>
            <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" value="<?php echo $data['confirm_password']; ?>">
            <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>

            <br>

            <input type="submit" value="Register" class="form-btn">


        
        </form>
    </div>


<?php require APPROOT. '/views/inc/footer.php'; ?>
        
