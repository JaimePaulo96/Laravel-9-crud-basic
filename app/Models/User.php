<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Requests\StoreUpdateUserForm;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user',
        'password',        
        'occupation',              
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsers(string|null $search = null ){
        
        $users = $this->where(function($query) use ($search){
            if($search){
                $query->where('name', 'LIKE', "%{$search}%");
                $query->orWhere('user', 'LIKE', "%{$search}%");
                $query->orWhere('occupation', 'LIKE', "%{$search}%");
            }            
        })->get();

        return $users;

    }

    public function storeUser(StoreUpdateUserForm $request, array $data){

        $data['password'] =  bcrypt($request->password);
        
        //salva os dados no banco com a função        
        $user = User::create($data);

        return $user;
    }

   

}
