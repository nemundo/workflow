<?php

namespace Nemundo\Workflow\App\SearchEngine\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\SearchEngine\Form\SearchEngineForm;
use Nemundo\Workflow\App\SearchEngine\Reader\SearchEngineReader;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineSite;

class SearchEngineWidget extends AbstractAdminWidget
{


    protected function loadWidget()
    {
        $this->widgetTitle = 'Suchmaschine';
        $this->widgetSite = SearchEngineSite::$site;

    }


    public function getContent()
    {

        $form = new SearchEngineForm($this);

        $keyword = $form->getKeyword();

        if ($keyword !== '') {


            $searchEngineReader = new SearchEngineReader();
            $searchEngineReader->keyword = $keyword;

            $table = new AdminClickableTable($this);

            foreach ($searchEngineReader->getData() as $searchEngineItem) {

                $row = new BootstrapClickableTableRow($table);

                $row->addText($searchEngineItem->title);
                $row->addText($searchEngineItem->source);
                $row->addClickableSite($searchEngineItem->site);

            }

        }

        return parent::getContent();

    }

}