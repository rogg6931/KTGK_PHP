<?php
    // ktra du lieu:
    function validate_field($value, $field_name, &$_err, $rules) {
        //ktra gia tri:
        if (isset($rules['required']) && $rules['required'] && empty($value)) {
            $_err[$field_name] = "<span style='color:red'>Vui lòng nhập {$rules['field_label']}</span>";
            return;
        }

        // ktra do dai ky tu:
        if (isset($rules['max_length']) && strlen($value) > $rules['max_length']) {
            $_err[$field_name] = "<span style='color:red'>{$rules['field_label']} không được vượt quá {$rules['max_length']} ký tự</span>";
            return;
        }

        //nhap so:
        if (isset($rules['regex']) && !empty($value) && !preg_match($rules['regex'], $value)) {
            $_err[$field_name] = "<span style='color:red'>{$rules['regex_message']}</span>";
            return;
        }

        // ktra do dai so:
        if (isset($rules['max_value']) && !empty($value) && $value >= $rules['max_value']) {
            $_err[$field_name] = "<span style='color:red'>{$rules['max_value_message']}</span>";
            return;
        }

        // so >= 0:
        if (isset($rules['non_zero']) && $rules['non_zero'] && !empty($value)) {
            if ($value <= 0) {
                $_err[$field_name] = "<span style='color:red'>{$rules['non_zero_message']}</span>";
                return;
            }
        }

        // ktra date:
        if (isset($rules['date_max']) && !empty($value) && strtotime($value) > strtotime($rules['date_max'])) {
            $_err[$field_name] = "<span style='color:red'>{$rules['date_max_message']}</span>";
            return;
        }
    }
?>