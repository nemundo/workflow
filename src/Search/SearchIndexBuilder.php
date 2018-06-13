<?php

namespace Nemundo\Workflow\Search;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Text\Keyword;
use Nemundo\Workflow\Action\AbstractWorkflowAction;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndex;
use Nemundo\Workflow\App\SearchEngine\Data\Word\Word;
use Nemundo\Workflow\App\SearchEngine\Data\Word\WordId;
use Nemundo\Workflow\Process\AbstractProcess;


class SearchIndexBuilder extends AbstractWorkflowAction  // AbstractBase  // AbstractApplicationBuilder
{

    /**
     * @var AbstractProcess
     */
    public $process;

    /**
     * @var string
     */
    //public $workflowId;


    /**
     * @var string
     */
    //public $workflowNumber;

    /**
     * @var string
     */
    //public $searchTitle;


    //private $searchTextId;

    private function prepareIndex()
    {


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
        $data->workflowId = $this->changeEvent->workflowId;
        //$data->searchTextId = $this->searchTextId;
        $data->save();

    }


    public function addText($text)
    {

        foreach ((new Keyword())->getKeywordList($text) as $word) {
            $this->addWord($word);
        }

    }


}