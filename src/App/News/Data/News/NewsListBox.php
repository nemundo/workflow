<?php
namespace Nemundo\Workflow\App\News\Data\News;
class NewsListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var NewsModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NewsModel();
$this->label = $this->model->label;
}
}