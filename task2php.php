<?php
// Задание 1: Расчет глубины шахты по времени падения камня и звука удара
function calculateShaftDepth($t) {
    $g = 9.81; // ускорение свободного падения
    $v_sound = 343; // скорость звука в воздухе (м/с)
    
    // Решение квадратного уравнения: (g/2)t1^2 + v_sound*t1 - v_sound*t = 0
    $a = $g / 2;
    $b = $v_sound;
    $c = -$v_sound * $t;
    
    $discriminant = $b * $b - 4 * $a * $c;
    $t1 = (-$b + sqrt($discriminant)) / (2 * $a);
    
    $depth = ($g / 2) * $t1 * $t1;
    return $depth;
}

// Задание 2: Расчет объема и температуры смеси воды
function calculateWaterMix($V1, $t1, $V2, $t2) {
    $totalVolume = $V1 + $V2;
    $mixedTemperature = ($V1 * $t1 + $V2 * $t2) / $totalVolume;
    return [$totalVolume, $mixedTemperature];
}

// Задание 3: Вычисление производной функции y = x^x в точке a
function calculateDerivative($a) {
    // Производная x^x = x^x * (1 + ln(x))
    $derivative = pow($a, $a) * (1 + log($a));
    return $derivative;
}

// Задание 4: Время встречи автомобилей
function calculateMeetingTime($V1, $V2, $a1, $a2, $S) {
    // Уравнение: (a1 + a2)/2 * t^2 + (V1 + V2)*t - S = 0
    $a = ($a1 + $a2) / 2;
    $b = $V1 + $V2;
    $c = -$S;
    
    $discriminant = $b * $b - 4 * $a * $c;
    $t = (-$b + sqrt($discriminant)) / (2 * $a);
    return $t;
}

// Задание 5: Реверс трехзначного числа
function reverseThreeDigitNumber($N) {
    $hundreds = intval($N / 100);
    $tens = intval(($N % 100) / 10);
    $units = $N % 10;
    return $units * 100 + $tens * 10 + $hundreds;
}

// Задание 6: Сумма цифр трехзначного числа
function sumOfThreeDigits($N) {
    $hundreds = intval($N / 100);
    $tens = intval(($N % 100) / 10);
    $units = $N % 10;
    return $hundreds + $tens + $units;
}

// Задание 7: Время приземления самолета
function calculateLandingTime($hours, $minutes, $seconds, $flightDuration) {
    $totalSeconds = $hours * 3600 + $minutes * 60 + $seconds + $flightDuration;
    $landingHours = intval($totalSeconds / 3600) % 24;
    $remainingSeconds = $totalSeconds % 3600;
    $landingMinutes = intval($remainingSeconds / 60);
    $landingSeconds = $remainingSeconds % 60;
    return [$landingHours, $landingMinutes, $landingSeconds];
}

// Задание 8: Сумма цифры тысяч и цифры десятков шестизначного числа
function sumThousandsAndTens($N) {
    $thousands = intval($N / 1000) % 10;
    $tens = intval($N / 10) % 10;
    return $thousands + $tens;
}

// Задание 9: Коэффициенты квадратного уравнения по корням
function quadraticEquationFromRoots($x1, $x2) {
    $a = 1;
    $b = -($x1 + $x2);
    $c = $x1 * $x2;
    return [$a, $b, $c];
}

// Задание 10: Произведение цифр четырехзначного числа
function productOfFourDigits($N) {
    $thousands = intval($N / 1000);
    $hundreds = intval(($N % 1000) / 100);
    $tens = intval(($N % 100) / 10);
    $units = $N % 10;
    return $thousands * $hundreds * $tens * $units;
}

// Основное меню программы
echo "Выберите задание (1-10): ";
$task = trim(fgets(STDIN));

switch ($task) {
    case 1:
        echo "Введите время t (секунды): ";
        $t = trim(fgets(STDIN));
        $depth = calculateShaftDepth($t);
        echo "Глубина шахты: " . round($depth, 2) . " м\n";
        break;
        
    case 2:
        echo "Введите V1, t1, V2, t2 через пробел: ";
        list($V1, $t1, $V2, $t2) = explode(' ', trim(fgets(STDIN)));
        list($volume, $temp) = calculateWaterMix($V1, $t1, $V2, $t2);
        echo "Объем смеси: $volume л, Температура: " . round($temp, 2) . " °C\n";
        break;
        
    case 3:
        echo "Введите точку a (a > 0): ";
        $a = trim(fgets(STDIN));
        $derivative = calculateDerivative($a);
        echo "Производная в точке $a: " . round($derivative, 4) . "\n";
        break;
        
    case 4:
        echo "Введите V1, V2, a1, a2, S через пробел: ";
        list($V1, $V2, $a1, $a2, $S) = explode(' ', trim(fgets(STDIN)));
        $time = calculateMeetingTime($V1, $V2, $a1, $a2, $S);
        echo "Время встречи: " . round($time, 2) . " с\n";
        break;
        
    case 5:
        echo "Введите трехзначное число: ";
        $N = trim(fgets(STDIN));
        $reversed = reverseThreeDigitNumber($N);
        echo "Обратное число: $reversed\n";
        break;
        
    case 6:
        echo "Введите трехзначное число: ";
        $N = trim(fgets(STDIN));
        $sum = sumOfThreeDigits($N);
        echo "Сумма цифр: $sum\n";
        break;
        
    case 7:
        echo "Введите время взлета (ч мин сек) и длительность полета (сек): ";
        list($h, $m, $s, $dur) = explode(' ', trim(fgets(STDIN)));
        list($lh, $lm, $ls) = calculateLandingTime($h, $m, $s, $dur);
        echo "Время приземления: $lh ч $lm мин $ls сек\n";
        break;
        
    case 8:
        echo "Введите шестизначное число: ";
        $N = trim(fgets(STDIN));
        $sum = sumThousandsAndTens($N);
        echo "Сумма цифры тысяч и десятков: $sum\n";
        break;
        
    case 9:
        echo "Введите два корня через пробел: ";
        list($x1, $x2) = explode(' ', trim(fgets(STDIN)));
        list($a, $b, $c) = quadraticEquationFromRoots($x1, $x2);
        echo "Уравнение: x² + " . round($b, 2) . "x + " . round($c, 2) . " = 0\n";
        break;
        
    case 10:
        echo "Введите четырехзначное число: ";
        $N = trim(fgets(STDIN));
        $product = productOfFourDigits($N);
        echo "Произведение цифр: $product\n";
        break;
        
    default:
        echo "Неверный номер задания\n";
}
?>