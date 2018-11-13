window.onload = function() {
		chart1()
		chart2()
		chart3()	
	}


	var chart1 = function(){
		var can = document.getElementById('chart1'),
		spanProcent = document.getElementById('procent1'),
		 c = can.getContext('2d');
   
	var posX = can.width / 2,
		posY = can.height / 2,
		fps = 1000 / 200,
		procent = 0,
		oneProcent = 360 / 100,
		result = oneProcent * 66;
	
	c.lineCap = 'round';
	arcMove();
	
	function arcMove(){
	  var deegres = 0;
	  var acrInterval = setInterval (function() {
		deegres += 1;
		c.clearRect( 0, 0, can.width, can.height );
		procent = deegres / oneProcent;
  
		spanProcent.innerHTML = procent.toFixed();
  
		c.beginPath();
		c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
		c.strokeStyle = '#fff';
		c.lineWidth = '10';
		c.stroke();
  
		c.beginPath();
		c.strokeStyle = '#f9a600';
		c.lineWidth = '10';
		c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
		c.stroke();
		if( deegres >= result ) clearInterval(acrInterval);
	  }, fps);
	  
	}
	}
	var chart2 = function(){
		var can1 = document.getElementById('chart2'),
		spanProcent1 = document.getElementById('procent2'),
		 c1 = can1.getContext('2d');

		 var posX1 = can1.width / 2,
		posY1 = can1.height / 2,
		fps1 = 1000 / 200,
		procent1 = 0,
		oneProcent1 = 360 / 100,
		result1 = oneProcent1 * 67;

		
	c1.lineCap = 'round';
	arcMove1();
	
	function arcMove1(){
	  var deegres1 = 0;
	  var acrInterval1 = setInterval (function() {
		deegres1 += 1;
		c1.clearRect( 0, 0, can1.width, can1.height );
		procent1 = deegres1 / oneProcent1;
  
		spanProcent1.innerHTML = procent1.toFixed();
  
		c1.beginPath();
		c1.arc( posX1, posY1, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
		c1.strokeStyle = '#fff';
		c1.lineWidth = '10';
		c1.stroke();
  
		c1.beginPath();
		c1.strokeStyle = '#f9a600';
		c1.lineWidth = '10';
		c1.arc( posX1, posY1, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres1) );
		c1.stroke();
		if( deegres1 >= result1 ) clearInterval(acrInterval1);
	  }, fps1);
	  
	}
	}
	var chart3 = function(){
		var can2 = document.getElementById('chart3'),
		spanProcent2 = document.getElementById('procent3'),
		 c2 = can2.getContext('2d');

		 var posX2 = can2.width / 2,
		posY2 = can2.height / 2,
		fps2 = 1000 / 200,
		procent2 = 0,
		oneProcent2 = 360 / 100,
		result2 = oneProcent2 *68;

		
	c2.lineCap = 'round';
	arcMove2();
	
	function arcMove2(){
	  var deegres2 = 0;
	  var acrInterval2 = setInterval (function() {
		deegres2 += 1;
		c2.clearRect( 0, 0, can2.width, can2.height );
		procent2 = deegres2 / oneProcent2;
  
		spanProcent2.innerHTML = procent2.toFixed();
  
		c2.beginPath();
		c2.arc( posX2, posY2, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
		c2.strokeStyle = '#fff';
		c2.lineWidth = '10';
		c2.stroke();
  
		c2.beginPath();
		c2.strokeStyle = '#f9a600';
		c2.lineWidth = '10';
		c2.arc( posX2, posY2, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres2) );
		c2.stroke();
		if( deegres2 >= result2 ) clearInterval(acrInterval2);
	  }, fps2);
	  
	}
	}
	
  