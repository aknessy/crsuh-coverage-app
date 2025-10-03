<?php defined('BASEPATH') OR exit('No direct script access allowed!');

// use PHPExcel;
// use PHPExcel_IOFactory;

/**
* @package CrossRiver Pay
* @author Nugi Technologies Development Team
* @copyright 2016
**/

class Md extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('md_m', 'md_login_m'));
		$this->load->helper('uuid_generator');
		$this->load->helper('random_md_code');
	}

    public function index(){
        $this->data['title'] = 'Ministry - Departments';
        $this->data['subview'] = 'dashboard/md_index';
        $this->load->view('_layout_main_', $this->data);
    }

    public function track_record(){
        $md_code = $this->session->login->md_code;
        $md_kpi_list = $this->md_m->get_md_kpi($md_code);
        
        $this->data['title'] = 'Ministry - Departments';
        $this->data['subview'] = 'dashboard/track_record';
        $this->data['md_kpi_list'] = $md_kpi_list;

        $this->load->view('_layout_main_', $this->data);
    }

    public function create_kpi(){
        if($_POST){
            $this->form_validation->set_rules('kpi[]', 'Key Performance Index', 'required');

            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error', 'Please select a Key Performance Index!');
                redirect(base_url('md/track_record'));
            }else{
                $kpi_md_code = $this->session->login->md_code;
                $selected_kpi = $this->input->post('kpi');
                $successes = 0;

                foreach($selected_kpi as $kpi){
                    $check_kpi_exists = $this->md_m->check_md_kpi($kpi_md_code, $kpi);
                    
                    if($check_kpi_exists){
                        continue;
                    }
        
                    $data = [
                        'kpi_uuid' => generate_uuid(),
                        'kpi_md_code' => $kpi_md_code,
                        'kpi_name' => $kpi,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
        
                    $insert = $this->md_login_m->populate_kpi_table($data);

                    if($insert)$successes++;
                }

                if($successes > 0){
                    $this->session->set_flashdata('success', 'Key Performance Indexes have been created for this Ministry/Department');
                }else{
                    $this->session->set_flashdata('error', 'Failed to create KPIs. Please try again!');
                }

                redirect(base_url('md/track_record'));
            }
        }else{
            $this->session->set_flashdata('error', 'Request rejected!');
            redirect(base_url('md/track_record'));
        }
    }

    public function load_kpi_form(){
        $perf_index = $this->input->post('kpi');
        $form = '';
        
        if($perf_index != ''){
            switch ($perf_index) {
                case 'Enrollment':
                    echo $this->load->view('kpi_forms/enrollment', '', true);
                    break;
                case 'Empanelment':
                    echo $this->load->view('kpi_forms/empanelment', '', true);
                    break;
                case 'Interventions':
                    echo $this->load->view('kpi_forms/interventions', '', true);
                    break;
                case 'Quality Assurance':
                case 'Fee for Service':
                case 'Capitation Payment':
                    $md_state = $this->session->login->md_state;
                    $lgas = $this->md_m->get_md_lgas(intval($md_state));
                    $data['lgas'] = $lgas;

                    echo $this->load->view('kpi_forms/providers', $data, true);
                    break;
                case 'Accreditation':
                    echo $this->load->view('kpi_forms/accreditation', '', true);
                    break;
                case 'SOC Meetings':
                    echo $this->load->view('kpi_forms/soc_meetings', '', true);
                    break;
                case 'Trainings':
                    echo $this->load->view('kpi_forms/trainings', '', true);
                    break;
                default:
                    echo 'No Key Performance Index Provided!';
                    break;
            }
        }else{
            echo 'No Key Performance Index Provided!';
        }
    }

    public function download_template(){
        require_once FCPATH . 'vendor/autoload.php'; // Composer autoload

        if (ob_get_contents()) ob_end_clean();

        // Create new PHPExcel object
        $excel = new PHPExcel();
        $excel->setActiveSheetIndex(0);
        $sheet = $excel->getActiveSheet();

        $sheet->mergeCells('A1:E1');
        $sheet->setCellValue('A1', 'PATIENTS INFORMATION SHEET');

        $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $excel->getProperties()
                ->setCreator("Nugi")
                ->setTitle("Sample Template for Patients Information");
            
        $sheet->setCellValue('A3', 'ID');
        $sheet->setCellValue('B3', 'Patient ID (PID)');
        $sheet->setCellValue('C3', 'Firstname');
        $sheet->setCellValue('D3', 'Lastname');
        $sheet->setCellValue('E3', 'Phone');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="template.xlsx"');
        header('Cache-Control: max-age=0');

        // Write file to output
        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function record_kpi(){
        if($_POST)
        {
            if($this->validate_kpi_fields($_POST)){
                $patient_records = [];
                $data = [];
                
                // Check if file was uploaded
                if (isset($_FILES['attached_file']['name']) && $_FILES['attached_file']['name'] !== '') {
                    $fileTmpPath = $_FILES['attached_file']['tmp_name'];
                                      
                    require_once APPPATH . 'third_party/Classes/PHPExcel.php';
                    
                    $objPHPExcel = PHPExcel_IOFactory::load($fileTmpPath);
                    $sheet = $objPHPExcel->getActiveSheet();

                    $highestRow = $sheet->getHighestRow(); // e.g. 100
                    $highestColumn = $sheet->getHighestColumn(); // e.g. 'F'
                    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

                    // Start from row 3
                    for ($row = 3; $row <= $highestRow; $row++) {
                        $pid = $sheet->getCellByColumnAndRow(1, $row)->getValue(); // Column A
                        $fname = $sheet->getCellByColumnAndRow(2, $row)->getValue(); // Column B
                        $lname = $sheet->getCellByColumnAndRow(3, $row)->getValue(); // Column C
                        $phone = $sheet->getCellByColumnAndRow(4, $row)->getValue(); // Column D

                        // Skip empty rows
                        if (!$pid && !$fname && !$lname && !$phone) continue;

                        $patient_records[] = [
                            'patient_pid' => $pid,
                            'patient_firstname'  => $fname,
                            'patient_lastname' => $lname,
                            'patient_phone'   => $phone
                        ];
                    }
                }

                if($this->input->post('patient_pid') !== false){
                    $count_patients = count($this->input->post('patient_pid'));

                    for($i = 0; $i < $count_patients; $i++){
                        $patient_records[] = [
                            'patient_pid' => $this->input->post('patient_pid')[$i],
                            'patient_firstname' => $this->input->post('patient_fname')[$i],
                            'patient_lastname' => $this->input->post('patient_lname')[$i],
                            'patient_phone' => $this->input->post('patient_phone')[$i]
                        ];
                    }
                }

                $data = $_POST;
                $generate_uuid = generate_uuid();

                $data['uuid'] = $generate_uuid;
                $data['kpi_uuid'] = $this->input->post('kpi');

                unset($data['kpi']);
                unset($data['patient_pid']);
                unset($data['patient_fname']);
                unset($data['patient_lname']);
                unset($data['patient_phone']);

                $data['md_uuid'] = $this->session->login->uuid;
                $data['created_at'] = date('Y-m-d H:i:s');
            
                $insert = $this->md_m->insert($data);
                
                if($insert){
                    $track_record_uuid = $generate_uuid;
                    $inserted = 0;

                    for($i = 0; $i < count($patient_records); $i++)
                    {
                        $record = [
                            'track_record_uuid' => $track_record_uuid,
                            'patient_pid' => $patient_records[$i]['patient_pid'],
                            'patient_firstname' => $patient_records[$i]['patient_firstname'],
                            'patient_lastname' => $patient_records[$i]['patient_lastname'],
                            'patient_phone' => $patient_records[$i]['patient_phone'],
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        $create_patient_record = $this->md_m->create_patient_record($record);
                        
                        if($create_patient_record)$inserted++;
                    }

                    if($inserted > 0){
                        $this->session->set_flashdata('success', 'CRSUHC Record saved successfully!');
                    }else{
                        $this->session->set_flashdata('error', 'Failed to save record!!');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Failed to keep track of KPI record!');
                }

                redirect(base_url('md/track_record'));
            }else{
                $this->session->set_flashdata('error','Form validation was not successful! Please try again!!');
                redirect(base_url('md/track_record'));
            }

        }else{
            $this->session->set_flashdata('error', 'Request is invalid!');
            redirect(base_url('md/track_record'));
        }
    }

    public function view($uuid){
        if($_POST){
            $this->form_validation->set_rules('md_name', 'MD Name', 'trim|required');
            $this->form_validation->set_rules('md_code', 'MD Code', 'trim|required');
            $this->form_validation->set_rules('md_state', 'MD State', 'trim');
            $this->form_validation->set_rules('md_lga', 'MD LGA', 'trim');
            $this->form_validation->set_rules('md_password', 'MD Password', 'trim|required');
            
            if($this->form_validation->run() == false){
                echo validation_errors();
                $this->session->set_flashdata('error', 'Form validation was not successful! Please try again!!');
                redirect(base_url('md/view/'.$uuid));
            }else{
                $data = $_POST;
                
                $data['pwd_text'] = $data['md_password'];
                $data['pwd_hash'] = $this->md_login_m->myhash($data['md_password']);
                $data['updated_at'] = date('Y-m-d H:i:s');
                
                unset($data['md_password']);
                
                $update = $this->md_m->update($uuid, $data);

                if($update){
                    $this->session->set_flashdata('success', 'MD updated successfully!');
                    redirect(base_url('md/view/'.$uuid));
                }else{
                    $this->session->set_flashdata('error', 'Failed to update MD!');
                    redirect(base_url('md/view/'.$uuid));
                }
            }
        }else{
            $this->data['title'] = 'MD View';
            $this->data['subview'] = 'dashboard/md_view';
            $this->data['md'] = $this->md_m->get_md_by_uuid($uuid);
            $this->data['states'] = $this->md_m->get_md_states();
            $this->data['lgas'] = $this->md_m->get_md_lgas($this->data['md']->md_state);
            $this->load->view('_layout_main_', $this->data);
        }
    }

    public function delete($md_uuid){
        if($this->session->login->usertype == 'Super Admin'){
            $delete = $this->md_m->soft_delete($md_uuid);

            if($delete){
                $this->session->set_flashdata('success', 'MD deleted successfully!');
                redirect(base_url('dashboard'));
            }else{
                $this->session->set_flashdata('error', 'Failed to delete MD!');
                redirect(base_url('dashboard'));
            }
        }else{
            $this->session->set_flashdata('error', 'You are not authorized to delete an MD!');
            redirect(base_url('dashboard'));
        }
    }

    private function validate_kpi_fields($postData){
        foreach ($postData as $field => $value) {
            // If field is an array (e.g. email[], age[])
            if (is_array($value)) {
                foreach ($value as $index => $item) {
                    $rules = 'required|trim';
    
                    // Add contextual rules based on field name
                    if (stripos($field, 'email') !== false) {
                        $rules .= '|valid_email';
                    }
                    if (stripos($field, 'age') !== false || stripos($field, 'qty') !== false) {
                        $rules .= '|integer|greater_than[0]';
                    }
    
                    // Apply rule to each indexed item
                    $this->form_validation->set_rules("{$field}[{$index}]", ucfirst($field) . " #{$index}", $rules);
                }
            } else {
                // Scalar field
                $rules = 'required|trim';
    
                if (stripos($field, 'email') !== false) {
                    $rules .= '|valid_email';
                }
                if (stripos($field, 'age') !== false || stripos($field, 'qty') !== false) {
                    $rules .= '|integer|greater_than[0]';
                }
    
                $this->form_validation->set_rules($field, ucfirst($field), $rules);
            }
        }    
    
        // Run validation
        if ($this->form_validation->run() === FALSE) {
            return false;
        } else {
            return true;
        }
    }

}