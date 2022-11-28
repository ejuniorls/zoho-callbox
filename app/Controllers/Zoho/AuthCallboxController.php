<?php

namespace App\Controllers\Zoho;

use App\Controllers\BaseController;
use App\Models\Zoho\ZohoClientModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Psr\Log\LoggerInterface;

class AuthCallboxController extends BaseController
{
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger); // TODO: Change the autogenerated stub

        helper('form');
    }

    /***
     * @return string|void
     */
    public function index()
    {
        //
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('Zoho/auth/login', [
                'validation' => Services::validation(),
            ]);
        }

        $rules = [
            'callbox' => [
                'label' => 'Callbox',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório.',
                ],
            ],
            'user' => [
                'label' => 'Administrador',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório.',
                ],
            ],
            'password' => [
                'label' => 'Senha',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório.',
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            return view('Zoho/auth/login', [
                'validation' => $this->validator,
            ]);
        }

        $callbox = $this->request->getVar('callbox');
        $user = $this->request->getVar('user');
        $password = $this->request->getVar('password');

        $this->auth($callbox, $user, $password);
    }

    /**
     * @param string $callbox
     * @param string $user
     * @param string $password
     * @return mixed
     */
    public function auth(string $callbox, string $user, string $password)
    {
        //
        $model = new ZohoClientModel();

        $client = Services::curlrequest();

//        $body = [
//            'email' => '',
//            'senha' => ''
//        ];
//
//        $request = $client->post('https://jsonplaceholder.typicode.com/posts', [
//            'json' => $body
//        ]);

        if ($callbox == 'https://l5-dev.net.com.br') {

            // verifica se existe o usuário com o mesmo callbox e usuario do formulário de login
            $model->select('*');
            $model->where([
                'callbox' => $callbox,
                'user' => $user
            ]);

            if (sizeof($model->findAll()) == 0) {
                $data = [
                    'hub_id' => 'hub id',
                    'app_id' => 10,
                    'callbox' => $callbox,
                    'https' => 1,
                    'user' => $user,
                    'user_id' => 1,
                    'errno' => 1,
                    'error_message' => 'message'
                ];

                $model->save($data);
            }

            $model->select('*');
            $model->where([
                'callbox' => $callbox,
                'user' => $user
            ]);

            $client = $model->first();

            $this->setUserSession($client);

            return $this->response->redirect(site_url('zoho/dashboard'));

        } else {

            return $this->response->redirect(site_url('zoho/login'));
        }
    }

    public function setUserSession($client)
    {
        //
        $data = [
            'client_id' => $client['id'],
            'callbox' => $client['callbox'],
            'user' => $client['user'],
            'user_id' => $client['user_id'],
            'isLoggedIn' => true,
        ];

        session()->set($data);

        return true;
    }

    public function logout()
    {
        //
        session()->destroy();
        return redirect()->to('zoho/login');
    }


}
