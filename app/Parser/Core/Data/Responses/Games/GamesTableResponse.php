<?php


namespace App\Parser\Core\Data\Responses\Games;


use App\Core\Abstracts\Data\Responses\Response;

class GamesTableResponse extends Response
{

    public function message($message = null): Response
    {
        $this->message = $message;

        return $this;
    }
}
