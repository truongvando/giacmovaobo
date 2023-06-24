<?php
// Chọn 4 số ngẫu nhiên từ 0 đến 9 (không trùng nhau)
$randomNumbers = array_unique(array_rand(range(0, 9), 4));

// Hiển thị 4 số đã random
echo "Các số ngẫu nhiên: " . implode(', ', $randomNumbers) . "<br>";

// Tạo dàn số tương tự và hiển thị các số ngược lại và số kép tương ứng
$result = [];
foreach ($randomNumbers as $number) {
    for ($i = 0; $i <= 9; $i++) {
        if ($i != $number) {
            $result[] = $i . $number;
            $result[] = $number . $i; // Thêm số ngược lại
        }
        if ($i == $number && in_array($i, $randomNumbers)) {
            $result[] = $i . $i; // Thêm số kép tương ứng
        }
    }
}

// Loại bỏ các số trùng nhau và chỉ để 1 cặp số xuất hiện duy nhất
$result = array_unique($result);

// Hiển thị kết quả
echo "Dàn số tương tự (loại trừ số trùng nhau): " . implode(', ', $result);
?>
