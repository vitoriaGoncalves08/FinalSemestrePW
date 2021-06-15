<?php

namespace App\Controller;

use App\Controller\Twig;

class AdminController extends Twig
{
    public function index()
    {
        $this->ward();
        header("Location: ".URL_MAIN."public/admin/dashboard");
    }
    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $data = json_decode(file_get_contents("php://input"));
            if(trim($data->email) === trim('admin@admin.com')
            && password_verify($data->password,password_hash('12345678', PASSWORD_DEFAULT)) == 1)
            {
                $name = explode(' ', $data->name);
                $_SESSION['user'] = password_hash($data->email,PASSWORD_DEFAULT);
                $_SESSION['data'] = $name[0];
                return Twig::loadJson('ok',200,"User session created.");
            }else
            {
                return Twig::loadJson('bad',404,"User not found.");
            }
        }
        else
        {
            if(isset($_SESSION['user']) || isset($_SESSION['data'])){
                header("Location: ".URL_MAIN."public/admin/dashboard");
            }else{
                echo $this->twig->render('./login.twig',['file'=>URL_MAIN.'public/']);
            }
        }
        // 
    }
    public function dashboard()
    {
        $this->ward();
        echo $this->twig->render('./private/dashboard.twig',['file'=>URL_MAIN.'public/']);
    }

    public function insert()
    {
        $this->ward();
        echo $this->twig->render('./private/insert.twig',['file'=>URL_MAIN.'public/']);
    }
    public function delete()
    {
        $this->ward();
        echo $this->twig->render('./private/delete.twig',['file'=>URL_MAIN.'public/']);
    }
    public function update()
    {
        $this->ward();
        echo $this->twig->render('./private/update.twig',['file'=>URL_MAIN.'public/']);
    }

    public function logout(){
        if(isset($_SESSION['user']) && isset($_SESSION['data'])){
            unset($_SESSION['user']);
            unset($_SESSION['data']);
            session_destroy();
        }
        $this->ward();
    }

    private function ward()
    {
        if(!isset($_SESSION['user']) || !isset($_SESSION['data'])){
            header("Location: ".URL_MAIN."public/admin/login");
        }
    }

}
