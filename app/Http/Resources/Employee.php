<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

/**
 * @SWG\Definition(
 *   required={
 *     "username",
 *     "name",
 *     "first_name",
 *     "last_name",
 *     "classifications",
 *     "departments",
 *     "email",
 *   },
 *   type="object",
 * )
 */
class Employee extends Resource
{
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    protected $username;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'username' => strtolower($this->username),
            'name' => $this->prefname,
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'title' => $this->when(!empty($this->preftitl ?? $this->occtitle), function () {
                return $this->preftitl ?? $this->occtitle;
            }),
            'classifications' => (function($employee) {
                $classifications = [];

                if ($employee->empltype === 'H') {
                    $classifications []= 'Hourly';
                }

                if ($employee->studtitl === 'Y') {
                    $classifications []= 'Student';
                }

                if (str_contains(strtolower($employee->occtitle), ['professor', 'instructor'])) {
                    $classifications []= 'Faculty';
                }

                if ($employee->emp_pos == 100 && !in_array('Faculty', $classifications)) {
                    $classifications []= 'Staff';
                }

                return $classifications;
            })($this),
            'departments' => [
                $this->BU_Code,
            ],
            'email' => strtolower($this->email),
            'office' => $this->when(!empty($this->camabldg), function () {
                return "$this->camabldg $this->camaroom";
            }),
            'phone' => $this->when(!empty($this->camphone), function () {
                return $this->camphone;
            }),
        ];
    }
}
