<?php
/**
 *-------------------------��ҳ��----------------------*
 */
class PageClass
{
	private $myde_count;       //�ܼ�¼��
	var $myde_size;    //ÿҳ��¼��
	private $myde_page;    //��ǰҳ
	private $myde_page_count;  //��ҳ��
	private $page_url;     //ҳ��url
	private $page_i;       //��ʼҳ
	private $page_ub;      //����ҳ
	var $page_limit;
	function __construct($myde_count=0, $myde_size=1, $myde_page=1,$page_url)//���캯��
	{
		$this -> myde_count = $this -> numeric($myde_count);
		$this -> myde_size  = $this -> numeric($myde_size);
		$this -> myde_page  = $this -> numeric($myde_page);
		$this -> page_limit = ($this -> myde_page * $this -> myde_size) - $this -> myde_size;
		$this -> page_url       = $page_url;
		if($this -> myde_page < 1) $this -> myde_page =1;
		if($this -> myde_count < 0) $this -> myde_page =0;
		$this -> myde_page_count  = $this -> myde_size;
		if($this -> myde_page_count < 1) $this -> myde_page_count = 1;
		if($this -> myde_page > $this -> myde_page_count) $this -> myde_page = $this -> myde_page_count;
		$this -> page_i = $this -> myde_page - 2;
    $this -> page_ub = $this -> myde_page + 2;
    if($this -> page_i < 1){
        $this -> page_ub = $this -> page_ub + (1 - $this -> page_i);
        $this -> page_i = 1;
    }
    if($this -> page_ub > $this -> myde_page_count){
        $this -> page_i = $this -> page_i - ($this -> page_ub - $this -> myde_page_count);
        $this -> page_ub = $this -> myde_page_count;
        if($this -> page_i < 1) $this -> page_i = 1;
    }
	}
	private function numeric($id) //�ж��Ƿ�Ϊ����
	{
		if (strlen($id)){
    		if (!ereg("^[0-9]+$",$id)){
				$id = 1;
    		}else{
				$id = substr($id,0,11);
 			}
		}else{
			$id = 1;
		}
		return $id;
	}
	private function page_replace($page) //��ַ�滻
	{
		return str_replace("{page}", $page, $this -> page_url);
	}
	private function myde_home() //��ҳ
	{
		if($this -> myde_page != 1){
			return "    <a href=\"".$this -> page_replace(1)."\"  title=\"��ҳ\" >��ҳ</a>\n";
		}else{
			return "    ��ҳ\n";
		}
	}
	private function myde_prev() //��һҳ
	{
		if($this -> myde_page != 1){
			return "    <a href=\"".$this -> page_replace($this->myde_page-1) ."\"  title=\"��һҳ\" >��һҳ</a>\n";
		}else{
			return "    ��һҳ\n";
		}
	}
	private function myde_next() //��һҳ
	{
		if($this -> myde_page != $this -> myde_page_count){
				return "    <a href=\"".$this -> page_replace($this->myde_page+1) ."\"  title=\"��һҳ\" >��һҳ</a>\n";
		}else{
			return "    ��һҳ\n";
		}
	}
	private function myde_last() //βҳ
	{
		if($this -> myde_page != $this -> myde_page_count){
				return "    <a href=\"".$this -> page_replace($this -> myde_page_count)."\"  title=\"βҳ\" >βҳ</a>\n";
		}else{
			return "    βҳ\n";
		}
	}
	function myde_write($id='page') //���
	{
		$str  = "<div id=\"".$id."\" class=\"admin_pages\">\n  <ul>\n  ";
		$str .= "  �ܼ�¼:<span>".$this -> myde_count."</span> �� &nbsp;\n";
		$str .= "    <span>".$this -> myde_page."</span> / <span>".$this -> myde_page_count."</span> ҳ&nbsp;&nbsp;\n";
		$str .= $this -> myde_home();
		$str .= $this -> myde_prev();
		for($page_for_i = $this -> page_i;$page_for_i <= $this -> page_ub; $page_for_i++){
			if($this -> myde_page == $page_for_i){
        	$str .= "    <font color=red><b>".$page_for_i."</b></font>&nbsp;\n";
			}
			else{
				$str .= "    <a href=\"".$this -> page_replace($page_for_i)."\" title=\"��".$page_for_i."ҳ\">";
				$str .= $page_for_i . "</a>\n";
			}
    }
		$str .= $this -> myde_next();
		$str .= $this -> myde_last();
		$str .= "</div>";
		return $str;
	}
}

?>