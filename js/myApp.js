var urlHost = "http://kenkendemo.biz.ht/";

function checkLogin() {
	var _loginUser = getLoginUser();
	if(_loginUser && _loginUser != "") {
		$("#divGuestHdr").hide();
		$("#divMemHdr h1").html("Hi "+_loginUser);
		$("#divMemHdr").show();
	} else {
		$("#divMemHdr").hide();
		$("#divGuestHdr").show();
	}
}
function getLoginUser() {
	if (typeof(Storage) == "undefined") {
		// browser not support localStorage
		return "";
	}
	return localStorage.getItem("loginUser");
}