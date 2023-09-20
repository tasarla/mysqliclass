# mysqliclass
mysqli sınıfı basit seviye


// Örnek 1: Veritabanı bağlantısını oluştur
$database = new Database("localhost", "kullanici_adi", "parola", "veritabani_adi");

// Örnek 2: SELECT sorgusu çalıştırma
$sql = "SELECT * FROM tablo_adi";
$result = $database->query($sql);

// Örnek 3: Sorgu sonuçlarını işleme
while ($row = $database->fetch($result)) {
    echo "ID: " . $row["id"] . ", Ad: " . $row["ad"] . ", Soyad: " . $row["soyad"] . "<br>";
}

// Örnek 4: INSERT sorgusu çalıştırma
$ad = $database->escape("John");
$soyad = $database->escape("Doe");
$sql = "INSERT INTO tablo_adi (ad, soyad) VALUES ('$ad', '$soyad')";
$result = $database->query($sql);

if ($result) {
    echo "Veri eklendi.";
} else {
    echo "Veri eklenemedi: " . $database->escape($database->connection->error);
}

// Örnek 5: Veritabanı bağlantısını kapatma
$database->close();
