<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $pagetitle = 'Пользователи';
        $data = [
            'pagetitle' => $pagetitle,
            'users' => $users,
            'route' => Route::getFacadeRoot()->current()->getName()
        ];
        return view('admin.users', $data);
    }

    public function remove(User $user)
    {
        $currentUser = Auth::user();
        if (!$currentUser->sudo) {
            return $this->error('Вы не администратор!');
        }

        $user->delete();
        return $this->success('Успешно удален');
    }

    public function create(Request $request)
    {
        $currentUser = Auth::user();
        if (!$currentUser->sudo) {
            return $this->error('Вы не администратор!');
        }

        $pass = $request->password;
        $request->request->set('password', bcrypt($pass));
        $request->request->set('sudo', 0);
        /** @var User $newUser */
        $newUser = User::create($request->all());
        $newUser->realPass = $pass;
        Mail::send('emails.createuser', $newUser->toArray(), function ($m) use ($newUser) {
            $m->to($newUser->email, 'CRM SK')->subject('Вам открыт доступ!');
        });
        return $this->success('Пользователь успешно создан');
    }

    public function error($msg)
    {
        return response()->json(['success' => false, 'msg' => $msg]);
    }

    public function success($msg)
    {
        return response()->json(['success' => true, 'msg' => $msg]);
    }
}
