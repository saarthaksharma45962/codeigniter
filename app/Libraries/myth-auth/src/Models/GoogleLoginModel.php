<?php

namespace Myth\Auth\Models;

use CodeIgniter\Model;

class GoogleLoginModel extends Model
{
    protected $table      = 'google_login_users';
    protected $primaryKey = 'ID';

    //protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['oauth_id', 'email', 'name', 'last_name'];

    //protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    //protected $skipValidation     = false;


    public function google_user_exists($id)
    {
        $query = $this->getWhere(['oauth_id' => $id]);
        $data = $query->getResultArray();
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function update_google_user($data, $id)
    {
        if ($this->set($data)->where("oauth_id", $id)->update()) {
            return true;
        }
    }

    public function create_google_user($data)
    {
        $this->insert($data);
        if ($this->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
