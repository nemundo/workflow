<?php
namespace Nemundo\Workflow\App\Identification\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class IdentificationCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeModel());
}
}