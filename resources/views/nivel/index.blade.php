<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nivel</title>
</head>
<body>
   <table border = "1">
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        @foreach($niveis as $nivel)
            <tr>
            <td>{{$nivel->id}}</td>
            <td>{{$nivel->nome}}</td>
            <td><a href="{{url($nivel->id . '/edit')}}"><button>Editar</button></a>
            <form method="POST" action="{{url($nivel->id)}}">
                @method('delete')
                @csrf
                <button type = "submit">Deletar</button>
            </form>

            </td>
           
            </tr>
            
        @endforeach

   </table>
</body>
</html>