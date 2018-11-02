<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
use Nemundo\Model\View\ModelView;
class WikiContentView extends ModelView {
/**
* @var WikiContentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiContentModel();
}
}