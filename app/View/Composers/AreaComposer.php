<?php

namespace App\View\Composers;

use App\Models\Area;
use Illuminate\View\View;

class AreaComposer
{
    private $area;

    public function compose(View $view)
    {
        // TODO: US Should be in a config somewhere as the default area (not hard-coded here)

        if (! $this->area) {
            $this->area = Area::where('slug', session()->get('area', config()->get('app.classifieds.defaults.area')))->first();
        }

        return $view->with('area', $this->area);
    }
}
