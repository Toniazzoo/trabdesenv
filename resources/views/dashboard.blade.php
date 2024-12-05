<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8eae8;
        }
        .dashboard-container {
            margin-top: 50px;
        }
        .card {
            background-color: #bbc3bc;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container dashboard-container text-center">
        <h1>Bem-vindo ao Sistema de Gestão de Hotel</h1>
        <p>Escolha uma opção abaixo:</p>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="{{ route('hospedes.index') }}" class="btn btn-success btn-lg w-100 mb-3" style="background-color: #778b78;">Gerenciar Hóspedes</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('hospedagens.index') }}" class="btn btn-primary btn-lg w-100 mb-3" style="background-color: #a3aca4;">Gerenciar Hospedagens</a>
            </div>
        </div>
    </div>
</body>
</html>
