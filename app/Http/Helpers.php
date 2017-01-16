<?php
use App\Categories;
use App\Posts;
use App\User;
use Terbium\DbConfig\Facade as DbConfig;

if (! function_exists('makepreview')) {

    function makepreview($img, $type = null, $folder)
    {

        if($type !== null){
            $type="-$type.jpg";
        }

        if($img == null or $img == ''){
            $img="default_holder";
        }elseif(substr($img,0,6)=="https:" || substr($img,0,5)=="http:"){

            $pos=strpos($img, "amazon");
            if ($pos !== false)
            {
                return url($img.$type);
            }

            return $img;
        }

        return "/upload/media/".$folder."/".$img.$type;
    }
}

if (! function_exists('getenvcong')) {

    function getenvcong($key)
    {
        $get = env('CONF_'.$key);

        return $get;
    }
}

if (! function_exists('writeConfig')) {

     function writeConfig($key, $int) {
        $lines = parseEnv(base_path('.env'));
        $data = [
            formateKey($key) 		=> "'".$int."'",
        ];

        $lines = array_merge($lines, $data);

        $fp = @fopen(base_path('.env'), 'w+');
        if(!$fp)
            throw new Exception('Error');

        foreach($lines AS $key => $data) {
            if(is_int($key)) {
                fwrite($fp, implode('',["\n"]));
            } else {
                fwrite($fp, implode('',[$key,'=',$data,"\n"]));
            }
        }
        fclose($fp);
        return true;
    }

     function parseEnv($path) {
        if(!file_exists($path) || !is_file($path))
            return [];
        $lines = array_map('trim', file($path));
        $result = [];
        foreach($lines AS $row => $line) {
            $parts = explode('=', $line, 2);
            $result[$parts[0] ? : $row] = isset($parts[1]) ? $parts[1] : '';
        }
        return $result;
    }

     function formateKey($key) {
        return implode('_', ['CONF', $key]);
    }

}

if (! function_exists('curlit')) {


    function curlit($site)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $site);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $site = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($httpCode == 404) {
            return false;
        }
        return $site;
    }

}


if (! function_exists('reactionvoteuserget')) {

    function reactionvoteuserget($post, $type)
    {

        if(!\Auth::check() and getenvcong('sitevoting')=="1"){
           return ' href='.url('/login').' rel="get:Loginform"';

        }else{

                if($post->reactions()->currentUserHasVoteOnPost($post->id)->count() <= 2){
                    return 'class="postable" data-method="Post" data-target="reactions'.$post->id.'" ';
                }else{
                    return 'class=off  href="javascript:" off:';
                }
        }


    }

}


if (! function_exists('makeposturl')) {


    function makeposturl($post)
    {
        $type =  getenvcong('siteposturl');

        if($type=="" or $type==null or $type==1 or $type==2){

            $postuffl=$post->slug;

            if($type==2){
               $postuffl= $post->id;
            }

            $category = Categories::where("type", $post->type)->first();
            if(isset($category)){

                return url('/'.$category->posturl_slug.'/'.$postuffl);

            }else{
                return url('/post/'.$postuffl);
            }

        }elseif($type==3){
           return url('/'.$post->user->username_slug.'/'.$post->slug);

        }elseif($type==4){
            return url('/'.$post->user->username_slug.'/'.$post->id);
        }


    }

}



if (! function_exists('getposturl')) {


    function getposturl($secone, $sectwo)
    {
        $type =  getenvcong('siteposturl');

        if($type==1){
            $post= Posts::where('slug', $sectwo)->first();

        }elseif($type==2){
            $post= Posts::where('id', $sectwo)->first();

        }elseif($type==3){
            $usera=User::findByUsernameOrFail($secone);
            $post= Posts::where('user_id', $usera->id)->where('slug', $sectwo)->first();

        }elseif($type==4){
            $usera=User::findByUsernameOrFail($secone);
            $post= Posts::where('user_id', $usera->id)->where('id', $sectwo)->first();
        }

        return $post;

    }

}

if (! function_exists('rop')) {
    function rop($secone)
    {
        if ($secone==$_SERVER['HTTP_HOST']){;
           return true;
        }else{
           return false;
        }
    }
}

if (! function_exists('awsurl')) {
    function awsurl()
    {
        $region="";
        if(env("S3_REGION") != "us-east-1"){
            $region=env("S3_REGION").'.';
        }

        return 'https://s3-'.$region.'amazonaws.com/'.env("S3_BUCKET").'/';;

    }
}

function getInbetweenStrings($start, $end, $str){
    $matches = array();
    $regex = "/$start([a-zA-Z0-9_]*)$end/";
    preg_match_all($regex, $str, $matches);
    return $matches[1];
}

if (! function_exists('getfirstcat')) {
    function getfirstcat($catarray)
    {
        if (isset($catarray)){
            $catarraya =getInbetweenStrings( ',', ',"]',$catarray);
            if(isset($catarraya[0])){
                $firstcat = (int) $catarraya[0];
                $postatpe=Categories::where("id", $firstcat)->first();
                if(isset($postatpe)){
                    return $postatpe;
                }
            }
        }
        return null;
    }
}
