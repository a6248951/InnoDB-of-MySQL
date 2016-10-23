<?php

		//MySQL事务的使用
        $title = $post['title'];
        $username =$post['username'];
        $mobile = $post['mobile'];
        $post['username'];

        $this->db->query("BEGIN"); //开启事务
		$this->db->query("INSERT INTO {$this->table} ($sqlk) VALUES ($sqlv)");
		$res1  = $this->itemid = $this->db->insert_id();

		$res2 = $this->db->query("INSERT INTO `aijiacms_order`
				(`title`, `buyer`, `truename`,`tel` ,`referrer`,`enrolltype`,`addtime`)
				 VALUES 
			 	('".$username."','".$username."','".$username."','".$mobile."','".$usernmae."',1,".time().")"
			 );

		if($res1 && $res2){
			$this->db->query("COMMIT");//执行事务;
			echo json_encode(array('status' => 'success'));
		}
		else{
			$this->db->query("ROLLBACK");//执行失败则回滚
			echo json_encode(array('status'=>'false'))
		}