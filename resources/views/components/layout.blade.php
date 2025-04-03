<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? "Job Board"}}</title>
    @vite(['resources/css/app.css','resources/js/filtering-form.js','resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% mx-auto mt-10 max-w-2xl text-slate-700">
{{$slot}}
</body>
</html>
