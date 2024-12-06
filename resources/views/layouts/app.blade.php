<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mirante</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Estilos personalizados */
        body {
            background-color: #e8eae8;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Menu de navegação -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #778b78;">
            <a class="navbar-brand text-white" href="#">Hotel Mirante</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('hospedes.index') }}">Hóspedes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('hospedagem.index') }}">Hospedagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('quartos.index') }}">Quartos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Conteúdo da página -->
        @yield('content')
    </div>

    <!-- Bootstrap JS e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
