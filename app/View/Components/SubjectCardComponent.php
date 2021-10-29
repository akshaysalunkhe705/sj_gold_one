<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubjectCardComponent extends Component
{
    public $thumbnailimagepath, $subjectname, $shortdescription, $duration, $rating, $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($thumbnailimagepath, $subjectname, $shortdescription, $duration, $rating, $id)
    {
        $this->thumbnailimagepath = $thumbnailimagepath;
        $this->subjectname = $subjectname;
        $this->shortdescription = $shortdescription;
        $this->duration = $duration;
        $this->rating = $rating;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.subject-card-component');
    }
}
