<?php

namespace sahifedp\Profile\Views\Components\Register;

use Illuminate\View\Component;
use Psy\Util\Str;

class Starter extends Component {

    public $theme;
    public $message;
    /**
     * Create a new component instance.
     * @param Str|null $theme String theme name or else default loaded
     * @param Str|null $message Message title for register widget
     * @return void
     */
    public function __construct($theme=null,$message=null)
    {
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
