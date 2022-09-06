<?php

class Provider
{
    public $ch;
    protected string $url = '';

    public function __construct()
    {
        $this->ch = curl_init($this->url);
    }
}
