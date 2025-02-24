<?php

namespace App\Traits;

trait MuatNaikDokumenValidation
{
    public $document_ic_no;
    public $document_icP_no;
    public $document_ssm;
    public $document_business_picture;
    public $document_bank_statements;


    protected $rules = [
        'document_ic_no' => 'required|file|max:10240',
        'document_icP_no' => 'required|file|max:10240',
        'document_ssm' => 'required|file|max:10240',
        'document_business_picture' => 'required|file|max:10240',
        'document_bank_statements' => 'required|file|max:10240',   
    ];

    protected $messages = [
        'document_ic_no.required' => 'Sila muat naik salinan Kad Pengenalan Pemohon',
        'document_icP_no.required' => 'Sila muat naik salinan Kad Pengenalan Pasangan',
        'document_ssm.required' => 'Sila muat naik salinan Lesen/Permit/Daftar Perniagaan',
        'document_business_picture.required' => 'Sila muat naik gambar perniagaan',
        'document_bank_statements.required' => 'Sila muat naik Penyata Bank',
    ];
}
