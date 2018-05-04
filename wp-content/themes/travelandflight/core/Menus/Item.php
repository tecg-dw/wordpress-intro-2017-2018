<?php

/**
 * Base menu item
 */
class Item
{

    protected $post;

    public $url;

    public $label;

    public $classes = [];
    
    function __construct($post)
    {
        $this->post = $post;
        $this->url = $post->url;
        $this->label = $post->title;
        $this->classes = $this->getSanitizedClasses($post->classes);
    }

    public function getBemClasses($base)
    {
        return taf_get_bem($base, $this->classes);
    }

    protected function getSanitizedClasses($classes)
    {
        return array_filter($classes, function($string) {
            if(!is_string($string) && !is_numeric($string)) return false;
            if(strlen($string)) return true;
        });
    }
}