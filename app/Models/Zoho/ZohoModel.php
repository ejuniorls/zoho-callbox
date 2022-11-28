<?php

namespace App\Models\Zoho;

use CodeIgniter\Model;

class ZohoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'zoho';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'client_id',
        'client_secret',
        'install_uri',
        'redirect_uri',
        'hapikey',
        'created_at',
        'updated_at',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = ['beforeInsert'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // --------- //

    private $clientId;
    private $clientSecretEU;
    private $clientSecretUS;
    private $redirectUrl;

    /**
     * ZohoClient constructor.
     * @param $clientId
     * @param $clientSecretEU
     * @param $clientSecretUS
     * @param $redirectUrl
     */
    public function __construct($clientId, $clientSecretUS, $clientSecretEU = null, $redirectUrl = null)
    {
        $this->clientId = $clientId;
        $this->clientSecretEU = $clientSecretEU;
        $this->clientSecretUS = $clientSecretUS;
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecretEU()
    {
        return $this->clientSecretEU;
    }

    /**
     * @return string
     */
    public function getClientSecretUS()
    {
        return $this->clientSecretUS;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

}
