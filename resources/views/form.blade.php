<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularioform</title>
</head>
<body>
    <div>
        @if(Session::has('success'))
            <p>{{Session::get('success')}}</p>
        @endif

        @if(Session::has('error'))
            <p>{{Session::get('error')}}</p>
        @endif
    </div>
    <form method="POST" action="{{url(isset($usuario)? $usuario->id:'')}}">

    @if(isset($usuario))
        @method('PUT')
    @endif
    
       
    @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome"value="{{old('nome', isset($usuario) ? $usuario->nome:'')}}"><br>
            {{$errors->first('nome')}}
            <br><br>

        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="{{old('email',isset($usuario) ? $usuario->email:'')}}"><br>
        {{$errors->first('email')}}
        <br><br>

        <label for="data_nascimento">Data de Nascimento</label>
        <input type="text" name="data_nascimento" id="data_nascimento" value="{{old('data_nascimento', isset($usuario)?$usuario->data_nascimento:'')}}"><br>
        {{$errors->first('data_nascimento')}}
        <br><br>

        <select name="materias[]" multiple>
            @foreach($materias as $materia)
            <option value="{{$materia->id}}">{{$materia->nome}}</option>
            @endforeach
        </select>
        <br><br>

       <select name="nivel_id">
       @foreach($niveis as $nivel)
       <option {{isset($usuario) && ($usuario->nivel_id == $nivel->id) ?'selected':''}} 
       value="{{$nivel->id}}">{{$nivel->nome}}</option>
       @endforeach
       </select><br>
       {{$errors->first('nivel_id')}}
        <br>
        
       <input type="submit" value="Enviar">

    </form>
</body>
</html>