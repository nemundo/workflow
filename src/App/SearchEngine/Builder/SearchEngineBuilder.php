<?php

namespace Nemundo\Workflow\App\SearchEngine\Builder;


use Nemundo\Core\Text\Keyword;
use Nemundo\Workflow\App\SearchEngine\Data\Document\Document;
use Nemundo\Workflow\App\SearchEngine\Data\Result\Result;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndex;
use Nemundo\Workflow\App\SearchEngine\Data\Word\Word;
use Nemundo\Workflow\App\SearchEngine\Data\Word\WordId;
use Nemundo\App\Content\Builder\AbstractContentBuilder;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;


class SearchEngineBuilder extends AbstractContentBuilder
{

    /**
     * @var string
     */
    //public $title = '[no title]';

    /**
     * @var string
     */
    //public $text;

    /**
     * @var string
     */
    private $documentId;


    private function prepareIndex()
    {

        $this->check();

    }


    public function addWord($word)
    {

        $this->prepareIndex();
        $this->saveDocument();

        $data = new Word();
        $data->ignoreIfExists = true;
        $data->word = $word;
        $data->save();

        $id = new WordId();
        $id->filter->andEqual($id->model->word, $word);
        $wordId = $id->getId();

        $data = new SearchIndex();
        $data->ignoreIfExists = true;
        $data->wordId = $wordId;
        $data->documentId = $this->documentId;
        $data->save();

    }


    public function addText($text)
    {

        foreach ((new Keyword())->getKeywordList($text) as $word) {
            $this->addWord($word);
        }

    }


    public function createItem()
    {
    }


    private function saveDocument()
    {

        if ($this->documentId == null) {
            $data = new Document();
            $data->ignoreIfExists = true;
            $data->contentTypeId = $this->contentType->contentId;
            $data->dataId = $this->contentType->dataId;
            $this->documentId = $data->save();
        }

    }

}