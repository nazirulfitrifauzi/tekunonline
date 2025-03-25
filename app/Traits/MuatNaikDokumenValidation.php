<?php

namespace App\Traits;

trait MuatNaikDokumenValidation
{
    public $document_ic_no;
    public $document_icP_no;
    public $document_ssm;
    public $document_business_picture;
    public $document_bank_statements;
    public $document_perkeso;

    protected $rules = [
        'document_ic_no' => 'required|file|mimes:pdf|max:10240',
        'document_icP_no' => 'required|file|mimes:pdf|max:10240',
        'document_ssm' => 'required|file|mimes:pdf|max:10240',
        'document_business_picture' => 'required|file|mimes:pdf|max:10240',
        'document_bank_statements' => 'required|file|mimes:pdf|max:10240',   
        'document_perkeso' =>'required|file|mimes:pdf|max:10240'
    ];

    protected $messages = [
        'document_ic_no.required' => 'Sila muat naik salinan Kad Pengenalan Pemohon',
        'document_ic_no.mimes' => 'Sila muat naik fail dalam format PDF sahaja',
        'document_icP_no.required' => 'Sila muat naik salinan Kad Pengenalan Pasangan',
        'document_icP_no.mimes' => 'Sila muat naik fail dalam format PDF sahaja',
        'document_ssm.required' => 'Sila muat naik salinan Lesen/Permit/Daftar Perniagaan',
        'document_ssm.mimes' => 'Sila muat naik fail dalam format PDF sahaja',
        'document_business_picture.required' => 'Sila muat naik gambar perniagaan',
        'document_business_picture.mimes' => 'Sila muat naik fail dalam format PDF sahaja',
        'document_bank_statements.required' => 'Sila muat naik Penyata Bank',
        'document_bank_statements.mimes' => 'Sila muat naik fail dalam format PDF sahaja',
        'document_perkeso.required' => 'Sila muat naik salinan Perkeso',
        'document_perkeso.mimes' => 'Sila muat naik fail dalam format PDF sahaja'
    ];
}
