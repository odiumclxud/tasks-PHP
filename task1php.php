<?php
// Функции для проверки принадлежности точки (x, y) области D
function isInUpperSemiCircle($x, $y) {
    return ($x * $x + $y * $y <= 25) && ($y >= 0);
}

function isInSquare($x, $y) {
    return (abs($x) <= 1.5) && (abs($y) <= 1.5);
}

function isInRotatedSquare($x, $y) {
    $absSum = abs($x) + abs($y);
    return $absSum <= 2 * sqrt(2);
}

function isInUpperRightQuarterCircle($x, $y) {
    return ($x * $x + $y * $y <= 25) && ($x >= 0) && ($y >= 0);
}

function isInRectangle($x, $y) {
    return ($x >= 0) && ($x <= 4) && ($y >= 0) && ($y <= 5);
}

function isInTriangle1($x, $y) {
    return ($x >= 0) && ($y >= 0) && ($x + $y <= 1);
}

function isInTriangle2($x, $y) {
    return ($y >= 0) && ($y <= 1 - $x) && ($y <= 1 + $x);
}

function isInLowerSemiCircle($x, $y) {
    return ($x * $x + $y * $y <= 25) && ($y <= 0);
}

function isInSquareFourthQuadrant($x, $y) {
    return ($x >= 0) && ($x <= 6) && ($y <= 0) && ($y >= -6);
}

function isInLargeRotatedSquare($x, $y) {
    $absSum = abs($x) + abs($y);
    return $absSum <= 4 * sqrt(2);
}

// Функции для вычисления y(x) для каждого варианта
function calculateY1($x) {
    $term1 = asin(sqrt(abs($x)) / (sqrt(abs($x) + 1)));
    $term2 = 3 * sqrt(abs($x) + 1);
    $term3 = log(2 * sin($x) + abs($x) * cos($x), 2);
    return $term1 + $term2 + $term3;
}

function calculateY2($x) {
    $term1 = 3 * acos(6 * cos(2 * sqrt(abs($x)))) / (cos(2 * sqrt(abs($x))) + 5);
    $term2 = log(4 * tan(4 * $x) + 5, 2);
    return $term1 + $term2;
}

function calculateY3($x) {
    $term1 = asin(cos(3 * sqrt(abs($x)))) / (cos(2 * pow(abs($x), 1/3)) + 7);
    $term2 = log(2 * $x + pow(abs($x), 2 * tan($x)), 5);
    return $term1 + $term2;
}

function calculateY4($x) {
    $term1 = acos(pow(($x) / ($x + 1), 3));
    $term2 = 3 * sqrt(abs($x) + 1);
    $term3 = log(5 * tan($x) + abs($x) * sin($x), 5);
    return $term1 + $term2 + $term3;
}

function calculateY5($x) {
    $term1 = acos(3 * cos(3 * sqrt(abs($x)))) / (cos(2 * pow(abs($x), 1/3)) + 5);
    $term2 = log(3 * tan(2 * $x) + 2, 3);
    return $term1 + $term2;
}

function calculateY6($x) {
    $term1 = asin(pow(($x + 3 * sqrt(2 * $x + 3) + 4) / ($x + 1), 7));
    $term2 = log(3 * tan($x) + abs($x) * cos($x), 7);
    return $term1 + $term2;
}

function calculateY7($x) {
    $term1 = sqrt(asin(sin(pow(abs($x), 1/3)) / pow(sin(pow(abs($x), 1/3)), 2)));
    $term2 = log(pow(2, sin(2 * $x + 1)) + 2, 3);
    return $term1 + $term2;
}

function calculateY8($x) {
    $term1 = acos(pow(pow($x, 1/5) / (pow($x, 1/5) + 1), 9));
    $term2 = log(pow(4, 1.5 * $x) + sqrt(13 * $x - 1) + pow(abs($x), sin(2 * $x)), 5);
    return $term1 + $term2;
}

function calculateY9($x) {
    $term1 = sqrt(acos(cos(pow(abs($x), 1/3)) / pow(cos(pow(abs($x), 1/3)), 2)));
    $term2 = log10(pow(2, sin(3 * $x - 1)) + pow(3, 1.5 * $x));
    return $term1 + $term2;
}

function calculateY10($x) {
    $term1 = sqrt(asin(pow($x, 8) / (pow($x, 8) + 3));
    $term2 = log(pow(2, cos(sqrt(abs($x)))) + pow(abs($x + 1), sin(3 * $x + 1)), 4);
    return $term1 + $term2;
}

// Основная логика программы
echo "Выберите вариант задания (1-10): ";
$variant = trim(fgets(STDIN));

echo "Введите значение x: ";
$x = trim(fgets(STDIN));

$y = 0;
$isInDomain = false;

switch ($variant) {
    case 1:
        $y = calculateY1($x);
        $isInDomain = isInUpperSemiCircle($x, $y);
        break;
    case 2:
        $y = calculateY2($x);
        $isInDomain = isInSquare($x, $y);
        break;
    case 3:
        $y = calculateY3($x);
        $isInDomain = isInRotatedSquare($x, $y);
        break;
    case 4:
        $y = calculateY4($x);
        $isInDomain = isInUpperRightQuarterCircle($x, $y);
        break;
    case 5:
        $y = calculateY5($x);
        $isInDomain = isInRectangle($x, $y);
        break;
    case 6:
        $y = calculateY6($x);
        $isInDomain = isInTriangle1($x, $y);
        break;
    case 7:
        $y = calculateY7($x);
        $isInDomain = isInTriangle2($x, $y);
        break;
    case 8:
        $y = calculateY8($x);
        $isInDomain = isInLowerSemiCircle($x, $y);
        break;
    case 9:
        $y = calculateY9($x);
        $isInDomain = isInSquareFourthQuadrant($x, $y);
        break;
    case 10:
        $y = calculateY10($x);
        $isInDomain = isInLargeRotatedSquare($x, $y);
        break;
    default:
        echo "Неверный вариант задания.\n";
        exit;
}

echo "Результат:\n";
echo "y(x) = " . $y . "\n";
echo "Принадлежит области D: " . ($isInDomain ? "True" : "False") . "\n";
?>