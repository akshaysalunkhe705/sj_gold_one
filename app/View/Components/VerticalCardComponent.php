<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VerticalCardComponent extends Component
{
    public $thumbnailimagepath, $titlename, $shortdescription, $duration, $rating, $id, $removelink, $editlink, $viewlink;
    public function __construct($thumbnailimagepath, $titlename, $shortdescription, $duration, $rating, $id, $removelink, $editlink, $viewlink)
    {
        $this->thumbnailimagepath = $thumbnailimagepath;
        $this->titlename = $titlename;
        $this->shortdescription = $shortdescription;
        $this->duration = $duration;
        $this->rating = $rating;
        $this->id = $id;
        $this->removelink = $removelink;
        $this->editlink = $editlink;
        $this->viewlink = $viewlink;
    }

    public function render()
    {
        return view('components.vertical-card-component');
    }
}
