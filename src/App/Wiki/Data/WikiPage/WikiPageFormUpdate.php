<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
use Nemundo\Model\Form\ModelFormUpdate;
class WikiPageFormUpdate extends ModelFormUpdate {
/**
* @var WikiPageModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiPageModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}