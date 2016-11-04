<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16/10/30
 * Time: 22:56
 */

namespace Web\Controllers;

use Framework\View\View;
use Framework\Validation\Validator;

class HomeController
{
    protected $db;

    public function __construct()
    {
        $this->db = new \mysqli('192.168.33.10', 'root', 'root', 'acaster');
        if ($this->db->connect_error) {
            die('Connect Error (' . $this->db->connect_errno . ') ' . $this->db->connect_error);
        }
    }

    public function index()
    {
        $this->channelList();
    }

    public function channelList()
    {

    }

    public function channel($id)
    {
        echo 'channel:' . $id;
    }

    public function register()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $view = View::make('register');
                View::process($view);
                break;

            case 'POST':
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $rules = [
                    'name' => 'required|min:3|max:16',
                    'email' => 'required|email',
                    'password' => 'required|min:6|Max:30'
                ];
                $err = [];
                $validator = new Validator($_POST, $rules);
                if ( !$validator->success ) {
                    $err = $validator->errors;
                }

                var_dump($err);

                if (empty($err['name'])) {
                    //验证用户是否存在
                    $sql = "select * from users WHERE name='" . $name . "'";
                    $result = $this->db->query($sql);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            $err['name'] = "this name already exists!";
                        }
                    } else {
                        $err['name'] = "query error!";
                    }
                }

                if (empty($email)) {
                    //验证用户是否存在
                    $sql = "select * from users WHERE email='" . $email . "'";
                    $result = $this->db->query($sql);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            $err['email'] = "this email already exists!";
                        }
                    } else {
                        $err['email'] = "query error!";
                    }
                }



                if ($err) {
                    $view = View::make('register');
                    $view->with('err', $err);
                    View::process($view);
                } else {
                    //注册新用户
                    $password = md5($password);
                    $sql = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$password')";
                    $result = $this->db->query($sql);
                    if($result){
                        echo $this->db->insert_id;

                    }else{

                    }

                }

                break;
        }


    }

    public function doRegister()
    {

    }

    public function login()
    {
        $view = View::make('login');
        View::process($view);
    }

    public function doLogin()
    {
        var_dump($_POST);
    }

    public function logout()
    {

    }


}