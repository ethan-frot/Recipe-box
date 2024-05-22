<?php require_once 'parts/header.php'; ?>

<div class="container">
    <div class="wrap-container">
        <div class="left-container">
            <img class="login-img" src="assets/register.jpg">
            <h1 class="title">Register page</h1>
            <p class="login-subtitle">By register in here, you will have your own account on <span class="login-title">Recipe box</span></p>
        </div>
        <div class="vertical-line"></div>
        <div class="right-container">
            <h1 class="title">Recipe box</h1>
            <form class="form" action="scripts/register-script.php" method="POST">
                <div class="input-container">
                    <label for="username">Username</label>
                    <input class="input-text" type="text" placeholder="Enter username" name="username">
                </div>
                <input class="input-submit" type="submit" value="Register">
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
