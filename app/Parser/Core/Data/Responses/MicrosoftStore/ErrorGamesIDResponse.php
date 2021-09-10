<?php


namespace App\Parser\Core\Data\Responses\MicrosoftStore;


use App\Core\Abstracts\Data\Responses\Response;

class ErrorGamesIDResponse extends Response
{
    protected bool $error = true;

    public function message($message = null): Response
    {
        $this->message = $message;

        return $this;
    }
}
