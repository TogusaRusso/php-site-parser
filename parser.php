<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
<body>
<form action="parser.php" method="post">
  <input type='url' name='url'>
</form>
<?php

$url = $_POST['url'];
if ($url) {
  include('simple_html_dom.php');

  if (!url_valid($url)) 
    die('URL указывает на несуществующую страницу');

  // Create DOM from URL
  $html = file_get_html($url);

  // Find all headers 
  $headers = $html->find('h1');
  if (!count($headers)) 
    die('Заголовков не найдено');
  
  foreach($html->find('h1') as $element) 
    echo $element->innertext . '<br>';
}

function url_valid($url){
   $headers=get_headers($url);
   return stripos($headers[0],"200 OK")?true:false;
}
?>
</body>
</html>