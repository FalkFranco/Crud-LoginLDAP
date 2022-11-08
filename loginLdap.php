<?php
session_start();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

// using ldap bind
$ldaprdn  = 'cn ='.$usuario.',ou=usuarios,dc=redes,dc=local';
$ldappass = $password;  // user password

// connect to ldap server
$ldapconn = ldap_connect("192.168.2.108")
        or die("Could not connect to LDAP server.");

// Set some ldap options for talking to 
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

if ($ldapconn) {

        // binding to ldap server
        $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

        // verify binding
        if ($ldapbind) {
            // echo "LDAP bind successful...\n";
			$filter = ('cn=' .$_POST['usuario']);
			$result = ldap_search($ldapconn,"dc=redes,dc=local",$filter) or exit("Unable to search");
			$entries = ldap_get_entries($ldapconn, $result);
			
			// print "<pre>";
			// print_r ($entries[0]);
			// print "</pre>";
			$name = $entries[0]['givenname'][0];
			$lastName = $entries[0]['sn'][0];
			$rol = $entries[0]['gidnumber'][0];

            $_SESSION["s_usuario"] = $name;
			// print_r($name);
			// print_r($lastName);
			// print_r($rol);

        } else {
            // echo "LDAP bind failed...\n";
            echo "null";
            $_SESSION["s_usuario"] = null;
        }
}
?>