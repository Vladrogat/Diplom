@if($errors->count())
    @foreach($errors->all() as $error)
        <div class="error">
            {{$error}}
        </div>
    @endforeach
@endif
<form action="{{route("registration")}}" method="POST">
    @csrf
    <x-inputs.group for="email" title="Email" helpText="">
        <x-inputs.email id="email" name="email" old="" place=""/>
    </x-inputs.group>
    <x-inputs.group for="login" title="Логин" helpText="">
        <x-inputs.text id="login" name="login" old="" place=""/>
    </x-inputs.group>
    <x-inputs.group for="password" title="Пароль" helpText="">
        <x-inputs.password id="password" old="" name="password" place=""/>
    </x-inputs.group>
    <x-inputs.group for="confirm" title="Подтверждение пароля" helpText="">
        <x-inputs.password id="confirm" old="" name="confirm" place=""/>
    </x-inputs.group>

    <x-inputs.submit text="Регистрация"/>
</form>
