<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        direction: rtl;
        text-align: right;
        font-family: Yekan;
    }
</style>
<body>
<h3>
    {{$request->name}}
    عزیز نظر شما دریافت شد
</h3>
<hr>
<p>
    {{$request->name}}
    عزیز نظر شما در باره ی مطلب
    {{$article->name}}
    دریافت شد و پس از تایید مدیر منتشر میشود
</p>
<p>
    با تشکر از شما
</p>
</body>
</html>