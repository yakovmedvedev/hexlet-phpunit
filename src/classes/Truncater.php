<?php


class Truncater
{
    const OPTIONS = [
        'separator' => '...',
        'length' => 200,
    ];
    private $options;

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
        $this->options['separator'] = self::OPTIONS['separator'];
        $this->options['length'] = self::OPTIONS['length'];
    }

    public function setSeparator($separator)
    {
        $this->options['separator'] = $separator;
    }
    public function setLength($length)
    {
        $this->options['length'] = $length;
    }
    public function getSeparator()
    {
        return $this->options['separator'];
    }
    public function getLength()
    {
        return $this->options['length'];
    }
    public function truncate(string $text, array $options = [])
    {
        if (strlen($text) > $this->options['length']) {
            return substr($text, 0, $this->options['length']) . $this->options['separator'];
        }
        return $text;
    }
}
$truncater = new Truncater();
print_r($truncater->getSeparator());
print_r($truncater->getLength());
$truncater->setSeparator('~~~');
print_r($truncater->getSeparator());
$truncater->setLength(15);
print_r($truncater->getLength());
print_r($truncater->truncate('Checking for prerequisites', ['separator' => 'eee']));
//print_r($truncater);
