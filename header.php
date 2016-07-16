<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Random String</title>
<?php
//参考 http://log-file.net/web/php-2111
        //$urldata = "http" .(empty($_SERVER['HTTPS']) ? "":"s") ."://" .$_SERVER['HTTP_HOST'] .$_SERVER['PHP_SELF'];
        $urldata = "//" .$_SERVER['HTTP_HOST'] .$_SERVER['PHP_SELF'];
        $urldata = pathinfo($urldata)['dirname'];
        $scripts = array(
            "/js/jquery-2.1.4.min.js",
            "/js/clipboard.min.js",
            "/js/js-func.js",
        );
        foreach ($scripts as $value) {
            echo "\t\t" .'<script src="' .$urldata .$value .'"></script>' ."\n";
        }
?>
</head>
<body>
    <h1>Random String</h1>
    <p>ランダムな文字列を生成します。<br>参照文字列と文字数を入力して生成ボタンを押してください</p>
    <h2>生成された文字列はサーバー上に保存されません</h2>

    <form action="index.php" method="get">
        <p>参照文字列:
