<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | AG-Lab SUST</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;

            font-family: 'Inter', sans-serif;

            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(31, 139, 91, 0.10),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(31, 139, 91, 0.08),
                    transparent 30%
                ),
                #f3f8f5;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;
        }


        /* =========================================
           MAIN LOGIN CARD
        ========================================= */

        .login-card {

            width: 100%;
            max-width: 500px;

            background: #ffffff;

            border-radius: 20px;

            padding: 48px 48px 40px;

            box-shadow:
                0 20px 60px rgba(7, 66, 39, 0.12);

            border: 1px solid rgba(13, 89, 53, 0.06);

            text-align: center;
        }


        /* =========================================
           LOGO
        ========================================= */

        .logo {

            width: 72px;
            height: 72px;

            margin: 0 auto 18px;

            border-radius: 17px;

            background:
                linear-gradient(
                    135deg,
                    #087443,
                    #15905a
                );

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 25px;
            font-weight: 800;

            position: relative;

            box-shadow:
                0 10px 25px rgba(8, 116, 67, 0.20);
        }


        /* Small leaf */

        .logo::before {

            content: "⌁";

            position: absolute;

            top: 7px;
            right: 14px;

            font-size: 17px;

            color: rgba(255,255,255,0.95);

            transform: rotate(-25deg);
        }


        /* =========================================
           BRAND TITLE
        ========================================= */

        .brand-title {

            color: #123d29;

            font-size: 28px;

            font-weight: 800;

            letter-spacing: -0.5px;

            margin-bottom: 7px;
        }


        .login-title {

            color: #718078;

            font-size: 17px;

            font-weight: 500;

            margin-bottom: 24px;
        }


        /* =========================================
           DIVIDER
        ========================================= */

        .divider {

            display: flex;

            align-items: center;

            gap: 12px;

            margin: 0 auto 30px;

            width: 100%;
        }

        .divider-line {

            flex: 1;

            height: 1px;

            background: #dbe6df;
        }

        .divider-leaf {

            color: #15905a;

            font-size: 19px;

            line-height: 1;
        }


        /* =========================================
           ERROR MESSAGE
        ========================================= */

        .error-box {

            text-align: left;

            background: #fff4f4;

            border: 1px solid #f0cccc;

            color: #a23c3c;

            border-radius: 9px;

            padding: 13px 15px;

            margin-bottom: 22px;

            font-size: 13px;
        }

        .error-box ul {

            padding-left: 18px;

        }


        /* =========================================
           FORM
        ========================================= */

        .form-group {

            text-align: left;

            margin-bottom: 19px;
        }


        .form-label {

            display: block;

            color: #34483d;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 8px;
        }


        .input-wrapper {

            position: relative;
        }


        .input-icon {

            position: absolute;

            left: 16px;

            top: 50%;

            transform: translateY(-50%);

            color: #7b8c83;

            font-size: 17px;

            z-index: 2;
        }


        .form-input {

            width: 100%;

            height: 52px;

            padding: 0 45px;

            border: 1px solid #d9e4de;

            border-radius: 10px;

            background: #fbfdfc;

            color: #24382d;

            font-family: 'Inter', sans-serif;

            font-size: 14px;

            outline: none;

            transition: all 0.2s ease;
        }


        .form-input::placeholder {

            color: #9aa8a1;
        }


        .form-input:focus {

            background: #ffffff;

            border-color: #15905a;

            box-shadow:
                0 0 0 4px rgba(21, 144, 90, 0.09);
        }


        /* =========================================
           PASSWORD SHOW BUTTON
        ========================================= */

        .password-toggle {

            position: absolute;

            right: 13px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #6c7e74;

            font-family: 'Inter', sans-serif;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

            padding: 5px;
        }


        .password-toggle:hover {

            color: #087443;
        }


        /* =========================================
           FORM OPTIONS
        ========================================= */

        .form-options {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin: 5px 0 25px;
        }


        .remember {

            display: flex;

            align-items: center;

            gap: 8px;

            color: #687970;

            font-size: 13px;

            cursor: pointer;
        }


        .remember input {

            width: 15px;
            height: 15px;

            accent-color: #087443;

            cursor: pointer;
        }


        .forgot-link {

            color: #087443;

            font-size: 13px;

            font-weight: 600;

            text-decoration: none;
        }


        .forgot-link:hover {

            text-decoration: underline;
        }


        /* =========================================
           SIGN IN BUTTON
        ========================================= */

        .login-button {

            width: 100%;

            height: 52px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #087443,
                    #15905a
                );

            color: #ffffff;

            font-family: 'Inter', sans-serif;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 8px 20px rgba(8, 116, 67, 0.20);

            transition: all 0.2s ease;
        }


        .login-button:hover {

            transform: translateY(-1px);

            box-shadow:
                0 12px 25px rgba(8, 116, 67, 0.27);
        }


        .login-button:active {

            transform: translateY(0);
        }


        /* =========================================
           SECURITY MESSAGE
        ========================================= */

        .security-note {

            margin-top: 22px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            color: #819087;

            font-size: 11px;
        }


        .security-icon {

            color: #087443;

            font-size: 14px;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .login-footer {

            margin-top: 25px;

            padding-top: 20px;

            border-top: 1px solid #edf1ef;

            color: #9aa7a0;

            font-size: 11px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 600px) {

            body {

                padding: 18px;
            }

            .login-card {

                padding: 38px 25px 30px;

                border-radius: 16px;
            }

            .logo {

                width: 64px;
                height: 64px;

                font-size: 22px;
            }

            .brand-title {

                font-size: 25px;
            }

            .login-title {

                font-size: 16px;
            }

            .form-options {

                gap: 12px;
            }
        }


        @media (max-width: 400px) {

            .form-options {

                flex-direction: column;

                align-items: flex-start;
            }

            .login-card {

                padding-left: 20px;
                padding-right: 20px;
            }
        }

    </style>

</head>


<body>


    <!-- =========================================
         LOGIN CARD
    ========================================== -->

    <div class="login-card">


        <!-- Logo -->

        <div class="logo">
            AG
        </div>


        <!-- AG-Lab -->

        <h1 class="brand-title">
            AG-Lab SUST
        </h1>


        <!-- Admin Login -->

        <p class="login-title">
            Admin Login
        </p>


        <!-- Divider -->

        <div class="divider">

            <div class="divider-line"></div>

            <div class="divider-leaf">
                ❧
            </div>

            <div class="divider-line"></div>

        </div>


        <!-- =====================================
             ERROR MESSAGE
        ====================================== -->

        @if ($errors->any())

            <div class="error-box">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- =====================================
             LOGIN FORM
        ====================================== -->

        <form
            method="POST"
            action="{{ route('login') }}"
        >

            @csrf


            <!-- Email -->

            <div class="form-group">

                <label
                    for="email"
                    class="form-label"
                >
                    Email Address
                </label>


                <div class="input-wrapper">

                    <span class="input-icon">
                        ✉
                    </span>


                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-input"
                        placeholder="Enter your email address"
                        required
                        autofocus
                        autocomplete="username"
                    >

                </div>

            </div>


            <!-- Password -->

            <div class="form-group">

                <label
                    for="password"
                    class="form-label"
                >
                    Password
                </label>


                <div class="input-wrapper">

                    <span class="input-icon">
                        🔒
                    </span>


                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-input"
                        placeholder="Enter your password"
                        required
                        autocomplete="current-password"
                    >


                    <button
                        type="button"
                        class="password-toggle"
                        id="togglePassword"
                    >
                        Show
                    </button>

                </div>

            </div>


            <!-- Remember / Forgot -->

            <div class="form-options">


                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                        id="remember_me"
                    >

                    <span>
                        Remember me
                    </span>

                </label>


                @if (Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="forgot-link"
                    >
                        Forgot password?
                    </a>

                @endif


            </div>


            <!-- Sign In -->

            <button
                type="submit"
                class="login-button"
            >
                Sign In
            </button>


        </form>


        <!-- Security -->

        <div class="security-note">

            <span class="security-icon">
                🔐
            </span>

            <span>
                Secure access for authorized administrators
            </span>

        </div>


        <!-- Footer -->

        <div class="login-footer">

            AG-Lab SUST Admin Panel

        </div>


    </div>


    <!-- =========================================
         PASSWORD TOGGLE SCRIPT
    ========================================== -->

    <script>

        const passwordInput =
            document.getElementById('password');

        const togglePassword =
            document.getElementById('togglePassword');


        if (passwordInput && togglePassword) {

            togglePassword.addEventListener(
                'click',
                function () {

                    if (
                        passwordInput.type === 'password'
                    ) {

                        passwordInput.type = 'text';

                        togglePassword.textContent = 'Hide';

                    } else {

                        passwordInput.type = 'password';

                        togglePassword.textContent = 'Show';

                    }

                }
            );

        }

    </script>


</body>
</html>