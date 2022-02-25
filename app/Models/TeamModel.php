<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table          = 'team';
    protected $primaryKey     = 'team_id';
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'team'
    ];
    protected $useTimestamps      = true;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getDetailTeam($teamId){
        $query = "SELECT * FROM team LEFT JOIN user ON team.team_id = user.team_id WHERE team.team_id='$teamId'";
        return $this->db->query($query)->getResultArray();
    }

    public function getTeamFromName($team){
        $query = "SELECT * FROM team WHERE team='$team'";
        return $this->db->query($query)->getRowArray();
    }

    public function getAllTeam(){
        $query = "SELECT team.team_id, team, count(team) AS count 
FROM user LEFT JOIN team ON team.team_id = user.user_id
WHERE user.team_id != 'null'
GROUP BY team";
        return $this->db->query($query)->getResultArray();
    }

    public function joinTeam($teamId, $userId){
        $query = "UPDATE user SET team_id = '$teamId' WHERE user_id='$userId'";
        return $this->db->query($query);
    }
    public function exitTeam($userId, $teamId){
        $query = "UPDATE user SET team_id = null WHERE user_id='$userId'";
        $this->db->query($query);
        $query = "SELECT count(name) AS count FROM user WHERE team_id='$teamId'";
        $result = $this->db->query($query)->getRowArray();
        if($result['count'] < 1) {
            $query = "DELETE FROM team WHERE team_id='$teamId'";
            $this->db->query($query);
        }
    }

}
