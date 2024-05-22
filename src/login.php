<?php require_once 'parts/header.php'; ?>

    <div class="container">
        <div class="wrap-container">
            <div class="left-container">
                <img class="login-img" src="assets/login.jpg">
                <h1 class="title">Login page</h1>
                <p class="login-subtitle">By login in here, you will be able to see and add your recipes</p>
            </div>
            <div class="vertical-line"></div>
            <div class="right-container">
                <h1 class="title">Recipe box</h1>
                <form class="form" action="scripts/login-script.php" method="POST">
                    <div class="input-container">
                        <label for="username">Username</label>
                        <input class="input-text" type="text" placeholder="Enter username" name="username">
                    </div>
                    <input class="input-submit" type="submit" value="Login">
                </form>
                <div class="separation">
                    <hr class="separation-hr"/>
                    <span>or</span>
                    <hr class="separation-hr"/>
                </div>
                <p>Are you new ? <a href="./register.php">Go here</a></p>
            </div>
        </div>


    </div>


<?php require_once 'parts/footer.php'; ?>