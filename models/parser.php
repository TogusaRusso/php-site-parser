<?php
class Parser 
{
    // url of parsed page
    public $url;
    // error message, if no errrors, then null
    public $error;
    // found elements
    public $elements;
    // tag by which search elements
    private $tag;
    
    public function __construct($tag)
    {
        $this->tag = $tag;
    }
    
    // loads webpage by $url, finds all $tag elements
    // stores results in public properties
    public function parse($url)
    {
        $this->url = $url;
        $this->error = null;
        $this->elements = [];
        if (!$this->urlValid($url)) {
            $this->error = 'URL указывает на несуществующую страницу';
            return;
        }

        // Create DOM from URL
        $dom = new DOMDocument(); 
        // Load the url's contents into the DOM
        @$dom->loadHTMLFile($url);

        // Find all elements by tag
        $elements = $dom->getElementsByTagName($this->tag);
        if (!$elements->length) {
            $this->error = 'Заголовков не найдено';
            return;
        } 
        foreach ($elements as $element)
            $this->elements[] = $element->textContent;
    }

    // Checks is URL valid using headers
    private function urlValid($url)
    {
        $headers = get_headers($url);
        return stripos($headers[0],"200 OK")?true:false;
    }
}
