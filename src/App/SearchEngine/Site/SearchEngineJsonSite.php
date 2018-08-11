<?php

namespace Nemundo\Workflow\App\SearchEngine\Site;


use Nemundo\Core\Json\Document\JsonResponse;
use Nemundo\Web\Http\Request\GetRequest;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\SearchEngine\Data\Word\WordReader;


class SearchEngineJsonSite extends AbstractSite
{

    /**
     * @var SearchEngineJsonSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'search-engine-json';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        SearchEngineJsonSite::$site = $this;
    }


    public function loadContent()
    {

        $term = new GetRequest('term');

        $json = new JsonResponse();

        $wordReader = new WordReader();
        $wordReader->filter->andContainsLeft($wordReader->model->word, $term->getValue());
        $wordReader->addOrder($wordReader->model->word);
        $wordReader->limit = 20;
        foreach ($wordReader->getData() as $wordRow) {
            $json->addRow($wordRow->word);
        }

        $json->render();

    }

}