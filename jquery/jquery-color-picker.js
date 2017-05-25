$(function(){

	var sda = 'sliding handle';

	colorPalette();
	
	$("#cpalette").hide();	
	$("#slide-panel").show();

	$("#cpanel-button").toggle(function() {
		$("#slide-panel").hide();
		$("#cpalette").show();
		$(this).empty().prepend('Switch to Sliding Mode');
	}, function() {
		$("#cpalette").hide();
		$("#slide-panel").show();
		$(this).empty().prepend('View Color Palette');
	});
	
	$("#baseColorNameHover").hide();	
	$("#baseColorName").show();

	$("#ctable").hover(function() {
		$("#baseColorName").hide();
		$("#baseColorNameHover").show();
	}, function() {
		$("#baseColorNameHover").hide();
		$("#baseColorName").show();

		hex = $("#hexV").text();
		$("#baseColor").css({
			"backgroundColor" : hex
		});
	});

	$(".slider").click(function() {
		updateHEX();
	});
				
	$("#sliderR").slider({
		range: "min",
		value: 128,
		min: 0,
		max: 255,
		slide: function(event, ui) {
			$("#redV").empty().prepend(ui.value);
			$("#greenV").empty().prepend($("#sliderG").slider("value"));
			$("#blueV").empty().prepend($("#sliderB").slider("value"));
			updateHEX();
		}
	});
				
	$("#sliderG").slider({
		range: "min",
		value: 128,
		min: 0,
		max: 255,
		slide: function(event, ui) {
			$("#greenV").empty().prepend(ui.value);
			$("#redV").empty().prepend($("#sliderR").slider("value"));
			$("#blueV").empty().prepend($("#sliderB").slider("value"));
			updateHEX();
		}
	});
				
	$("#sliderB").slider({
		range: "min",
		value: 128,
		min: 0,
		max: 255,
		slide: function(event, ui) {
			$("#blueV").empty().prepend(ui.value);
			$("#redV").empty().prepend($("#sliderR").slider("value"));
			$("#greenV").empty().prepend($("#sliderG").slider("value"));
			updateHEX();
		}
	});

	$(".cval").hover(function() {
		hex = $(this).attr("bgcolor");
		$("#hexVH").empty().prepend(hex);
		updateRGBH();
		$("#baseColor").css({
			"backgroundColor" : hex
		});
	});

	$(".cval").click(function() {
		hex = $(this).attr("bgcolor");
		$("#hexV").empty().prepend(hex);
		updateRGB();
	});

	$("#color-generator").submit(function(){
		var hex = $(this).find('input[name=color]').val();
		if(hex=='' || hex!=$("#hexV").text()) {
			var s = $("#cpanel-button").text();
			if(s=='Switch to Sliding Mode') {
				var sda = 'please click a color in the palette';
			} else if (s=='View Color Palette') {
				var sda = 'you can slide or click the slide button to get color';
			}
			alert('oops.. you haven\'t choose any color yet!\n' + sda);
		} else {
			$.post("update_color.php",{
				color: hex,
				type: $(this).find('select[name=type] option:selected').val()
			}, function(data) {
				$("#color-harmony").html(data);
			});
		}
		return false;
	});

	$("button#cpanel-button, #color-generator input:submit").button();

});

function updateHEX() {

	r = $("#sliderR").slider("value");
	g = $("#sliderG").slider("value");
	b = $("#sliderB").slider("value");

	hex = HEX(r,g,b);
	$("#hexV").empty().prepend(hex);

	$("input[name=color]").val(hex);
	$("#baseColor").css({
		"backgroundColor" : hex
	});

}

function updateRGBH() {

	hex = $("#hexVH").text();
	rgb = RGB(hex);

	$("#redVH").empty().prepend(rgb[0]);
	$("#greenVH").empty().prepend(rgb[1]);
	$("#blueVH").empty().prepend(rgb[2]);

}

function updateRGB() {

	hex = $("#hexV").text();
	rgb = RGB(hex);

	$("#redV").empty().prepend(rgb[0]);
	$("#greenV").empty().prepend(rgb[1]);
	$("#blueV").empty().prepend(rgb[2]);

	$("input[name=color]").val(hex);
	$("#baseColor").css({
		"backgroundColor" : hex
	});
				
	$("#sliderR").slider({
		value: rgb[0]
	});					
	$("#sliderG").slider({
		value: rgb[1]
	});					
	$("#sliderB").slider({
		value: rgb[2]
	});

}

function colorPalette() {

	colorTable = "<table cellpadding=\"0\" cellspacing=\"1\" id=\"ctable\"><tr><td class=\"cval\" bgcolor=\"#f00\"></td><td class=\"cval\" bgcolor=\"#ff0\"></td><td class=\"cval\" bgcolor=\"#0f0\"></td><td class=\"cval\" bgcolor=\"#0ff\"></td><td class=\"cval\" bgcolor=\"#00f\"></td><td class=\"cval\" bgcolor=\"#f0f\"></td><td class=\"cval\" bgcolor=\"#fff\"></td><td class=\"cval\" bgcolor=\"#ebebeb\"></td><td class=\"cval\" bgcolor=\"#e1e1e1\"></td><td class=\"cval\" bgcolor=\"#d7d7d7\"></td><td class=\"cval\" bgcolor=\"#ccc\"></td><td class=\"cval\" bgcolor=\"#c2c2c2\"></td><td class=\"cval\" bgcolor=\"#b7b7b7\"></td><td class=\"cval\" bgcolor=\"#acacac\"></td><td class=\"cval\" bgcolor=\"#a0a0a0\"></td><td class=\"cval\" bgcolor=\"#959595\"></tr><tr><td class=\"cval\" bgcolor=\"#ee1d24\"></td><td class=\"cval\" bgcolor=\"#fff100\"></td><td class=\"cval\" bgcolor=\"#00a650\"></td><td class=\"cval\" bgcolor=\"#00aeef\"></td><td class=\"cval\" bgcolor=\"#2f3192\"></td><td class=\"cval\" bgcolor=\"#ed008c\"></td><td class=\"cval\" bgcolor=\"#898989\"></td><td class=\"cval\" bgcolor=\"#7d7d7d\"></td><td class=\"cval\" bgcolor=\"#707070\"></td><td class=\"cval\" bgcolor=\"#626262\"></td><td class=\"cval\" bgcolor=\"#555\"></td><td class=\"cval\" bgcolor=\"#464646\"></td><td class=\"cval\" bgcolor=\"#363636\"></td><td class=\"cval\" bgcolor=\"#262626\"></td><td class=\"cval\" bgcolor=\"#111\"></td><td class=\"cval\" bgcolor=\"#000\"></tr><tr><td class=\"cval\" bgcolor=\"#f7977a\"></td><td class=\"cval\" bgcolor=\"#fbad82\"></td><td class=\"cval\" bgcolor=\"#fdc68c\"></td><td class=\"cval\" bgcolor=\"#fff799\"></td><td class=\"cval\" bgcolor=\"#c6df9c\"></td><td class=\"cval\" bgcolor=\"#a4d49d\"></td><td class=\"cval\" bgcolor=\"#81ca9d\"></td><td class=\"cval\" bgcolor=\"#7bcdc9\"></td><td class=\"cval\" bgcolor=\"#6ccff7\"></td><td class=\"cval\" bgcolor=\"#7ca6d8\"></td><td class=\"cval\" bgcolor=\"#8293ca\"></td><td class=\"cval\" bgcolor=\"#8881be\"></td><td class=\"cval\" bgcolor=\"#a286bd\"></td><td class=\"cval\" bgcolor=\"#bc8cbf\"></td><td class=\"cval\" bgcolor=\"#f49bc1\"></td><td class=\"cval\" bgcolor=\"#f5999d\"></tr><tr><td class=\"cval\" bgcolor=\"#f16c4d\"></td><td class=\"cval\" bgcolor=\"#f68e54\"></td><td class=\"cval\" bgcolor=\"#fbaf5a\"></td><td class=\"cval\" bgcolor=\"#fff467\"></td><td class=\"cval\" bgcolor=\"#acd372\"></td><td class=\"cval\" bgcolor=\"#7dc473\"></td><td class=\"cval\" bgcolor=\"#39b778\"></td><td class=\"cval\" bgcolor=\"#16bcb4\"></td><td class=\"cval\" bgcolor=\"#00bff3\"></td><td class=\"cval\" bgcolor=\"#438ccb\"></td><td class=\"cval\" bgcolor=\"#5573b7\"></td><td class=\"cval\" bgcolor=\"#5e5ca7\"></td><td class=\"cval\" bgcolor=\"#855fa8\"></td><td class=\"cval\" bgcolor=\"#a763a9\"></td><td class=\"cval\" bgcolor=\"#ef6ea8\"></td><td class=\"cval\" bgcolor=\"#f16d7e\"></tr><tr><td class=\"cval\" bgcolor=\"#ee1d24\"></td><td class=\"cval\" bgcolor=\"#f16522\"></td><td class=\"cval\" bgcolor=\"#f7941d\"></td><td class=\"cval\" bgcolor=\"#fff100\"></td><td class=\"cval\" bgcolor=\"#8fc63d\"></td><td class=\"cval\" bgcolor=\"#37b44a\"></td><td class=\"cval\" bgcolor=\"#00a650\"></td><td class=\"cval\" bgcolor=\"#00a99e\"></td><td class=\"cval\" bgcolor=\"#00aeef\"></td><td class=\"cval\" bgcolor=\"#0072bc\"></td><td class=\"cval\" bgcolor=\"#0054a5\"></td><td class=\"cval\" bgcolor=\"#2f3192\"></td><td class=\"cval\" bgcolor=\"#652c91\"></td><td class=\"cval\" bgcolor=\"#91278f\"></td><td class=\"cval\" bgcolor=\"#ed008c\"></td><td class=\"cval\" bgcolor=\"#ee105a\"></tr><tr><td class=\"cval\" bgcolor=\"#9d0a0f\"></td><td class=\"cval\" bgcolor=\"#a1410d\"></td><td class=\"cval\" bgcolor=\"#a36209\"></td><td class=\"cval\" bgcolor=\"#aba000\"></td><td class=\"cval\" bgcolor=\"#588528\"></td><td class=\"cval\" bgcolor=\"#197b30\"></td><td class=\"cval\" bgcolor=\"#007236\"></td><td class=\"cval\" bgcolor=\"#00736a\"></td><td class=\"cval\" bgcolor=\"#0076a4\"></td><td class=\"cval\" bgcolor=\"#004a80\"></td><td class=\"cval\" bgcolor=\"#003370\"></td><td class=\"cval\" bgcolor=\"#1d1363\"></td><td class=\"cval\" bgcolor=\"#1d1363\"></td><td class=\"cval\" bgcolor=\"#62055f\"></td><td class=\"cval\" bgcolor=\"#9e005c\"></td><td class=\"cval\" bgcolor=\"#9d0039\"></tr><tr><td class=\"cval\" bgcolor=\"#790000\"></td><td class=\"cval\" bgcolor=\"#7b3000\"></td><td class=\"cval\" bgcolor=\"#7c4900\"></td><td class=\"cval\" bgcolor=\"#827a00\"></td><td class=\"cval\" bgcolor=\"#3e6617\"></td><td class=\"cval\" bgcolor=\"#045f20\"></td><td class=\"cval\" bgcolor=\"#005824\"></td><td class=\"cval\" bgcolor=\"#005951\"></td><td class=\"cval\" bgcolor=\"#005b7e\"></td><td class=\"cval\" bgcolor=\"#003562\"></td><td class=\"cval\" bgcolor=\"#002056\"></td><td class=\"cval\" bgcolor=\"#0c004b\"></td><td class=\"cval\" bgcolor=\"#0c004b\"></td><td class=\"cval\" bgcolor=\"#4b0048\"></td><td class=\"cval\" bgcolor=\"#7a0045\"></td><td class=\"cval\" bgcolor=\"#7a0026\"></tr></table>";

	$("#cpalette").prepend(colorTable);

}

function HEX(R,G,B) {

	r1 = Math.floor( R / 16 );
	r2 = R % 16;
	r = hexC(r1) + hexC(r2);

	g1 = Math.floor( G / 16 );
	g2 = G % 16;
	g = hexC(g1) + hexC(g2);

	b1 = Math.floor( B / 16 );
	b2 = B % 16;
	b = hexC(b1) + hexC(b2);

	/*
	if((r1==r2) && (g1==g2) && (b1==b2)) {
		colorHEX = "#" + hexC(r1) + hexC(g1) + hexC(b1);
	} else {
		colorHEX = "#" + r + g + b;
	}
	*/

	colorHEX = "#" + r + g + b;

	return colorHEX;

}

function hexC(dec) {

	hexArr = new Array ( "0" , "1" , "2" , "3" , "4" ,  "5" , "6" , "7" , "8" , "9" , "a" , "b" , "c" , "d" , "e" , "f" );

	return hexArr[dec];

}

function RGB(hex) {

	hex = hex.toLowerCase();
	hex = hex.replace("#","");
	if(hex.length==3) {
		err = 0;		

		r = hex.substr(0,1);
		r = parseInt(decC(r));
		r = (r *16) + r;

		g = hex.substr(1,1);
		g = parseInt(decC(g));
		g = (g *16) + g;

		b = hex.substr(2,1);
		b = parseInt(decC(b));
		b = (b *16) + b;
	} else if(hex.length==6) {
		err = 0;		

		r1 = hex.substr(0,1);
		r1 = parseInt(decC(r1));
		r2 = hex.substr(1,1);
		r2 = parseInt(decC(r2));
		r = (r1 *16) + r2;

		g1 = hex.substr(2,1);
		g1 = parseInt(decC(g1));
		g2 = hex.substr(3,1);
		g2 = parseInt(decC(g2));
		g = (g1 *16) + g2;

		b1 = hex.substr(4,1);
		b1 = parseInt(decC(b1));
		b2 = hex.substr(5,1);
		b2 = parseInt(decC(b2));
		b = (b1 *16) + b2;
	} else {
		err = 1;
	}

	if(err==0) {
		rgb = [r,g,b];
		return rgb;
	} else {
		return false;
	}

}

function decC(hex) {

	hexArr = new Array ( "0" , "1" , "2" , "3" , "4" ,  "5" , "6" , "7" , "8" , "9" , "a" , "b" , "c" , "d" , "e" , "f" );
	len = hexArr.length;

	for(i=0;i<len;i++) {
		if(hexArr[i]==hex) {
			return i;
		}
	}

}