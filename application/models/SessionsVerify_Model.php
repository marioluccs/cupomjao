<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SessionsVerify_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->reconnect();
        @session_start();
    }

    public function logVer(){



        if(isset($_SESSION['Auth01']) and isset($_SESSION['NAME']) and isset($_SESSION['EMAIL'])
            and isset($_SESSION['PASS']) and isset($_SESSION['ID'])):

            return true;
        else:

            return false;

        endif;


    }



    public function logVerAdmin(){



        if(isset($_SESSION['Auth02']) and isset($_SESSION['NAME_ADMIN']) and isset($_SESSION['PASS_ADMIN']) and isset($_SESSION['ID_ADMIN'])):

            return true;
        else:

            return false;

        endif;


    }
    public function logVerEmpresa(){



        if(isset($_SESSION['Auth03']) and isset($_SESSION['EMAIL_EMPRESA']) and isset($_SESSION['NAME_EMPRESA']) and isset($_SESSION['PASS_EMPRESA']) and isset($_SESSION['ID_EMPRESA'])):

            return true;
        else:

            return false;

        endif;


    }


}