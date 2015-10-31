<?php

class View
{    
    protected $data = [];
    private $position = 0;
    
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }
    
    public function __get($k)
    {
        return $this->data[$k];
    }
    
    public function render($template)
    {
        foreach($this->data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }
}