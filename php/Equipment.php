<?php

    class Equipment{
        public $item;
        public $category;
        function __construct($item,$category)
        {
            $this->item = $item;
            $this->category = $category;
        }
    }

?>