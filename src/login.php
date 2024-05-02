<?php require_once 'parts/header.php'; ?>

    <div class="container">
        <div class="wrap-container">
            <div class="left-container">
                <img class="login-img" src="assets/login.jpg">
                <h1 class="login-title">Login page</h1>
                <p class="login-subtitle">By login in here, you will be able to see and add your recipes</p>
            </div>
            <div class="vertical-line"></div>
            <div class="right-container">
                <form class="right-container" action="scripts/login-script.php" method="POST">
                    <div class="input-container">
                        <label for="username">Username</label>
                        <input type="text" placeholder="Enter username" name="username">
                    </div>
                    <input type="submit" value="Signin">
                </form>
            </div>
        </div>


    </div>


<?php require_once 'parts/footer.php'; ?>