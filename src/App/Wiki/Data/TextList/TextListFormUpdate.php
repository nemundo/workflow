<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
use Nemundo\Model\Form\ModelFormUpdate;
class TextListFormUpdate extends ModelFormUpdate {
/**
* @var TextListModel
*/
public $model;

protected function loadCom() {
$this->model = new TextListModel();
}
}