<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Quản lý Sinh viên</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS (Local) -->
    <link href="<?php echo BASE_URL ?? '/'; ?>bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?? '/'; ?>style.css?v=<?php echo time(); ?>">
    <style>
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        .login-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--card-border);
            border-radius: var(--radius-xl);
            box-shadow: var(--card-shadow);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            text-align: center;
        }
        .login-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        .login-title {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
            font-size: 1.75rem;
        }
        .login-subtitle {
            color: var(--text-medium);
            font-size: 0.95rem;
            margin-bottom: 30px;
        }
        .form-floating > label {
            color: var(--text-medium);
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(99,102,241,0.25);
            border-color: var(--primary-light);
        }
        .btn-submit {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: var(--radius-md);
            padding: 14px;
            font-weight: 600;
            font-size: 1.05rem;
            width: 100%;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(99,102,241,0.3);
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99,102,241,0.4);
            color: white;
        }
        .input-group-text {
            background-color: transparent;
            border-right: none;
            color: var(--primary);
        }
        .form-control.with-icon {
            border-left: none;
            padding-left: 0;
        }
        .form-control.with-icon:focus {
            box-shadow: none;
        }
        .input-group:focus-within {
            box-shadow: 0 0 0 0.25rem rgba(99,102,241,0.25);
            border-radius: var(--bs-border-radius);
        }
        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control {
            border-color: var(--primary-light);
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <i class="fas fa-graduation-cap login-icon"></i>
            <h1 class="login-title">Chào mừng trở lại</h1>
            <p class="login-subtitle">Đăng nhập để quản lý hệ thống sinh viên</p>
            
            <form method="POST" action="<?php echo BASE_URL ?? '/'; ?>auth/login">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="text" class="form-control with-icon" id="username" name="username" placeholder="Tên đăng nhập" required>
                        <label for="username">Tên đăng nhập</label>
                    </div>
                </div>
                
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="password" class="form-control with-icon" id="password" name="password" placeholder="Mật khẩu" required>
                        <label for="password">Mật khẩu</label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-sign-in-alt me-2"></i>Đăng nhập
                </button>
            </form>
            
            <div class="mt-4 pt-3 border-top" style="border-color: var(--glass-border) !important;">
                <p class="text-muted small mb-0">&copy; 2026 Hệ thống Quản lý Sinh viên</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle (Local) -->
    <script src="<?php echo BASE_URL ?? '/'; ?>bootstrap.bundle.min.js"></script>
</body>
</html>
