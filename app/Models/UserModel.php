<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table          = 'user';
    protected $primaryKey     = 'user_id';
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'email',
        'password',
        'name',
        'phone_number',
        'role_id',
        'team_id',
        'updated_at',
        'image',
    ];
    protected $useTimestamps      = true;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getUserById($user_id) {
        $query = "SELECT * FROM user JOIN role
                    ON user.role_id = role.role_id 
                    LEFT JOIN team
                    ON user.team_id = team.team_id WHERE user_id='$user_id'";
        return $this->db->query($query)->getRowArray();
    }

    public function getAllMember() {
        $query = "SELECT * FROM user LEFT JOIN team
                    ON user.team_id = team.team_id  WHERE role_id='1'";
        return $this->db->query($query)->getResultArray();
    }

    public function getAllOwner() {
        $query = "SELECT * FROM user LEFT JOIN team
                    ON user.team_id = team.team_id  WHERE role_id='2'";
        return $this->db->query($query)->getResultArray();
    }

    public function getAllAdmin() {
        $query = "SELECT * FROM user LEFT JOIN team
                    ON user.team_id = team.team_id  WHERE role_id='3'";
        return $this->db->query($query)->getResultArray();
    }

    public function setAsMember($userId) {
        $query = "UPDATE user SET role_id='1' WHERE user_id='$userId'";
        return $this->db->query($query);
    }

    public function setAsOwner($userId) {
        $query = "UPDATE user SET role_id='2' WHERE user_id='$userId'";
        return $this->db->query($query);
    }

    public function setAsAdmin($userId) {
        $query = "UPDATE user SET role_id='3' WHERE user_id='$userId'";
        return $this->db->query($query);
    }

    public function changePassword($userId, $password) {
        $query = "UPDATE user SET password ='$password' WHERE user_id='$userId'";
        return $this->db->query($query);
    }
}
