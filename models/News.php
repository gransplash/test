<?php

class News
extends AbstactModel
{
    public $id;
    public $title;
    public $text;
    
    protected static $table = 'news';
    protected static $class = 'News';
    
}