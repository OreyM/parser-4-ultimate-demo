<?php


namespace App\Parser\Core\Data\Responses\Parser;


use App\Core\Abstracts\Data\Responses\Response;

class FinishParserResponse extends Response
{

    public function message($message = null): Response
    {
        $this->message = $message;

        return $this;
    }
}
