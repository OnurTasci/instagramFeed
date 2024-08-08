<?php


class InstagramFeed {

    private $access_token = '';
    private $cache = false;
    private $cacheTTL = 360;
    private $cacheDir = __DIR__.'/instagram';

    public $data = [
        'me'=>[],
        'media' => [],
        'mediaList' => []
    ];

    public function __construct($field)
    {
        $this->access_token = $field['access_token'];
        $this->cache = $field['cache'] ?? false;

        if ($this->cache && !is_dir( $this->cacheDir ) ) {
            mkdir( $this->cacheDir );
        }
    }


   public function getMe(){

        if($this->cacheHas('me')){
            $json =  $this->cacheGet('me');
        }else{
            $json = file_get_contents('https://graph.instagram.com/v17.0/me?fields=id,username&access_token='.$this->access_token);
            $this->cachePut('me',$json);
        }

        $this->data['me'] = (array) json_decode($json) ?? [];

       return $this->data['me'];

    }

    public function getMediaList(){
        if(!count($this->data['me'])){
            $this->getMe();
        }

        $usernameId =  $this->data['me']['id'];

        if($this->cacheHas('mediaList')){
            $json =  $this->cacheGet('mediaList');
        }else{
            $json = file_get_contents('https://graph.instagram.com/v17.0/'.$usernameId.'/media?access_token='.$this->access_token);
            $this->cachePut('mediaList',$json);
        }


        $this->data['mediaList'] =  (array) json_decode($json) ?? [];
        return $this->data['mediaList'];
    }


    public function media(){

        if(!count($this->data['me'])){
            $this->getMe();
        }


         if(!count($this->data['mediaList'])){
            $this->getMediaList();
        }

         foreach (($this->data['mediaList']['data'] ?? []) as $media){

             if($this->cacheHas('media'.$media->id)){
                 $json =  $this->cacheGet('media'.$media->id);
             }else{
                 $json = file_get_contents('https://graph.instagram.com/'.$media->id.'?fields=id,media_type,media_url,username,timestamp&access_token='.$this->access_token);
                 $this->cachePut('media'.$media->id,$json);
             }

             $this->data['media'][] = (array)  json_decode($json) ?? [];

         }

         return $this->data['media'];
    }

    private function cacheHas($key){
        if ($this->cache){
            return file_exists($this->cacheDir.'/'.$key) && (filemtime($this->cacheDir.'/'.$key) > (time() - 60 * $this->cacheTTL ));
        }
        return  false;
    }

    private function cachePut($key,$data = ''){
        file_put_contents($this->cacheDir.'/'.$key, $data, LOCK_EX);
    }

    private function cacheGet($key){

      return  file_get_contents($this->cacheDir.'/'.$key);

    }


}