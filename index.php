
<?php
    include 'config.php';
    $git = new git();
    if(isset($_GET['code'])){
        $git_code =$_GET['code'];

        $gitUser = $git->usertoken($git_code);



        $git_id = !empty($gitUser['id']) ? $gitUser['id'] : '';
        $git_name = !empty($gitUser['name']) ? $gitUser['name'] : '';
        $git_username = !empty($gitUser['login']) ? $gitUser['login'] : '';
        $git_email = !empty($gitUser['email']) ? $gitUser['email'] : '';
        $git_location = !empty($gitUser['location']) ? $gitUser['location'] : '';
        $git_picture = !empty($gitUser['avatar_url']) ? $gitUser['avatar_url'] : '';
        $git_link  = !empty($gitUser['html_url']) ? $gitUser['html_url'] : '';
        $git_flow_link  = !empty($gitUser['follow']) ? $gitUser['follow'] : '';

     
        


    }else{
        $git->usercode();
    }