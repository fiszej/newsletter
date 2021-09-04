<?php

class Email
{
    public string $address;
    public string $name;

    public function isValid()
    {
        if ( !filter_var($this->address, FILTER_VALIDATE_EMAIL )) {
            return false;
        }

        return true;
    } 

    public function validateName()
    {
        htmlspecialchars(strip_tags($this->name));
        return true;
    }

    public function isAdd($file) 
    {
        $data = file_get_contents($file);

        if (is_int(strpos($data, $this->address))) {
            return false;
        }
        return true;
    }
}