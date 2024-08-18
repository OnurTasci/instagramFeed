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

$instagram = new InstagramFeed();
$posts = $instagram->getPosts('kullaniciadi', 10); // 'kullaniciadi' yerine Instagram kullanıcı adını yazın, 10 son gönderi sayısıdır

if ($posts) {
    echo "<pre>";
    print_r($posts);
    echo "</pre>";
} else {
    echo "Gönderiler alınamadı.";
}
?>
```
