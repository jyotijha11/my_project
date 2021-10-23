<?php
class AI_Service_Category{
	var $id;
	var $row;
	var $posts;
	function __construct($id){
		$this -> id = $id;
		$CI =& get_instance();
		$this -> row = (array)$CI -> Category_model -> getServiceRow($id);
		//$this -> posts = $CI -> Category_model -> getPosts($id);
	}

    function __get($key){
        if(isset($this -> row[$key])){
            return $this -> row[$key];
        }else{
            return FALSE;
        }
    }

    function __set($key, $val){
        $this -> row[$key] = $val;
    }


	function ID(){
		return $this -> id;
	}

	function data($field){
		if(isset($this -> row[$field])){
			return $this -> row[$field];
		}else{
			return false;
		}
	}

	function permalink(){
		$link = site_url($this -> data('slug'));
		return $link;
	}

	function title(){
		return ucwords(strtolower($this -> data('name')));
	}

	function hasImage(){
		if($this -> data('image') <> ''){
			return true;
		}else{
			return false;
		}
	}

	function description(){
		return $this -> data('description');
	}

	function havePosts(){
		if(is_array($this -> posts) && count($this -> posts) > 0){
			return true;
		}else{
			return false;
		}
	}

	function allPosts(){
		return $this -> posts;
	}

    function getImageUrl(){
        if($this -> hasImage()){
            return base_url(upload_dir($this -> data("image")));
        }else{
            $url = "https://placehold.it/300x200";
            return $url;
        }
    }

	function image($size = 'sm', $options = array()){
		$str = '<img src="' . $this -> getImageUrl()  . '" alt="' . $this -> title(). '" title = "' . $this -> title() . '" ' . $this -> __arr_to_str($options) . ' />';
		return $str;
	}

	private function __arr_to_str($arr){
		$str = '';
		foreach($arr as $key => $value){
			$str .= $key . '="' . $value . '" ';
		}
		return $str;
	}

	function metaTitle(){
		return $this -> data('seo_title');
	}

	function metaDescription(){
		return $this -> data('seo_description');
	}

	function metaKeywords(){
		return $this -> data('seo_keywords');
	}

    function hasChildren(){
        $CI =& get_instance();
        $rest = $CI -> Category_model -> categories($this -> data('id'));
        if(is_array($rest) && count($rest) > 0){
            return true;
        }else{
            return false;
        }
    }

    function getChildren(){
        $d = array();
        if($this -> hasChildren()){
            $CI =& get_instance();
            $rest = $CI -> Category_model -> categories($this -> data('id'));
            foreach($rest as $r){
                $d[] = $r -> id;
            }
        }
        return $d;
    }
}
