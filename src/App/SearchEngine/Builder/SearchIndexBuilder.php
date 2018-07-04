<?php

namespace Nemundo\Workflow\App\SearchEngine\Builder;


use Nemundo\Core\Text\Keyword;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndex;
use Nemundo\Workflow\App\SearchEngine\Data\Word\Word;
use Nemundo\Workflow\App\SearchEngine\Data\Word\WordId;
use Nemundo\Workflow\Content\Builder\AbstractContentBuilder;
use Nemundo\Workflow\Process\AbstractProcess;


class SearchIndexBuilder extends AbstractContentBuilder
{

    /**
     * @var string
     */
    public $subject;

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
        $data->contentTypeId = $this->contentType->id;
        $data->dataId = $this->dataId;
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


}