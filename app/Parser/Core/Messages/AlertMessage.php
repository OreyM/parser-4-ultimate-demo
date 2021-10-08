<?php


namespace App\Parser\Core\Messages;


class AlertMessage
{
    public function parsingError(\Exception $error) : array
    {
        return [
            'alert' => [
                'title'   => 'Parsing error!',
                'message' => $error->getMessage(),
            ],
        ];
    }

    public function finishParsingWithTime($time) : array
    {
        return [
            'alert' => [
                'title'     => 'Finished parsing!',
                'message'   => "Parsing finished within {$time}"
            ],
        ];
    }
}
