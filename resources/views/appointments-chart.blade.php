<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Include any necessary CSS/JS assets here -->
</head>
<body>
    <div>
        {!! $chart->container() !!}
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    {!! $chart->script() !!}
</body>
</html>
