<?php
namespace App\Config;
use App\Models\user;

class customValidation {
    public function existingAcc(string $str, string $fields, array $data) {
        $model = new user();

        $user = $model->where('email', $data['eaddress'])->first();

        if (!$user) {
            return false;
        } else {
            return true;
        }
    }

    public function validateUser(string $str, string $fields, array $data) {
        $model = new user();

        $user = $model->where('email', $data['eaddress'])->first();

        if ($user) {
            return password_verify($data['pass'], $user['password']);
        } else {
            return null;
        }
    }
}
?>