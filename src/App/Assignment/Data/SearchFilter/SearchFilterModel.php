<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
class SearchFilterModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "assignment_search_filter";
$this->aliasTableName = "assignment_search_filter";
$this->label = "Search Filter";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "assignment_search_filter";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "assignment_search_filter_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

}
}