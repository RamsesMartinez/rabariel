<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;
use Hash;

class User extends Model{
    
    public function profiles()
    {
        return $this->hasMany('Profile');
    }
    
    static public function validateUser($email, $pwd){
        
        $valid = false;
        
        $sql = "SELECT * FROM users u "
                . "JOIN users_role r ON u.id = r.uid "
                . "WHERE u.email = ?";
        
        $user = DB::select($sql,[$email]);
        
        if($user){
            $user = $user[0];
            if (Hash::check($pwd, $user->password)){
                $valid = true;
                if($user->rid == 3){
                    Session::set('is_admin', true);
                }
                Session::set('user_id', $user->id);
                Session::set('user_name', $user->name);
                Session::flash('sm', 'Bienvenido de vuelta ' . $user->name);
            }
        }
        
        return $valid;

    }

    static public function saveUser($request){
        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $user->id;
        $new_id = $user->id;
        $sql = "INSERT INTO users_role VALUES($new_id, 4)";
        DB::insert($sql);
        Session::flash('sm', 'Tu cuenta fue creada exitosamente, ya puedes entrar');
    }

    static public function createUser($request){
        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $user->id;
        $new_id = $user->id;
        $sql = "INSERT INTO users_role VALUES($new_id, 4)";
        DB::insert($sql);
        Session::flash('sm', 'Usuario creado exitosamente, ya puedes entrar');
    }

    static public function updateUser($request, $id){

        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];

        $user->save();
        Session::flash('sm', 'El usuario fue actualizado');

    }

}
