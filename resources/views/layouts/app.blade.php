<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FHS Management</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/iconly/bold.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/perfect-scrollbar/perfect-scrollbar.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/bootstrap-icons/bootstrap-icons.css") }}">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="shortcut icon" href="{{ asset("images/favicon.svg") }}" type="image/x-icon">
</head>
<body>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main">
            <x-header></x-header>
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt est animi earum molestiae neque dolores excepturi atque voluptas dicta rerum.</p>
            </div>
            <x-footer></x-footer>
        </div>
    </div>
    <script src="{{ asset("vendors/perfect-scrollbar/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("vendors/apexcharts/apexcharts.js") }}"></script>
    <script src="{{ asset("js/pages/dashboard.js") }}"></script>
    <script src="{{ asset("js/main.js") }}"></script>
</body>
</html>