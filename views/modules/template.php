<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{title}}</title>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="views/dist/css/app.css" />
    <link rel="stylesheet" href="views/dist/css/datatable_style.css" />
    <link rel="stylesheet" href="views/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="views/dist/css/bootstrap2.css" />
    <link rel="stylesheet" href="views/dist/css/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" />
</head>

<body>
    {{content}}
    {{footer}}
</body>
<script src="views/dist/js/main.js"></script>
<script src="views/dist/js/simple_datatable.js"></script>
<script src="views/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let table1 = document.querySelector("#table1");
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

</html>