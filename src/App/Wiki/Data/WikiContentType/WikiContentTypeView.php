<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
use Nemundo\Model\View\ModelView;
class WikiContentTypeView extends ModelView {
/**
* @var WikiContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiContentTypeModel();
}
}