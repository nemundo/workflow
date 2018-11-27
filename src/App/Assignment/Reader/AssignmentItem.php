<?php

namespace Nemundo\Workflow\App\Assignment\Reader;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Web\Site\AbstractSite;

class AssignmentItem extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $source;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var string
     */
    public $creator;

    /**
     * @var Date
     */
    public $deadline;


    public function hasDeadline()
    {

        $value = false;
        if ($this->deadline !== null) {
            $value = true;
        }
        return $value;

    }

}