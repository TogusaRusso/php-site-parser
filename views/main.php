<form action="index.php" method="post">
    <div class='input-field'>
        <input type='url' name='url' value='<?= $url ?>' class='validate'>
        <label for='url'>Введите url..</label>
    </div>
</form>
<?php if ($elements) { ?>
    <ul class='collection'>
        <?php foreach ($elements as $element) { ?>
            <li class='collection-item'><?= $element ?></li>
        <?php } ?>
    </ul>
<?php } ?>
<?php if ($error) { ?>
    <div class='card-panel red'><?= $error ?></div>
<?php } ?>
