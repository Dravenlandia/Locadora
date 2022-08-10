function back1() {
    window.location.href = "/Filmes";
}
function showAndCloseDiv(div) {
	var dv = document.getElementById(div);
  if(dv.style.display == "block"){
		dv.style.display = "none";
	}else{
		dv.style.display = "block";
	}
}
function goTo(rote) {
    window.location.href = rote;
}