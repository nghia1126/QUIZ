<?php

use eftec\bladeone\BladeOne;

function view($view, $data = [])
{
    //$view: đường dẫn đến thư mục chứa các file view
    //$cache: nơi chứa các file đã được biên dịch sang code PHP thuần
    //BladeOne::MODE_DEBUG: trạng thái sử dụng (có báo lỗi)
    $blade = new BladeOne('./app/views', './storage', BladeOne::MODE_DEBUG);
    // echo $blade->
}
