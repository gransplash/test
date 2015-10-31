<?php include_once 'inc/menu.php'; ?>

<h2>Поиск по названию новости</h2>
<form method="post">
    <label for="title">Заголовок новости</label>
    <input type="text" id="title" name="title" value="<?=$item->title?>">
    <?=$_SESSION['error']?>
    <input type=submit value="Поиск" name="save">
</form>
<?php if(isset($items)): ?>
    <?php foreach ($items as $item): ?>
    <ul>
        <li>
            <a href="?ctrl=news&act=one&id=<?=$item->id;?>"><?=$item->title?></a>
        </li>
    </ul>
    <?php endforeach; ?>    
<?php endif; ?>
<?php unset($_SESSION['error']) ?>
<p><a href="/">вернуться к списку новостей сайта</a></p>