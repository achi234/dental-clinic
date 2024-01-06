<?php
    session_start();
    $page_title = "Smile - Registration";


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
                <form method="post" action="Controller/register.php">
                    <div class="authen-form__group">
                        <p class="authen-form__title">Phone Number</p>
                        <input type="text" class="authen-form__input" placeholder="Enter your phone number" name="sdt">
                    </div>
                    <div class="authen-form__group">
                        <p class="authen-form__title">Fullname</p>
                        <input type="text" class="authen-form__input" placeholder="Enter your fullname" name="hoten">
                    </div>
                    <div class="authen-form__group">
                        <p class="authen-form__title">Date of Birth</p>
                        <input type="date" class="authen-form__input" placeholder="Enter your birthday" name="dob">
                    </div>
                    <div class="authen-form__group">
                        <p class="authen-form__title">Address</p>
                        <input type="text" class="authen-form__input" placeholder="Enter your address" name="diachi">
                    </div>
                    <div class="authen-form__group">
                        <p class="authen-form__title">Password</p>
                        <input type="password" class="authen-form__input" placeholder="Enter your password" name="matkhau">
                    </div>
            </div>
    
            <div class="authen-form__controls">
                    <a href="login.php"class="btn btn--secondary">Back</a>
                    <button type="submit" class="btn btn--primary" name="btn-register">Register</button>
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
