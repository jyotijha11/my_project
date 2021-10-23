<?php
class Master_model extends CI_Model{
    var  $table;

	function __construct(){
		parent::__construct();
	}
	function getNew($table = false){
		$tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
		$f = $this -> db -> list_fields($tbl);
		$temp = new stdClass();
		$temp -> id = false;
		foreach($f as $fields){
			$temp -> $fields = '';
		}
		return $temp;
	}

	function getRow($id, $table = false){
        $tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
		return $this -> db -> get_where($tbl, array('id' => $id)) -> first_row();
	}
    function getRowArray($id, $table = false){
        $tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
        return $this -> db -> get_where($tbl, array('id' => $id)) -> first_row('array');
    }

	function getAll($offset = 0, $limit = 40, $table = false){
        $tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
		$this -> db -> order_by('id', 'DESC');
        $sql = $this -> db -> get_compiled_select($tbl, false);

        $this -> db -> limit($limit, $offset);
		$rest = $this -> db -> get();
		$data['results'] = $rest -> result();
		$data['total'] = $this -> db -> query($sql) -> num_rows();
		return $data;
	}

	function getAllSearched($offset = 0, $limit = 40, $likes = array(), $table = false){
        $tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
		if(count($likes) > 0){
			foreach($likes as $key => $val){
				$this -> db -> or_like($key, $val);
			}
		}
		$this -> db -> order_by('id', 'DESC');
        $sql = $this -> db -> get_compiled_select($tbl, false);
		$this -> db -> limit($limit, $offset);
		$rest = $this -> db -> get();
		$data['results'] = $rest -> result();
		$data['total'] = $this -> db -> query($sql) -> num_rows();
		return $data;
	}

    function getWhereRecords($offset = 0, $limit = 40, $rules = array(), $table = false){
        $this -> db -> order_by('id', 'DESC');
        $tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
        if(is_array($rules) && count($rules) > 0){
            foreach($rules as $key => $value){
                $this -> db -> or_where($key, $value);
            }
        }
        $sql = $this -> db -> get_compiled_select($tbl, false);
        $this -> db -> limit($limit, $offset);
        $rest = $this -> db -> get();
        $data['results'] = $rest -> result();
        $data['total'] = $this -> db -> query($sql) -> num_rows();

        return $data;
    }

	function listAll($table = false){
        $tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
		$rest = $this -> db -> get($tbl);
		return $rest -> result();
	}

	function save($data, $table = false){
        $tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
		if(isset($data['id']) && $data['id'] > 0){
			$this -> db -> update($tbl, $data, array('id' => $data['id']));
			return $data['id'];
		}else{
			$this -> db -> insert($tbl, $data);
			return $this -> db -> insert_id();
		}
	}

	function delete($id, $table = false){
        $tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
		$this -> db -> delete($tbl, array('id' => $id));
	}

	function get_unique_url($url, $id = false, $table = false){
        $tbl = $this -> table;
        if($table){
            $tbl = $table;
        }
		$this -> db -> select('slug, id');
		$this -> db -> where('slug', $url);
		$rest = $this -> db -> get($tbl);
		if($rest -> num_rows() == 0){
			return $url;
		}else{
			$cr = $rest -> first_row();
			if($cr -> id == $id){
				return $url;
			}else{
				$url = $url.'1';
				return $this -> get_unique_url($url, $id, $tbl);
			}
		}
	}
}


class RecordSet{
    var $results;
    var $size;
}
