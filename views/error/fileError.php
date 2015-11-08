<!DOCTYPE html>
<html>
    <head>
        <title>Ошибка</title>
    </head>
    <body>
    <?php if(!$order): ?>
    <h1>Журнал ошибок пуст</h1>
    <?php else: ?>
    <h1>Логи ошибок</h1>

    <table border="1">
        <tr>
            <th>Дата</th>
            <th>Сообщение</th>
            <th>Код</th>
            <th>Путь</th>
        </tr>
    <?php foreach($order as $item): ?>
        <tr>
            <?php $item = explode(", ", $item); ?>
            <?php foreach($item as $val): ?>
            <td><?=$val;?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    <?php endif; ?>
    </table>
    </body>
</html>
