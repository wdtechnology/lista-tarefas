<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .page-break {
            page-break-after: always;
        }

        .titulo {
            border:1px;
            background-color: #c2c2c2;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 25px;
        }

        table th {
            text-align: left;
        }
    </style>
    <title>Lista de  Tarefas</title>
</head>
<body>
    <div class="titulo">Lista de Tarefas</div>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tarefa</th>
                <th>Data Limite Conclusão</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->tarefa }}</td>
                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
            <div class="page-break"></div>
            <h2>Pg 02</h2>
       
</body>
</html>