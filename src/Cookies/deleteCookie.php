<?php
function delete_cookie($name) {
	if(new_cookie($name, '', time()-604800)) {
		return true;
	}

	return false;
}
?>