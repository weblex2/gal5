<?php

function makeFormField($contrl, $house){
    $value = $house->{$contrl->field_name};
    $width = $contrl->field_width-1;
    if (in_array($contrl->field_type,['HIDD'])){
        $ff = "";
    }
    else{
        $ff = "<div class='col-span-1'>" . $contrl->field_name . "</div>";
    }
    switch ($contrl->field_type) {
        case 'TEXT':
            $ff .=  '<div class="col-span-'.$width.'">
                        <input type="text" name="' . $contrl->field_name . '" id="txt_' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '">
                    </div>';
            break;
        case 'CKBX':
            $checked = "";
            if ($house->{$contrl->field_name}==1) {
                $checked = " checked ";
            }
            $ff .=  '<div class="col-span-'.$width.'">
                        <input type="checkbox" name="' . $contrl->field_name . '[]" id="ckbx_' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '"' .$checked.' >
                     </div>';
            break;
        case 'HIDD':
            $ff .= '<input type="hidden" name="' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '">';
            break;
        default:
            $ff .= '<div class="col-span-'.$width.'"><input type="text" name="' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '"></div>';
            break;
    }
    return $ff;
}
