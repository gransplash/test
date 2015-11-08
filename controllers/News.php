<?php

namespace Application\Controllers;

use Applications\Models\News as NewsModel;
    
class News
{
    public function actionAll()
    {
        $news = NewsModel::findAll();
        $view = new \View();
        $view->items = $news;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = getIdArticle();
        $new = NewsModel::findOneByPk($id);
        if(empty($new)) {
            throw new \E404Ecxeption('Новость с таким id не найдена', 404);
        }
        $view = new \View();
        $view->item = $new;
        $view->display('news/one.php');
    }

    public function actionSpisok()
    {
        $news = NewsModel::findAll();
        $view = new \View();
        $view->items = $news;
        $view->display('news/spisok.php');
    }

    public function actionOneCol()
    {
        if($_POST){
            if(!empty($_POST['title'])) {
                $article = NewsModel::findOneByColumn('title', $_POST['title']);
                if(empty($article)) {
                    throw new E404Ecxeption('Ничего не найдено в базe', 404);
                }
            } else {
                $_SESSION['error'] = 'Вы ничего не ввели';
            }
        }
            $view = new \View();
            $view->items = $article;
            $view->display('news/onecol.php');
    }
}