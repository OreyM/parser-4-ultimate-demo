<?php


namespace App\Parser\Core\Data\Responses\Parser;


use App\Core\Abstracts\Data\Responses\Response;

class ErrorStartParserResponse extends Response
{

    protected bool $error = true;

    public function message($message = null): Response
    {
        $this->message = $message;

        return $this;
    }
}
