<?php

namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageModel extends \Nemundo\Model\Definition\Model\AbstractModel
{
    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $id;

    /**
     * @var \Nemundo\Model\Type\File\ImageType
     */
    public $image;

    /**
     * @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
     */
    public $imageAutoSize800;

    protected function loadModel()
    {
        $this->tableName = "message_message_image";
        $this->aliasTableName = "message_message_image";
        $this->label = "Message Image";

        $this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

        $this->id = new \Nemundo\Model\Type\Id\IdType($this);
        $this->id->tableName = "message_message_image";
        $this->id->fieldName = "id";
        $this->id->aliasFieldName = "message_message_image_id";
        $this->id->label = "Id";
        $this->id->allowNullValue = "";
        $this->id->visible->form = false;
        $this->id->visible->table = false;
        $this->id->visible->view = false;
        $this->id->visible->form = false;

        $this->image = new \Nemundo\Model\Type\File\ImageType($this);
        $this->image->tableName = "message_message_image";
        $this->image->fieldName = "image";
        $this->image->aliasFieldName = "message_message_image_image";
        $this->image->label = "Image";
        $this->image->allowNullValue = "";
        $this->imageAutoSize800 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
        $this->imageAutoSize800->size = 800;

    }
}