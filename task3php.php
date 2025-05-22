<?php
// Функция для вычисления y(x) по 1 варианту
function calculateY1($x) {
    if ($x < -1) {
        $term = pow(6, $x) - pow(abs($x - 5), $x);
        return pow($x, 8) * log10(abs($term));
    } 
    elseif ($x >= -1 && $x < 1) {
        $denominator = 1 - 2 * pow($x, 2);
        if ($denominator == 0) return "Не определено";
        return sin($x / $denominator);
    } 
    else {
        $term = 1 / pow($x, 4);
        if (abs($term) > 1) return "Не определено";
        return asin($term);
    }
}

// Функция для вычисления y(x) по 2 варианту
function calculateY2($x) {
    if ($x <= 1) {
        $term = pow(7, $x) - pow(abs($x - 3), 7);
        return log(abs($term), 7);
    } 
    elseif ($x > 1 && $x < 3) {
        $term = pow($x, 8) / (1 + pow($x, 2));
        return log($term);
    } 
    else {
        $term = $x / (1 + pow($x, 2));
        if (abs($term) > 1) return "Не определено";
        return asin($term);
    }
}

// Функция для вычисления y(x) по 3 варианту
function calculateY3($x) {
    if ($x <= 1) {
        $term = $x / (pow($x, 2) + 1);
        if (abs($term) > 1) return "Не определено";
        return asin($term);
    } 
    elseif ($x > 1 && $x < 2) {
        $term = pow($x, 4) / (1 + pow($x, 4));
        return log($term);
    } 
    else {
        return log10(abs(pow(2, -$x) * pow($x, 4 - $x)));
    }
}

// Функция для вычисления y(x) по 4 варианту
function calculateY4($x) {
    if ($x <= 2) {
        $term = pow(log(abs($x - 4), 5), $x) + pow(2, pow(abs($x), 0.25));
        return $term;
    } 
    elseif ($x > 2 && $x < 8) {
        return sqrt($x / (1 + pow($x, 2)));
    } 
    else {
        $term = $x / (pow($x, 3) + 1);
        if (abs($term) > 1) return "Не определено";
        return pow(asin($term), 5);
    }
}

// Функция для вычисления y(x) по 5 варианту
function calculateY5($x) {
    if ($x <= -0.5) {
        $term = pow(3, $x) - pow(abs($x), -$x);
        return -pow($x, 5) + log10(abs($term));
    } 
    elseif ($x > -0.5 && $x < 0.5) {
        $denominator = 1 - pow($x, 2);
        if ($denominator == 0) return "Не определено";
        return log10($x / $denominator);
    } 
    else {
        $term = 1 / (4 * $x);
        if (abs($term) > 1) return "Не определено";
        return acos($term);
    }
}

// Функция для вычисления y(x) по 6 варианту
function calculateY6($x) {
    if ($x > 8 && $x < 9) {
        return cos(pow($x, 5) / (7 + pow($x, 2)));
    } 
    elseif ($x >= 9) {
        return pow($x, 8) + pow($x, 10);
    }
    return "Не определено";
}

// Функция для вычисления y(x) по 7 варианту
function calculateY7($x) {
    if ($x <= 3) {
        $term = pow(2, $x) + pow($x, 7) + pow(abs($x - 4), $x);
        return log10(abs($term));
    } 
    elseif ($x > 3 && $x < 5) {
        return pow(log(pow($x / (1 + pow($x, 2)), 4), 9);
    } 
    else {
        $term = 1 / $x;
        if (abs($term) > 1) return "Не определено";
        return acos($term);
    }
}

// Функция для вычисления y(x) по 8 варианту
function calculateY8($x) {
    if ($x <= -2) {
        return acos(exp($x));
    } 
    elseif ($x > -2 && $x < 2) {
        $denominator = 4 - pow($x, 9);
        if ($denominator == 0) return "Не определено";
        return log10(5 * $x / $denominator);
    } 
    else {
        return pow($x - 2, $x) + 1;
    }
}

// Функция для вычисления y(x) по 9 варианту
function calculateY9($x) {
    if ($x <= -4) {
        return 1 / tan($x - 1);
    } 
    elseif ($x > -4 && $x < 4) {
        $term = pow($x, 6) / (1 + pow($x, 6));
        return acos($term);
    } 
    else {
        $term = pow($x, 5) - pow($x, 3) + pow(10, $x);
        if ($term <= 0) return "Не определено";
        return sqrt(log($term, 2));
    }
}

// Функция для вычисления y(x) по 10 варианту
function calculateY10($x) {
    if ($x <= -4) {
        return 1 / tan($x - 1);
    } 
    elseif ($x > -4 && $x < 4) {
        $term = pow($x, 6) / (1 + pow($x, 6));
        return acos($term);
    } 
    else {
        $term = pow($x, 5) - pow($x, 3) + pow(10, $x);
        if ($term <= 0) return "Не определено";
        return sqrt(log($term, 2));
    }
}

// Основная программа
echo "Выберите вариант задания (1-10): ";
$variant = trim(fgets(STDIN));

echo "Введите значение x: ";
$x = trim(fgets(STDIN));

if (!is_numeric($x)) {
    echo "Ошибка: введено нечисловое значение\n";
    exit;
}

$x = (float)$x;
$result = "";

switch ($variant) {
    case 1: $result = calculateY1($x); break;
    case 2: $result = calculateY2($x); break;
    case 3: $result = calculateY3($x); break;
    case 4: $result = calculateY4($x); break;
    case 5: $result = calculateY5($x); break;
    case 6: $result = calculateY6($x); break;
    case 7: $result = calculateY7($x); break;
    case 8: $result = calculateY8($x); break;
    case 9: $result = calculateY9($x); break;
    case 10: $result = calculateY10($x); break;
    default: echo "Неверный вариант задания\n"; exit;
}

echo "Результат для варианта $variant:\n";
echo "y($x) = ";
if (is_string($result)) {
    echo $result;
} else {
    echo round($result, 6);
}
echo "\n";
?>