<?php
//记账美容模型
	class NotebeautifyModel extends NoteModel {
		//数据格式化插入
		public function data_format_insert(){
			$data = $this->create();
			if($data === false){
				js_back($this->getError());
			}	
			return $data;
		}	
	    //数据格式化插入
		public function appdata_format_insert(){
			$data = $this->create();
			if($data === false){
				$xml_content .= "<status>1</status><desc>数据错误</desc>";
    			$xml_content.="</XML>";
    			echo $xml_content;exit;
			}	
			return $data;
		}
	}
