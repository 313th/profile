<?php


namespace sahifedp\Profile\Views\Components\Education;

use \Illuminate\View\Component;
use sahifedp\Profile\Models\UserEmploymentInformation;

class Education extends Component
{
    public $id;
    public $name;
    public $class;
    public $size;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id='religion',$name='religion',$class='form-control',$size='auto',$value=NULL)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->size = $size;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $items = UserEmploymentInformation::USER_EDUCATIONS;
        return view('profile::Components.Education.selector',['items'=>$items]);
    }
}
