<!DOCTYPE html>
<html lang="fa" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>@yield('title', 'TechBinary')</title>
</head>

<body dir="rtl">
    <div class="h-[100svh] flex flex-row overflow-hidden">
        @yield('aside')
        {{-- ================================= --}}
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../assets/scripts/chart.js"></script>
    <script src="../assets/scripts/alert.js"></script>
</body>

</html>