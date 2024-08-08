<?php 
 include '/instagram.php';

            $access_token = '';
            $instagram = new InstagramFeed(['access_token'=>$access_token,'cache'=>true]);
            $mediaAll  =  $instagram->media();

            print_r($mediaAll); exit;
            
            /* 
              Array
(
    [0] => Array
        (
            [id] => 17923933301404320
            [media_type] => IMAGE
            [media_url] => https://scontent.cdninstagram.com/v/t51.29350-15/289059414_119124743980466_5065301849074872764_n.webp?stp=dst-jpg&_nc_cat=103&ccb=1-7&_nc_sid=8ae9d6&_nc_ohc=llTukDSvzzsAX_77MQB&_nc_ht=scontent.cdninstagram.com&edm=ANQ71j8EAAAA&oh=00_AfBYZL_yXySiFMzKZdVLZOSKjDspEUKT2ZhJbEUYKVbyQA&oe=64C59229
            [username] => onurtasci.52
            [timestamp] => 2022-06-19T19:42:37+0000
        )

            
            */