<?php
namespace Nemundo\Workflow\Content\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ContentCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\Content\Data\ContentType\ContentTypeModel());
}
}