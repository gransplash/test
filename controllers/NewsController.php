<?php
    
class NewsController
{
    public function actionAll()
    {
        $news = NewsModel::findAll();
        $view = new View();
        $view->items = $news;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $new = NewsModel::findOneByPk($id);
        $view = new View();
        $view->item = $new;
        $view->display('news/one.php');
    }

    public function actionSpisok()
    {
        $news = NewsModel::findAll();
        $view = new View();
        $view->items = $news;
        $view->display('news/spisok.php');
    }

    public function actionOneCol()
    {
        if($_POST){
            if(!empty($_POST['title'])) {
                $article = NewsModel::findOneByColumn('title', $_POST['title']);
            } else {
                $_SESSION['error'] = 'Вы ничего не ввели';
            }
        }
            $view = new View();
            $view->items = $article;
            $view->display('news/onecol.php');
    }
}