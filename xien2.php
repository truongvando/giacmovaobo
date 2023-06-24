<?php
// Hàm tạo số ngẫu nhiên từ 00-99 và không trùng với các số đã cho
function generateRandomNumber($excludeNumbers) {
    do {
        $randomNumber = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);
    } while (in_array($randomNumber, $excludeNumbers));
    return $randomNumber;
}

// Hàm ánh xạ các số ngẫu nhiên ra số đối chiếu
function mapOppositeNumber($number) {
    $oppositeNumbers = [
        '00' => '55',
        '11' => '66',
        '22' => '77',
        '33' => '88',
        '44' => '99',
        '55' => '00',
        '66' => '11',
        '77' => '22',
        '88' => '33',
        '99' => '44'
    ];

    if (isset($oppositeNumbers[$number])) {
        return $oppositeNumbers[$number];
    } else {
        return strrev($number);
    }
}

$excludeNumbers = [];

// BTL - 1 số ngẫu nhiên từ 00-99
$btl = generateRandomNumber($excludeNumbers);
array_push($excludeNumbers, $btl);

$btlOpposite = mapOppositeNumber($btl);

// STL - 1 số ngẫu nhiên từ 00-99 và ngược lại
$stl = generateRandomNumber($excludeNumbers);
array_push($excludeNumbers, $stl);

if ($stl[0] == $stl[1]) {
    $stlOpposite = mapOppositeNumber($stl);
} else {
    $stlOpposite = strrev($stl);

}

// XIÊN 2 - 1 cặp số ngẫu nhiên từ 00-99 (bao gồm số còn lại của BTL và số từ STL)
$xien2 = [];
$xien2[] = $btl . $btlOpposite; // Số còn lại của BTL
$xien2[] = $stl . $stlOpposite; // Số từ STL

// Tạo cặp số ngẫu nhiên cuối cùng (giống với cách random số của STL)
$lastNumber = generateRandomNumber($excludeNumbers);
$lastOpposite = strrev($lastNumber);
$xien2[] = $lastNumber . $lastOpposite;

// Loại bỏ các số trùng nhau trong mảng XIÊN 2
$xien2 = array_unique($xien2);

// Hiển thị kết quả
echo "BTL: $btl<br>";
echo "STL: $stl $stlOpposite<br>";
echo "XIÊN 2: " . implode(" ", $xien2);
?>
