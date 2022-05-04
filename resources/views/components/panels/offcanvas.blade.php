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
            <x-panels.login :errros="$errors" :typeError="$typeError"></x-panels.login>
        @else
            <x-panels.registration :errros="$errors" :typeError="$typeError"></x-panels.registration>
        @endif
    </div>
</div>
