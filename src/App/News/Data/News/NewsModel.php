<?php

namespace Nemundo\Workflow\App\News\Data\News;
class NewsModel extends \Nemundo\Model\Definition\Model\AbstractModel
{
    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $id;

    /**
     * @var \Nemundo\Model\Type\Text\TextType
     */
    public $title;

    /**
     * @var \Nemundo\Model\Type\Text\LargeTextType
     */
    public $text;

    /**
     * @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
     */
    public $dateTime;

    protected function loadModel()
    {
        $this->tableName = "collaboration_news";
        $this->aliasTableName = "collaboration_news";
        $this->label = "News";

        $this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

        $this->id = new \Nemundo\Model\Type\Id\IdType($this);
        $this->id->tableName = "collaboration_news";
        $this->id->fieldName = "id";
        $this->id->aliasFieldName = "collaboration_news_id";
        $this->id->label = "Id";
        $this->id->allowNullValue = "";
        $this->id->visible->form = false;
        $this->id->visible->table = false;
        $this->id->visible->view = false;
        $this->id->visible->form = false;

        $this->title = new \Nemundo\Model\Type\Text\TextType($this);
        $this->title->tableName = "collaboration_news";
        $this->title->fieldName = "title";
        $this->title->aliasFieldName = "collaboration_news_title";
        $this->title->label = "Title";
        $this->title->validation = true;
        $this->title->allowNullValue = "";
        $this->title->length = 255;

        $this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
        $this->text->tableName = "collaboration_news";
        $this->text->fieldName = "text";
        $this->text->aliasFieldName = "collaboration_news_text";
        $this->text->label = "Text";
        $this->text->allowNullValue = "";

        $this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
        $this->dateTime->tableName = "collaboration_news";
        $this->dateTime->fieldName = "date_time";
        $this->dateTime->aliasFieldName = "collaboration_news_date_time";
        $this->dateTime->label = "Date Time";
        $this->dateTime->allowNullValue = "";
        $this->dateTime->visible->form = false;

    }
}