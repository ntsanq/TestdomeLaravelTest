<?php

class TextInput
{
    public $value = '';

    public function add($text)
    {
        $this->value = $this->value . $text;
    }

    public function getValue()
    {
        return $this->value;
    }
}

class NumericInput extends TextInput
{
    public function add($text)
    {
        if (is_numeric($text)){
            $this->value = $this->value . $text;
        }
    }
}

$input = new NumericInput();
$input->add('1');
$input->add('a');
$input->add('0');
echo $input->getValue();
