<?php
namespace Nemundo\Workflow\App\News\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class NewsCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\News\Data\News\NewsModel());
}
}