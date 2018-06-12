<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
use Nemundo\Model\View\ModelView;
class WordView extends ModelView {
/**
* @var WordModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WordModel();
}
}