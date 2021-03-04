<?php


namespace sahifedp\Profile\Views\Components\Religion;

use \Illuminate\View\Component;
use sahifedp\Profile\Models\UserLegalInformation;

class Religion extends Component
{
    public $id;
    public $name;
    public $class;
    public $size;
    public $value;
    public $branchId;
    public $branchValue;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id='religion',$name='religion',$class='form-control',$size='auto',$value=NULL,$branchId='religion-branch',$branchValue=NULL)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->size = $size;
        $this->value = $value;
        $this->branchId = $branchId;
        $this->branchValue = $branchValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $items = UserLegalInformation::USER_LEGAL_RELIGIONS;
        return view('profile::Components.Religion.selector',['items'=>$items]);
    }
}
