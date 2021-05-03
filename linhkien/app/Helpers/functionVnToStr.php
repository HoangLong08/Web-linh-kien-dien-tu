<?php 
function vn_to_str ($str){
	$unicode = array(
		 'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
		 'd'=>'đ',
		 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		 'i'=>'í|ì|ỉ|ĩ|ị',         
		 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',         
		 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',         
		 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',         
		 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 'D'=>'Đ',
		 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',       
	);
	foreach($unicode as $nonUnicode=>$uni){
		 $str = preg_replace("/($uni)/i", $nonUnicode, $str);
	}
	$str = str_replace(' ','_',$str);     
	return $str;   
}

function ConverSearchPro( $str){
	$str = vn_to_str($str);
	$str = strtoupper($str);
	if(str_contains('ĐIỆN THOẠI', $str) || str_contains('DIEN THOAI', $str)){
		return "ĐIỆN THOẠI";
	}
	if(str_contains('LAP TOP', $str) || str_contains('MAY TINH', $str)){
		return "LAP TOP";
	}
	if(str_contains('ĐỒNG HỒ', $str) || str_contains('DONG HO', $str)){
		return "ĐỒNG HỒ";
	}
	if(str_contains('DIEN THOAI', $str[0]) ){
		return "ĐIỆN THOẠI";
	}
	if(str_contains('LAP TOP', $str[0]) ){
		return "LAP TOP";
	}
	if(str_contains('DONG HO', $str[0]) ){
		return "ĐỒNG HỒ";
	}

	return $str[0];
}
?>