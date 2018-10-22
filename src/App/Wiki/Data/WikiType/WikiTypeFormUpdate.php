<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
use Nemundo\Model\Form\ModelFormUpdate;
class WikiTypeFormUpdate extends ModelFormUpdate {
/**
* @var WikiTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiTypeModel();
}
}