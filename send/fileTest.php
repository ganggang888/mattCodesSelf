<?php
    include "TopSdk.php";
    date_default_timezone_set('Asia/Shanghai'); 

    $c = new TopClient;
    $c ->appkey = "23479105" ;
    $c ->secretKey = "0b6a660ec53512587a6e239206d6a6c5" ;
    $req = new AlibabaAliqinFcSmsNumSendRequest;
    $req ->setExtend( "" );
    $req ->setSmsType( "normal" );
    $req ->setSmsFreeSignName( "麦忒教育科技" );
    $req ->setSmsParam( "{code:'1542',product:''}" );
    $req ->setRecNum( "18816978523" );
    $req ->setSmsTemplateCode( "SMS_17545040" );
    $resp = $c ->execute( $req );
    var_dump($resp);
?>