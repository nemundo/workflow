<?php

namespace Nemundo\Workflow\App\SearchEngine\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexReader;

class SearchEngineReader extends AbstractDataSource
{

    /**
     * @var string
     */
    public $keyword;

    /**
     * @return SearchEngineItem[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        if ($this->keyword !== '') {


            $indexReader = new SearchIndexReader();
            $indexReader->model->loadWord();
            $indexReader->model->loadContentType();
            //$indexReader->model->loadResult();

            //$indexReader->model->loadApplicationType();
            //$indexReader->model->loadSearchText();
            $indexReader->filter->andEqual($indexReader->model->word->word, $this->keyword);

            /*if ($searchTypeListBox->getValue() !== '') {
                $indexReader->filter->andEqual($indexReader->model->applicationTypeId, $searchTypeListBox->getValue());
            }*/


            //$table = new AdminClickableTable($this);

            foreach ($indexReader->getData() as $indexRow) {

                //$row = new BootstrapClickableTableRow($table);
                //$row->addText($indexRow->workflow->workflowNumber);
                //$row->addText($indexRow->workflow->subject);


                //$text = new Text($indexRow->result->title);

                $title = $indexRow->result->title;
                $title = preg_replace('/(' . $this->keyword . ')/i', '<b>$1</b>', $title);


                //$row->addText($title);

                $contentType = $indexRow->contentType->getContentTypeClassObject();
                $site = $contentType->getItemSite($indexRow->result->dataId);
                $site->title = $title;


                $item = new SearchEngineItem();
                $item->title = $title;
                $item->site = $site;

                $this->addItem($item);


                //$row->addClickableSite($site);

            }


        }

    }
}