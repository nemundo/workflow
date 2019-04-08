<?php

namespace Nemundo\Workflow\App\Assignment\Com\Form;


use Nemundo\App\Content\Data\ContentType\ContentTypeListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Db\Filter\Filter;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\Workflow\App\Assignment\Com\ListBox\AssignmentFilterListBox;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentModel;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\ClosedListBoxItem;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\OpenListBoxItem;
use Nemundo\Workflow\App\Workflow\Com\ListBox\OpenClosedWorkflowListBox;

class AssignmentSearchForm extends SearchForm
{

    /**
     * @var UserListBox
     */
    private $userListBox;

    /**
     * @var OpenClosedWorkflowListBox
     */
    private $status;

    /**
     * @var UserListBox
     */
    private $ersteller;

    /**
     * @var ContentTypeListBox
     */
    private $source;


    public function loadContainer()
    {
        parent::loadContainer();

        $row = new BootstrapFormRow($this);

        $this->userListBox = new UserListBox($row);
        $this->userListBox->value = $this->userListBox->getValue();
        $this->userListBox->submitOnChange = true;

        $this->status = new OpenClosedWorkflowListBox($row);
        $this->status->submitOnChange = true;

        $this->ersteller = new UserListBox($row);
        $this->ersteller->label = 'Ersteller';
        $this->ersteller->value = $this->ersteller->getValue();
        $this->ersteller->submitOnChange = true;

        $this->source = new AssignmentFilterListBox($row);
        $this->source->value = $this->source->getValue();
        $this->source->submitOnChange = true;


    }


    public function getFilter()
    {

        $model = new AssignmentModel();
        $filter = new Filter();

        $userId = $this->userListBox->getValue();
        if ($userId !== '') {
            $mitarbeiterFilter = new Filter();
            foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

                foreach ($identification->getIdentificationIdFromUserId($userId) as $value) {
                    $mitarbeiterFilter->orEqual($model->assignment->identificationId, $value);
                }

            }

            $filter->andFilter($mitarbeiterFilter);
        }


        if ($this->status->getValue() == (new OpenListBoxItem())->id) {
            $filter->andEqual($model->archive, false);
        }

        if ($this->status->getValue() == (new ClosedListBoxItem())->id) {
            $filter->andEqual($model->archive, true);
        }


        $ersteller = $this->ersteller->getValue();
        if ($ersteller !== '') {
            $filter->andEqual($model->userCreatedId, $ersteller);
        }

        $source = $this->source->getValue();
        if ($source !== '') {
            $filter->andEqual($model->contentTypeId, $source);
        }


        return $filter;

    }

}