<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
use Nemundo\Model\View\ModelView;
class TitleChangeView extends ModelView {
/**
* @var TitleChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TitleChangeModel();
}
}