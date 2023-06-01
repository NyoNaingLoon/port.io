<?php



class DateTimeFormatter
{
    protected $dateTime;
    protected $timeZone;

    public function __construct($dateTime, $timeZone)
    {
        $this->dateTime = new DateTime($dateTime, new DateTimeZone($timeZone));
        $this->timeZone = $timeZone;
    }

    public function formatDatetime()
    {
        return $this->dateTime->format('Y-m-d H:i:s T');
    }

    public function formatDatetimeAgo()
    {
        $now = new DateTime('now', new DateTimeZone($this->timeZone));
        $diff = $now->diff($this->dateTime);

        $ago = '';
        if ($diff->y > 0) {
            $ago = $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
        } elseif ($diff->m > 0) {
            $ago = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
        } elseif ($diff->d > 0) {
            $ago = $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
        } elseif ($diff->h > 0) {
            $ago = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
        } elseif ($diff->i > 0) {
            $ago = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
        } else {
            $ago = 'Just now';
        }

        return $ago;
    }
}




?>


<!-- include_once 'config/init.php';
include_once 'lib/Database.php';
// include_once 'upload.php';

class DateTimeFormatter
{
    private $dateTime;

    public function __construct($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function formatAgo()
    {
        $now = new DateTime();
        $diff = $now->diff($this->dateTime);

        $years = $diff->y;
        $months = $diff->m;
        $days = $diff->d;
        $hours = $diff->h;
        $minutes = $diff->i;
        $seconds = $diff->s;

        if ($years > 0) {
            return $this->pluralize($years, 'year') . ' ago';
        } elseif ($months > 0) {
            return $this->pluralize($months, 'month') . ' ago';
        } elseif ($days > 0) {
            return $this->pluralize($days, 'day') . ' ago';
        } elseif ($hours > 0) {
            return $this->pluralize($hours, 'hour') . ' ago';
        } elseif ($minutes > 0) {
            return $this->pluralize($minutes, 'minute') . ' ago';
        } else {
            return $this->pluralize($seconds, 'second') . ' ago';
        }
    }

    private function pluralize($count, $noun)
    {
        return $count . ' ' . ($count === 1 ? $noun : $noun . 's');
    }
} -->