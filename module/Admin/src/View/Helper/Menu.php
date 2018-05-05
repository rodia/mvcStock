<?php

namespace Admin\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Menu extends AbstractHelper
{
    protected $items = [];

    protected $activeItemId = '';

    public function __construct($items = [])
    {
        $this->items = $items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function setActiveItemId($activeItemId)
    {
        $this->activeItemId = $activeItemId;
    }

    public function render()
    {
        if (count($this->items) == 0) {
            return '';
        }

        $result = '<nav class="navbar navbar-default" role="navigation">';
        $result .= '<div class="navbar-header">';
        $result .= '<button type="button" class="navbar-toggle" ';
        $result .= 'data-toggle="collapse" data-target=".navbar-ex1-collapse">';
        $result .= '<span class="sr-only">Toggle navigation</span>';
        $result .= '<span class="icon-bar"></span>';
        $result .= '<span class="icon-bar"></span>';
        $result .= '<span class="icon-bar"></span>';
        $result .= '</button>';
        $result .= '</div>';

        $result .= '<div class="collapse navbar-collapse navbar-ex1-collapse">';
        $result .= '<ul class="nav navbar-nav">';

        foreach ($this->items as $item) {
            $result .= $this->renderItem($item);
        }

        $result .= '</ul>';
        $result .= '</div>';
        $result .= '</nav>';

        return $result;
    }

    protected function renderItem($item)
    {
        $id = isset($item['id']) ? $item['id'] : '';
        $isActive = ($id == $this->activeItemId);
        $label = isset($item['label']) ? $item['label'] : '';

        $result = '';

        if (isset($item['dropdown'])) {

            $dropdownItems = $item['dropdown'];

            $result .= '<li class="dropdown ' . ($isActive ? 'active' : '') . '">';
            $result .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
            $result .= $label . ' <b class="caret"></b>';
            $result .= '</a>';

            $result .= '<ul class="dropdown-menu">';

            foreach ($dropdownItems as $item) {
                $link = isset($item['link']) ? $item['link'] : '#';
                $label = isset($item['label']) ? $item['label'] : '';

                $result .= '<li>';
                $result .= '<a href="' . $link . '">' . $label . '</a>';
                $result .= '</li>';
            }

            $result .= '</ul>';
            $result .= '</a>';
            $result .= '</li>';

        } else {
            $link = isset($item['link']) ? $item['link'] : '#';

            $result .= $isActive ? '<li class="active">' : '<li>';
            $result .= '<a href="' . $link . '">' . $label . '</a>';
            $result .= '</li>';
        }

        return $result;
    }
}
