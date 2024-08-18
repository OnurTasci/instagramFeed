# Instagram Feed PHP Library

Bu kütüphane, PHP ile Instagram'dan son gönderileri çekmenizi sağlar. Instagram kullanıcı adı ve gönderi sayısını belirterek JSON formatında sonuç alabilirsiniz.

## Kurulum

Projeyi klonlayın veya ZIP olarak indirin:

```bash
git clone https://github.com/OnurTasci/instagramFeed.git
Gereksinimler
PHP 7.0 veya üzeri
cURL uzantısı
Kullanım
1. Instagram Kullanıcısının Son Gönderilerini Çekmek
Aşağıdaki örnek kod, belirli bir Instagram kullanıcısının son gönderilerini çeker ve ekrana basar:

php
Kodu kopyala
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
2. JSON Formatında Çıktı Almak
Aşağıdaki örnek kod, gönderileri JSON formatında döndürür:

php
Kodu kopyala
<?php
require 'instagramFeed.php';

$instagram = new InstagramFeed();
header('Content-Type: application/json');
echo json_encode($instagram->getPosts('kullaniciadi', 5)); // 'kullaniciadi' yerine Instagram kullanıcı adını yazın, 5 son gönderi sayısıdır
?>
Fonksiyonlar
getPosts($username, $limit)
Parametreler:
$username: Instagram kullanıcı adı (string)
$limit: Çekilmek istenen gönderi sayısı (integer)
Dönüş Değeri: Bir dizi içinde gönderi bilgileri (veya hata durumunda false)
Örnek Kullanım
Aşağıdaki kod, Instagram gönderilerini çekip, her bir gönderiyi başlık, resim ve açıklama ile birlikte ekrana basar:

php
Kodu kopyala
<?php
require 'instagramFeed.php';

$instagram = new InstagramFeed();
$posts = $instagram->getPosts('onurtasci', 5);

if ($posts) {
    echo "<h2>Instagram Gönderileri</h2>";
    foreach ($posts as $post) {
        echo "<div>";
        echo "<h3>{$post['title']}</h3>";
        echo "<img src='{$post['image']}' alt='{$post['title']}'>";
        echo "<p>{$post['caption']}</p>";
        echo "</div>";
    }
} else {
    echo "Gönderiler alınamadı.";
}
?>
Geri Bildirim
Herhangi bir sorunla karşılaşırsanız, lütfen issue açın. Katkılarınız ve geri bildirimleriniz için teşekkür ederiz!

Lisans
Bu proje MIT Lisansı ile lisanslanmıştır. Daha fazla bilgi için LICENSE dosyasına bakabilirsiniz.

İletişim
Web Sitesi: onurtasci.com
GitHub Profil: OnurTasci
