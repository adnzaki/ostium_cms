<?php

/**
 * OstiumCMS
 * A simple, fast and fully customizable Content Management System
 * for website made by Wolestech (Software Development Agency)
 *
 * @copyright   Copyright (c) 2016-2017, Wolestech | Adnan Zaki
 * @license     MIT License | https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * OstiumCMS Indonesia Date Class
 *
 * Menyediakan sekumpulan fungsi untuk menampilkan tanggal berbahasa Indonesia
 *
 * @package		Application
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Adnan Zaki
 * @link		http://wolestech.com
 */

class OstiumDate
{
    /**
     * Pemanggil fungsi getdate()
     *
     * @var array()
     */
    protected $date;

    /**
     * Nama-nama hari dalam bahasa Indonesia
     *
     * @var array()
     */
    protected $dayName = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

    /**
     * Nama-nama bulan dalam bahasa Indonesia
     *
     * @var array()
     */
    protected $monthName = array(
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desemver',
    );

    /**
     * Memanggil objek dari class DateTime
     *
     * @return object | array
     */
    public function __construct()
    {
        $this->date = getdate();
    }

    /**
     * Mengambil nama hari
     *
     * @return string
     */
    protected function getDayName()
    {
        $day = $this->date['wday'];

        return $this->dayName[$day];
    }

    /**
     * Mengambil nama bulan
     *
     * @return string
     */
    protected function getMonthName()
    {
        $mon = $this->date['mon'] - 1;

        return $this->monthName[$mon];
    }

    /**
     * Mengambil tanggal dalam bulan saat ini
     *
     * @return int
     */
    protected function getMonthDay()
    {
        $mon = $this->date['mday'];

        return $mon;
    }

    /**
     * Menampilkan tanggal lengkap hari ini
     * Misalnya: Senin, 26 Desember 2016
     *
     * @return string
     */
    public function getFullDate()
    {
        $day = $this->getDayName();
        $date = $this->getMonthDay();
        $month = $this->getMonthName();
        $year = $this->date['year'];

        return $day . ', ' . $date . ' ' . $month . ' ' . $year;
    }

    /**
     * Menampilkan bulan dan tahun
     * Misalnya: Desember 2016
     *
     * @return string
     */
    public function getMonthYear()
    {
        return $this->getMonthName() . ' ' . $this->date['year'];
    }

    /**
     * Menampilkan tanggal singkat
     * Misalnya: 26-12-2016
     *
     * @return string
     */
    public function getShortDate($separator = '-')
    {
        $mon = $this->date['mon'];
        if ($mon < 10)
        {
            $mon = "0" . $mon;
        }

        return $this->getMonthDay() . $separator . $mon . $separator . $this->date['year'];
    }

    /**
     * Set tanggal dengan tampilan ringkas
     * Misalnya: 26-12-2016
     *
     * @param int $date, $month, $year
     * @param string $separator
     * @return string
     */
    public function setShortDate($date, $month, $year, $separator = '-')
    {
        if(! $this->dateValidation($date, $month, $year))
        {
            return "Invalid Date Input";
        }
        else
        {
            $date < 10 ? $date = 0 . $date : $date = $date;
            $month < 10 ? $month = 0 . $month : $month = $month;
        }

        return $date . $separator . $month . $separator . $year;
    }

    /**
     * Validasi inputan tanggal dan bulan
     *
     * @param int $date, $month, $year
     * @return string
     */
    protected function dateValidation($date, $month, $year)
    {
        if($month > 12 OR $date > $this->daysInMonth($month, $year))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * Fungsi yang digunakan untuk mengambil jumlah hari dalam bulan
     * yang diinput untuk divalidasi oleh fungsi dateValidation()
     *
     * @param int $month, $year
     * @return int
     */
    protected function daysInMonth($month, $year)
    {
        $totalDays = [
            1 => 31, 2 => $this->daysOfFebruary($year), 3 => 31,
            4 => 30, 5 => 31, 6 => 30, 7 => 31, 8 => 30,
            9 => 30, 10 => 31, 11 => 30, 12 => 31
        ];

        return $totalDays[$month];
    }

    /**
     * Fungsi yang digunakan untuk mengetahui jumlah hari di bulan Februari
     * apakah berjumlah 28 hari atau 29 hari jika pada tahun kabisat
     *
     * @param int $year
     * @return string
     */
    protected function daysOfFebruary($year)
    {
        return $this->isLeapYear($year) ? $days = 29 : $days = 28;
    }

    /**
     * Mengecek apakah tahun yang diinput merupakan tahun kabisat atau bukan
     *
     * @param int $year
     * @return bool
     */
    protected function isLeapYear($year)
    {
        if($year % 4 === 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
