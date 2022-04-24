
<x-inputs.group for="email" title="Email" helpText="">
    <x-inputs.email id="email" name="email" place=""/>
</x-inputs.group>
<x-inputs.group for="login" title="Логин" helpText="">
    <x-inputs.text id="login" name="login" place=""/>
</x-inputs.group>
<x-inputs.group for="password" title="Пароль" helpText="">
    <x-inputs.password id="password" name="password" place=""/>
</x-inputs.group>
<x-inputs.group for="confirm" title="Подтверждение пароля" helpText="">
    <x-inputs.password id="confirm" name="confirm" place=""/>
</x-inputs.group>

<x-inputs.submit text="Регистрация"/>
