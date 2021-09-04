<?php


class Newsletter
{

    public const FILE = 'list/newsletter_list.txt';
    public const FILE_JSON = 'list/newsletter.json';
    
    public array $errors = [];

    public $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    public function addNewAdressToList()
    {   
        if (!$this->email->isValid()) {
            $this->errors['valid'] = 'Email adress is incorrect.';
        }

        if (!$this->email->isAdd(self::FILE)) {
            $this->errors['exists'] = 'This email adress already exists.';
        }

        $this->email->validateName();

        if (empty($this->errors)) {
            $this->errors['success'] = 'Thank You for subscribe';
            return $this->saveToJson();
        }
    }

    private function saveToTxt()
    {
        if (file_exists(self::FILE)) {
            $file = fopen(self::FILE, 'a+');
            fwrite($file, $this->email->address.' - '.$this->email->name."\n");
            fclose($file);
        }
    }

    private function saveToJson()
    {
        if (file_exists(self::FILE_JSON)) {
            $json = file_get_contents(self::FILE_JSON);
            $jsData = json_decode($json, true);

            $jsData[$this->email->name] = [$this->email->address];

            file_put_contents(self::FILE_JSON, json_encode($jsData, JSON_PRETTY_PRINT));
        }
    }


}