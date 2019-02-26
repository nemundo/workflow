<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
class WordListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WordModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new WordModel();
$this->label = $this->model->label;
}
}