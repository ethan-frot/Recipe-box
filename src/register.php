<?php require_once 'parts/header.php'; ?>

<div class="container">
    <div class="wrap-container">
        <div class="left-container">
            <div class="login-img" style="background-image: url('./assets/register.jpg');"></div>
            <h1 class="title">Register page</h1>
        </div>
        <div class="vertical-line"></div>
        <div class="right-container">
            <h1 class="form-title">Recipe box</h1>
            <form class="form" action="scripts/register-script.php" method="POST">
                <div class="input-container">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-input login-form" type="text" placeholder="Enter username" name="username">
                </div>
                <input class="form-button login-form" type="submit" value="Register">
            </form>
            <div class="separation">
                <hr class="separation-hr"/>
                <span>or</span>
                <hr class="separation-hr"/>
            </div>
            <p>Already have an account ? <a href="./login.php">Go here</a></p>
        </div>
    </div>


</div>


<?php require_once 'parts/footer.php'; ?>
