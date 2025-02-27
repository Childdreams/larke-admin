<?php

return [
    'admin' => [
        'name' => "LarkeAdmin",
        'name_mini' => "Larke",
        'logo' => '<b>Larke</b> admin',
        'release' => 20210822,
        'version' => "1.1.12",
    ],
    
    'https' => env('LARKE_ADMIN_HTTPS', false),
    
    'route' => [
        'domain' => env('LARKE_ADMIN_ROUTE_DOMAIN', null),
        'prefix' => env('LARKE_ADMIN_ROUTE_PREFIX', 'admin-api'),
        'namespace' => env('LARKE_ADMIN_ROUTE_NAMESPACE', 'Larke\\Admin\\Controller'),
        'middleware' => env('LARKE_ADMIN_ROUTE_MIDDLEWARE') ? explode(',', env('LARKE_ADMIN_ROUTE_MIDDLEWARE')) : ['larke-admin'],
        'as' => env('LARKE_ADMIN_ROUTE_AS', 'larke-admin.'),
        'admin_middleware' => env('LARKE_ADMIN_ROUTE_ADMIN_MIDDLEWARE') ? explode(',', env('LARKE_ADMIN_ROUTE_ADMIN_MIDDLEWARE')) : ['larke-admin.admin-auth'],
    ],
    
    'jwt' => [
        'iss' => env('LARKE_ADMIN_JWT_ISS', 'admin-api.yourdomain.com'),
        'aud' => env('LARKE_ADMIN_JWT_AUD', !app()->runningInConsole() ? md5(request()->ip().request()->server('HTTP_USER_AGENT')) : ''),
        'sub' => env('LARKE_ADMIN_JWT_SUB', 'larke-admin-passport'),
        'jti' => env('LARKE_ADMIN_JWT_JTI', 'larke-admin-jid'),
        'exp' => env('LARKE_ADMIN_JWT_EXP', 3600),
        'nbf' => env('LARKE_ADMIN_JWT_NBF', 0),
        'leeway' => env('LARKE_ADMIN_JWT_LEEWAY', 0),
        
        // 载荷加密秘钥，为空不加密，base64编码后
        'passphrase' => env('LARKE_ADMIN_JWT_PASSPHRASE', 'YTY5YmNiZTgxMzVhMWY2MTA3Njc3NGY1YTE3MWI2MjQ='),
        
        'signer' => [
            'algorithm' => env('LARKE_ADMIN_JWT_SIGNER_ALGORITHM', 'HS256'),
            
            // HS256,HS384,HS512
            'hmac' => [
                'secrect' => env('LARKE_ADMIN_JWT_SIGNER_HMAC_SECRECT', 's1fegdR'),
            ],
            // RS256,RS384,RS512
            'rsa' => [
                'private_key' => env('LARKE_ADMIN_JWT_SIGNER_RSA_PRIVATE_KEY', ''),
                'public_key' => env('LARKE_ADMIN_JWT_SIGNER_RSA_PUBLIC_KEY', ''),
                // 私钥密码，base64编码后
                'passphrase' => env('LARKE_ADMIN_JWT_SIGNER_RSA_PASSPHRASE', ''),
            ],
            // ES256,ES384,ES512
            'ecdsa' => [
                'private_key' => env('LARKE_ADMIN_JWT_SIGNER_ECDSA_PRIVATE_KEY', ''),
                'public_key' => env('LARKE_ADMIN_JWT_SIGNER_ECDSA_PUBLIC_KEY', ''),
                // 私钥密码，base64编码后
                'passphrase' => env('LARKE_ADMIN_JWT_SIGNER_ECDSA_PASSPHRASE', ''),
            ],
            // EdDSA
            'eddsa' => [
                'private_key' => env('LARKE_ADMIN_JWT_SIGNER_EDDSA_PRIVATE_KEY', ''),
                'public_key' => env('LARKE_ADMIN_JWT_SIGNER_EDDSA_PUBLIC_KEY', ''),
            ],
        ],
    ],
    
    'passport' => [
        'password_salt' => env('LARKE_ADMIN_PASSPORT_PASSWORD_SALT', 'e6c2ea864004a461e744b28a394df50c'),
        'header_captcha_key' => env('LARKE_ADMIN_PASSPORT_HEADER_CAPTCHA_KEY', 'Larke-Admin-Captcha-Id'),
        'access_token_id' => env('LARKE_ADMIN_PASSPORT_ACCESS_TOKEN_ID', 'larke-passport-access-token'),
        'access_expires_in' => env('LARKE_ADMIN_PASSPORT_ACCESS_EXPIRED_IN', 86400),
        'refresh_token_id' => env('LARKE_ADMIN_PASSPORT_REFRESH_TOKEN_ID', 'larke-passport-refresh-token'),
        'refresh_expires_in' => env('LARKE_ADMIN_PASSPORT_REFRESH_EXPIRED_IN', 604800),
        
        // 登陆方式 single - 单点登陆, many - 多点登陆
        'login_type' => env('LARKE_ADMIN_PASSPORT_LOGIN_TYPE', 'many'),
    ],
    
    'cache' => [
        'store' => env('LARKE_ADMIN_CACHE_STORE', 'default'),
        
        'auth_rule' => [
            'store' => env('LARKE_ADMIN_CACHE_AUTH_RULE_STORE', 'default'),
            'key' => env('LARKE_ADMIN_CACHE_AUTH_RULE_KEY', md5('larke_no_auth_rule')),
            'ttl' => env('LARKE_ADMIN_CACHE_AUTH_RULE_TTL', 43200),
        ],
    ],
    
    'response' => [
        'json' => [
            'is_allow_origin' => env('LARKE_ADMIN_RESPONSE_JSON_IS_ALLOW_ORIGIN', 1),
            'allow_origin' => env('LARKE_ADMIN_RESPONSE_JSON_ALLOW_ORIGIN', '*'),
            'allow_credentials' => env('LARKE_ADMIN_RESPONSE_JSON_ALLOW_CREDENTIALS', 0),
            'allow_methods' => env('LARKE_ADMIN_RESPONSE_JSON_ALLOW_METHODS', 'GET,POST,PATCH,PUT,DELETE,OPTIONS'),
            'allow_headers' => env('LARKE_ADMIN_RESPONSE_JSON_ALLOW_HEADERS', 'X-Requested-With,X_Requested_With,Content-Type,Authorization,Locale-Language,Larke-Admin-Captcha-Id'),
            'expose_headers' => env('LARKE_ADMIN_RESPONSE_JSON_EXPOSE_HEADERS', 'Larke-Admin-Captcha-Id'),
            'max_age' => env('LARKE_ADMIN_RESPONSE_JSON_MAX_AGE', ''),
        ],
    ],
    
    'auth' => [
        // 登陆过滤
        'authenticate_excepts' => env('LARKE_ADMIN_AUTH_AUTHENTICATE_EXCEPTS') ? explode(',', env('LARKE_ADMIN_AUTH_AUTHENTICATE_EXCEPTS')) : [],
        // 权限过滤
        'permission_excepts' => env('LARKE_ADMIN_AUTH_PERMISSION_EXCEPTS') ? explode(',', env('LARKE_ADMIN_AUTH_PERMISSION_EXCEPTS')) : [],
        // 超级管理员
        'admin_id' => env('LARKE_ADMIN_AUTH_ADMIN_ID', '04f65b19e5a2513fe5a89100309da9b7'),
    ],
    
    'extension' => [
        // 扩展存放文件夹
        'directory' => env('LARKE_ADMIN_EXTENSION_DIRECTORY', 'extension'),
    ],
    
    'upload' => [
        // Disk in `config/filesystem.php`.
        'disk' => env('LARKE_ADMIN_UPLOAD_DISK', 'public'),
        
        'directory' => [
            'image' => env('LARKE_ADMIN_UPLOAD_DIRECTORY_IMAGE', 'images'),
            'media' => env('LARKE_ADMIN_UPLOAD_DIRECTORY_MEDIA', 'medias'),
            'file' => env('LARKE_ADMIN_UPLOAD_DIRECTORY_FILE', 'files'),
        ],
        
        'file_types' => [
            'image'  => '/^(gif|png|jpe?g|svg|webp)$/i',
            'html'   => '/^(htm|html)$/i',
            'office' => '/^(docx?|xlsx?|pptx?|pps|potx?)$/i',
            'docs'   => '/^(docx?|xlsx?|pptx?|pps|potx?|rtf|ods|odt|pages|ai|dxf|ttf|tiff?|wmf|e?ps)$/i',
            'text'   => '/^(txt|md|csv|nfo|ini|json|php|js|css|ts|sql)$/i',
            'video'  => '/^(og?|mp4|webm|mp?g|mov|3gp)$/i',
            'audio'  => '/^(og?|mp3|mp?g|wav)$/i',
            'pdf'    => '/^(pdf)$/i',
            'flash'  => '/^(swf)$/i',
        ],
    ],
    
    'captcha' => [
        'charset' => 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789',
        'codelen' => 4,
        'width' => 130,
        'height' => 50,
        // 为空为默认字体
        'font' => '',
        'fontsize' => 20,
        'cachetime' => 300,
    ],
];
