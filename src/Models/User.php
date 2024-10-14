<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['name', 'lastname', 'username', 'password', 'birthdate', 'is_active'];
    protected $hidden = ['password'];
    public $timestamps = true;    
}