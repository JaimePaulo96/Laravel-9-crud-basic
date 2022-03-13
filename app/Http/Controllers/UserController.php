<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserForm;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $search = $request->search;
       
        $users = $this->model
                        ->getUsers(search: $search ?? null); 

        return view('users.index', compact('users') );
    }

    public function show($id)
    {
        
        if (!$user =$this->model->find($id)) {
            return redirect()->back();
        }

        return view('users.show', compact('user'));
    }

    public function create()
    {
        
        return view('users.create');
    
    }

    public function store(StoreUpdateUserForm $request)
    {
        
        $data = $request->all();        
        
        $user = $this->model->storeUser($request, data: $data);        
        
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
       
        if (!$user =$this->model->find($id)) {
            return redirect()->route('users.index');
        }
        
        
        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserForm $request, $id)
    {
        
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        $data = $request->only('name', 'user', 'occupation', 'level');        
       
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        
        if (!$user = User::find($id)) {
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('users.index');
    }
}
