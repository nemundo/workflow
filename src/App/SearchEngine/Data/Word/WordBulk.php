<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
class WordBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WordModel
*/
protected $model;

/**
* @var string
*/
public $word;

public function __construct() {
parent::__construct();
$this->model = new WordModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->word, $this->word);
$id = parent::save();
return $id;
}
}