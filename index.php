
<?php
    include 'config.php';
    $git = new git();
    if(isset($_GET['code'])){
        $git_code =$_GET['code'];

        $gitUser = $git->usertoken($git_code);



        $gitUserData = array();
        $gitUserData['oauth_uid'] = !empty($gitUser->id) ? $gitUser->id : '';
        $gitUserData['name'] = !empty($gitUser->name) ? $gitUser->name : '';
        $gitUserData['username'] = !empty($gitUser->login) ? $gitUser->login : '';
        $gitUserData['email'] = !empty($gitUser->email) ? $gitUser->email : '';
        $gitUserData['location'] = !empty($gitUser->location) ? $gitUser->location : '';
        $gitUserData['picture'] = !empty($gitUser->avatar_url) ? $gitUser->avatar_url : '';
        $gitUserData['link'] = !empty($gitUser->html_url) ? $gitUser->html_url : '';
        $gitUserData['follow'] = !empty($gitUser->follow) ? $gitUser->follow : '';

        $userData = $gitUserData;
     
        // $name = $git_user_info['name'];
        // $avatar_url = $git_user_info['avatar_url'];
        // $blog = $git_user_info['blog'];
        // $bio = $git_user_info['bio'];
        // $email = $git_user_info['email'];
        // $login = $git_user_info['login'];
        // $id = $git_user_info['id'];
        // $location = $git_user_info['location'];
        // $twitter_username = $git_user_info['twitter_username'];
        // $inPath = 'https://avatars.githubusercontent.com/u/69880365?v=4';
        // $outPath = 'image.jpg';



   
     
        // $git->save_image($inPath, $outPath);


    }else{
        $git->usercode();
    }