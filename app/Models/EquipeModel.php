<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipeModel extends Model
{
    protected $table = 'equipe';
    protected $primaryKey = 'idequipe';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'titulo',
    ];

    function getEquipe($idequipe)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('equipe');
        $builder->select('*');
        $builder->join('equipe_funcionario', 'equipe_funcionario.equipe_idequipe = equipe.idequipe');
        $builder->join('funcionario', 'funcionario.idfuncionario = equipe_funcionario.funcionario_idfuncionario');
        if($idequipe != null)
            $builder->where('equipe.idequipe', $idequipe);
        $query = $builder->get();
        return $query->getResultArray();
    }

    function deleteEquipe($idequipe)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('equipe_funcionario');
        $builder->where('equipe_idequipe', $idequipe);
        $builder->delete();

        $builder = $db->table('equipe');
        $builder->where('idequipe', $idequipe);
        $builder->delete();
        
    }

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}

