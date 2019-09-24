<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <meta http-equiv="Content-Security-Policy" content="default-src gap://ready file://* *; style-src 'self' http://* https://* 'unsafe-inline'; script-src 'self' http://* https://* 'unsafe-inline' 'unsafe-eval'">-->
    <title>Document</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/RobinHerbots/jquery.inputmask@5.0.0-beta.87/dist/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <div class="interr-wrapper">
      <?php include 'app/views/'.$content_view; ?>
    </div>

</body>
</html>