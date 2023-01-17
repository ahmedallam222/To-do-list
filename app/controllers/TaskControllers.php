<?php

namespace App\controllers;

use App\Core\request;
use App\Database\QueryBuilder;

//مسؤول عن العمليات التي نجريها ع الجدول تاسكس
class TaskControllers
{

    //عملية عرض الصفحة الرئيسية
    public function index()
    {
        $completed = request::get('completed');
        if($completed != null){
            $tasks = QueryBuilder::get('tasks', ['completed', '=', $completed]);
        }else{
            $tasks = QueryBuilder::get('tasks');
        }

        require 'resources/index.view.php';
    }

    //عملية انشاء تاسك
    public function create()
    {
        $description =  request::get('description');
        QueryBuilder::insert('tasks', [
            'description' => $description
        ]);
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }




    public function update()
    {
        $id = Request::get('id');
        $completed = Request::get('completed');
        if ($id && $completed != null) 
        {
            QueryBuilder::update('tasks', $id,
             ['completed' => $completed
             ]);
        }
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }






    // عملية حذف تاسك
    public function delete()
    {
        if ($id = request::get('id')) 
        {
            QueryBuilder::delete('tasks', $id);
        }

        header("Location: {$_SERVER['HTTP_REFERER']}");
    }


        
}
