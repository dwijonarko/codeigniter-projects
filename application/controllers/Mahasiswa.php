<?php
/**
 * class controller mahasiswa
 */
class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
    }
    
    public function index(){
        $this->load->view('mahasiswa/index');
        //memanggil view dalam folder mahasiswa dengan nama index.php
    }

    public function create(){
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $tmp_lahir = $this->input->post('tmp_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $gender = $this->input->post('gender');
        $jurusan = $this->input->post('jurusan');
        $email = $this->input->post('email');

        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'tmp_lahir' => $tmp_lahir,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'gender' => $gender,
            'jurusan' => $jurusan,
            'email' => $email,
        );

        $config['upload_path']          = './uploads/'; //direktori untuk menyimpan file yg di upload
        $config['allowed_types']        = 'gif|jpg|png'; //type file yang diijinkan unutk di upload
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = $nim; //mengubah nama file yang diunggah

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->load->view('mahasiswa/index', $error);
        }
        else
        {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $data['foto']='uploads/'.$file_name;
            if ($this->db->insert('mahasiswa', $data)) {
            $this->session->set_flashdata('message','Data telah disimpan');
              redirect('mahasiswa/show');
            }
        }
    }
    
    public function show(){
      $query = $this->db->get('mahasiswa'); //query ke tabel mahasiswa
      $data['mahasiswa'] = $query->result(); //menyimpan hasil query dalam array data['mahasiswa']
      $data['title']='Data Pendaftaran Mahasiswa';
      $this->load->view('template/header',$data);
      $this->load->view('mahasiswa/show',$data); //menampilkan kepada views mahasiswa/show
      $this->load->view('template/footer');
    }

    public function show2(){
      $query = $this->db->get('mahasiswa');
      $this->load->library('table');
      $template = array(
        'table_open'=> '<table  class="table">',
      );
      $this->table->set_template($template);
      $this->table->set_heading('Nomor Induk', 'Nama', 'Tempat Lahir','Tanggal Lahir','Alamat','Gender','Jurusan','Email','Action');
      foreach ($query->result() as $row) {
        $links  = anchor('mahasiswa/edit/'.$row->nim ,'Edit',array('class'=>'btn btn-sm btn-info'));
        $links  .= ' ';
        $links  .= anchor('mahasiswa/delete/'.$row->nim ,'Delete',array('class'=>'btn btn-sm btn-danger'));
        $gender = ($row->gender=='L'? 'Laki-laki':'Perempuan');
        $jurusan  = array(
            'TI' =>'Teknik Informatika' ,
            'TM'=>'Teknik Mekatronika',
            'TT'=>'Teknik Telekomunikasi',
            'TAB'=>'Teknik Alat Berat'
        );
        $foto = "<img src='".base_url().$row->foto."'style='height: 130px;' >";
         $this->table->add_row(
           $row->nim,
           $row->nama,
           $row->tmp_lahir,
           $row->tgl_lahir,
           $row->alamat,
           $gender,
           $jurusan[$row->jurusan],
           $row->email,
           $foto,
           $links
         );
      }
      $data['title']='Data Pendaftaran Mahasiswa';
      $data['mahasiswa'] = $this->table->generate();
      $this->load->view('template/header',$data);
      $this->load->view('template/content',$data);
      $this->load->view('template/footer');
    }

    public function edit($nim){
      $query = $this->db->get_where('mahasiswa', array('nim' => $nim));
      $data['title']='Edit Data Mahasiswa';
      $data['mahasiswa'] = $query->row();
      $this->load->view('template/header',$data);
      $this->load->view('mahasiswa/edit',$data);
      $this->load->view('template/footer');
    }

    public function update(){
      $nim = $this->input->post('nim');
      $nama = $this->input->post('nama');
      $tmp_lahir = $this->input->post('tmp_lahir');
      $tgl_lahir = $this->input->post('tgl_lahir');
      $alamat = $this->input->post('alamat');
      $gender = $this->input->post('gender');
      $jurusan = $this->input->post('jurusan');
      $email = $this->input->post('email');

      $data = array(
          'nim' => $nim,
          'nama' => $nama,
          'tmp_lahir' => $tmp_lahir,
          'tgl_lahir' => $tgl_lahir,
          'alamat' => $alamat,
          'gender' => $gender,
          'jurusan' => $jurusan,
          'email' => $email,
      );
      if($_FILES['foto']['name'] == "") {
          $this->db->where('nim',$nim);
          if ($this->db->update('mahasiswa', $data)) {
          $this->session->set_flashdata('message','Data telah disimpan');
          redirect('mahasiswa/show');
          }          
      }else{
        //hapus foto lama
        $query = $this->db->get_where('mahasiswa',array('nim'=>$nim));
        $row = $query->row();
        unlink($row->foto);

        // upload foto baru
        $config['upload_path']          = './uploads/'; //direktori untuk menyimpan file yg di upload
        $config['allowed_types']        = 'gif|jpg|png'; //type file yang diijinkan unutk di upload
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = $nim; //mengubah nama file yang diunggah
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->load->view('mahasiswa/index', $error);
        }
        else
        {
             // update query
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $data['foto']='uploads/'.$file_name;
            $this->db->where('nim',$nim);
            if ($this->db->update('mahasiswa', $data)) {
            $this->session->set_flashdata('message','Data telah disimpan');
            redirect('mahasiswa/show');
            }          
        }
      }
    }

    public function delete($nim){
      $query = $this->db->get_where('mahasiswa',array('nim'=>$nim));
      $row = $query->row();
      if ( unlink($row->foto)) {
        if ($this->db->delete('mahasiswa', array('nim' => $nim))) {
          $this->session->set_flashdata('message','Data telah dihapus');
          redirect('mahasiswa/show');
        } 
       }

    }
}
