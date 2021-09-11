<?php


namespace App\Parser\ParsedData\Data\Responses;


use App\Core\Abstracts\Data\Responses\Response;

class ErrorAllDataResponse extends Response
{

    protected bool $error = true;

    public function message($message = null): Response
    {
        $this->message = $message;

        return $this;
    }
}
