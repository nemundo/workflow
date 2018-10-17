<?php

namespace Nemundo\Workflow\App\SearchEngine\Site;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\SearchEngine\Form\SearchEngineForm;
use Nemundo\Workflow\App\SearchEngine\Reader\SearchEngineReader;

class SearchEngineSite extends AbstractSite
{

    /**
     * @var SearchEngineSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Suchmaschine';
        $this->url = 'app-suchmaschine';

        new SearchEngineJsonSite($this);

    }


    protected function registerSite()
    {
        SearchEngineSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $form = new SearchEngineForm($page);


        $table = new AdminTable($page);


        $reader = new SearchEngineReader();
        $reader->keyword = $form->getKeyword();
        foreach ($reader->getData() as $searchEngineItem) {

            $row = new TableRow($table);
            $row->addSite($searchEngineItem->site);
            $row->addText($searchEngineItem->source);

        }


        $page->render();


    }

}