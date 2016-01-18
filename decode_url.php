<?php
//End Connection Settings
//exit;
function encryptIt( $q ) {
    $cryptKey  = 'ReK4TaM4n5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
	return( urlencode($qEncoded) );
}

function decryptIt( $q ) {
    $cryptKey  = 'ReK4TaM4n5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
print_r(decryptIt(urldecode('ZIYIMwS%2Fp41BJ3NpA0f%2BHhvMLx%2BWg3QdopPq5J9StADWez2lFOnBQSlSxxML1AIYq3PHyWEAqL0fa%2FjFG8rAcpqAmI2J7k53qXnVhOgndGme%2Byn48PYAR63Ofvc19vZl')));




