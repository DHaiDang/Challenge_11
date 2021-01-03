<?php
  class File
  {
    public $filename = 'hack.txt';
    public $data = 'Hello Dang'; 
    function __destruct(){
      file_put_contents($this->filename, $this->data);
    }
  }