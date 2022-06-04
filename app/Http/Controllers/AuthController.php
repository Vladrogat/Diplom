<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PageController;
use App\Http\Requests\UserRequest;
use App\Models\Result;
use App\Models\Section;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Метод осуществляющий аутентификацию пользователя переданых в пост запросе данных
     * @param UserRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect(route("profile", Auth::user()));
        }
        Session::put("typeError", "login");
        $fields = $request->validate([
            "login" => "bail|required|min:4|max:100|exists:users,login",
            "password" => "bail|required|min:4|max:100"
        ]);
        if (Auth::attempt($fields)) {
            return redirect(route("profile", Auth::user()));
        }
    }

    /**
     * Метод осущуствяющий регистрацию и создание нового пользователя
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function registration(Request $request)
    {
        if (Auth::check()) {
            return redirect(route("profile", Auth::user()));
        }
        Session::put("typeError", "registration");
        /*
         * Валидация полей
         */
        $fields = $request->validate([
            "email" => "bail|required|email",
            "name" => "bail|required|max:100",
            "login" => "bail|required|min:4|max:100",
            'password' => "bail|required|min:4|max:100",
            'confirm' => "bail|required|min:4|max:100"
        ]);
        if (trim($fields["password"]) === trim($fields["confirm"])) {
            $user = new User();
            $user->login = $fields["login"];
            $user->name = $fields["name"];
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
     * @return Application|RedirectResponse|Redirector
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
        $results_data = Result::where("user_id", $user["id"])->get();
        $results = [];
        foreach ($results_data as $result) {
            $options = json_decode($result["result"], true);
            $results[] = [
                "section" => Section::where("id", $result["section_id"])->first()["name"],
                "time" => $result["time"],
                "grade" => $result["grade"],
                "points" => $result["points"],
            ];
        }
       //dd($results);
        return PageController::viewer("pages.profile", compact("user", "results"));
    }
}
