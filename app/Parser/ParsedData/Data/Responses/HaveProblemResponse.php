<?php


namespace App\Parser\ParsedData\Data\Responses;


use App\Core\Abstracts\Data\Responses\Response;

class HaveProblemResponse extends Response
{

    public function message($message = null): Response
    {
        $this->message = $message;

        return $this;
    }
}
