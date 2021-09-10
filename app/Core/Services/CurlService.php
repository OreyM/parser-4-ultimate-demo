<?php


namespace App\Core\Services;

class CurlService
{
    private ?string $content;

    public function __construct()
    {
        $this->content = null;
    }

    public function pars(string $url)
    {
        $ch = curl_init();
        $this->content = null;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $this->content = curl_exec($ch);
        curl_close($ch);

        return $this;
    }

    public function get() : string
    {
        return $this->content;
    }
}
