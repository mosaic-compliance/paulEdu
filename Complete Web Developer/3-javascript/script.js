        var loadTime

        var numClicks = 0

        var totalTime = 0

        loadTime = Date.now()    

        function typeShape(brProp){
            var newRad
            if(brProp=="0px"){
                newRad = "50%"
                } else if (brProp=="50%") {
                    newRad="0px"
                }
                return(newRad)
        }  

        function randomSize() {
                var s

                s= Math.floor(Math.random()*(300-20))+20

                return(s)

        }


        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
                for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
                }
            return(color); 
        }

        function getRandomCoordinates() {
            var x = Math.floor(Math.random()*(500))
            var y = Math.floor(Math.random()*(500))
            var coordinate = [x,y]
            
            return(coordinate)
            }
        

        document.getElementById("shape").onclick = function(){

            document.getElementById("shape").style.display="none";
            setTimeout(newShape, Math.random()*1000);
            loadTime = Date.now();
        }



            function newShape(){
            document.getElementById("shape").style.display="block";
            
            loadTime=Date.now()


            var t = (Date.now()-loadTime)/1000

            
            numClicks=numClicks+1

            totalTime=totalTime+t

            var averageTime = totalTime/numClicks




            var tShape = typeShape(getComputedStyle(document.getElementById("shape")).getPropertyValue("border-radius"));

            var w = randomSize();

            var brColor= getRandomColor()

            var loc = [getRandomCoordinates()[0], getRandomCoordinates()[1]]

            

             if(tShape=="50%"){
            document.getElementById("shape").style.borderRadius = "50%";
            } else{
                document.getElementById("shape").style.borderRadius = "0px";
            }

            document.getElementById("shape").style.width = w+"px";

            document.getElementById("shape").style.height = w+"px";

            document.getElementById("shape").style.backgroundColor=brColor;
 
            document.getElementById("shape").style.top=loc[0];

            document.getElementById("shape").style.left=loc[1];

            document.getElementById("reactTime").innerHTML = "Your Time: "+ t + " seconds"
        
            document.getElementById("avgReactTime").innerHTML = "Your Average Time: "+ averageTime + " seconds"
        }
