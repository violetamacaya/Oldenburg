<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Oldenburg</title>
    <link rel="stylesheet" href="<?php echo ipFileUrl('Ip/Internal/Core/assets/admin/admin.css'); ?>">
    <link rel="stylesheet" href="<?php echo ipFileUrl('Ip/Internal/Admin/assets/login.css'); ?>">
    <link rel="shortcut icon" href="<?php echo ipFileUrl('favicon.ico'); ?>">
</head>
<body>


<img class="logo" src="<?php echo ipThemeUrl('img/header-logo.png'); ?>">

<div class="verticalAlign"></div>
<div class="login">
    <?php echo $content; ?>
</div>

<?php echo ipJs(); ?>
</body>
</html>
