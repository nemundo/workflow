<?php

namespace Nemundo\App\Content\Builder;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Workflow\App\Calendar\Data\Calendar\Calendar;
use Nemundo\App\Content\Builder\AbstractContentBuilder;
use Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType;

abstract class AbstractIdentificationBuilder extends AbstractContentBuilder
{


    /**
     * @var AbstractIdentificationType
     */
    public $identificationType;

    /**
     * @var string
     */
    public $identificationId;




}