<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Метод осуществляющий аутентификацию пользователя переданых в пост запросе данных
     * @param UserRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(UserRequest $request)
    {
        if (Auth::check()) {
            return redirect(route("profile", Auth::user()));
        }
        $fields = $request->validated();
        if (Auth::attempt($fields)) {
            return redirect(route("profile", Auth::user()));
        }
        //return redirect(route("home"));
    }

    /**
     * Метод осущуствяющий регистрацию и создание нового пользователя
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function registration(Request $request)
    {
        if (Auth::check()) {
            return redirect(route("profile", Auth::user()));
        }
        $fields = $request->validate([
            "email" => "bail|required|email",
            "login" => "bail|required|min:4|max:100",
            'password' => "bail|required|min:4|max:100",
            'confirm' => "bail|required|min:4|max:100"
        ]);
        if (trim($fields["password"]) === trim($fields["confirm"])) {

            $user = new User();
            $user->login = $fields["login"];
            $user->email = $fields["email"];
            $user->password = $fields["password"];
            $user->save();

            if ($user) {
                Auth::login($user);
                return redirect(route("profile", Auth::user()));
            }
        }
        return redirect(route("home"))->withErrors([
            "errors" => "Произошла ошибка сохранения пользователя"
        ]);
    }

    /**
     * Метод осуществяющий выход из под пользователя
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect(route("home"));
    }

    public function profile(User $user)
    {
        return view("pages.profile", compact("user"));
    }
}
