<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPage extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WikiPageModel
*/
protected $model;

/**
* @var string
*/
public $title;

/**
* @var int
*/
public $count;

/**
* @var string
*/
public $url;

public function __construct() {
parent::__construct();
$this->model = new WikiPageModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->count, $this->count);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$id = parent::save();
return $id;
}
}