<?php

namespace Nemundo\Workflow\App\SearchEngine\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexReader;
use Nemundo\Workflow\App\SearchEngine\Form\SearchEngineForm;
use Nemundo\Workflow\App\SearchEngine\Reader\SearchEngineReader;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineSite;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;

class SearchEngineWidget extends AbstractAdminWidget
{


    protected function loadWidget()
    {
        $this->widgetTitle = 'Suchmaschine';
        $this->widgetSite = SearchEngineSite::$site;

    }


    public function getHtml()
    {

        $this->widgetTitle = 'Suchmaschine';


        $form = new SearchEngineForm($this);


        $keyword = $form->getKeyword();

        if ($keyword !== '') {


            $searchEngineReader = new SearchEngineReader();
            $searchEngineReader->keyword = $keyword;

            /*$indexReader = new SearchIndexReader();
            $indexReader->model->loadWord();
            $indexReader->model->loadDocument();
            $indexReader->model->document->loadContentType();


            $indexReader->filter->andEqual($indexReader->model->word->word, $keyword);*/

            /*if ($searchTypeListBox->getValue() !== '') {
                $indexReader->filter->andEqual($indexReader->model->applicationTypeId, $searchTypeListBox->getValue());
            }*/


            $table = new AdminClickableTable($this);

            foreach ($searchEngineReader->getData() as $searchEngineItem) {

                $row = new BootstrapClickableTableRow($table);

                $row->addText($searchEngineItem->title);
                $row->addText($searchEngineItem->source);
                $row->addClickableSite($searchEngineItem->site);


                /*$className = $indexRow->document->contentType->contentTypeClass;

                /** @var AbstractContentType $contentType */
                /*$contentType = new $className($indexRow->document->dataId);

                $title = $contentType->getSubject();
                $title = preg_replace('/(' . $keyword . ')/i', '<b>$1</b>', $title);
                $row->addText($title);

                $row->addText($contentType->contentName);

                $row->addClickableSite($contentType->getViewSite());*/

            }

        }

        return parent::getHtml();

    }

}