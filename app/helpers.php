<?php

    function cxPanel()
    {
            $ip =  getenv('IP_BD');
            $pass_panel =  getenv('BD_USER_PANEL_PASS');
            return new PDO('mysql:host='.$ip.';dbname=chocomercios_control', "site_usr_panel", $pass_panel);
    }


    function cxCompra()
    {
            $ip =  getenv('IP_BD');
            $pass_compra =  getenv('BD_USER_COMPRA_PASS');
            return  new PDO('mysql:host='.$ip.';dbname=chocomercios_control', "site_usr_compra", $pass_compra);
    }