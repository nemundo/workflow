<?php

namespace Nemundo\Workflow\App\SearchEngine\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Text\Keyword;
use Nemundo\Workflow\App\SearchEngine\Data\Document\Document;
use Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentDelete;
use Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentId;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndex;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexCount;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexDelete;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexReader;
use Nemundo\Workflow\App\SearchEngine\Data\Word\Word;
use Nemundo\Workflow\App\SearchEngine\Data\Word\WordDelete;
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


    public function addWord($word)
    {

        $word = trim($word);

        if ($word !== '') {

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

    }


    public function addText($text)
    {

        foreach ((new Keyword())->getKeywordList($text) as $word) {
            $this->addWord($word);
        }

    }


    public function removeSearchIndex()
    {

        // check, ob Word from this document Id sonstwo noch verwendet werden
        // word auflistung, every word check


        $id = new DocumentId();
        $id->filter->andEqual($id->model->dataId, $this->contentType->dataId);
        $documentId = $id->getId();


//        $count = new SearchIndexCount();
        $reader = new SearchIndexReader();
        $reader->filter->andEqual($reader->model->documentId, $documentId);

        foreach ($reader->getData() as $indexRow) {

            $wordCount = new SearchIndexCount();
            $wordCount->filter->andEqual($wordCount->model->wordId, $indexRow->wordId);
            $wordCount->filter->andNotEqual($wordCount->model->documentId, $documentId);
            if ($wordCount->getCount() == 0) {
                (new WordDelete())->deleteById($indexRow->wordId);
            }

        }

        $delete = new DocumentDelete();
        $delete->filter->andEqual($delete->model->dataId, $this->contentType->dataId);
        $delete->delete();

        $delete = new SearchIndexDelete();
        $delete->filter->andEqual($delete->model->documentId, $documentId);
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