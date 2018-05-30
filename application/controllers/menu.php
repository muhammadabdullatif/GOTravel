<?php
class Pesawat extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {       
        $data['record']=  $this->db->get('tbl_pesanan')->result();
        $this->load->view('menu/view',$data);
    }
    
    function add() {
            $data   =   array(  'nama'      =>  $_POST['nama'],
                                'asal'      =>  $_POST['asal'],
                                'tujuan'    =>  $_POST['tujuan'],
                                'berangkat'  =>  $_POST['berangkat'],
                                'pulang'      =>  $_POST['pulang'],
                                'penumpang'      =>  $_POST['penumpang']);
            $this->db->insert('tb_pesanan',$data);
            redirect('menu');
    }
    
    function edit()
    {
            $data   =   array(  'nama'      =>  $_POST['nama'],
                                'asal'      =>  $_POST['asal'],
                                'tujuan'    =>  $_POST['tujuan'],
                                'berangkat'  =>  $_POST['berangkat'],
                                'pulang'      =>  $_POST['pulang'],
                                'penumpang'      =>  $_POST['penumpang']);
            $this->db->where('id',$_POST['id']);
            $this->db->update('tb_pesanan',$data);
            redirect('menu');
        }
    
    
    function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('tb_pesanan');
       	redirect('menu');
    }
}