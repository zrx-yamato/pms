<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

class BaseController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // コンポーネントのロード
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize'=>['Controller'],
            'authenticate'=>[
                'Form'=>[
                    'fields'=>[
                        'username'=>'name',
                        'password'=>'password'
                    ]
                ]
            ],
            'loginRedirect'=>[
                'controller'=>'Users',
                'action'=>'index'
            ],
            'logoutRedirect'=>[
                'controller'=>'Users',
                'action'=>'login',
            ],
            'authError'=>'ログインしてください',
        ]);
    }

    // ログイン処理
    function login(){
        // Post処理
        if($this->request->isPost()){
            $user = $this->Auth->identify();
            // Authのidentifyをユーザーに設定
            if(!empty($user)){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('ユーザー名かパスワードが違います');
        }
    }
    // ログアウト処理
    public function logout(){
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }
    // 認証を使わないページの設定
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['login']);
    } 
    // 認証時のロールチェック
    public function isAuthorized($user = null){
        // 管理者はtrue
        if($user['role_id'] === 1){
            return true;
        }
        // 他はすべてfalse
        $this->Flash->error('そのアカウントではログイン出来ません');
        return false;
    }
}
