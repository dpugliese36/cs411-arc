function selectNeed(e) {
	if (currentNeed[0]) {
		currentNeed[0].className = '';
	}
	e.target.className = 'selected';
	needTitle.innerHTML = e.target.innerHTML;
}
var needs, currentNeed;
window.onload = function(e) {
	needTitle = document.getElementById("selectedNeed");
	needs = document.getElementById("needs");
	currentNeed = needs.getElementsByClassName("selected");
	needs.onclick = selectNeed;
};