<?php

namespace Nemundo\Workflow\App\SearchEngine\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Text\Keyword;
use Nemundo\Workflow\App\SearchEngine\Data\Document\Document;
use Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentDelete;
use Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentId;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndex;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexDelete;
use Nemundo\Workflow\App\SearchEngine\Data\Word\Word;
use Nemundo\Workflow\App\SearchEngine\Data\Word\WordId;


// SearchIndexBuilder
// keine extends AbstractContentBuilder
class SearchEngineBuilder extends AbstractBase  //AbstractContentBuilder
{

    /**
     * @var AbstractContentType
     */
    private $contentType;

    /**
     * @var string
     */
    private $documentId;


    public function __construct(AbstractContentType $contentType)
    {
        $this->contentType = $contentType;

    }


    private function prepareIndex()
    {

        // $this->check();

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

    /*
        public function createItem()
        {
        }*/


    // removeSearchIndex
    public function removeSearchIndex()
    {

        // check, ob Word from this document Id sonstwo noch verwendet werden
        // word auflistung, every word check

        $id = new DocumentId();
        $id->filter->andEqual($id->model->dataId, $this->contentType->dataId);
        $this->documentId = $id->getId();


        $delete = new DocumentDelete();
        $delete->filter->andEqual($delete->model->dataId, $this->contentType->dataId);
        $delete->delete();


        $delete = new SearchIndexDelete();
        $delete->filter->andEqual($delete->model->documentId, $this->documentId);
        $delete->delete();


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