<?php

namespace App\Models;

use CodeIgniter\Model;

class FieldModel extends Model
{
    protected $table          = 'field';
    protected $primaryKey     = 'field_id';
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'field_name',
        'address',
        'subdistrict',
        'district',
        'city',
        'province',
        'price',
        'number_of_fields',
        'owner_id',
        'field_image'
    ];
    protected $useTimestamps      = true;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAllField(){
        $query = "SELECT * FROM field WHERE is_active = '1'";
        return $this->db->query($query)->getResultArray();
    }

    public function getDetailField($fieldId){
        $query = "SELECT * FROM field WHERE field_id='$fieldId'";
        return $this->db->query($query)->getRowArray();
    }

    public function getFieldBookedTime($fieldId){
        $query = "SELECT field_number, booking_time, booking_date FROM field JOIN booking JOIN detail_booking
                    ON booking.booking_id = detail_booking.booking_id
                    ON field.field_id = booking.field_id
                    WHERE field.field_id='$fieldId'";
        return $this->db->query($query)->getResultArray();
    }
}
