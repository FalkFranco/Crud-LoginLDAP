<?php
session_start();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

// using ldap bind
$ldaprdn  = 'cn ='.$usuario.',ou=usuarios,dc=redes,dc=local'; //modificar en caso de ser necesario
$ldappass = $password;  // user password

// connect to ldap server
$ldapconn = ldap_connect("192.168.2.108") //Cambiar por la IP del servidor LDAP
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
			
			
			$name = $entries[0]['givenname'][0];
			$lastName = $entries[0]['sn'][0];
			$rol = $entries[0]['gidnumber'][0];
            $uidNumber = $entries[0]['uidnumber'][0];

            $filter2 = ('gidnumber=10000');
			$result2 = ldap_search($ldapconn,"dc=redes,dc=local",$filter2) or exit("Unable to search");
			$entries2 = ldap_get_entries($ldapconn, $result2);

            $vendedores = array();
			$datos = array();
			$info = array();

            foreach ($entries2 as $val) {
				if($val['uidnumber'][0] != null ){
					$datos['uid'] = $val['uidnumber'][0];
					$info['nombre'] = $val['givenname'][0];
					$info['apellido'] = $val['sn'][0];
					$info['rol'] = $val['gidnumber'][0];
					$datos['datos'] = $info;
					$vendedores[] = $datos;
				}
			}

            $_SESSION["s_usuario"] = $name;
            $_SESSION["s_apellido"] = $lastName;
            $_SESSION["s_rol"] = $rol;
            $_SESSION["s_uidNumber"] = $uidNumber;
            $_SESSION["s_vendedores"] = $vendedores;


			

        } else {
            // echo "LDAP bind failed...\n";
            echo "null";
            $_SESSION["s_usuario"] = null;
        }
}
?>