<div class="form-auth offcanvas offcanvas-start"
     tabindex="-1" id="offcanvas{{$name}}" aria-labelledby="offcanvas{{$name}}Label">
    <div class="offcanvas-header">
        <h4 class="offcanvas-title title" id="offcanvas{{$name}}Label">
            @if("Login" == $name)
                Войти
            @else
                Регистрация
            @endif
        </h4>
        <button type="button" class="btn-close btn-close-white text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Закрыть">
        </button>
    </div>
    <div class="offcanvas-body">
        @if($name == "Login")
            <x-panels.login></x-panels.login>
        @else
            <x-panels.registr></x-panels.registr>
        @endif
    </div>
</div>
