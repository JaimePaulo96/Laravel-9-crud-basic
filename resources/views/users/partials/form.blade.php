@csrf
    <input type="text" name="name" id="name" placeholder="Nome:" value="{{ $user->name ?? old('name') }}"><br>
    <input type="text" name="user" id="user" placeholder="Usuário:" value="{{ $user->user ?? old('user') }}"><br>
    <input type="password" name="password" id="password" placeholder="Senha:"><br>    
    <select name="occupation" id="occupation">
        <option value="{{  $user->occupation ?? old('occupation') }}">{{ $user->occupation ?? old('occupation') }}</option>
        <option >Garçom</option>
        <option >Cozinhero(a)</option>
        <option >Motoboy</option>
    </select>
      
    <button type="submit">Cadastrar</button>