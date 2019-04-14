<?php
namespace Nemundo\Workflow\App\News\Data\News;
class NewsBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var NewsModel
*/
protected $model;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new NewsModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$id = parent::save();
return $id;
}
}