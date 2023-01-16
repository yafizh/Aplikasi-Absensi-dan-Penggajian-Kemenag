<?php

const MONTH_IN_INDONESIA = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "July",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
];

const DAY_IN_INDONESIA = [
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu"
];

function indoensiaDateWithDay($date)
{
    $tanggal = explode('-', $date)[2];
    $bulan = explode('-', $date)[1];
    $tahun = explode('-', $date)[0];
    return DAY_IN_INDONESIA[Date("w", strtotime($date))] . ', ' . $tanggal . ' ' . MONTH_IN_INDONESIA[$bulan - 1] . ' ' . $tahun;
}

function indonesiaDate($date)
{
    $tanggal = explode('-', $date)[2];
    $bulan = explode('-', $date)[1];
    $tahun = explode('-', $date)[0];
    return $tanggal . ' ' . MONTH_IN_INDONESIA[$bulan - 1] . ' ' . $tahun;
}
