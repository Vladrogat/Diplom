@if($errors->count())
    @foreach($errors->all() as $error)
        <div class="error">
            {{$error}}
        </div>
    @endforeach
@endif
<form action="{{route("login")}}" method="POST">
    @csrf
    <x-inputs.group for="login" title="Логин" helpText="">
        <x-inputs.text id="login" name="login" :old="old('login')" place="user"/>
    </x-inputs.group>
    <x-inputs.group for="password" title="Пароль" helpText="">
        <x-inputs.password id="password" name="password" :old="old('password')"  place="qwerty"/>
    </x-inputs.group>
    <x-inputs.submit text="Войти"/>
</form>

