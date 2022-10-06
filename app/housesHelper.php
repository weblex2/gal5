<?php

function makeFormField($contrl, $house){
    $value = $house->{$contrl->field_name};
    $width = $contrl->field_width-1;
    if (in_array($contrl->field_type,['HIDD','SEP','SPACE'])){
        $ff = "";
        if ($contrl->field_type=='SEP'){
            $ff = '<div class="col-span-10"><hr></div>';
        }
        if ($contrl->field_type=='SPACE'){
            $ff = '<div class="col-span-'.$width.'">&nbsp;</div>';
        }
    }
    else{
        $ff = "<div class='col-span-1 field_descr'>" . $contrl->field_name . "</div>";
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
                        <input type="checkbox" name="' . $contrl->field_name . '" id="ckbx_' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '"' .$checked.' >
                     </div>';
            break;
        case 'DATE':
            $ff .=  '<div class="col-span-'.$width.'">
                        <label class="relative block">
                            <input name="' . $contrl->field_name . '" id="dat_' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '" class="" type="text" />
                                <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                        </label>
                    </div>';


            break;

        case 'HIDD':
            $ff .= '<input type="hidden" name="' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '">';
            break;
        /*
        default:
            $ff .= '<div class="col-span-'.$width.'">
                        <input type="text" name="' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '">
                    </div>';
            break;
        */
    }
    return $ff;
}
