<?php

namespace Admin\View\Helper;

class VerticalMenu extends Menu
{
    public function render()
    {
        if (count($this->items) == 0) {
            return '';
        }

        $result = '<ul class="nav nav-stacked">';

        foreach ($this->items as $item) {
            $result .= $this->renderItem($item);
        }

        $result .= '</ul>';

        return $result;
    }

    protected function renderItem($item)
    {
        $id = isset($item['id']) ? $item['id'] : '';
        $isActive = ($id == $this->activeItemId);
        $label = isset($item['label']) ? $item['label'] : '';
        $icon = isset($item['icon']) ? $item['icon'] : '';
        $target = isset($item['target']) ? $item['target'] : '';
        $extra = isset($item['extra']) ? $item['extra'] : '';
        $expanded = isset($item['expanded']) ? $item['expanded'] : '';

        $result = '';

        if (isset($item['dropdown'])) {
            $dropdownItems = $item['dropdown'];

            $result .= '<li class="nav-header">';
            $result .= ' <a href="#" data-toggle="collapse" data-target="#' . $target . '">';
            $result .= $label . ' <i class="glyphicon ' . $icon . '"></i>';
            $result .= '</a>';
            $result .= '<ul class="nav nav-stacked collapse ' . $expanded . '" id="' . $target . ' ' . $extra . '">';

            foreach ($dropdownItems as $item) {
                $link = isset($item['link']) ? $item['link'] : '#';
                $label = isset($item['label']) ? $item['label'] : '';
                $icon = isset($item['icon']) ? $item['icon'] : '';
                $extra = isset($item['extra']) ? $item['extra'] : '';

                $result .= '<li class="' . ($isActive ? 'active' : '') . '">';
                $result .= '<a href="' . $link . '"><i class="glyphicon ' . $icon . '"></i> ' . $label . ' ' . $extra . '</a>';
                $result .= '</li>';
            }

            $result .= '</ul>';
            $result .= '</li>';

        } else {
            $link = isset($item['link']) ? $item['link'] : '#';

            $result .= $isActive ? '<li class="' . ($isActive ? 'active' : '') . '">' : '<li>';
            $result .= '<a href="' . $link . '"><i class="glyphicon ' . $icon . '"></i>' . $label . '</a>';
            $result .= '</li>';
        }

        return $result;
    }
}
