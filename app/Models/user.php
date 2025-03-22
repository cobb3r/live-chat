<?php namespace App\Models;

use CodeIgniter\Model;

class user extends Model {
    protected $table = 'users';
    protected $allowedFields = ['id', 'firstName', 'lastName', 'email', 'password'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data; 
    }

    protected function beforeUpdate(array $data) {
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data; 
    }
}

?>