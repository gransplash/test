<h2>Изменение новости</h2>
<form method="post">
    <label for="title">Заголовок новости</label>
    <input type="text" id="title" name="title" value="<?=$item->title?>">
    <label for="content">Содержание</label>
    <textarea id="content" name="content"><?=$item->content?></textarea>
    <input type="hidden" name="id" value="<?= $_GET['id'];?>">
    <input type=submit value="Сохранить" name="save">
</form>

<p><a href="/">вернуться к списку новостей сайта</a></p>
