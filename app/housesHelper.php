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
            $lang = "";
            if ($contrl->field_data_src=="translations") {
                $ff .= '<div class="col-span-' . $width . '">
                        <div class="grid grid-cols-3 gap-3">';
                            foreach ($house->translations as $trans) {
                                if ($trans->field == $contrl->field_name) {
                                    $translation = $trans->translation;
                                    switch ($trans->language) {
                                        case 'D':
                                            $lang = "Deutsch";
                                            break;
                                        case 'E':
                                            $lang = "Englisch";
                                            break;
                                        case "F":
                                            $lang = "Französisch";
                                            break;
                                    }

                                    $ff .='<div>
                                             <span>'.$lang.'</span><br>
                                             <input type="text" name="' . $contrl->field_name . '" id="trans_' . $contrl->field_name . '['.$lang.']" value="' . $translation . '">
                                           </div>';
                                }
                            }

               $ff.="</div></div>";
            }
            else {
                $ff .= '<div class="col-span-' . $width . '">
                        <input type="text" name="' . $contrl->field_name . '" id="txt_' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '">
                    </div>';
            }
            break;
        case 'RADIO':
            $ff .=  '<div class="col-span-'.$width.'">';
            foreach ($contrl->inputs as $inp){
                $checked = "";
                if ($inp->code == $house->{$contrl->field_name}) {
                    $checked = " checked ";
                }
                $ff .= '<div><input '. $checked .' type="radio" name="' . $contrl->field_name . '" id="ckbx_' . $contrl->field_name . '" value="' . $inp->code . '" > '.$inp->value.'</div>';
            }
            $ff .='</div>';
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

        case 'SELECT':
            $options="";

            foreach ($contrl->inputs as $inp){
                $selected = "";
                if ($house->{$contrl->field_name}==$inp->code){
                    $selected = " selected ";
                }
                $options.='<option value="'.$inp->code.' "'. $selected .' >'.$inp->value.'</option>';
            }
            $ff .=  '<div class="col-span-'.$width.'">
                        <select  name="' . $contrl->field_name . '" id="ckbx_' . $contrl->field_name . '"  >
                        '.$options.
                        '</select>
                     </div>';

            break;
        case 'DATE':

            $ff .= '<div class="col-span-'.$width.'"><div class="datepicker" data-mdb-toggle-button="true">
                    <input name="' . $contrl->field_name . '" id="dat_' . $contrl->field_name . '" value="' . $house->{$contrl->field_name} . '" type="text"
                        class="form-control block w-full font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    />
                    </div></div>';

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
