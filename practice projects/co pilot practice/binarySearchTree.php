<?php
class Node {
    public $value;
    public $left;
    public $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    public function insert($value) {
        $node = new Node($value);

        if ($this->root === null) {
            $this->root = $node;
            return;
        }

        $current = $this->root;

        while (true) {
            if ($value < $current->value) {
                if ($current->left === null) {
                    $current->left = $node;
                    return;
                } else {
                    $current = $current->left;
                }
            } else if ($value > $current->value) {
                if ($current->right === null) {
                    $current->right = $node;
                    return;
                } else {
                    $current = $current->right;
                }
            } else {
                return;
            }
        }
    }

    public function search($value) {
        $current = $this->root;

        while ($current !== null) {
            if ($value === $current->value) {
                return $current;
            } else if ($value < $current->value) {
                $current = $current->left;
            } else {
                $current = $current->right;
            }
        }

        return null;
    }
    public function showHelper($current){
        if($current !== null){
            $this->showHelper($current->left);
            echo $current->value . PHP_EOL;
            $this->showHelper($current->right);
        }
    }
    public function show(){
        $current = $this->root;
        $this->showHelper($current);
    }
    public function randomlyFill($count){
        for($i = 0; $i < $count; $i++){
            $this->insert(rand(1, 100));
        }
    }
    public function printWithSpacesHelper($current, $spaces){
        if($current !== null){
            $this->printWithSpacesHelper($current->left, $spaces + 1);
            echo str_repeat(" ", $spaces) . $current->value;
            $this->printWithSpacesHelper($current->right, $spaces + 1);
        }
    }

    public function printWithSpaces(){
        $current = $this->root;
        $this->printWithSpacesHelper($current, 0);
    }
}

$tree = new BinarySearchTree();


$tree->randomlyFill(20);
$tree->printWithSpaces();