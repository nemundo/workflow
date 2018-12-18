<?php
namespace Nemundo\Workflow\App\Stream\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class StreamCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Stream\Data\Stream\StreamModel());
}
}