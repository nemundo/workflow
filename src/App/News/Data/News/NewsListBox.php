<?php
namespace Nemundo\Workflow\App\News\Data\News;
class NewsListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var NewsModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new NewsModel();
$this->label = $this->model->label;
}
}