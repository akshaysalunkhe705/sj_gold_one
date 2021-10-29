<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HorizontalCardComponent extends Component
{
    public  $id, $thumbnailimagepath, $titlename, $removelink, $editlink, $viewlink;
    public function __construct($id, $thumbnailimagepath, $titlename,  $removelink, $editlink, $viewlink)
    {
        $this->id = $id;
        $this->thumbnailimagepath = $thumbnailimagepath;
        $this->titlename = $titlename;
        $this->removelink = $removelink;
        $this->editlink = $editlink;
        $this->viewlink = $viewlink;
    }


    public function render()
    {
        return view('components.horizontal-card-component');
    }
}
