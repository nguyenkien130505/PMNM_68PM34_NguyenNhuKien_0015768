<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sinh viên</title>
    <meta name="description" content="Hệ thống quản lý sinh viên hiện đại">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS (Local) -->
    <link href="<?php echo BASE_URL; ?>bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS (loaded AFTER bootstrap to override) -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css?v=<?php echo time(); ?>">
</head>
<body>

    <!-- HEADER -->
    <?php require_once __DIR__ . '/partial/header.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="content-area">
        <div class="container">
            <div class="content-card">
                <?php
                if (isset($contentview)) {
                    require_once '../app/views/' . $contentview . '.php';
                }
                ?>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . '/partial/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle (Local) -->
    <script src="<?php echo BASE_URL; ?>bootstrap.bundle.min.js"></script>
</body>
</html>
