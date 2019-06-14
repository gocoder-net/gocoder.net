									
	var canvas, ctx;

	var pos = {
		drawable: false,
		remove: false,
		x: -1,
		y: -1
	};

	 
	window.onload = function(e){
		canvas = document.getElementById("canvas");
		ctx = canvas.getContext("2d");
	 
		canvas.addEventListener("mousedown", listener);
		canvas.addEventListener("mousemove", listener);
		canvas.addEventListener("mouseup", listener);
		canvas.addEventListener("mouseout", listener);
		window.addEventListener("keydown", listener);
		window.addEventListener("keyup", listener);

	};
			 	
	 
	function listener(event){
		switch(event.type){
			case "mousedown":
				initDraw(event);
				break;
	 
			case "mousemove":
				if(pos.drawable)
					draw(event);
				break;
	 
			case "mouseout":
			case "mouseup":
				finishDraw();
				break;
			case "keydown":
				keydown();
				break;
			case "keyup":
  				keyup();
				break;


		};
	};

	function keydown(event){
		$(window).keydown(function (e) {
			var keyCode = e.which;
			if (keyCode == '17'){
				$("#fillRemove_0").prop('checked', true);
			}

		})
	}
	function keyup(event){
		$(window).keyup(function (e) {
			var keyCode = e.which;
			if (keyCode == '17'){
				$("#fillRemove_1").prop('checked', true);
			}
		})	
	}

	function draw(canvas){
		var ctx = canvas.getContext("2d");
		ctx.moveTo(30, 100);
		ctx.lineTo(80, 100);
		ctx.stroke();
	};

	function initDraw(event){
		ctx.beginPath();
		pos.drawable = true;
		var coors = getPosition(event);
		pos.X = coors.X;
		pos.Y = coors.Y;
		ctx.moveTo(pos.X, pos.Y);
	};
	 
	function draw(event){
		var coors = getPosition(event);
		ctx.lineTo(coors.X, coors.Y);
		pos.X = coors.X;
		pos.Y = coors.Y;
		ctx.strokeStyle = $("#fillColor").val();
		ctx.lineWidth = $("#fillWidth").val();
	
		if ($('input:radio[name=fillRemove]:checked').val() == "0"){
			ctx.strokeStyle = "#ffffff";
		}

		ctx.stroke();
		
	};
	 
	function finishDraw(){
		pos.drawable = false;
		pos.X = -1;
		pos.Y = -1;
	};
	 
	function getPosition(event){
		var x = event.pageX - canvas.offsetLeft;
		var y = event.pageY - canvas.offsetTop;
		return {X: x, Y: y};
	};

