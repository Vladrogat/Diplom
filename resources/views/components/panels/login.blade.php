<form action="{{route("login")}}" method="POST">
    @csrf
    <x-inputs.group for="login" title="Логин" helpText="">
        <x-inputs.text id="login" name="login" place="user"/>
    </x-inputs.group>
    <x-inputs.group for="password" title="Пароль" helpText="">
        <x-inputs.password id="password" name="password" place="qwerty"/>
    </x-inputs.group>

    <x-inputs.submit text="Войти"/>
</form>

