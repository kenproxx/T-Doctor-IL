<?php


if (!function_exists('location')) {
    function locationHelper()
    {
        $locale = Session::get('locale');
        return $locale;
    }

}
