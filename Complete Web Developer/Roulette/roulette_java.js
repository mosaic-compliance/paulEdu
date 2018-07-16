

document.getElementById("runSim").onclick = function(){
var totalwinnings = 0
var numPlays = 0
var j=0
var dPoints=[[1,1],[0,0]]
var plotPoints=""
		while	(j<10){
			document.getElementById("results").innerHTML=""
			document.getElementById("cBalance").innerHTML="Current Balance: $100"
			var betAmountS
				betAmountS= document.getElementById("bAmt").value
			var betColor = document.getElementById("bCol").value
			var betStrategy
			var nWins = 0
				if (document.getElementById("bStrat").value == "Wait for X number of REDS in a row") { betStrategy ="red"		
				} else if (document.getElementById("bStrat").value == "Wait for X number of BLACKS in a row") {
					betStrategy ="black"
				} else{
					betStrategy ="green"
				}
			var x = document.getElementById("bX").value
			var balance = 100
			var i = 0
			var rslt
			var rInRow = 0
			var bInRow = 0
			var gInRow = 0
			
			while (i<100){
				var rnd = Math.random()
				var betAmount
				if (betAmountS <= balance){
				if((betStrategy=="red" && rInRow>=x)||(betStrategy=="black" && bInRow>=x)||(betStrategy=="green" && gInRow>=x)){
					betAmount=betAmountS
				} else{
					betAmount=0
				}
			} else {
				betAmount = 0
			}
				if (rnd <(9/19)) {
					var rslt ="red"
					rInRow +=1
					bInRow=0
					gInRow=0
				} else if(rnd >=(9/19) && rnd <(18/19)){
					rslt="black"
					bInRow+=1
					rInRow=0
					gInRow=0
				} else {
					rslt = "green"
					gInRow+=1
					bInRow=0
					gInRow=0

				}
				if(betColor==rslt){
					balance=+betAmount+balance
					if(betAmount!=0){nWins =nWins+1
					}
				} else{
					balance=balance-betAmount
				}
				var output = document.getElementById("results").innerHTML
			document.getElementById("results").innerHTML=output+"<p>Round-"+i+"-"+balance+"</p>"+nWins
			i++

			dPoints[i][0]=i+1
			dPoints[i][1] = balance
			if (i<99) {
			plotPoints = plotPoints+"{ x: dPoints[i][0], y: dPoints[i][1] },"
		} else{plotPoints+"{ x: dPoints[i][0], y: dPoints[i][1] }"
		}
		document.getElementById("cBalance").innerHTML="Balance: $"+balance
		totalwinnings = totalwinnings+balance
		numPlays=j+1
		document.getElementById("average").innerHTML="AVERAGE Balance: " + (totalwinnings/numPlays)+ "<p>Number of Runs: "+numPlays+"<p>"
		j++
		}

var chart = new CanvasJS.Chart("chartContainer",
    {
     title:{
      text: "Balance After n-Plays"
    },

    data: [
    {
     type: "scatter",
     dataPoints: [

     plotPoints
]

	}
	]
}

}