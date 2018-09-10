<?php

namespace Nemundo\Workflow\App\SearchEngine\Builder;


use Nemundo\Core\Text\Keyword;
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
    public $title = '[no title]';

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    private $resultId;


    private function prepareIndex()
    {

        $this->check();


        /*
        if ($this->searchTextId == null) {

            $data = new SearchText();
            $data->workflowNumber = $this->workflowNumber;
            $data->text = $this->searchTitle;
            $this->searchTextId = $data->save();
        }*/


    }


    public function addWord($word)
    {

        $this->prepareIndex();
        $this->saveResult();

        $data = new Word();
        $data->ignoreIfExists = true;
        $data->word = $word;
        $data->save();

        $id = new WordId();
        $id->filter->andEqual($id->model->word, $word);
        $wordId = $id->getId();

        $data = new SearchIndex();
        $data->ignoreIfExists = true;

        //$data->processId = $this->process->processId;
        $data->wordId = $wordId;
        $data->contentTypeId = $this->contentType->objectId;
        $data->resultId = $this->resultId;
        //$data->dataId = $this->dataId;


        //$data->workflowId = $this->changeEvent->workflowId;
        //$data->searchTextId = $this->searchTextId;
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
        // TODO: Implement createItem() method.
    }


    private function saveResult()
    {

        if ($this->resultId == null) {

            if (!$this->checkProperty('title')) {
                exit;
            }

            $data = new Result();
            $data->title = $this->title;
            $data->dataId = $this->dataId;
            $this->resultId = $data->save();
        }

    }


}