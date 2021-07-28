<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectsModel extends Model
{
    protected $table      = 'projects';
    protected $primaryKey = 'ID';

    //protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['Project_Name', 'Description', 'Status', 'Client_Company', 'Project_Leader', 'Estimated_Budget', 'Amount_Spent', 'Project_Duration', "File_Names", 'File_Sizes'];

    //protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    //protected $skipValidation     = false;

    public function save_data($data)
    {
        $this->insert($data);
    }

    // Method for selecting all the data from the database
    public function get_records()
    {
        $query = $this->get();
        $row = $query->getResultArray();
        return $row;
    }

    // function to access details of the project from the database
    public function project_info($id)
    {
        $query = $this->getWhere(['ID' => $id]);
        $project_data = $query->getResultArray();
        return $project_data;
    }

    // function to delete a project
    public function projectdelete($id)
    {
        $flag = 0;
        if ($this->delete($id)) {
            $flag = 1;
        }
        return $flag;
    }

    // function to update project details in the database
    public function update_project($id, $updated_data)
    {
        $flag = 0;
        if ($this->set($updated_data)->where("ID", $id)->update()) {
            $flag = 1;
            // return $flag;
            return $flag;
        }
    }

    //function to delete a particular file
    public function delete_file($id, $filename, $filesize)
    {
        $query = $this->getWhere(['ID' => $id]);
        $data = $query->getResultArray();
        $to_delete_file = $filename;
        $to_delete_size = $filesize;

        $path = 'assets/uploads/' . $to_delete_file;
        if (unlink($path)) {

            $updated_file = str_replace($to_delete_file.',', "", $data[0]['File_Names']);
            $updated_size = str_replace($to_delete_size.',', "", $data[0]['File_Sizes']);

            $updated_details = [
                'File_Names' => $updated_file,
                'File_Sizes' => $updated_size
            ];

            if ($this->set($updated_details)->where("ID", $id)->update()) {
                $flag = 1;
                return $flag;
            }
        }
    }
}
