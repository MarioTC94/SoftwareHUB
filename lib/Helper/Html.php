<?php

/**
 * Helper file
 *
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * 
 * @author        Hersey Aguilar
 * @copyright     Copyright (c) Hersey Aguilar. (https://github.com/lHersey)
 * @link          https://github.com/lHersey/AsphyoPHP AsphyoPHP Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


namespace lib\Helper {

    use lib\Core\Core;

    class Html
    {
        public static function css($name)
        {
            if ((array)$name === $name) {
                $path = '';
                foreach ($name as $key => $value) {
                    $path .= '<link rel="stylesheet" type="text/css" href="' . APP_URL . ROUTE_CSS . $value . '.css"/>';
                }
                return $path;
            }
            $path = '<link rel="stylesheet" type="text/css" href="' . APP_URL . ROUTE_CSS . $name . '.css"/>';
            return $path;
        }

        public static function script($name)
        {
            if ((array)$name === $name) {
                $path = '';
                foreach ($name as $key => $value) {
                    $path .= '<script src="' . APP_URL . ROUTE_JS . $value . '.js"></script>';
                }
                return $path;
            }
            $path = '<script src="' . APP_URL . ROUTE_JS . $name . '.js"></script>';
            return $path;
        }

        public static function img($name, $alt = null, $attr = null)
        {
            $link = '<img src="' . APP_URL . ROUTE_IMG . $name . '" ';
            if ($alt != null) {
                $link .= 'alt="' . $alt . '" ';
            }
            if ($attr == null) {
                $link .= '/>';
                return $link;
            } else {
                if ((array)$attr === $attr) {
                    foreach ($attr as $key => $value) {
                        foreach ($value as $argument) {
                            $link .= $key . '="' . $argument . '" ';
                        }
                    }
                    $link .= '/>';
                    return $link;
                } else {
                    throw new \Exception('The third argument is not an array');
                }
            }
        }

        public static function linkIcon($name)
        {
            return '<link rel="icon" href="' . APP_URL . ROUTE_IMG . $name . '" />';
        }

        public static function Select($name = null, $css, $elements, $valueMember, $displayMember)
        {
            $select = '<input type="select" class="';
            if ((array)$css === $css) {
                foreach ($cssClass as $key => $css) {
                    $select .= $cssClass . ' ';
                }
                $select .= '" name="' . $name . "'>";
            } else {
                $select .= $cssClass . '" name="' . $name . "'>";
            }
            foreach ($value as $key => $elements) {
                $select .= '<option value="' . $value[$valueMember] . '>' . $value[$displayMember] . '</option>';
            }
            $select += '</input>';
            return $select;
        }
    }
}
