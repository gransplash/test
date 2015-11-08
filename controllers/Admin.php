<?php

namespace Application\Controllers;

use Applications\Models\News as NewsModel;
    
class Admin
{
    public  function actionLog()
    {
        $view = new \View();
        $view->order = file('error/error.txt');
        $view->display('error/fileError.php');
    }

    public function actionAdd()
    {
        $view = new \View();
        $view->display('admin/add.php');
        
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $article = new NewsModel();
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->save();
        }
    }
    
    public function actionUpdate()
    {
        $id = getIdArticle();
        $new = NewsModel::findOneByPk($id);
        $view = new \View();
        $view->item = $new;
        $view->display('admin/update.php');
        
        if(isset($_POST['save'])) {
            $article = new NewsModel();
            $article->id = getIdArticle();
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->save();
        }
    }
    
    public function actionDelete()
    {
        $id = getIdArticle();
        $article = new NewsModel();
        $article->id = $id;
        $article->delete();
        header('Location: /');
    }
}