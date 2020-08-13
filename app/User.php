<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUsersList()
    {
        $data = [];

        if ( !empty(request('id')) ) {
            $idList = explode(',', request('id'));
            $res = User::whereIn('id', $idList )->select('id', 'name', 'email', 'phone', 'city')->get();

            $data['message'] = 'Success'; // might not be required since we are return only JSON in all cases.
            if ( empty(request('fmt')) ) $data['data'] = $res;
            else $data['data'] = self::convertToString($res);

            return $data;
        }
        return $data['message'] = 'Please pass id as comma seperated values.';
    }

    public static function convertToString($data)
    {
        $csv = '';

        if ( !empty($data) ) {
            foreach ($data as $key => $value) {
                $csv .= implode(',', [ $value->id, $value->name, $value->email, $value->phone, $value->city ] );
            }
        }
        return $csv;
    }

    public static function getUsers()
    {
        return User::limit(20)->select('id', 'name', 'email', 'phone', 'city')->get();
    }

    public static function addUser()
    {
        $user = [
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'city' => request('city'),
        ];

        return User::create($user);
    }

    public static function updateUser($id)
    {
        if( $id == request('id') ) {
            $user = [
                'name' => request('name'),
                'email' => request('email'),
                'phone' => request('phone'),
                'city' => request('city'),
            ];

            return User::where('id', $id)->update($user);
        }
    }

    public static function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
    }

}
