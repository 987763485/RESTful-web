function AddFavorite(sURL, sTitle)
{
    try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("Join to collect failure, please use the Ctrl + D to add!");
        }
    }
}
//设为首页 <a onclick="SetHome(this,window.location)">设为首页</a>
function SetHome(obj,vrl){
        try{
                obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl);
        }
        catch(e){
                if(window.netscape) {
                        try {
                                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                        }
                        catch (e) {
                                alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
                        }
                        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
                        prefs.setCharPref('browser.startup.homepage',vrl);
                 }
        }
}

function showDialog(id) {
inquiry = $.dialog({
	id: 'inquiry',
	width: '520px',
    height: '470px',
	fixed: true,
    drag: false,
	resize:false,
	title: 'Enquiry',
    content: 'url:inquiry.asp?id='+id,
    max: false,
    min: false,
	close:function() {
		inquiry = null;
	}
});
}

$(function() {
	$("#keyword").blur(function() {
		if ($(this).val()=="") {
			$(this).val($(this).attr("attr")); 		
		}
	}).focus(function() {
		if ($(this).val()==$(this).attr("attr")) {
			$(this).val("");
		}
	});
});

/*$(function(){
	$("#keyword").focus(function() {
		$("#searchbar").css("background-color","#ffffff");
		$(this).css("background-color","#ffffff");
	}).blur(function() {
		$("#searchbar").css("background-color","#0e0e0e");
		$(this).css("background-color","#0e0e0e");
	});
});*/