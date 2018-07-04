<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
use Nemundo\Model\View\ModelView;
class WikiView extends ModelView {
/**
* @var WikiModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiModel();
}
}