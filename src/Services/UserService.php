<?php
namespace App\Services;
use App\Models\User;
class UserService {

    public function getAll() {
        return User::where('is_active', 1)->get();
    }
    public function getById($id) {
        return User::find($id);
    }
    public function create($data) {
        return User::create($data);
    }
    public function update($id, $data) {
        $user = User::find($id);
        $user->fill($data);
        $user->save();
        return $user;
    }
    public function delete($id) {
        $user = User::find($id);
        $user->is_active = 0;
        $user->save();
    }
    
}