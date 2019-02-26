<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WikiPageModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new WikiPageModel();
$this->label = $this->model->label;
}
}