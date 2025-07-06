<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>register | signin</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        
        body {
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 90vh;
         
        }
        
        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 900px;
            height: 500;
            max-width: 100%;
            min-height: 90%;
            padding-bottom: 20px;
        }
        
        .container p {
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: 20px 0;
        }
        
        .container span {
            font-size: 12px;
        }
        
        .container a {
            color: #333;
            font-size: 13px;
            text-decoration: none;
            margin: 15px 0 10px;
            
        }
        
        .container button {
            background-color:  #0b5cff;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }
        
        .container button.hidden {
            background-color: transparent;
            border-color: #fff;
        }
        
        .container form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
        }
        
        .container input {
            background-color: #eee;
            border: none;
            margin: 3px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
            text-align: right;
        }
        
        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }
        
        .sign-in {
            left: 0;
            width: 50%;
            z-index: 2;
        }
        
        .container.active .sign-in {
            transform: translateX(100%);
        }
        
        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }
        
        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }
        
        @keyframes move {
            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }
            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }
        
        .social-icons {
            margin: 20px 0;
        }
        
        .social-icons a {
            border: 1px solid #ccc;
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 3px;
            width: 40px;
            height: 40px;
        }
        
        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            border-radius: 150px 0 0 100px;
            z-index: 1000;
        }
        
        .container.active .toggle-container {
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }
        
        .toggle {
            height: 100%;
            background:  #0b5cff;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }
        
        .container.active .toggle {
            transform: translateX(50%);
        }
        
        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            text-align: center;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }
        
        .toggle-left {
            transform: translateX(-200%);
        }
        
        .container.active .toggle-left {
            transform: translateX(0);
        }
        
        .toggle-right {
            right: 0;
            transform: translateX(0);
        }
        
        .container.active .toggle-right {
            transform: translateX(200%);
        }
        
        .policy,
        .profile,
        .select {
            display: flex;
            width: 100%;
            border: 1px solid #a5a5b1;
            margin-top: 5px;
            border-radius: 10px;
        }

        @media screen and (max-width:550px) {
            body{
                height: 800px;
            }
            .container{
                display:flex;
                flex-direction: column-reverse;
                justify-content: center;

            }
            

            .container.active .sign-up{
                width: 100vw;
                transform: none;
                height: 900px;

            }
            
            .sign-in,.toggle-container{
                position:relative;
                width: 100vw;
                left: 0;
                right: 0;
                height: 900px;
                margin-top: 20px;
            }
            .toggle-container{
                height: 200px;
            }
            .toggle{
                height: 200px ;
            }
            .sign-in{
                height: fit-content;
            }
            .sign-up{
                height: fit-content;
            }
           .toggle-container{
            border-radius: 0;
            margin: 0;
            margin-bottom: 30px;
            position: absolute;
           }
           .container.active .toggle-container{
            transform: none;
            border-radius: 0;
            
            position:absolute;

           }
           .form-container{
            padding: 20px 0;
           }
           .toggle-panel{
            padding: 20px;
            width: 100vw;
           }
           .active{
            height: fit-content;
           }
        }
        @media screen and (max-width:300px) {
            .container,.form-container,.toggle-container {
                width: 300px;
                height: 100%;
            }
        }
        #errorMessages{
            color: white;
            margin: 4px;
            padding: 4px;
           border-radius: 4px;
            background: rgb(243, 38, 38);
        }
    </style>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post" action="sign_up.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                <h2> Create your account</h2>
                <input type="text" placeholder="اسم المستخدم" name="username" >
                <input type="text" placeholder="الايميل" name="email" >
                <input type="text" placeholder="عنوان السكن" name="address" >
                <input type="text" placeholder="الهاتف" name="phone" id="phone" >
                <input type="password" placeholder="كلمة المرور" name="password" id="password" >
                <input type="password" placeholder="تأكيد كلمة المرور" name="confirm_password" id="confirm_password" >
                <div class="select" style="border: none;">
                    <select name="role_id" id="role_id" required style="width: 50%; font-size: 15px; font-weight: bold;">
                        <option value="1">باحث عن عمل</option>
                        <option value="2">شركة</option>
                    </select>
                    <label for="role" style="width: 30%; font-size: 15px; font-weight: bold; margin-left: 70px;">:التسجيل ك</label>
                </div>
                <div class="policy" style="margin-top: 13px;">
                    <input type="checkbox" id="policyCheckbox" style="width: 20%; height: 20px; margin-top: 8px;" >
                    <a href="policy.html" style="width: 70%; text-decoration: underline; font-weight: bold; padding-left: 20px;">اوافق على الخصوصية وشروط الاستخدام</a>
                </div>
                <button name="submit" type="submit">إنشاء حساب</button>
                <div id="errorMessages" ></div>
            </form>
        </div>
        
        <script>
            function validateForm() {
                const usernameInput = document.getElementsByName('username')[0];
                const emailInput = document.getElementsByName('email')[0];
                const addressInput = document.getElementsByName('address')[0];
                const phoneInput = document.getElementById('phone');
                const passwordInput = document.getElementById('password');
                const confirmPasswordInput = document.getElementById('confirm_password');
                const policyCheckbox = document.getElementById('policyCheckbox');
                const errorMessages = document.getElementById('errorMessages');
        
                // Phone number validation
                if (usernameInput.value ==='') {
                    errorMessages.innerHTML = 'يجب ان تدخل اسم المستخدم';
                    return false;
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                errorMessages.innerHTML = 'الايميل المدخل غير صحيح';
                    return false;
            }
            if (emailInput.value ==='') {
                    errorMessages.innerHTML = 'ادخل عنوان الايميل';
                    return false;
                }

                if (addressInput.value === '') {
                    errorMessages.innerHTML = 'ادخل عنوان سكنك';
                    return false;
            }


                if (phoneInput.value.length < 9) {
                    errorMessages.innerHTML = 'يجب أن يكون رقم الهاتف على الأقل 9 أرقام.';
                    return false;
                }
        
                // Phone number starts with 77, 73, 78, 71, or 70
                const phoneRegex = /^(77|73|78|71|70)/;
                if (!phoneRegex.test(phoneInput.value)) {
                    errorMessages.innerHTML = 'يجب أن يبدأ رقم الهاتف بـ 77 أو 73 أو 78 أو 71 أو 70.';
                    return false;
                }
        
                // Password complexity validation
                const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                if (!passwordRegex.test(passwordInput.value)) {
                    errorMessages.innerHTML = 'كلمة المرور يجب أن تحتوي على أحرف وأرقام وتكون أكبر من 7 أحرف.';
                    return false;
                }
        
                // Password and confirm password match validation
                if (passwordInput.value !== confirmPasswordInput.value) {
                    errorMessages.innerHTML = 'كلمة المرور غير متطابقة.';
                    return false;
                }
        
                // Policy checkbox validation
                if (!policyCheckbox.checked) {
                    errorMessages.innerHTML = 'يجب الموافقة على الخصوصية وشروط الاستخدام.';
                    return false;
                }
        
                // Clear error messages if all validations pass
                errorMessages.innerHTML = '';
                return true; // Form submission allowed
            }
        </script>
        

        <div class="form-container sign-in"  >
            <form method="post" action="sign_in.php"  >
                <h1 style="margin-bottom: 20px;" >تسجيل الدخول</h1>
                
                
                <?php if (isset($_GET['email'])) {
                 $email=$_GET['email'];
                   $mail=str_replace('%40', '@', $email);
 
               echo' <input type="email" value="'.$mail.'  " placeholder="الإيميل" name="email" required>';
                }else {
                    echo' <input type="email"  placeholder="الإيميل" name="email" required>';
                }?>
                
                <input type="password" placeholder="كلمة المرور" name="password" required>
                <a href="#">نسيت كلمة المرور ؟</a>
                <button name="submit" type="submit">تسجيل الدخول</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>! مرحبا بعودتك</h1>
                    <p>ادخل بياناتك للوصول الامثل لجميع موارد المنصة</p>
                    <button class="hidden" id="login">تسجيل الدخول</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>! مرحبا بك</h1>
                    <p>أنشى حساب واضف بياناتك واستمتع بخدمات المنصه</p>
                    <button class="hidden" id="register">إنشاء حساب</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    </script>
</body>

</html>