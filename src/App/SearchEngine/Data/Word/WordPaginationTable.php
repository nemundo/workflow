<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
class WordPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WordModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WordModel();
}
}