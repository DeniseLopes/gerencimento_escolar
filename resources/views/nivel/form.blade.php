<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url(isset($nivel) ? 'nivel/'.$nivel->id : 'nivel/')}}" method = "POST">
    @if(isset($nivel))
    @method('PUT')
    @endif

    @csrf
        {{$errors->first('nome')}}
        <br>
        <label for="nome">Nome:</label>
        
        
        <input type="text" name="nome" value="{{old('nome', isset($nivel)? $nivel->nome:'')}}"><br>
           
        <input type="submit" value="Salvar">

    </form>
</body>
</html>