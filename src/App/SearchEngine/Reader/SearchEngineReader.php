<?php

namespace Nemundo\Workflow\App\SearchEngine\Reader;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Type\Text\Text;
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
            $indexReader->model->loadDocument();
            $indexReader->model->document->loadContentType();
            $indexReader->filter->andEqual($indexReader->model->word->word, $this->keyword);

            foreach ($indexReader->getData() as $indexRow) {

                $className = $indexRow->document->contentType->contentTypeClass;

                /** @var AbstractContentType $contentType */
                $contentType = new $className($indexRow->document->dataId);

                $title = $contentType->getSubject();
                $title = preg_replace('/(' . $this->keyword . ')/i', '<b>$1</b>', $title);

                $text = $contentType->getText();
                $text = (new Text($text))->removeHtmlTags()->getValue();
                $text = preg_replace('/(' . $this->keyword . ')/i', '<b>$1</b>', $text);


                $item = new SearchEngineItem();
                $item->source = $contentType->contentLabel;
                $item->title = $title;
                $item->text = $text;
                $item->site = $contentType->getViewSite();
                $item->site->title = $title;

                $this->addItem($item);

            }

        }

    }

}