<?php
    class Parser {
        public $url;
        public $error;
        public $elements;
        private $tag;
        
        public function __construct($tag) {
            $this->tag = $tag;
        }
        
        public function parse($url) {
            $this->url = $url;
            $this->error = null;
            $this->elements = [];
            if (!$this->url_valid($url)) {
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
            } 
    
            foreach($elements as $element)
                $this->elements[] =  $element->textContent;
        }

        // Check is URL valid, using headers
        private function url_valid($url){
            $headers=get_headers($url);
            return stripos($headers[0],"200 OK")?true:false;
        }

    }
?>