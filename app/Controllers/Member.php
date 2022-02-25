<?php

namespace App\Controllers;

class Member extends BaseController{

    public function findField(){
        $field = $this->fieldModel->getAllField();
        $data = [
            "user" => $this->user,
            "isSidebarHidden" => false,
            "title" => "Find field",
            "field"=> $field
        ];
        return view('member/find-field', $data);
    }

    public function detailField($fieldId){
        $format = 'D, j M Y';
        $field = $this->fieldModel->getDetailField($fieldId);
        $availableDate = [
            date($format),
            date($format, strtotime("+1 day")),
            date($format, strtotime("+2 day")),
        ];
        $bookedTime = $this->fieldModel->getFieldBookedTime($fieldId, $availableDate);
        $fieldNumber = $field['number_of_fields'];
        $availableTime = [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        $data = [
            "user" => $this->user,
            "title" => "Book a field",
            "isSidebarHidden" => true,
            "field"=> $field,
            "field_number"=> $fieldNumber,
            "booked_time" => $bookedTime,
            "available_date" => $availableDate,
            "available_time" => $availableTime
        ];
        return view('member/detail-field', $data);
    }

    public function bookingConfirmation() {
        $result = $this->request->getVar('time');
        $fieldId = $this->request->getVar('field_id');
        $userId = $this->user['user_id'];
        $this->bookingModel->book($result, $fieldId, $userId);
        return redirect()->to('/history');
    }

    public function team() {
        if ($this->user['team_id']) {
            $team= $this->teamModel->getDetailTeam($this->user['team_id']);
            $data = [
                "user" => $this->user,
                "isSidebarHidden" => false,
                "title" => "Your Team",
                "team"=> $team
            ];
            return view('member/detail-team', $data);
        } else {
            $team = $this->teamModel->getAllTeam();
            $data = [
                "user" => $this->user,
                "isSidebarHidden" => false,
                "title" => "List of Teams",
                "team"=> $team
            ];
            return view('member/find-team', $data);
        }
    }

    public function history(){
        $booking = $this->bookingModel->getHistory($this->user['user_id']);
        $data = [
            "user" => $this->user,
            "isSidebarHidden" => false,
            "title" => "History",
            "booking"=> $booking
        ];
        return view('member/history', $data);
    }

    public function detailBooking($bookingId){
        $booking = $this->bookingModel->getBooking($bookingId);
        $detailBooking = $this->bookingModel->getDetailBooking($bookingId);
        $field = $this->fieldModel->getDetailField($booking['field_id']);
        $data = [
            "user" => $this->user,
            "isSidebarHidden" => false,
            "title" => "Detail Booking",
            "booking"=> $booking,
            "field" => $field,
            "detail_booking" => $detailBooking
        ];
        return view('member/detail-booking', $data);
    }

    public function createTeam() {
        $data = [
            "user" => $this->user,
            "isSidebarHidden" => false,
            "title" => "Create team",
            "validation" => \Config\Services::validation()
        ];
        return view('member/create-team', $data);
    }

    public function attemptCreateTeam() {
        $validator = [
            'team' => 'required|is_unique[team.team]',
        ];
        if (!$this->validate($validator)) {
            return redirect()->to('/create-team')->withInput();
        }
        $data = [
            'team' => $this->request->getVar('team'),
        ];
        $this->teamModel->save($data);
        $insertedTeam = $this->teamModel->getTeamFromName($data['team']);
        $this->joinTeam($insertedTeam['team_id']);
        return redirect()->to('/team');
    }

    public function joinTeam($teamId) {
        $this->teamModel->joinTeam($teamId, $this->user['user_id']);
        return redirect()->to('/team');
    }

    public function exitTeam() {
        $this->teamModel->exitTeam($this->user['user_id'], $this->user['team_id']);
        return redirect()->to('/team');
    }

    public function uploadReceipt() {
        $data = [
            'booking_id' => $this->request->getVar('booking_id'),
        ];
        $image = $this->request->getFile('receipt_image');
        if ($image) {
            $image->move('assets/img/booking');
            $imageName = $image->getName();
            $data['receipt_image'] = $imageName;
        }
        $this->bookingModel->save($data);
    }
}
