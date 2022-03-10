<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantWithSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $twoOrThree = random_int(2, 3);
        $wSkills = ['PHP', 'Python', 'Javascript', 'Java', 'Ruby', 'C++', 'Lisp', 'Cobol'];
        $dSkills = ['Fireworks', 'Illustrator', 'Photoshop'];        
        $applicant = Applicant::factory()->create();
        
        if($applicant->job->name == 'Web Developer') {
            Skill::create([
                'name' => $wSkills[random_int(0, 7)],
                'applicant_id' => $applicant->id
            ]);
            
            Skill::create([
                'name' => $wSkills[random_int(0, 7)],
                'applicant_id' => $applicant->id
            ]);
            if($twoOrThree == 3) {
                Skill::create([
                        'name' => $wSkills[random_int(0, 7)],
                        'applicant_id' => $applicant->id
                ]); 
            }    
        } else {
            if($twoOrThree == 3) {
                Skill::create([
                        'name' => $dSkills[0],
                        'applicant_id' => $applicant->id
                ]); 
            }    
            Skill::create([
                'name' => $dSkills[1],
                'applicant_id' => $applicant->id
            ]);
            
            Skill::create([
                'name' => $dSkills[2],
                'applicant_id' => $applicant->id
            ]);
        }
    }
}
