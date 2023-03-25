<?php

class Stack {
    private $stack;

    public function __construct() {
        $this->stack = array();
    }

    public function push($item) {
        array_push($this->stack, $item);
    }

    public function pop() {
        if ($this->isEmpty()) {
            throw new Exception("Stack is empty");
        }
        return array_pop($this->stack);
    }

    public function peek() {
        if ($this->isEmpty()) {
            throw new Exception("Stack is empty");
        }
        return end($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }

    public function size() {
        return count($this->stack);
    }
    public function randomlyFill($size){
        for($i = 0; $i < $size; $i++){
            $this->push(rand(1, 100));
        }
    }
    public function popAndShow(){
        while(!$this->isEmpty()){
            echo $this->pop() . PHP_EOL;
        }
    }
}


$stack = new Stack();

$stack->randomlyFill(10);
$stack->popAndShow();




