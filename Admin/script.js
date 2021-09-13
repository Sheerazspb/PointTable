
$(document).ready(function () {
  $("body").on("click", "#add-team", function (e) {
    let newTeam = document.querySelector('input[type=text]').value ;
    // console.log(newTeam);
    $.ajax({
        url: "src/addTeam.php",
        type: "POST",
        data: {team: newTeam},
        success: function (data) {
        if (data == 1) {
        location.reload();
        } else {
            alert(data);
            location.reload();
        }
      },
    });
  });
});


let deleteTeam = document.querySelectorAll(".trash-btn");
deleteTeam.forEach(function(item, index){
    item.addEventListener('click',function (e) {
        let teamId = item.getAttribute("id");
        let numOfMatch = item.getAttribute("data-")
        
        $.ajax({
            url: "src/deleteTeam.php",
            type: "POST",
            data: { teamIdN: teamId, totalMatches: numOfMatch },
            success: function (data) {
            if (data == 1) {
            location.reload();
            } else {
                alert(data);
                location.reload();
            }
        },
        });
    })
})


$(document).ready(function () {
  $("body").on("click", "#submit-field", function (e) {

    let e1 = document.querySelector(".first-team-input");
    let slectedTeamA = e1.options[e1.selectedIndex].text;
    // console.log(slectedTeamA);

    let e2 = document.querySelector(".second-team-input");
    let slectedTeamB = e2.options[e2.selectedIndex].text;
    // console.log(slectedTeamB);
    
    let getDate = document.querySelector("input[type=date]").value;
    let teamAId = document.querySelector(".first-team-input").value;
    let teamBId = document.querySelector(".second-team-input").value;
    let teamAGoal = document.getElementById("teamA").value;
    let teamBGoal = document.getElementById("teamB").value;
    let teamAPoint = 0;
    let teamBPoint = 0;
    if (teamAGoal > teamBGoal) {
        teamAPoint = 3;
        teamBPoint = 0;  
    } else if (teamBGoal > teamAGoal) {
        teamBPoint = 3;
        teamAPoint = 0;
    } else if (teamAGoal == teamBGoal) {
        teamAPoint = 1;
        teamBPoint = 1;
    } 
    let difference  = teamAGoal - teamBGoal;
    $.ajax({
        url: "src/matchData.php",
        type: "POST",
        data: {
        date: getDate,
        teamA: slectedTeamA,
        teamB: slectedTeamB,
        firstTeamId: teamAId,
        secondTeamId: teamBId,
        firstTeamGoal: teamAGoal,
        secondTeamGoal: teamBGoal,
        firstTeamPoint: teamAPoint,
        secondTeamPoint: teamBPoint,
        goalDiff: difference,
        },
        success: function (data) {
        if (data == 1) {
            alert("Матч добавлен!");
            location.reload();
        } else {
            alert(data);
            location.reload();
            }
        },
    });
   });
});
