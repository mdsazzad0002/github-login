# 😊 Login with git hub


GO TO `config.php `  and change you `client id`, `client_secret` `redirect_url` 
``` php
    // your client_id and client_secret
    public $client_id = 'Iv1.9d65f06c79d36c23';
    public $client_secret = '0c8dca5b34ae134e54ab8fdff99a8d8641aad87e';
    public $redirect_uri = "http://localhost:80/git_project/github-login";
```


Then go to `index.php` manipulate `$userDate` this is array


Also save image from url 
```php
    if(!empty($gitUserData['picture'])){
        $inPath =   $gitUserData['picture'];
        $outPath = 'image.jpg';
        $git->save_image($inPath, $outPath);

    }
```