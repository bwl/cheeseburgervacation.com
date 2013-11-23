<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('var_chart'))
{
    function var_chart($var) {
        $r  = '<div class="var_chart">';
        $r .= '<pre>'.var_export($var, true).'</pre>';
        $r .= '</div>';

        $r .= '<script>';
          $r .= 'console.log("###DEBUG HELPER VAR DUMP###");';
          $r .= 'console.log('. json_encode($var) .');';
        $r .= '</script>';

        return $r;
    }
}


/* End of file debug_helper.php */
/* Location: ./application/helpers/debug_helper.php */