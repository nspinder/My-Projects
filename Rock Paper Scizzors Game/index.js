var playing = false;
var choices = ["rock", "paper", "scissors"];
var myChoice;
let playerChoice;
var computerChoice;
var timeleft;
var downloadTimer;


$(function(){
    
    //hide buttons on loaded page
    $(".winbox").hide();
    $(".losebox").hide();
    $(".tiegame").hide();
    $(".choices").hide();
    $(".score").hide();
    $("#restart").hide();
    $("#timer").hide();
    
    //click on start button
    $("#start").click(function(){
        
         //are we playing?
        //Yes?
       if(playing == true){
           
           //reload page
           location.reload();
           
           //No?
       }else{
           playing = true; //game initiated
           
           //show choices, restart button, hide start button, show score
           $(".choices").show();
           $(".score").show();
           $("#restart").show();
           $("#start").hide();
           
           //set score to 0
           score=0;
           $("#score").html(score);
           
           
           if($("#rock").click(function(){
               myChoice=$("#rock");
               playerChoice = "rock";
               $(".choices").hide();
               $("#timer").show();
           }))
               
            if($("#paper").click(function(){
                myChoice=$("#paper");
                playerChoice = "paper";
               $(".choices").hide();
               $("#timer").show();
           }))
            
            if($("#scissors").click(function(){
                myChoice=$("#scissors");
                playerChoice = "scissors";
               $(".choices").hide();
               $("#timer").show();
           }))
                
           
           //start timer
           timeleft = 3;
           downloadTimer = setInterval(function(){
            if(timeleft <= 0){
                clearInterval(downloadTimer);
                $("#timer").hide();
                computerChoice = choices[Math.floor(Math.random()*choices.length)];
                
                let cpuChoice;
                
                if(computerChoice === "rock"){
                    cpuChoice = $("#rock");
                }
                
                if(computerChoice === "paper"){
                    cpuChoice = $("#paper");
                }
                
                if(computerChoice === "scissors"){
                    cpuChoice = $("#scissors");
                }
                
                $(".choices").html(cpuChoice);
                $(".choices").show();
                $(".myChoice").html(myChoice);
                $(".myChoice").show();
            
                
            if (playerChoice == "rock"){
                return rockChoice();
            }else if(playerChoice == "paper"){
                return paperChoice();
            }else{
                return scissorsChoice();
            }
                
                
            } else {
                $("#timer").html(timeleft);
            }
                timeleft -= 1;
            }, 1000);
       }
        
        
    });
    
    $("#restart").click(function(){
        location.reload();
    })
    
    function rockChoice(){
        //Check who wins    
        if(playerChoice == "rock" && computerChoice == "rock"){
            return $(".tiegame").show();
        }else if(playerChoice == "rock" && computerChoice == "paper"){
            return $(".losebox").show();
        }else{
            return $(".winbox").show();
        }
    }
        
    function paperChoice(){
        if(playerChoice == "paper" && computerChoice == "paper"){
            return $(".tiegame").show();
        }else if(playerChoice == "paper" && computerChoice == "scissors"){
            return $(".losebox").show();
        }else{
            return $(".winbox").show();
        }
    }
        
    function scissorsChoice(){
        if(playerChoice == "scissors" && computerChoice == "scissors"){
            return $(".tiegame").show();
        }else if(playerChoice == "scissors" && computerChoice == "rock"){
            return $(".losebox").show();
        }else{
            return $(".winbox").show();
        } 
    }      
    

    
})
