<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WikiPageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiPageModel();
$this->label = $this->model->label;
}
}