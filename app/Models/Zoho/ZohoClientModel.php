<?php

namespace App\Models\Zoho;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class ZohoClientModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'zoho__clients';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'hub_id',
        'app_id',
        'callbox',
        'https',
        'user',
        'user_id',
        'errno',
        'error_message',
        'created_at',
        'updated_at',
    ];

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
    protected $beforeInsert = ['beforeInsert'];
    protected $afterInsert = [];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    protected function beforeInsert(array $data){
        $data['data']['created_at'] = Time::now('America/Sao_Paulo', 'pt_BR');

        return $data;
    }

    protected function beforeUpdate(array $data){
        $data['data']['updated_at'] = Time::now('America/Sao_Paulo', 'pt_BR');

        return $data;
    }


}
