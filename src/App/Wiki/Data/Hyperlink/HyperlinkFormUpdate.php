<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
use Nemundo\Model\Form\ModelFormUpdate;
class HyperlinkFormUpdate extends ModelFormUpdate {
/**
* @var HyperlinkModel
*/
public $model;

protected function loadCom() {
$this->model = new HyperlinkModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}