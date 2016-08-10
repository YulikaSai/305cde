function sqlSelect(sTable,oCond) {
	submitSQL("select",sTable,"",oCond);
}

function sqlInsert(sTable,joParam) {
	submitSQL("insert",sTable,joParam,"");
}

function sqlUpdate(sTable,joParam,oCond) {
	submitSQL("update",sTable,joParam,oCond);
}

function sqlDelete(sTable,oCond) {
	submitSQL("delete",sTable,"",oCond);
}

function submitSQL(sAction,sTable,joParam,oCond) {
	//alert("Act:"+sAction+"::Tab:"+sTable+"::Pam:"+joParam);
	//showMsg("Act:"+sAction+"::Tab:"+sTable+"::Pam:"+joParam);
	
	var _URL = "php/funcDB.php";
	var _method = "GET";
	//var _data = "&act="+sAction+"&tbl="+sTable+"&param="+joParam;
	var _data = { "act" : sAction, "tbl" : sTable, "Param" : joParam };
	var _dataType = "json";
	var _sql = "";
	var _clause = "";
	var _cond = "";	
	
	switch(sAction.toLowerCase()) {
		case "select":
			_method = "GET";	
			_sql = "SELECT * FROM " + sTable;
			if(oCond != "") {	_sql += getCond(oCond);	} 
			break;
		case "insert":
			_method = "POST";
			if(joParam != "") {
				_sql = "INSERT INTO "+sTable+getClause(sAction,joParam);
			}
			//alert(joParam["fld"]+joParam["val"]);
			break;
		case "update":
			_method = "PUT";
			_sql = "UPDATE "+sTable+getClause(sAction,joParam);
			if(oCond != "") { _sql += getCond(oCond); }
			break;
		case "delete":
			_method = "DELETE";
			_sql = "DELETE FROM "+sTable;
			if(oCond != "") { _sql += getCond(oCond); }
			break;
		default:
			return;
			break;
	}
	$.extend(_data,{ "method": _method, "sql" : _sql });
	//showMsg(JSON.stringify(_data));
	$.ajax({
		url: _URL,
		type: _method,
		data: _data,
		dataType: _dataType,
		success: handleSQL
		//success: function(oRtn) { showMsg(JSON.stringify(oRtn)); }
		//error: function(e) { showMsg(e); }
	});
	
}

function getClause(sCmd, jsonFldVal) {
	var _fld = "";
	var _val = "";
	var _clause = "";
	
	switch(sCmd.toLowerCase()) {
		case "insert":
			$.each(jsonFldVal, function(key,val) {	
				_fld+=key+",";
				_val+=val+",";
			});
			_fld = _fld.substring(0,_fld.length-1);
			_val = _val.substring(0,_val.length-1);
			_clause = " ("+_fld+") VALUES("+_val+") ";
			break;
		case "update":
			$.each(jsonFldVal, function(key,val) {	
				_clause+=key+"="+val+",";
			});
			_clause = " SET "+_clause.substring(0,_clause.length-1);
			break;
	}
	return _clause;
} 

function getCond(oCond) {
	var _cond = "";
	if(typeof oCond == "object") {
		$.each(oCond, function(key,val) {
			if(_cond.length > 0) { _cond += " AND "; }
			_cond += key+"="+val;
		});
	} else {
		//alert(typeof oCond);
		if(typeof oCond == "string") {
			_cond = oCond;
		}
	}
	if(_cond.length > 0) {
		return " WHERE "+_cond;
	} 
	return "";
}

function showMsg(sMsg) {
	$("#msgPanel").html(sMsg);
}