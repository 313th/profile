<?php

namespace sahifedp\Profile\Views\Components\Register;

use DateTime;
use Illuminate\View\Component;
use Psy\Util\Str;
use sahifedp\jdf\jdf;

class Starter extends Component {

    public $theme;
    public $message;
    public $minDate;
    public $maxDate;

    /**
     * Create a new component instance.
     * @param Str|null $theme String theme name or else default loaded
     * @param Str|null $message Message title for register widget
     * @return void
     */
    public function __construct($theme=null,$message=null)
    {
        //TODO: Add Grade value to Min and Max Date
        $this->minDate = (new DateTime(jdf::jalali_to_gregorian(env('CURRENT_YEAR') - 6,7,1,'-')))->getTimestamp() * 1000;
        $this->maxDate = (new DateTime(jdf::jalali_to_gregorian(env('CURRENT_YEAR') - 6 + 2,6,31,'-')))->getTimestamp() * 1000;
        $this->theme = "default";
        $this->message = "آغاز پیش ثبت‌نام";
        if($theme != null)
            $this->theme = $theme;
        if($message != null)
            $this->message = $message;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('profile::Components.Register.Starter-'.$this->theme);
    }
}
