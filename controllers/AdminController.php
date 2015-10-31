<?php
    
class AdminController
{
    public function actionAdd()
    {
        $view = new View();
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
        $id = $_GET['id'];
        $new = NewsModel::findOneByPk($id);
        $view = new View();
        $view->item = $new;
        $view->display('admin/update.php');
        
        if(isset($_POST['save'])) {
            $article = new NewsModel();
            $article->id = $_POST['id'];
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->save();
        }
    }
    
    public function actionDelete()
    {
        $id = $_GET['id'];
        $new = NewsModel::findOneByPk($id);
        $article = new NewsModel();
        $article->id = $id;
        $article->delete();
        header('Location: /');
    }
}