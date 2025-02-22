<?php


namespace kasushou\helper;

use DateTime;
use DateTimeZone;

/**
 * 日期时间处理类
 */
class DateHelper
{
    /**
     * @param $time
     * @return false|string
     * 获取当前日期时间
     */
    public static function intToDate($time)
    {
        return date('Y-m-d H:i:s', $time);
    }


    /**
     * 日期转时间戳
     *
     * @param $value
     * @return false|int
     */
    public static function dateToInt($value)
    {
        if (empty($value)) {
            return $value;
        }

        if (!is_numeric($value)) {
            return strtotime($value);
        }

        return $value;
    }

    /**
     * 日期区间转开始时间和结束时间
     *
     * @param $value
     * @param $str
     * @param $is_time
     * @return array
     */
    public static function strToStartEnd($value, $str = '-', $is_time = true)
    {

        $start = 0;
        $end = 0;

        if (empty($value)) {
            return [0, 0];
        }

        if (is_array($val)) {
            $arr = $val;
            if (count($arr) != 2) {
                return [$start, $end];
            }
        } else {
            $arr = explode($str, $val);
            if (count($arr) != 2) {
                return [$start, $end];
            }
        }

        if ($is_time) {
            $start = is_numeric($arr[0]) ? $arr[0] : strtotime($arr[0]);
            $end = is_numeric($arr[1]) ? $arr[1] : strtotime($arr[1]);
        } else {

            $start = is_numeric($arr[0]) ? date('Y-m-d H:i:s', $arr[0]) : $arr[0];
            $end = is_numeric($arr[1]) ? date('Y-m-d H:i:s', $arr[1]) : $arr[1];
        }


        return [$start, $end];
    }


    /**
     * 日期转开始时间和结束时间
     *
     * @param $value
     * @return array
     */
    public static function dateToStartEnd($value)
    {
        if (empty($value)) {
            return $value;
        }

        if (!is_numeric($value)) {
            $value = strtotime($value);
        }
        $start = date('Y-m-d 00:00:00', $value);
        $end = date('Y-m-d 23:59:59', $value);
        $start = $start ? strtotime($start) : 0;
        $end = $end ? strtotime($end) : 0;
        return [$start, $end];
    }


    /**
     * @param $posttime
     * @return string
     * 多少天前
     */
    public static function timeAgo($posttime)
    {
        //当前时间的时间戳
        $nowtimes = strtotime(date('Y-m-d H:i:s'), time());
        //之前时间参数的时间戳
        $posttimes = strtotime($posttime);
        //相差时间戳
        $counttime = $nowtimes - $posttimes;

        //进行时间转换
        if ($counttime <= 10) {

            return '刚刚';

        } else if ($counttime > 10 && $counttime <= 30) {

            return '刚才';

        } else if ($counttime > 30 && $counttime <= 60) {

            return '刚一会';

        } else if ($counttime > 60 && $counttime <= 120) {

            return '1分钟前';

        } else if ($counttime > 120 && $counttime <= 180) {

            return '2分钟前';

        } else if ($counttime > 180 && $counttime < 3600) {

            return intval(($counttime / 60)) . '分钟前';

        } else if ($counttime >= 3600 && $counttime < 3600 * 24) {

            return intval(($counttime / 3600)) . '小时前';

        } else if ($counttime >= 3600 * 24 && $counttime < 3600 * 24 * 2) {

            return '昨天';

        } else if ($counttime >= 3600 * 24 * 2 && $counttime < 3600 * 24 * 3) {

            return '前天';

        } else if ($counttime >= 3600 * 24 * 3 && $counttime <= 3600 * 24 * 20) {

            return intval(($counttime / (3600 * 24))) . '天前';

        } else {

            return $posttime;

        }
    }

    /**
     * 格式化 UNIX 时间戳为人易读的字符串
     * @param int    Unix 时间戳
     * @param mixed $local 本地时间
     * @return    string    格式化的日期字符串
     */
    public static function humanDate($remote, $local = null)
    {
        $timediff = (is_null($local) || $local ? time() : $local) - $remote;
        $chunks = array(
            array(60 * 60 * 24 * 365, 'year'),
            array(60 * 60 * 24 * 30, 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24, 'day'),
            array(60 * 60, 'hour'),
            array(60, 'minute'),
            array(1, 'second')
        );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($timediff / $seconds)) != 0) {
                break;
            }
        }
        return lang("%d {$name}%s ago", $count, ($count > 1 ? 's' : ''));
    }
}
