<?php
function cmb_dinamis($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control select2 input-sm' style='width: 100%;'>";
    $cmb .="<option value=''></option>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function cmb_dinamis_kecil($name,$table,$field,$pk){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control select2 input-sm' style='width: 20%;'>";
    $cmb .="<option value=''></option>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function cmb_dinamis_disabled($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control select2 input-sm' style='width: 100%;' disabled>";
    $cmb .="<option value=''></option>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){   
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function cmb_dinamis2($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control select2 input-sm' style='width: 100%;'>";
    $cmb .="<option value=''></option>";
    $data = $ci->multipledb->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function cmb_dinamis2_disabled($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control select2 input-sm' style='width: 100%;' disabled>";
    $cmb .="<option value=''></option>";
    $data = $ci->multipledb->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
