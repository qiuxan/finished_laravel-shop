<?php

return [
    'alipay' => [
        'app_id' => '2016091600525857',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnCzGIubQS1gbBvW69S16+i9MLVH9axe0j8681J1BAXgWrWfdtjtGCxYG5tkNCFCfEBODGi9Sn3JNmvFbNybG5bxyjAaqRQKsEyrIsROyNMfDQVY3rpuiEUHG9A/n+0IXgD7RejPALo7OZ2Bp0yVBnkkY/MSpQg6LDN8YQq5UlmaH+Eh8z1GwJ5Sla+b1NXadNq+JwHKytcn+wK3NQXqQ04tGHDh09JfZGFVCYdA2LWIHSI0jHkbdNWQBFwu7YZBPl7AEZMqTmNUMB4RVP0Ko6PW/hCSkdG4vBM0jvfqkliDdceBgsgnSDjsmFMq0UiXVtL3T+y+/qTuIi3B3f5hX6QIDAQAB',
        'private_key' => 'MIIEpQIBAAKCAQEAvqeohEddp1kBKNVWarPJJcpQioeiX3W5fod1ikIIQI6Tjg2paxj4gSDtiLHnzY1Jjn+uoTzUO50pRHBwy0D9sCkZ77P7D92R9ZN/8NEzWR/cN7mNIzNJ0yZXDtSJmVYT8CkN+cmca1vkvWPP7ChLjnZXmw9XwqMd1mg7G4UmGHSEbOb8asy9zYTASyBWeXUHuHt32WIDfLmFWDnwTd5tHCYJOA5KAh/x9LN3N41riE/isxGF2P3FC3DtV8VdQLirwFNP/s5Bc8tv1LbEsZ7e3ONuzL8NDNnXPCiTRenCOwhpmHwH6aAKTiXTAjfcuYu8/rdgbYwojFSfqfexGU9EFwIDAQABAoIBAQCJv+siv8lr2wPac+F/MKzZkAaHQJ5RqGZAhDCplzINKrZzwW0yAxWxfpAA3sFjo3yM57XNq3yQIeoqF693O1rQB7JEnV59RRJrQ4oB/bTC5SEgZgESeMETPTVTcr6EOkwnjhIZ8tAARaHMMKyOrUKCCQEc+IXpDB/HxQFHzfkLWwstEpr2yilbGOmbQv89DctxEnsjgtfudqiPcFMo/+qheWtRxNN5E1a/I0pCT/JaQJXMMAUQ2zbOE/z2XgKmJCqKOPfwYxbLakenEigYH52oW2Vgg2kKNSCc3i3bHvnHD6TYzJhxY4mXUAbyW13uACbJ7C2UOlURT3+pBuFz/j5JAoGBAPXZTXFagRHH0RBqykkf+jbZu8GAQ59YOqatzqPpyj6c3YZkAJyZBQnqPf0Sy3zxxrVsSZ/gxX7zC0iKZqcJouAoU6wDV40lR6zMe6nEdEoC7Nf4ebs0eZxFJbSOvHBi87/sJBwhVQ4/DWUrSeuuRZQ5ccbozck88gcOOvhyEZG9AoGBAMaG8Gh+J1RCHKeODAZJ2BtLuKqkqxX2wQRyAO3TRGHJMb7kjZY9N3mXG2df5bw1tl50YpX3REtM1Gp7KlFlK6qBGB1Wq4j16eZZuRtK5NFqF9GMh1Aji8kYOVuFe2UBF3VaTyqs7lnUNet0ua5zdgNCpxMwJ7LmoIWFUxlALghjAoGAdZOyjOa62bUVkGNyURyg/wCM4hMkxB1fF34CWLQkDGPbMj27aSlpln9XnCQT+7Jp1TRv1a2a5ob4O34tb++U3N2MfrSud4t/xu2Yqu2QrCDQAs4L8fM7wffz+3FUP++jIYOfFXD/i6uuDVdxp+yVzDjY6EdIu9iQ67zriQyMyIUCgYEAwk925L99HRIsW69Dg7ApLeY6VAMiVTgUCZbP4/chehhjcTTghAlcz8yfjNmm0UU9P0vo5mGDXbRQP/xXGh3M1HDQOn8HG+Gd0tFExTrTpUiTEY3bLwvrmKL2GOcYNG8SF9GRpPJnxFJZiCDSULY/7scBIl3CrW7f9G/fOtq/c4MCgYEAzVr5l/KafDHVRTNAvvgad+Qf2oBB8vC0nq07jZHASrvLU070HlJvLW2oAN9Fepiqb3qAhC55LvJITtKfJr0pTK2+/uISHTYLqLtu4p6fCU6l9CBY9ijijMFaG36HDuakaPUZ1/s6b6WCA/gxdkPjOWowhPrNPiI8bVMSDOmJSic=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
