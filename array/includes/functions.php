<?php

function buildMenus(array $menus, int $parent=0): void
{
    // echo '<pre>';
    // print_r($menus);
    // echo '</pre>';
    if (!empty($menus)) {
        echo !empty($parent) ? '<ul>' : '<ul class="menu">';
        foreach ($menus as $key => $menu) {
            if ($menu['parent'] == $parent) {
                echo '<li><a href="'.$menu['link'].'">'.$menu['title'].'</a>';
                unset($menus[$key]);
                buildMenus($menus, $menu['id']);
                echo '</li>';
            }
        }
        echo '</ul>';
    }
}

function buildNested(array $menus, int $parent=0, &$result = [])
{
    if (!empty($menus)) {
        foreach ($menus as $key => $menu) {
            if ($menu['parent'] == $parent) {
                $result[$key] = $menu;
                buildNested($menus, $menu['id'], $result[$key]['children']);
                if (empty($result[$key]['children'])) {
                    unset($result[$key]['children']);
                }
                $result = array_values($result);

                unset($menus[$key]);
            }
        }
    }

    return $result;
}

//$result[$key]['children'][$key] =

function getMenuSelect(array $menus, int $parent=0, $seps='')
{
    if (!empty($menus)) {
        foreach ($menus as $key => $menu) {
            if ($menu['parent'] == $parent) {
                echo '<option value="'.$menu['id'].'">'.$seps.$menu['title'].'</option>';
                getMenuSelect($menus, $menu['id'], $seps.' |- ');
                unset($menus[$key]);
            }
        }
    }
}
