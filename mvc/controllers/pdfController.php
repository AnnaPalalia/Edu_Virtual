<?php

/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 02/02/2017
 * Time: 04:07 PM
 */
class pdfController extends Controller
{
    private $_pdf;
    public function __construct()
    {
        parent::__construct();
        $this->getLibrary('pdf/fpdf');
        $this->_pdf=new FPDF();
    }
    public function index()
    {
        // TODO: Implement index() method.
        $this->_pdf->AddPage();
        $this->_pdf->SetFont('Times','B',24);
        $this->_pdf->SetXY(25,25);
        $this->_pdf->Write(25,'¡Hola Mundo!');
        $this->_pdf->Output();
    }

}