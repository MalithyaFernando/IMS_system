<?php
    class msmModel{
		public static function checkMedicalYear($medical_year, $connect)
		{
			$query = "SELECT * FROM tbl_medical_year WHERE medical_year ='{$medical_year}' LIMIT 1 " ;

			$result_set = mysqli_query($connect, $query);

            return $result_set;
		}

		public static function addMedicalYear($medical_year, $start_date, $end_date, $connect)
		{
			$query = "INSERT INTO tbl_medical_year(medical_year, start_date, end_date) VALUES ('$medical_year}', '{$start_date}', '{$end_date}')";
		
			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function viewMedicalYears($connect)
		{
			$query = "SELECT * FROM tbl_medical_year ORDER BY myid";

			$result_set = mysqli_query($connect, $query);

			return $result_set;
		}

		public static function updateMedicalYear($medical_year, $start_date, $end_date, $connect)
		{
			$query = "UPDATE tbl_medical_year SET start_date = '{$start_date}' AND end_date = '{$end_date}' WHERE medical_year = '{$medical_year}' LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

        public static function fetchmembers($scheme, $member_type, $connect)
		{
			$query = "SELECT u.empid, u.initials, u.sname, u.userId, uf.department, uf.healthcondition, uf.civilstatus, uf.acceptance_status, uf.membership_status FROM users u, tbl_user_flag uf WHERE u.userId = uf.user_id AND uf.schemename = '{$scheme}' AND uf.member_type = '{$member_type}' AND uf.membership_status = 1 AND uf.is_deleted = 0 ORDER BY uf.user_id";

			$result_set = mysqli_query($connect, $query);
					
			return $result_set;
		}

		public static function scheme($connect)
		{
			$query = "SELECT schemeName FROM tbl_medicalscheme WHERE is_deleted=0";
			
			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
		}

		public static function membertype($connect)
		{
			$query = "SELECT member_type FROM tbl_member_type";
			
			$result_set = mysqli_query($connect, $query);
			
			return $result_set;
		}

		public static function getmembersdetails($connect)
		{
		    $query = "SELECT u.empid, u.initials, u.sname, uf.user_id, uf.department, uf.schemename, uf.member_type FROM users u, tbl_user_flag uf WHERE u.userId = uf.user_id AND uf.membership_status = 1 AND uf.is_deleted = 0 ORDER BY uf.user_id";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function deleteMember($delete_user_id , $connect)
		{
			$query = "UPDATE tbl_user_flag SET is_deleted = 1 WHERE user_id='{$delete_user_id}' LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function getmail($mem_user_id, $connect)
		{
			$query = "SELECT email FROM users WHERE userId={$mem_user_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function requestaccept($mem_user_id, $connect)
		{
			$query = "UPDATE tbl_user_flag SET membership_status = 1 WHERE user_id={$mem_user_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function requestdecline($mem_user_id, $connect)
		{
			$query = "UPDATE tbl_user_flag SET membership_status = 0 WHERE user_id={$mem_user_id} LIMIT 1";

			$result = mysqli_query($connect, $query);

			return $result;
		}

		public static function fetchmemberships($connect)
		{
			$query = "SELECT u.*, uf.* FROM users u, tbl_user_flag uf WHERE u.userId = uf.user_id AND u.is_deleted=0 AND uf.is_deleted=0 ORDER BY uf.user_id";

			$result = mysqli_query($connect, $query);

			return $result;
		}
    }
?>