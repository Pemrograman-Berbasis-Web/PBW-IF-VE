<?php

//method adalah segala sesuatu yang dapat dilakukan oleh class atau object.
class Mobil
{
    //method 'jalan()' memiliki visibilitas public dan memiliki parameter '$arah'
	public function jalan($arah = 'depan')
	{
		echo 'Mobil berjalan ke arah '.$arah;
	}
}