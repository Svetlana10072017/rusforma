<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\UserRequest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::paginate(10);//макс кол-во товаров отображаемых на странице
        //$products = Product::get();
        return view('auth.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('auth.users.form');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $params = $request->all();
        User::create($params);//передаем в параметры в create
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('auth.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('auth.users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $params = $request->all();




        if (!isset($params['role_admin'])) {
            $params['role_admin'] = 0;
        }
        if($params['role_admin']==='on'){
            $params['role_admin']=1;

        }
        else{
            $params['role_admin']=0;

        }



        $user->update($params);//обновление параметров категории
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->orders()->delete();
        $user->delete();//удаляет категории
        return to_route('users.index');
    }
}
