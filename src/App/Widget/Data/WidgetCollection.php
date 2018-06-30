<?php
namespace Nemundo\Workflow\App\Widget\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WidgetCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Widget\Data\Widget\WidgetModel());
}
}