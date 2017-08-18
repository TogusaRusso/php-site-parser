<form action="index.php" method="post">
  <input type='url' name='url' value='<?php echo $url ?>'>
</form>
<?php
    if ($error)
        echo $error.'<br>';
    if ($elements)
        foreach($elements as $element)
            echo $element.'<br>';
?>
