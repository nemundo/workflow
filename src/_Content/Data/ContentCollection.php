<?php
namespace Nemundo\App\Content\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ContentCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Content\Data\ContentType\ContentTypeModel());
}
}