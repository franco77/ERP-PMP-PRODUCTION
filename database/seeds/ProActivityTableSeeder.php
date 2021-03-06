<?php

use Illuminate\Database\Seeder;

class ProActivityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pro_activity')->delete();
        
        \DB::table('pro_activity')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'ACT181010001',
                'name' => 'DUMMY - Activity 1',
                'description' => 'DUMMY - Activity 1',
                'status' => 1,
                'wbs_id' => 4,
                'planned_duration' => 7,
                'planned_start_date' => '2018-12-20',
                'planned_end_date' => '2018-12-26',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 15.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:40:08',
                'updated_at' => '2018-12-19 09:40:08',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'ACT181010002',
                'name' => 'DUMMY - Activity 2',
                'description' => 'DUMMY - Activity 2',
                'status' => 1,
                'wbs_id' => 4,
                'planned_duration' => 6,
                'planned_start_date' => '2018-12-26',
                'planned_end_date' => '2018-12-31',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 8.0,
                'predecessor' => '[1]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:40:27',
                'updated_at' => '2018-12-19 09:40:27',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'ACT181010003',
                'name' => 'DUMMY - Activity 3',
                'description' => 'DUMMY - Activity 3',
                'status' => 1,
                'wbs_id' => 4,
                'planned_duration' => 4,
                'planned_start_date' => '2018-12-31',
                'planned_end_date' => '2019-01-03',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 2.0,
                'predecessor' => '[2]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:40:42',
                'updated_at' => '2018-12-19 09:40:42',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'ACT181010004',
                'name' => 'DUMMY - Activity 4',
                'description' => 'DUMMY - Activity 4',
                'status' => 1,
                'wbs_id' => 5,
                'planned_duration' => 3,
                'planned_start_date' => '2019-01-03',
                'planned_end_date' => '2019-01-05',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 15.0,
                'predecessor' => '[3]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:41:40',
                'updated_at' => '2018-12-19 09:41:40',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'ACT181010005',
                'name' => 'DUMMY - Activity 5',
                'description' => 'DUMMY - Activity 5',
                'status' => 1,
                'wbs_id' => 5,
                'planned_duration' => 3,
                'planned_start_date' => '2019-01-05',
                'planned_end_date' => '2019-01-07',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 5.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:42:08',
                'updated_at' => '2018-12-19 09:42:08',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'ACT181010006',
                'name' => 'DUMMY - Activity 6',
                'description' => 'DUMMY - Activity 6',
                'status' => 1,
                'wbs_id' => 5,
                'planned_duration' => 3,
                'planned_start_date' => '2019-01-08',
                'planned_end_date' => '2019-01-10',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 5.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:42:22',
                'updated_at' => '2018-12-19 09:42:22',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'ACT181010007',
                'name' => 'DUMMY - Activity 7',
                'description' => 'DUMMY - Activity 7',
                'status' => 1,
                'wbs_id' => 6,
                'planned_duration' => 8,
                'planned_start_date' => '2019-01-15',
                'planned_end_date' => '2019-01-22',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 10.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:43:06',
                'updated_at' => '2018-12-19 09:43:06',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'ACT181010008',
                'name' => 'DUMMY - Activity 8',
                'description' => 'DUMMY - Activity 8',
                'status' => 1,
                'wbs_id' => 6,
                'planned_duration' => 8,
                'planned_start_date' => '2019-01-22',
                'planned_end_date' => '2019-01-29',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 10.0,
                'predecessor' => '[7]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:43:27',
                'updated_at' => '2018-12-19 09:43:27',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'ACT181010009',
                'name' => 'DUMMY - Activity 9',
                'description' => 'DUMMY - Activity 9',
                'status' => 1,
                'wbs_id' => 7,
                'planned_duration' => 10,
                'planned_start_date' => '2019-02-01',
                'planned_end_date' => '2019-02-10',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 10.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:44:03',
                'updated_at' => '2018-12-19 09:44:03',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 'ACT181010010',
                'name' => 'DUMMY - Activity 10',
                'description' => 'DUMMY - Activity 1',
                'status' => 1,
                'wbs_id' => 7,
                'planned_duration' => 10,
                'planned_start_date' => '2019-02-10',
                'planned_end_date' => '2019-02-19',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 10.0,
                'predecessor' => '[9]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:44:33',
                'updated_at' => '2018-12-19 09:44:33',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 'ACT181010011',
                'name' => 'DUMMY - Activity 11',
                'description' => 'DUMMY - Activity 11',
                'status' => 1,
                'wbs_id' => 8,
                'planned_duration' => 9,
                'planned_start_date' => '2019-02-28',
                'planned_end_date' => '2019-03-08',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 5.0,
                'predecessor' => '[1,4,7,9]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:45:28',
                'updated_at' => '2018-12-19 09:45:28',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => 'ACT181010012',
                'name' => 'DUMMY - Activity 12',
                'description' => 'DUMMY - Activity 12',
                'status' => 1,
                'wbs_id' => 9,
                'planned_duration' => 5,
                'planned_start_date' => '2019-03-11',
                'planned_end_date' => '2019-03-15',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 5.0,
                'predecessor' => '[11]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 09:45:58',
                'updated_at' => '2018-12-19 09:45:58',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => 'ACT182020001',
                'name' => 'Repair Dummy - ACT 1.1',
                'description' => 'Repair Dummy - ACT 1.1',
                'status' => 1,
                'wbs_id' => 12,
                'planned_duration' => 5,
                'planned_start_date' => '2018-12-29',
                'planned_end_date' => '2019-01-02',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 15.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 10:40:28',
                'updated_at' => '2018-12-19 10:40:28',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => 'ACT182020002',
                'name' => 'Repair Dummy - ACT 1.2',
                'description' => 'Repair Dummy - ACT 1.2',
                'status' => 1,
                'wbs_id' => 12,
                'planned_duration' => 4,
                'planned_start_date' => '2019-01-02',
                'planned_end_date' => '2019-01-05',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 10.0,
                'predecessor' => '[13]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 10:41:11',
                'updated_at' => '2018-12-19 10:41:11',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => 'ACT182020003',
                'name' => 'Repair Dummy - ACT 1.3',
                'description' => 'Repair Dummy - ACT 1.3',
                'status' => 1,
                'wbs_id' => 13,
                'planned_duration' => 4,
                'planned_start_date' => '2019-01-05',
                'planned_end_date' => '2019-01-08',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 8.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 10:41:40',
                'updated_at' => '2018-12-19 10:42:33',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => 'ACT182020004',
                'name' => 'Repair Dummy - ACT 1.4',
                'description' => 'Repair Dummy - ACT 1.4',
                'status' => 1,
                'wbs_id' => 13,
                'planned_duration' => 5,
                'planned_start_date' => '2019-01-09',
                'planned_end_date' => '2019-01-13',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 15.0,
                'predecessor' => '[14]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 10:42:13',
                'updated_at' => '2018-12-19 10:45:42',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => 'ACT182020005',
                'name' => 'Repair Dummy - ACT 2.1',
                'description' => 'Repair Dummy - ACT 2.1',
                'status' => 1,
                'wbs_id' => 14,
                'planned_duration' => 10,
                'planned_start_date' => '2019-01-05',
                'planned_end_date' => '2019-01-14',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 20.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 10:43:19',
                'updated_at' => '2018-12-19 10:43:19',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => 'ACT182020006',
                'name' => 'Repair Dummy - ACT 2.2',
                'description' => 'Repair Dummy - ACT 2.2',
                'status' => 1,
                'wbs_id' => 14,
                'planned_duration' => 4,
                'planned_start_date' => '2019-01-15',
                'planned_end_date' => '2019-01-18',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 5.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 10:43:36',
                'updated_at' => '2018-12-19 10:43:36',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => 'ACT182020007',
                'name' => 'Repair Dummy - ACT 2.3',
                'description' => 'Repair Dummy - ACT 2.3',
                'status' => 1,
                'wbs_id' => 15,
                'planned_duration' => 10,
                'planned_start_date' => '2019-01-09',
                'planned_end_date' => '2019-01-18',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 20.0,
                'predecessor' => NULL,
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 10:44:43',
                'updated_at' => '2018-12-19 10:44:43',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => 'ACT182020008',
                'name' => 'Repair Dummy - ACT 2.4',
                'description' => 'Repair Dummy - ACT 2.4',
                'status' => 1,
                'wbs_id' => 15,
                'planned_duration' => 4,
                'planned_start_date' => '2019-01-20',
                'planned_end_date' => '2019-01-23',
                'actual_duration' => NULL,
                'actual_start_date' => NULL,
                'actual_end_date' => NULL,
                'progress' => 0.0,
                'weight' => 5.0,
                'predecessor' => '[18,19]',
                'user_id' => 5,
                'branch_id' => 1,
                'created_at' => '2018-12-19 10:45:11',
                'updated_at' => '2018-12-19 10:45:11',
            ),
        ));
        
        
    }
}