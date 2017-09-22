<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    $username = $faker->unique()->regexify('[A-Z]{5}[0-9]{3}');;
    $firstname = $faker->firstName();
    $lastname = $faker->lastName;

    $department = $faker->randomElement([
        'WCOB Walton College of Business',
        'FINN Finance',
        'ISYS Information Systems',
        'ACCT Accounting',
        'MGMT Management',
        'LSCM Supply Chain Management',
        'ECON Economics',
        'MKTT Marketing',
    ]);

    $empltype = $faker->randomElement(['A','H']);
    $faculty = ($empltype === 'A') ? $faker->boolean : false;
    $adjunct = $faculty ? $faker->boolean(20) : false;
    $ga = ($faculty && !$adjunct) ? $faker->boolean(30) : false;
    $tenure = ($faculty && !$adjunct && !$ga) ? $faker->boolean(70) : false;
    $dptchair = $tenure ? $faker->boolean(10) : false;
    $lasthire = ($empltype === 'H') ? null : $faker->date();

    return [
        'emp_id' => $faker->unique()->randomNumber(6),
        'isisid' => $faker->unique()->randomNumber(9),
        'w4_name' => "$lastname, $firstname/",
        'prefname' => "$firstname $lastname",
        'firstname' => $firstname,
        'middlename' => null,
        'lastname' => $lastname,
        'BU_Code' => substr($department, 0, 4),
        'BU_Short_Name' => substr($department, 5),
        'dir_addr' => null,
        'dir_city' => null,
        'dirstate' => null,
        'dir_post' => null,
        'dirphone' => null,
        'camabldg' => ($empltype === 'A') ? $faker->randomElement(['WCOB','WJWH','RCED','JBHT']) : null,
        'camaroom' => ($empltype === 'A') ? $faker->randomNumber(3) : null,
        'camphone' => ($empltype === 'A') ? "479/575-{$faker->randomNumber(4)}" : null,
        'email' => "$username@uark.edu",
        'empltype' => $empltype,
        'dptchair' => $dptchair ? 'Y' : 'N',
        'degreecd' => function() use ($empltype, $tenure, $faker) {
            if ($empltype === 'H') {
                return null;
            }
            if ($tenure) {
                return 'PHD';
            }
            return $faker->randomElement([
                null,
                'BSBA',
                'MA',
                'MPA',
                'MSA',
                'MAT',
                'BM',
                'JD',
                'MACC',
                'MED',
                'BST',
                'PHD',
                'BS',
                'AA',
                'PGD',
                'MSOM',
                'MBA',
                'BA',
                'EDD',
                'BSPA',
                'BFA',
                'BSCE',
                'BSE',
                'BSEE',
                'SJD',
                'MS',
                'DM',
                'MIS',
            ]);
        },
        'emp_priv' => null,
        'lasthire' => $lasthire,
        'dbuasrvc' => $lasthire,
        'preftitl' => ($empltype === 'H') ? null : ($faker->boolean(10) ? $faker->randomElement([
            'Assistant Director of Something Special',
            'Custom Communications Officer',
            'Tailored Title',
        ]) : null),
        'username' => $username,
        'studtitl' => $ga ? 'Y' : null,
        'emp_pos' => ($empltype === 'H') ? null : ($ga ? 50 : ($adjunct ? $faker->randomElement([25,50,75]) : 100)),
        'occtitle' => ($empltype === 'H') ? null :
                ($ga ? $faker->randomElement([
                    'Senior Graduate Assistant',
                    'Graduate Assistant',
                ]) :
                ($dptchair ? 'Departmental Chairperson-WCOB' :
                ($adjunct ? 'Instructor' :
                ($tenure ? $faker->randomElement([
                    'WCOB-Distinguished Professor',
                    'University Professor - WCOB',
                    'Professor - WCOB',
                    'Assoc Professor - WCOB',
                    'Assistant Professor',
                ]) :
                ($faculty ? 'Instructor' : $faker->randomElement([
                    'Academic Counselor',
                    'Administrative Analyst',
                    'Administrative Specialist I',
                    'Administrative Specialist II',
                    'Administrative Specialist III',
                    'Administrative Supp.Supervisor',
                    'Assoc. Dir of Outreach',
                    'Associate Dir of Technology',
                    'Asst Dean',
                    'Asst To The Dean',
                    'Computer Support Manager',
                    'Computer Support Specialist',
                    'Conference Coordinator',
                    'Development Specialist',
                    'Dir of Bus and Econ Research',
                    'Director of Outreach',
                    'Director of Technology',
                    'Fiscal Support Analyst',
                    'HEI Program Coordinator',
                    'Inventory Control Manager',
                    'Major Gift Development Officer',
                    'Network Support Specialist',
                    'Project/Program Director',
                    'Project/Program Manager',
                    'Project/Program Specialist',
                    'Research Assistant',
                    'Research Associate',
                    'Sr. Project/Program Director',
                ])))))),
    ];
});
