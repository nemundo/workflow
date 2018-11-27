<?php

namespace Nemundo\Workflow\App\Calendar\Data\Calendar;

use Nemundo\Model\Data\AbstractModelUpdate;

class CalendarUpdate extends AbstractModelUpdate
{
    /**
     * @var CalendarModel
     */
    public $model;

    /**
     * @var \Nemundo\Core\Type\DateTime\Date
     */
    public $date;

    /**
     * @var string
     */
    public $event;

    /**
     * @var string
     */
    public $identificationTypeId;

    /**
     * @var string
     */
    public $identificationId;

    /**
     * @var string
     */
    public $contentTypeId;

    /**
     * @var string
     */
    public $dataId;

    public function __construct()
    {
        parent::__construct();
        $this->model = new CalendarModel();
        $this->date = new \Nemundo\Core\Type\DateTime\Date();
    }

    public function update()
    {
        $property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->date, $this->typeValueList);
        $property->setValue($this->date);
        $this->typeValueList->setModelValue($this->model->event, $this->event);
        $this->typeValueList->setModelValue($this->model->identificationTypeId, $this->identificationTypeId);
        $this->typeValueList->setModelValue($this->model->identificationId, $this->identificationId);
        $this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
        $this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
        parent::update();
    }
}