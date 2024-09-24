# Instagram Feed PHP Library

Bu kütüphane, PHP ile Instagram'dan son gönderileri çekmenizi sağlar. Instagram kullanıcı adı ve gönderi sayısını belirterek JSON formatında sonuç alabilirsiniz.

## Kurulum

Projeyi klonlayın veya ZIP olarak indirin:

```bash
git clone https://github.com/OnurTasci/instagramFeed.git
```

## Örnek Kod

```php
<?php
require 'instagramFeed.php';

$access_token = '';
$instagram = new InstagramFeed(['access_token'=>$access_token,'cache'=>true]);
$mediaAll  =  $instagram->media();

print_r($mediaAll); exit;

?>
```
