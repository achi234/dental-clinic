<?php
    session_start();
    $page_title = "Smile - Login";


    include('./partial/header.php');
    
?>

<body>
    <div class="modal">
        <div class="authen-form__header">
            <img src="./assets/image/smile-2_removebg.png" alt="Smile.png" class="authen-header__logo">
            <h1 class="authen-header__name">Smile</h1>
        </div>
        <!-- Login form -->
        <div class="authen-form">
            <div class="authen-form__form">
                <form method="post" action="Controller/checklogin.php">
                    <div class="authen-form__group">
                        <p class="authen-form__title">Username</p>
                        <input type="text" class="authen-form__input" placeholder="Enter your username" name="username">
                    </div>
                    <div class="authen-form__group">
                        <p class="authen-form__title">Password</p>
                        <input type="password" class="authen-form__input" placeholder="Enter your password" name="password">
                    </div>
            </div>
    
            <div class="authen-form__controls">
                    <a href="register.php"class="btn btn--secondary">Register</a>
                    <button type="submit" class="btn btn--primary" name="btn-login">Login</button>
            </div>
    
            <div class="authen-form__aside">
                    <p class="authen-form__forgot-text">
                        <a href="" class="authen-form__forgot-link">Forgot password</a>
                    </p>  
            </div>
                </form>
        </div>            
    </div>
</body>
</html>
