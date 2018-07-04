<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var HyperlinkModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  HyperlinkModel();
}
}