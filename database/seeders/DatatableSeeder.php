<?php

namespace Database\Seeders;

use App\Models\AnswerAttatchment;
use App\Models\AnswerDetails;
use App\Models\AnswerMaster;
use App\Models\AnswerPortal;
use App\Models\DeviceType;
use App\Models\LoginType;
use App\Models\QuestionAttatchment;
use App\Models\QuestionDetails;
use App\Models\QuestionMaster;
use App\Models\QuestionPayment;
use App\Models\QuestionType;
use App\Models\RedirectionReason;
use App\Models\SearchQueries;
use App\Models\SolutionButtonClicks;
use App\Models\SourceType;
use App\Models\Student;
use App\Models\StudentDetails;
use App\Models\SubjectMaster;
use App\Models\SubscriptionMaster;
use App\Models\SubscriptionPlans;
use App\Models\SubscriptionStatus;
use App\Models\SubscriptionTransactions;
use App\Models\Tutor;
use App\Models\TutorBankDetails;
use App\Models\TutorClarification;
use App\Models\TutorEducationDetails;
use App\Models\TutorPayments;
use App\Models\UserTypeMaster;
use App\Models\VerificationStatus;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DatatableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        UserTypeMaster::insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SubjectMaster::insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        QuestionMaster::insert([
            'subject_id' => '1',
            'title' => 'here the asked question supposed to inserted !!',
            'description' => 'a long type question description to be inserted in this column',
            'userType_id' => '1',
            'uploader_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        QuestionAttatchment::insert([
            'question_id' => '1',
            'file_url' => 'C:/answer99/storage/public/question_attatchment/file.extension',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SourceType::insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DeviceType::insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        RedirectionReason::insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        QuestionDetails::insert([
            'source_type_id' => '1',
            'source_id' => '1',
            'device_type_id' => '1',
            'redirection_reason_id' => '1',
            'comments' => 'comments for the particulary question',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SearchQueries::insert([
            'queries' => 'long type queries to be stored here',
            'userType_id' => '1',
            'user_id' => '1',
            'device_type_id' => '1',
            'results_count' => '25',
            'solved_questions_count' => '7',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        LoginType::insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Student::insert([
            'name' => $faker->name,
            'login_type_id' => '1',
            'login_id' => '1',
            'subscription_validity' => '365',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        QuestionType::insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        StudentDetails::insert([
            'country' => $faker->country,
            'whatsapp_number' => '8696735250',
            'university' => 'MDU',
            'degree' => 'B.tech',
            'specialization' => 'aeronautics',
            'completion_year' => $faker->year,
            'question_type_id' => '1',
            'question_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SubscriptionPlans::insert([
            'name' => $faker->name,
            'price' => '440',
            'frequency_days' => '365',
            'free_trial_days' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SubscriptionStatus::insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SubscriptionMaster::insert([
            'subscription_plan_id' => '1',
            'student_id' => '1',
            'question_type_id' => '1',
            'question_id' => '1',
            'subscription_status_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SubscriptionTransactions::insert([
            'subscription_id' => '1',
            'amount' => '27.99',
            'installment_number' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        QuestionPayment::insert([
            'student_id' => '1',
            'question_id' => '1',
            'amount' => '19.99',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SolutionButtonClicks::insert([
            'question_type_id' => '1',
            'question_id' => '1',
            'student_id' => '1',
            'country' => $faker->country,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        VerificationStatus::insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        AnswerMaster::insert([
            'question_id' => '1',
            'description' => 'long type description to be inserted in this column',
            'verification_status_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        AnswerAttatchment::insert([
            'answer_id' => '1',
            'attatchment_url' => 'C:/answer99/storage/public/answer_attatchment/file_url',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Tutor::insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'mobile' => '9985462454',
            'verification_status_id' => '1',
            'status_changed_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        AnswerDetails::insert([
            'answer_id' => '1',
            'tutor_id' => '1',
            'price' => '24.99',
            'reward' => '4.55',
            'penalty' => '15.29',
            'comments' => 'text comments for the answer to be instered in this column ..',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        AnswerPortal::insert([
            'question_id' => '1',
            'user_type_id' => '1',
            'user_id' => '1',
            'first_request_date' => $faker->date,
            'last_request_date' => $faker->date,
            'request_count' => '5',
            'priority_score' => '23',
            'answer_price' => '14.99',
            'committed_by' => '1',
            'commit_date' => $faker->date,
            'commit_validity' => '28',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TutorEducationDetails::insert([
            'tutor_id' => '1',
            'degree1' => 'B.tech',
            'college1' => 'JNU delhi',
            'graduation_year' => $faker->year,
            'degree_file1' => 'C:/answer99/storage/tutor_edu/degree1/file',
            'degree2' => 'M.tech',
            'college2' => 'JNU delhi',
            'pg_year' => $faker->year,
            'degree_file2' => 'C:/answer99/storage/tutor_edu/degree2/file',
            'question_id' => '1',
            'status_changed_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TutorBankDetails::insert([
            'tutor_id' => '1',
            'ac_name' => 'savings account',
            'ac_number' => '1000356989741',
            'bank_name' => 'Sbi',
            'ifsc' => 'SBI005624',
            'pan' => 'NSC5622hk',
            'pan_file' => 'C:/answer99/storage/public/pan/file',
            'cheque_file' => 'C:/answer99/storage/public/cheque_file/file',
            'verification_status_id' => '1',
            'status_changed_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TutorClarification::insert([
            'tutor_id' => '1',
            'section_number' => '12345',
            'clarification_msg' => 'tutor clarification about his/her verification is stored here..',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TutorPayments::insert([
            'tutor_id' => '1',
            'tutor_months' => $faker->date,
            'total_amount' => '522.86',
            'tds' => '5.652',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
