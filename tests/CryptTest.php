#!/usr/bin/php
<?php //Basic test for crypt utils

    //Import util
    require_once"framework/crypt/CryptUtils.php";

    $cryptUtils = new CryptUtils();
    
    if ($cryptUtils->genBase64("test") == "dGVzdA==") {
        echo"\033[32mBase64 Encode test -> dGVzdA== success\n";
    } else {
        echo"\033[31mBase64 Encode test -> dGVzdA== Failed\n";
    }

    if ($cryptUtils->decodeBase64("dGVzdA==") == "test") {
        echo"\033[32mBase64 Decode dGVzdA== -> test success\n";
    } else {
        echo"\033[31mBase64 Decode dGVzdA== -> test Failed\n";
    }

    if ($cryptUtils->encryptAES("test", "123") == "+5/wAhQ2PyNvi0viMYp8Zg==") {
        echo"\033[32mAES Encrypt test -> +5/wAhQ2PyNvi0viMYp8Zg== success\n";
    } else {
        echo"\033[31mAES Encrypt test -> +5/wAhQ2PyNvi0viMYp8Zg== Failed\n";
    }

    if ($cryptUtils->decryptAES("+5/wAhQ2PyNvi0viMYp8Zg==", "123") == "test") {
        echo"\033[32mAES Decrypt +5/wAhQ2PyNvi0viMYp8Zg== -> test success\n";
    } else {
        echo"\033[31mAES Decrypt +5/wAhQ2PyNvi0viMYp8Zg== -> test Failed\n";
    }

    echo"\033[33m================================================================================\n";

?>