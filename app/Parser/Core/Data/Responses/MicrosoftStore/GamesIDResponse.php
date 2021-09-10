<?php


namespace App\Parser\Core\Data\Responses\MicrosoftStore;


use App\Core\Abstracts\Data\Responses\Response;

class GamesIDResponse extends Response
{

    public function message($message = null): Response
    {
        $this->message = $message;

        return $this;
    }
}
