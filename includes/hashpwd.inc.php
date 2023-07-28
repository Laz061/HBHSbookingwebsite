<?php
/*

$sensitiveData = "Krossing";
$salt = bin2hex(random_bytes(16));
$pepper = "ASecrectPepperString";

$dataToHash = $sensitiveData . $salt . $pepper;

$hash = hash("sha256", $dataToHash);

/*----

$storedSalt = $salt;
$storedHash = $hash;
$pepper = "ASecrectPepperString";

$dataToHash = $sensitiveData . $storedSalt . $pepper;

$verficationHash = hash("sha256", $dataToHash);

if ($storedHash === $verficationHash) {
    echo "The data are the same!";
} else {
    echo "The data are not the same!";
};


*/

$pwdSignup = "krossing";

$options = [
    'cost' => 12
];

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = "krossing";

if (password_verify($pwdLogin, $hashedPwd)) {
    echo "They are the same";
} else {
    echo "They are not the same";
}
