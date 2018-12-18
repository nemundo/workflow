<?php
namespace Nemundo\Workflow\App\News\Data\News;
class NewsForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var NewsModel
*/
public $model;

protected function loadCom() {
$this->model = new NewsModel();
}
}