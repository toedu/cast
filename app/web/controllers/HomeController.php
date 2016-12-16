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
        session_start();

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
        $view = View::make('list');
        View::process($view);
    }

    public function channel($id)
    {
        $userName = "";
        if($_SESSION && $_SESSION['user']){
            $userName = $_SESSION['user']['name'];
        }
        $view = View::make('channel');
        $view->with('roomId', $id);
        $view->with('userName', $userName);
        View::process($view);
    }

    public function cast()
    {
        $view = View::make('cast');
        View::process($view);
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
                if (!$validator->success) {
                    $err = $validator->errors;
                }

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
                    $view->with('title', 'sign up');
                    $view->with('err', $err);
                    $view->with('data', $_POST);
                    View::process($view);
                } else {
                    //注册新用户
                    $password = md5($password);
                    $created_at = date('Y-m-d H:i:s');
                    $updated_at = date('Y-m-d H:i:s');
                    $sql = "INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`) 
                                      VALUES ('$name', '$email', '$password', '$created_at', '$updated_at')";
                    $result = $this->db->query($sql);
                    if ($result) {
                        $id = $this->db->insert_id;
                        
                        $_SESSION['user'] = array('id'=>$id, 'name'=>$name);
                        header("location:/");
                    } else {

                    }

                }

                break;
        }


    }

    public function login()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $view = View::make('login');
                $view->with('title', 'login');
                View::process($view);
                break;

            case 'POST':
                $name = $_POST['name'];
                $password = $_POST['password'];
                $rules = [
                    'name' => 'required|min:3|max:16',
                    'password' => 'required|min:6|Max:30'
                ];

                $err = [];
                $validator = new Validator($_POST, $rules);
                if (!$validator->success) {
                    $err = $validator->errors;
                }

                if (empty($err['name']) && empty($err['password'])) {
                    //验证用户是否存在
                    $sql = "select * from users WHERE name='" . $name . "'";
                    $result = $this->db->query($sql);
                    if ($result) {
                        if ($result->num_rows == 0) {
                            $err['name'] = "this name is not exists!";
                        }else{
                            $user = $result->fetch_assoc();
//                            var_dump($user);
                            if($user['password'] == md5($password)){
                                $_SESSION['user'] = array('id'=>$user['id'], 'name'=>$user['name']);
                                header("location:/");
                            }else{
                                $err['password'] = "this name is not match!";
                            }
                        }
                    } else {
                        $err['name'] = "query error!";
                    }
                }

                $view = View::make('login');
                $view->with('title', 'login');
                $view->with('err', $err);
                $view->with('data', $_POST);
                View::process($view);
                break;
        }
    }


    public function logout()
    {
        unset($_SESSION['user']);
        header("location:/");
    }


}