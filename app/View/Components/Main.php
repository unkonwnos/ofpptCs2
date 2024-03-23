<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{
    /**
     * Create a new component instance.
     */
    public string $heading;
    public string $content;
    public $publiee;
    public $trashed;
    public $allPubliee;
    public $allTrashed;
    public $toRoute;
    public $anneeFormation;
    public $categorie;
    public function __construct($heading, $content, $publiee, $trashed, $toRoute, $allPubliee, $allTrashed,$categorie,$anneeFormation)
    {
        $this->heading = $heading;
        $this->content = $content;
        $this->publiee = $publiee;
        $this->trashed = $trashed;
        $this->toRoute = $toRoute;
        $this->allPubliee = $allPubliee;
        $this->allTrashed = $allTrashed;
        $this->categorie = $categorie;
        $this->anneeFormation = $anneeFormation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main');
    }
}
