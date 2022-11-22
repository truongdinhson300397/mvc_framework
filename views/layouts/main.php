
<!doctype html>
<html>
<head>
    <title><?php echo $this->title?></title>
</head>
<body>
<a href="/">Home <span>(current)</span></a>
<a href="/contact">Contact</a>
<?php if (\app\core\Application::isGuest()): ?>
    <a href="/login">login</span></a>
    <a href="/register">register</a>
<?php else: ?>
    <a href="/profile">Profile</a>
    <a href="/profile">Welcome <?php echo \app\core\Application::$app->user->getDisplayName()?></a>
    <a href="/logout">(Logout)</a>
<?php endif; ?>
<h1>Helle world</h1>
<?php if (\app\core\Application::$app->session->getFlash('success')): ?>
    <div class="alert alert-success">
		<?php echo \app\core\Application::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<h1>{{content}} </h1>
</body>
</html>



