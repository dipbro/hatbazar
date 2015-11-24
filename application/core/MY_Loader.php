<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        $content  = $this->view('templates/header', $vars, $return); // header
        $content .= $this->view($template_name, $vars, $return); // view
        $content .= $this->view('templates/footer', $vars, $return); // footer
 
        if ($return)
        {
            return $content;
        }
    }

    public function user_template($template_name, $vars = array(), $return = FALSE)
    {
        $content  = $this->view('user_template/header', $vars, $return); // header
        $content .= $this->view($template_name, $vars, $return); // view
        $content .= $this->view('user_template/footer', $vars, $return); // footer
 
        if ($return)
        {
            return $content;
        }

    }
}