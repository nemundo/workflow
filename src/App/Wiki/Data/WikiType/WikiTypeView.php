<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
use Nemundo\Model\View\ModelView;
class WikiTypeView extends ModelView {
/**
* @var WikiTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiTypeModel();
}
}