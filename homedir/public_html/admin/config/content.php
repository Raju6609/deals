<?php

class main_concontent extends allcontents{

		function get_content(){

			$this->get_header();

			$this->get_latest_hot_deals();

			$this->get_main_content();

			$this->get_footer();

		}

		function share_deal(){

			$this->dealshare();

		}

		function details_deal()

		{

			$this->dealdetails();

		}

		function get_login()

		{

			$this->getlogin();

		}

		function topic_content()

		{

			$this->topiccontent();

		}

		function get_userprofile()

		{

			$this->profilecontent();

		}

		function get_setting()

		{

			$this->profilesetting();

		}

		function get_password()

		{

			$this->profilepassword();

		}

		function get_message()

		{

			$this->profilemessage();

		}

		function get_contact()
		{
			$this->getcontect();
		}
		function get_about()
		{
			$this->getabout();
		}
		function get_privacy()
		{
			$this->getprivacy();
		}
		function get_help()
		{
			$this->gethelp();
		}
		
		function get_search()
		{
			$this->getsearch();
		}

		







}



?>