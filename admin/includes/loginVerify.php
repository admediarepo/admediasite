<?php

if(!isLoggedIn()){
	header("Location: login.php");
}