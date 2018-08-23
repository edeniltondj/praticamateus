<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 require_once(APPPATH.'third_party/mpdf/mpdf.php');
class Html_to_pdf { 
  
    private $mpdf; 
  
    public function __construct() { 
        $this->mpdf = new mPDF('','A4','','trebuchetms', '10', '10', '10', '10', '0', '0'); 
    }//__construct() 
  
    /** 
     * convert() 
     * - Converte um c贸digo em HTML para um arquivo PDF 
     * @param $html = 'C贸digo HTML' 
     */
    public function convert($html) { 
  
        $this->mpdf->WriteHTML($html); 
  
        return $this->mpdf->Output(); 
  
    } 
  
}//Html To Pdf 