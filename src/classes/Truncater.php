<?php

namespace App\Classes;

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
//        $this->options['separator'] = self::OPTIONS['separator'];
//        $this->options['length'] = self::OPTIONS['length'];
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
        $options = array_merge($this->options, $options);
        $length = (int)$options['length'];
        $separator = $options['separator'];
        if (strlen($text) > $length) {
            return substr($text, 0, $length) . $separator;
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

// Для работы с текстом в вебе бывает полезна функция truncate(), которая обрезает слишком длинный текст и ставит в конце, например, многоточие:

// <?php

// truncate('long text', ['length' => 3]); // lon...
// src\Truncater.php
// Реализуйте класс Truncater с единственным методом truncate(). В классе уже присутствует конфигурация по умолчанию:

// <?php

// const OPTIONS = [
//     'separator' => '...',
//     'length' => 200,
// ];
// separator отвечает за символ(ы) добавляющиеся в конце, после обрезания строки, а length это длина до которой происходит сокращение. Если строка короче или равна этой опции, то никакого сокращения не происходит. Конфигурацию по умолчанию можно переопределить передав новую в конструктор (она мержится с тем что в классе), а также через передачу конфигурации вторым параметром в метод truncate(). Оба этих способа можно комбинировать.

// Примеры
// <?php

// $truncater = new Truncater();

// $actual = $truncater->truncate('one two');
// $this->assertEquals('one two', $actual);

// $actual = $truncater->truncate('one two', ['length' => 6]);
// $this->assertEquals('one tw...', $actual);

// $actual = $truncater->truncate('one two', ['separator' => '.']);
// $this->assertEquals('one two', $actual);

// $actual = $truncater->truncate('one two', ['length' => '3']);
// $this->assertEquals('one...', $actual);
// Подробнее в файле с тестами

//tutor's
// class Truncater
// {
//     public const OPTIONS = [
//         'separator' => '...',
//         'length' => 200,
//     ];

//     // BEGIN
//     private $options = [];

//     public function __construct(array $options = [])
//     {
//         $this->options = array_merge(self::OPTIONS, $options);
//     }

//     public function truncate(string $text, array $options = []): string
//     {
//         $currentOptions = array_merge($this->options, $options);
//         if (mb_strlen($text) <= $currentOptions['length']) {
//             return $text;
//         }
//         $substr = mb_substr($text, 0, $currentOptions['length']);
//         return "{$substr}{$currentOptions['separator']}";
//     }
//     // END
// }