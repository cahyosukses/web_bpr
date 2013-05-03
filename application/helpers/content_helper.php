<?php

function hitung_bunga($bunga, $pinjaman, $suku_bunga) {
    switch ($bunga) {
        case "flat":
            $result = $pinjaman * $suku_bunga / 100 * 30 / 360;
            break;
        case "efektif":
            $result = $pinjaman * $suku_bunga / 100 * 30 / 360;
            break;
        case "anuitas":
//            $result = $pinjaman * $suku_bunga / 100/ 360  * 1 / 1-(1 / (1 + $suku_bunga / 100/ 360 )360);
            break;
        default:
            $result = "0";
    }

    return $result;
}

function rupiah($var = '') {
    $x = number_format($var, 0, ".", ",");
    return $x;
}

function get_image_public($m, $w, $h) {
    $img = '';
    if ($m != '') {
        $img = '<div style="float: left; padding-right: 6px; "><img src="' . base_url() . 'assets/upload/' . $m . '" width="' . $w . '" height="' . $h . '"></div>';
    }
    return $img;
}

function get_image($m, $w, $h) {
    if ($m == '') {
        $img = '<img src="' . base_url() . 'assets/images/no_photo.jpg" width="' . $w . '" height="' . $h . '" class="thumbnail" id="preview">';
    } else {
        $img = '<img src="' . base_url() . 'assets/upload/' . $m . '" width="' . $w . '" height="' . $h . '" class="thumbnail" id="preview">';
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

?>
