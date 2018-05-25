<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Com\Container\AbstractContainer;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Core\Type\DateTime\DateTime;

class WorkflowItem extends Div
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $user;

    /**
     * @var DateTime
     */
    public $dateTime;

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var string
     */
    public $workflowItemId;

    /**
     * @var Div
     */
    private $headerDiv;

    /**
     * @var Div
     */
    private $contentDiv;


    protected function loadCom()
    {
        parent::loadCom();

        $this->addCssClass('card');
        $this->addCssClass('mb-3');

        $this->headerDiv = new Div();
        $this->headerDiv->addCssClass('card-header');

        $this->contentDiv = new Div();
        $this->contentDiv->addCssClass('card-body');

    }


    public function addCom(AbstractContainer $com)
    {
        $this->contentDiv->addCom($com);
    }


    public function getHtml()
    {

        $this->headerDiv->content = $this->title . ': ' . $this->user . ' ' . $this->dateTime->getShortDateTimeLeadingZeroFormat();

        parent::addCom($this->headerDiv);
        parent::addCom($this->contentDiv);


        return parent::getHtml();
    }

}