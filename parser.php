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
  if (url_valid($url)) {
    // Create DOM from URL or file
    $html = file_get_html($url);
  
    // Find all headers 
    $headers = $html->find('h1');
    if (count($headers)) {
      foreach($html->find('h1') as $element) 
        echo $element->innertext . '<br>';
    } else {
      die('Заголовков не найдено');
    }
  } else {
    die('URL указывает на несуществующую страницу');
  }  
}
function url_valid($url){
   $headers=get_headers($url);
   return stripos($headers[0],"200 OK")?true:false;
}
?>
</body>
</html>