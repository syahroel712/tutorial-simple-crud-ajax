<?php
// include "koneksi.php";
function angkaNolDepan($angka)
{
  return $angka > 9 ? $angka : "0" . $angka;
}

function TanggalIndo($date)
{
  if (!empty($date)) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return $result;
  } else {
    return "";
  }
}


// $hari_inggris contoh : Mon, Tue, Wed, Thu ...
function hariIndo($hari_inggris)
{
  $hasil = array(
    "Sun" => "Minggu",
    "Mon" => "Senin",
    "Tue" => "Selasa",
    "Wed" => "Rabu",
    "Thu" => "Kamis",
    "Fri" => "Jumat",
    "Sat" => "Sabtu"
  );
  return $hasil[$hari_inggris];
}
// $angka_bulan contoh : 01, 02, 03, 1, 2, 3 ...
function bulanIndo($angka_bulan)
{
  $hasil = array(
    "01" => "Januari",
    "02" => "Februari",
    "03" => "Maret",
    "04" => "April",
    "05" => "Mei",
    "06" => "Juni",
    "07" => "Juli",
    "08" => "Agustus",
    "09" => "September",
    "10" => "Oktober",
    "11" => "November",
    "12" => "Desember",
    "1" => "Januari",
    "2" => "Februari",
    "3" => "Maret",
    "4" => "April",
    "5" => "Mei",
    "6" => "Juni",
    "7" => "Juli",
    "8" => "Agustus",
    "9" => "September"
  );
  return $hasil[$angka_bulan];
}

function terbilang($satuan)
{
  $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  if ($satuan < 12)
    return " " . $huruf[$satuan];
  elseif ($satuan < 20)
    return terbilang($satuan - 10) . " Belas";
  elseif ($satuan < 100)
    return terbilang($satuan / 10) . " Puluh" . terbilang($satuan % 10);
  elseif ($satuan < 200)
    return " Seratus" . terbilang($satuan - 100);
  elseif ($satuan < 1000)
    return terbilang($satuan / 100) . " Ratus" . terbilang($satuan % 100);
  elseif ($satuan < 2000)
    return " Seribu" . terbilang($satuan - 1000);
  elseif ($satuan < 1000000)
    return terbilang($satuan / 1000) . " Ribu" . terbilang($satuan % 1000);
  elseif ($satuan < 1000000000)
    return terbilang($satuan / 1000000) . " Juta" . terbilang($satuan % 1000000);
  elseif ($satuan >= 1000000000)
    echo "Angka yang Anda masukkan terlalu besar";
}
function integerToRoman($integer)
{
  // Convert the integer into an integer (just to make sure)
  $integer = intval($integer);
  $result = '';

  // Create a lookup array that contains all of the Roman numerals.
  $lookup = array(
    'M' => 1000,
    'CM' => 900,
    'D' => 500,
    'CD' => 400,
    'C' => 100,
    'XC' => 90,
    'L' => 50,
    'XL' => 40,
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1
  );

  foreach ($lookup as $roman => $value) {
    // Determine the number of matches
    $matches = intval($integer / $value);

    // Add the same number of characters to the string
    $result .= str_repeat($roman, $matches);

    // Set the integer to be the remainder of the integer and the value
    $integer = $integer % $value;
  }

  // The Roman numeral should be built, return it
  return $result;
}
function tgl_indo($tgl)
{

  $tanggal = substr($tgl, 8, 2);

  $bulan = getBulan(substr($tgl, 5, 2));

  $tahun = substr($tgl, 0, 4);

  return $tanggal . ' ' . $bulan . ' ' . $tahun;
}



function getBulan($bln)
{

  switch ($bln) {

    case 1:

      return "Januari";

      break;

    case 2:

      return "Februari";

      break;

    case 3:

      return "Maret";

      break;

    case 4:

      return "April";

      break;

    case 5:

      return "Mei";

      break;

    case 6:

      return "Juni";

      break;

    case 7:

      return "Juli";

      break;

    case 8:

      return "Agustus";

      break;

    case 9:

      return "September";

      break;

    case 10:

      return "Oktober";

      break;

    case 11:

      return "November";

      break;

    case 12:

      return "Desember";

      break;
  }
}
function tanggal_indo($tanggal, $cetak_hari = false, $pemisah_hari = ", ")
{
  if (!empty($tanggal)) {
    $tanggal = substr($tanggal, 0, -10);
    $hari = array(
      1 =>    'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
      'Sabtu',
      'Minggu'
    );

    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $split     = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
      $num = date('N', strtotime($tanggal));
      return $hari[$num] . $pemisah_hari . $tgl_indo;
    }
    return $tgl_indo;
  } else {
    return "";
  }
}
function tanggal_indo_angka($tgl_mysql)
{
  $hasil = explode("-", $tgl_mysql);
  return $hasil[2] . "-" . $hasil[1] . "-" . $hasil[0];
}
function rupiah($nilai, $simbol = "Rp", $spasi_rupiah = "", $dibelakang_koma = 0, $penutup = "", $pemisah_koma = ",", $pemisah_ribuan = ".")
{
  if ($nilai == "") {
    $nilai = 0;
  }
  $nilai = intval($nilai);
  // $penutup = ,-
  // $dibelakang_koma = 2 -> ,00
  return $simbol . $spasi_rupiah . number_format($nilai, $dibelakang_koma, $pemisah_koma, $pemisah_ribuan) . $penutup;
}

// mirip dengan rupiah, tapi tulisan simbol mata uang akan jadi rata kiri dan angka rata kanan. Contoh : Rp            1.000.000
function rupiahSpasi($nilai, $simbol = "Rp", $spasi_rupiah = "", $dibelakang_koma = 0, $penutup = "", $pemisah_koma = ",", $pemisah_ribuan = ".")
{
  $nilai = intval($nilai);
  // $penutup = ,-
  // $dibelakang_koma = 2 -> ,00
  return "<div style='float: left;'>" . $simbol . "</div> <div style='float: right;'>" . $spasi_rupiah . number_format($nilai, $dibelakang_koma, $pemisah_koma, $pemisah_ribuan) . $penutup . "</div><div style='clear: both;'></div>";
}

function tanggal_indo_waktu($waktu, $hari = false)
{
  $bagian = explode(" ", $waktu);
  $tanggal = tanggal_indo($bagian[0], $hari);
  return $tanggal . " " . $bagian[1];
}
function tanggal_indo_bulan_tahun($tanggal)
{
  $waktu = explode(" ", tanggal_indo_waktu($tanggal));
  return $waktu[1] . " " . $waktu[2];
}
function alertBootstrap($jenis_alert = "success", $judul = "Pesan!", $isi_pesan = "Isi Pesan.")
{
  $icon_alert = array(
    "success" => "check",
    "warning" => "warning",
    "info" => "info",
    "danger" => "ban",
  );
  return "<div class='alert alert-" . $jenis_alert . " alert-dismissible'>
     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
     <h4><i class='icon fa fa-" . $icon_alert[$jenis_alert] . "'></i> " . $judul . "</h4>
     " . $isi_pesan . "
     </div>";
}
function namaBulan($angka_bulan)
{
  $bulan = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
    '1' => 'Januari',
    '2' => 'Februari',
    '3' => 'Maret',
    '4' => 'April',
    '5' => 'Mei',
    '6' => 'Juni',
    '7' => 'Juli',
    '8' => 'Agustus',
    '9' => 'September'
  );
  return $bulan[$angka_bulan];
}

// Angka dimulai dari 0
function angkaHuruf($angka)
{
  $huruf = [
    "A",
    "B",
    "C",
    "D",
    "E",
    "F",
    "G",
    "H",
    "I",
    "J",
    "K",
    "L",
    "M",
    "N",
    "O",
    "P",
    "Q",
    "R",
    "S",
    "T",
    "U",
    "V",
    "W",
    "X",
    "Y",
    "Z"
  ];
  return $huruf[$angka];
}
function tab($jumlah)
{
  $result = [];
  for ($x = 1; $x <= $jumlah; $x++) {
    array_push($result, "&ensp;");
  }
  return implode("", $result);
}
// $panggilan harus ditentukan keduanya jika ingin panggilan kustom
function panggilan($jk, $panggilan = ["Bpk. ", "Ibu. "])
{
  $jk = str_replace($jk, "", " ");
  $hasil = [
    "Laki-Laki" => $panggilan[0],
    "Perempuan" => $panggilan[1],
    "Pria" => $panggilan[0],
    "Wanita" => $panggilan[1],
    "L" => $panggilan[0],
    "P" => $panggilan[1]
  ];
  return $hasil[$jk];
}
function penyebutanUrutan($angka)
{
  $angka = intval($angka);
  if ($angka == 1) {
    return "Pertama";
  } else {
    $hasil_tmp = "Ke" . strtolower(terbilang($angka));
    return str_replace(" ", "", $hasil_tmp);
  }
}
function generateNumber()
{
  $now = DateTime::createFromFormat('U.u', microtime(true));
  return $now->format("dmyHisu");
}
function setAlert($judul, $pesan, $jenis)
{
  setcookie("pesan_alert", $pesan, time() + 100, "/");
  setcookie("judul_alert", $judul, time() + 100, "/");
  setcookie("jenis_alert", $jenis, time() + 100, "/");
}
function showAlert()
{
  if (!empty($_COOKIE["pesan_alert"])) {
    $jenis = $_COOKIE["jenis_alert"];
    $judul = $_COOKIE["judul_alert"];
    $pesan = $_COOKIE["pesan_alert"];

    setcookie("pesan_alert", "", time() - 360000, "/");
    setcookie("judul_alert", "", time() - 360000, "/");
    setcookie("jenis_alert", "", time() - 360000, "/");

    return "
		Swal.fire({
			icon: '" . $jenis . "',
      title: '" . $judul . "',
      text: '" . $pesan . "'
    });
		";
  }

  return null;
}
function fileUpload($files, $lokasi)
{
  $allowed = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
  $file_tmp = $files['tmp_name'];
  $ukuran_foto = $files['size'];
  $ukuran = 1000000;
  $file_name = explode('.', $files['name']);
  $nama_file = end($file_name);
  $file_ext = strtolower($nama_file);
  if ($ukuran_foto <= $ukuran) {
    if (!in_array($file_ext, $allowed)) {
      // echo "
      // <script>
      //   alert('Gambar Tidak Valid');
      //   window.history.back();
      // </script>
      // ";
      // return "img-not-found.png";
      // exit;
      return false;
    } else {
      $nama_file = str_replace(" ", "-", $file_name[0]) . "-" . substr(uniqid('', true), -5) . "." . $file_ext;
      $lokasi_file = $lokasi . $nama_file;
      move_uploaded_file($file_tmp, $lokasi_file);
      return $nama_file;
    }
  } else {
    // echo "<script>
    //   alert('Ukuran Gambar Lebih Dari 1 Mb!!');
    //   window.history.back();
    //   </script>";
    // exit;
    return false;
  }
}

function fileMultiUpload($files, $index, $lokasi)
{
  $file_tmp = $files['tmp_name'][$index];
  $file_name = explode('.', $files['name'][$index]);
  $nama_file = end($file_name);
  $file_ext = strtolower($nama_file);
  $nama_file = str_replace(" ", "-", $file_name[0]) . "-" . substr(uniqid('', true), -5) . "." . $file_ext;
  $lokasi_file = $lokasi . $nama_file;
  move_uploaded_file($file_tmp, $lokasi_file);
  return $nama_file;
}

/*
   selisihWaktu($FromDate, $ToDate)
   $fromdate = tanggal awal
   $todate = tanggal akhir
   $hasil = selisihWaktu('1995-10-10', '2019-10-10');
   echo $hasil['jam'];
   echo $hasil['minggu'];
   echo $hasil['hari'];
   echo $hasil['bulan'];
   echo $hasil['tahun'];
  */
function selisihWaktu($FromDate, $ToDate)
{
  $FromDate = new DateTime($FromDate);
  $ToDate   = new DateTime($ToDate);
  $Interval = $FromDate->diff($ToDate);

  $Difference["jam"] = $Interval->h;
  $Difference["minggu"] = floor($Interval->d / 7);
  $Difference["hari"] = $Interval->d % 7;
  $Difference["bulan"] = $Interval->m;
  $Difference["tahun"] = $Interval->y;

  return $Difference;
}
// $inputSeconds = selisih 2 waktu dalam detik
// Output berupa array
function selisihWaktuSekarang($inputSeconds)
{

  $secondsInAMinute = 60;
  $secondsInAnHour  = 60 * $secondsInAMinute;
  $secondsInADay    = 24 * $secondsInAnHour;

  // extract days
  $days = floor($inputSeconds / $secondsInADay);

  // extract hours
  $hourSeconds = $inputSeconds % $secondsInADay;
  $hours = floor($hourSeconds / $secondsInAnHour);

  // extract minutes
  $minuteSeconds = $hourSeconds % $secondsInAnHour;
  $minutes = floor($minuteSeconds / $secondsInAMinute);

  // extract the remaining seconds
  $remainingSeconds = $minuteSeconds % $secondsInAMinute;
  $seconds = ceil($remainingSeconds);

  // return the final array
  $obj = array(
    'd' => (int) $days,
    'h' => (int) $hours,
    'm' => (int) $minutes,
    's' => (int) $seconds,
  );
  $hasil = array();
  if ($inputSeconds > 86400) {
    $hasil[] = $obj['d'] . " Hari";
  }
  if ($inputSeconds > 3600) {
    $hasil[] = $obj['h'] . " Jam";
  }
  if ($inputSeconds > 60) {
    $hasil[] = $obj['m'] . " Menit";
  }

  $hasil[] = $obj['s'] . " Detik";

  return implode(", ", $hasil);

  // Contoh pemakaian
  // waktu awal
  //~ $t1 = strtotime("2001-11-22 11:21:00");

  //~ // waktu akhir (waktu sekarang)
  //~ $t2 = strtotime(date("Y-m-d H:i:s"));

  //~ // selisih waktu dalam detik
  //~ $selisih = $t2 - $t1;

  //~ var_dump($selisih);
}


// function ubah rupiah
function nilaiAsliRupiah($rp)
{
  $rp = str_replace("Rp", "", $rp);
  $rp = str_replace(".", "", $rp);
  $rp = str_replace(",00", "", $rp);
  return $rp;
}
