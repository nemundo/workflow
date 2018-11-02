<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
use Nemundo\Model\Form\ModelFormUpdate;
class WikiContentFormUpdate extends ModelFormUpdate {
/**
* @var WikiContentModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiContentModel();
}
}