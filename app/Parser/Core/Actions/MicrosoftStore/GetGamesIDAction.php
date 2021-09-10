<?php


namespace App\Parser\Core\Actions\MicrosoftStore;


use App\Core\Abstracts\Actions\Action;
use App\Core\Structures\Set;
use App\Parser\Core\Data\Requests\GamesIDRequest;
use App\Parser\Core\Exceptions\MicrosoftStore\ParserErrorException;
use App\Core\Services\CurlService;

class GetGamesIDAction extends Action
{

    private int $linkCount;
    private Set $gamesId;
    private CurlService $curl;

    public function __construct(GamesIDRequest $request)
    {
        $this->request = $request;
        $this->linkCount = 0;
        $this->gamesId = new Set();
        $this->curl = new CurlService();
    }

    protected function run() : Set
    {
        $config = config('parser.parser_links'); // TODO I'm just too lazy to do Object =) Make it ok. Then =)
        $region = config('parser.regions.' . $this->request->region . '.gamesId');

        foreach ($config as $category) {
            $this->parsingUrl($category['startLink'] . $region . $category['finishLink']);
            $this->linkCount = 0; // Resetting the counter for parsing all pages of a certain category
        }

        return $this->gamesId;
    }

    private function parsingUrl(string $url) : void
    {
        $data = json_decode($this->curl->pars($url . $this->linkCount)->get()); // TODO And here we need to work with the processing of JSON data. But I'm a bitch so lazy!

        if (is_null($data)) {
            throw new ParserErrorException(422,
                'Ops! Error while parsing GamesID from Microsoft Store. Something is wrong with the parsing link being received. See action GetTopPaidGamesIDAction::parsingUrl');
        }

        if ( ! empty($data->Items)) {
            foreach ($data->Items as $game) {
                $this->gamesId->add($game->Id);
            }
            // Parse other IDs?
            if ($this->external) {
                $this->linkCount += 200;
                $this->parsingUrl($url);
            }
        }
    }
}
