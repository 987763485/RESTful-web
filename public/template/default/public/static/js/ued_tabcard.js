function uedTabCard(tabBtnId,tabBtnTag,tabBtnClass,curBtnStyle,tabBodyId,tabBodyTag,tabBodyClass,onEvent,curIndex,scrollFrom) {
	this.tabBtnId = tabBtnId;
	this.tabBtnTag = tabBtnTag;
	this.tabBtnClass = tabBtnClass;
	this.curBtnStyle = curBtnStyle;
	this.tabBodyId = tabBodyId;
	this.tabBodyTag = tabBodyTag;
	this.tabBodyClass = tabBodyClass;
	this.onEvent = onEvent;
	this.curIndex = curIndex;
	this.scrollFrom = scrollFrom;
	if (!uedTabCard.childs) {
        uedTabCard.childs = []
    };
    this.ID = uedTabCard.childs.length;
    uedTabCard.childs.push(this);
	this.init = function() {
        var tabBtnObj = uedCommon.fn.getEbyId(this.tabBtnId);
		var tabBodyObj = uedCommon.fn.getEbyId(this.tabBodyId);
        this.tabBtnArr = uedCommon.fn.getEbyClass(tabBtnObj, this.tabBtnTag, this.tabBtnClass);
        this.tabBodyArr = uedCommon.fn.getEbyClass(tabBodyObj, this.tabBodyTag, this.tabBodyClass);
		for(i=0;i<this.tabBtnArr.length;i++){
			uedCommon.fn.addEvent(this.tabBtnArr[i], this.onEvent, Function("uedTabCard.childs[" + this.ID + "].tab("+i+")"));
		};
		this.tab(this.curIndex);
	};
	this.tab = function(n){
	  for(i=0;i<this.tabBtnArr.length;i++){
		  if(i == n){
			 this.tabBtnArr[i].className = this.curBtnStyle.curClass; 
			 this.tabBodyArr[i].style.display = "";
			 if(typeof(uedScroll) != "undefined" && typeof(this.scrollFrom) != "undefined" && !isNaN(this.scrollFrom)){
			   if(typeof(uedScroll.childs[i+this.scrollFrom]) != "undefined"){
				 clearInterval(uedScroll.childs[i+this.scrollFrom]._autoTimeObj);
				 clearInterval(uedScroll.childs[i+this.scrollFrom]._scrollTimeObj);
				 uedScroll.childs[i+this.scrollFrom].autoPlay = true;
			     uedScroll.childs[i+this.scrollFrom].play();
			   }
			 }
		  }else{
			  if(this.curBtnStyle.offClass){
				  var btnOff = this.curBtnStyle.offClass;
			  }else{
				  var btnOff = "";
			  };
			 this.tabBtnArr[i].className = btnOff; 
			 this.tabBodyArr[i].style.display = "none";
			 if(typeof(uedScroll) != "undefined" && typeof(this.scrollFrom) != "undefined" && !isNaN(this.scrollFrom)){
			   if(typeof(uedScroll.childs[i+this.scrollFrom]) != "undefined"){
			     uedScroll.childs[i+this.scrollFrom].autoPlay = false;
			     uedScroll.childs[i+this.scrollFrom].stop();
			  }
			 }
		  }
	  };
	};
};/*  |xGv00|ae48d90faba510cdc1ddf876273f8d5e */