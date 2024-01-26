
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
     
        


    }else{
        $git->usercode();
    }