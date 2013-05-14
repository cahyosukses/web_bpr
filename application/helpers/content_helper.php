<?php

function pecahan($value = '') {
    $length = strlen($value);
    switch ($length) {
        case '6':
            $current = 0;
            $value2 = str_replace('.', '', $value);
            $var = substr($value2, -3, 3);

            if ($var != "000") {
                if ($var >= 100 && $var < 200) {
                    $v = str_split($value2, 3);
                    if ($var == 100) {
                        $current = $v[0] . $var;
                    } elseif ($var == 200) {
                        $current = $v[0] . $var;
                    } else {
                        $current = $v[0] . "200";
                    }
                } elseif ($var >= 200 && $var < 300) {
                    $v = str_split($value2, 3);
                    if ($var == 200) {
                        $current = $v[0] . $var;
                    } elseif ($var == 300) {
                        $current = $v[0] . $var;
                    } else {
                        $current = $v[0] . "300";
                    }
                } elseif ($var >= 300 && $var < 400) {
                    $v = str_split($value2, 3);
                    if ($var == 300) {
                        $current = $v[0] . $var;
                    } elseif ($var == 400) {
                        $current = $v[0] . $var;
                    } else {
                        $current = $v[0] . "400";
                    }
                } elseif ($var >= 400 && $var < 500) {
                    $v = str_split($value2, 3);
                    if ($var == 400) {
                        $current = $v[0] . $var;
                    } elseif ($var == 500) {
                        $current = $v[0] . $var;
                    } else {
                        $current = $v[0] . "500";
                    }
                } elseif ($var >= 500 && $var < 600) {
                    $v = str_split($value2, 3);
                    if ($var == 500) {
                        $current = $v[0] . $var;
                    } elseif ($var == 600) {
                        $current = $v[0] . $var;
                    } else {
                        $current = $v[0] . "600";
                    }
                } elseif ($var >= 600 && $var < 700) {
                    $v = str_split($value2, 3);
                    if ($var == 600) {
                        $current = $v[0] . $var;
                    } elseif ($var == 700) {
                        $current = $v[0] . $var;
                    } else {
                        $current = $v[0] . "700";
                    }
                } elseif ($var >= 700 && $var < 800) {
                    $v = str_split($value2, 3);
                    if ($var == 700) {
                        $current = $v[0] . $var;
                    } elseif ($var == 800) {
                        $current = $v[0] . $var;
                    } else {
                        $current = $v[0] . "800";
                    }
                } elseif ($var >= 800 && $var < 900) {
                    $v = str_split($value2, 3);
                    if ($var == 800) {
                        $current = $v[0] . $var;
                    } elseif ($var == 900) {
                        $current = $v[0] . $var;
                    } else {
                        $current = $v[0] . "900";
                    }
                }
                return $current == 0 ? $value2 : $current;
            } else {
                return $value2;
            }

            break;
        case '7':
            break;
    }
}

function hitung_jasa($jenis, $pinjaman, $jasa) {
    $jasa_angsuran = 0;
    switch ($jenis) {
        case 'flat':
            $jasa_angsuran = $pinjaman * $jasa / 100 / 12;
            break;
        case 'efektif':
            $jasa_angsuran = $pinjaman * $jasa / 100 / 12 * 1 / 1 - (1 / (1 + $jasa / 100 / 12) ^ 12);
            break;
        case 'menurun' :
            $jasa_angsuran = $pinjaman * $jasa / 100 / 12;
    }

    return $jasa_angsuran;
}

function rupiah($var = '') {
    $x = number_format($var, 0, ".", ",");
    return $x;
}

function get_image_public($m, $dir, $w, $h) {
    $img = '';
    if ($m != '') {
        $img = '<div style="float: left; padding-right: 6px; "><img src="' . base_url() . 'assets/upload/' . $dir . "/" . $m . '" width="' . $w . '" height="' . $h . '"></div>';
    }
    return $img;
}

function get_image_tagline($m, $dir, $w, $h) {
    $img = '';
    if ($m != '') {
        $img = '<img src="' . base_url() . 'assets/upload/' . $dir . "/" . $m . '" width="' . $w . '" height="' . $h . '">';
    }
    return $img;
}

function get_image($m, $dir, $w, $h) {
    if ($m == '') {
        $img = '<img src="' . base_url() . 'assets/images/no_photo.jpg" width="' . $w . '" height="' . $h . '" class="thumbnail" id="preview">';
    } else {
        $img = '<img src="' . base_url() . 'assets/upload/' . $dir . "/" . $m . '" width="' . $w . '" height="' . $h . '" class="thumbnail" id="preview">';
    }
    return $img;
}

function notice($string, $class) {
    $string = '<div class="alert alert-' . $class . '">' . $string . '</div>';
    echo $string;
}

function slug($string) {
    $string = strtolower(str_replace(' ', '-', $string));
    return $string;
}

function get_title($string) {
    $setting = new Setting();
    $rs = replace($setting->get_val($string));
    return $rs;
}

function replace($string) {
    $string = str_replace('<p>', '', $string);
    $string = str_replace('</p>', '', $string);
    return $string;
}

function get_header($type) {
    $ci = &get_instance();
    return $ci->load->view("header_" . $type);
}

function get_footer($type) {
    $ci = &get_instance();
    return $ci->load->view("footer_" . $type);
}

function curl_lps($url){
         // inisialisasi CURL
     $data = curl_init();
     // setting CURL
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     // menjalankan CURL untuk membaca isi file
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}


?>
