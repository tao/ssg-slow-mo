<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Statamic\Extensions\Pagination\LengthAwarePaginator;

class UrlPaginator extends LengthAwarePaginator
{
    public function url($page)
    {
        if ($page <= 0) {
            $page = 1;
        }

        $url = $this->path().'/'.$this->pageName.'/'.$page;

        if (Str::contains($this->path(), '?') || count($this->query)) {
            $url .= '?'.Arr::query($this->query);
        }

        return $url.$this->buildFragment();
    }
}
