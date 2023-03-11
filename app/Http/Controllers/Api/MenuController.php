<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * function for fetching menu
     *
     *
     */
    public function getMenu()
    {
        $menus = Menu::where('parent_id',NULL)->get();
        $menuItem = array();
        if($menus->isEmpty()){
            return response()->json([
                'status' => true,
                'message' => "Menu item successfully retrieved.",
                'menu' => $menuItem
            ],200);
        }

        $i=0;
        foreach ($menus as $menu) {
            $menuItem[$i]['id'] = $menu->menu_id;
            $menuItem[$i]['name'] = $menu->title;
            $menuItem[$i]['type'] = $menu->type;
            if(count($menu->children)) {
                $menuItem[$i]['children'] = $this->submenus($menu->children);
            }else {
                $menuItem[$i]['children'] = [];
            }
            $i++;
        }
        return response()->json([
            'status' => true,
            'message' => 'Menu successfully retrieved.',
            'menu' => $menuItem
        ],200);
    }

    /**
     * recursive function for getting sub menu
     *
     */
    function subMenus($children){
        $childItem = array();
        $j=0;
        foreach ($children as $child) {
            $childItem[$j]['id'] = $child->menu_id;
            $childItem[$j]['name'] = $child->title;
            $childItem[$j]['type'] = $child->type;
            if (count($child->children)) {
                $childItem[$j]['children'] = $this->subMenus($child->children);
            } else {
                $childItem[$j]['children'] = [];
            }
            $j++;
        }
        return $childItem;
    }
}
