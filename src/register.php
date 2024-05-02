<?php require_once 'parts/header.php'; ?>

    <div class="container">
        <h1 class="text-center mt-3">Register page</h1>

        <form action="scripts/register-script.php" method="POST">
            <div class="text-center p-3">
                <input type="text" placeholder="Enter username" name="username">
            </div>
            <div class="p-3">
                <input type="submit" value="Signup" class="btn btn-primary w-100">
            </div>
        </form>

    </div>

<?php require_once 'parts/footer.php'; ?>