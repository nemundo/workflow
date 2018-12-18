<?php
namespace Nemundo\Workflow\App\SearchEngine\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SearchEngineCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentModel());
$this->addModel(new \Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexModel());
$this->addModel(new \Nemundo\Workflow\App\SearchEngine\Data\Word\WordModel());
}
}