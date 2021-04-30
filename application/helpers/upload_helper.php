    <?php

    function file_upload($file){
        $ci = &get_instance();
        $ci->load->library('upload');
        $dir = 'uploads/';
        if(!is_dir($dir)) mkdir($dir, 0777);

        $res = false;
        $files = $_FILES;

        if(empty($_FILES[$file]['name'][0]))
            return false;
        else{       
            for ($i=0; $i<count($_FILES[$file]['name']); $i++) {
                $_FILES['file']['name'] = $files[$file]['name'][$i];
                $_FILES['file']['type'] = $files[$file]['type'][$i];
                $_FILES['file']['tmp_name'] = $files[$file]['tmp_name'][$i];
                $_FILES['file']['error'] = $files[$file]['error'][$i];
                $_FILES['file']['size'] = $files[$file]['size'][$i];

                $ext = explode('/', $_FILES['file']['type']);
                $ext = $ext[1].'/';

                if(!is_dir('./'.$dir.$ext)) mkdir($dir.$ext, 0777);
                

                $path = base_url().$dir.$ext;
                $config['upload_path']          = $dir.$ext;
                $config['allowed_types']        = 'gif|jpg|png|pdf|doc|csv|xlm';
                $config['encrypt_name']         = true;

                $ci->upload->initialize($config);

                if(!$ci->upload->do_upload('file')){
                    return $ci->upload->display_errors();
                }else{
                    // $file_name=$ci->upload->file_name;
                    $img = $ci->upload->data();
                    $res[] = $path.$img['file_name'];
                }
            }
            return implode(', ', $res);
        }
        
    }